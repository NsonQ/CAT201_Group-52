<?php
    // chdir(__DIR__ ."/lib");
    // shell_exec("javac -cp .:/var/www/html/assignment/pdfbox-app-3.0.1.jar  ConvertTXT.java");
    // chdir(dirname(__DIR__));

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    //set directory 
    $uploadDir = __DIR__ . '/uploadTXT/' ;
    $convertDir = __DIR__ .'/convertedFileTXT/';
    $zipDir = __DIR__ . '/convertedZip/' ;
    

    $return_var =array();

//this part of code is used to convert file
//check whether the request method is POST AND the file uploaded? 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) 
{
    $file_num = is_array($_FILES['file']['name']) ? count($_FILES['file']['name']): 1; //check is the file uploaded is array or not
    $name_arr = $_FILES['file']['name']; //example 1.txt
    $temp_name_arr = $_FILES['file']['tmp_name'];
    $size_arr = $_FILES['file']['size'];
    $error_arr = $_FILES['file']['error'];
    $fileType_arr =array(); //keep files' type --> 'txt'
    for ($i=0; $i<$file_num; $i++)
    {
        $fileType_arr[] = pathinfo($name_arr[$i], PATHINFO_EXTENSION);
    }

    for ($i=0; $i < $file_num ; $i++)
    {
        // Get the uploaded files' extension and check it

        if ($fileType_arr[$i] == 'txt' )
        {
            // Modify the file name to remove spaces
            $fileName[$i] = str_replace(' ', '_', $name_arr[$i]); //example_1.txt
            $fileNameWithoutExtension[$i] = str_replace(' ', '_', pathinfo(basename($_FILES['file']['name'][$i]), PATHINFO_FILENAME)); //example_1

            //Path of uploaded file
            $filePath[$i] = $uploadDir . $fileName[$i]; // '/uploadTXT/example_1.txt'

            //Path of converted file
            $convertedFilePath[$i] = $convertDir . $fileNameWithoutExtension[$i]. '.pdf'; // '/convertedFileTXT/example_1.pdf'


            if (move_uploaded_file($temp_name_arr[$i], $filePath[$i]))  //move file into upload folder
            {
                $command = 'java -cp '. __DIR__  . '/pdfbox-app-3.0.1.jar:' . __DIR__ . '/lib/ ConvertTXT ' . escapeshellarg($filePath[$i]) . ' ' .escapeshellarg($convertedFilePath[$i]);
                exec ($command, $output, $return);
                $return_var [$i] = $return; //keep track the return_var of each file
                
            }
            else 
            {
                $error = error_get_last();
                echo 'There was an error moving the uploaded file.' . $error['message'];
            }
        } 
        else 
        {
            echo 'Invalid file type. Please upload a TXT file.';
        }
    } 
}
else 
{
    echo 'No file uploaded.';
}


if(ConvertSuccess($return_var,$file_num))
{
    if($file_num > 1)
    {
        downloadZipFile(createZipFile($convertedFilePath,$file_num),"TXT-PDF.zip");
    }
    else
    {
        downloadSingleFile($fileNameWithoutExtension[0],$convertedFilePath[0]);
    }
}


function createZipFile($convertedFilePath,$file_num)
{   
    $zipName = "TXT-PDF.zip"; //name of zip file
    $zip = new ZipArchive; //create a new ZipArchive object
    $zip->open($zipName, ZipArchive::CREATE); //open new zip file

    foreach($convertedFilePath as $file)
    {
        if(file_exists($file))
        {
            $zip-> addFile($file ,basename($file));
        }
        else
        {
            echo "File not found: $file";
        }
    }

    $zip->close();
    $originalZipPath = __DIR__ ."/" . $zipName ;
    $newZipPath = __DIR__ .'/convertedZip/' . $zipName ;
    if(!rename($originalZipPath,$newZipPath))
    {
        echo "Error in moving zip file.";
        return 8888;
    }

    return $newZipPath;
}

function downloadZipFile($zipFilePath, $zipName)
{
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.$zipName.'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($zipFilePath));


    if (ob_get_length()) {
        ob_clean();
        flush();
    }
    // Send the file to the browser 
    readfile($zipFilePath);
    exit;
}


function ConvertSuccess($return_var,$file_num)
{
    for ($j=0; $j < $file_num; $j++)
    {
        if ($return_var[$j] !== 0)
        return false;
    }

    return true;
}


function downloadSingleFile($fileNameWithoutExtension, $convertedFilePath)
{
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.$fileNameWithoutExtension. '.pdf"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($convertedFilePath));


    if (ob_get_length()) {
        ob_clean();
        flush();
    }
    // Send the file to the browser 
    readfile($convertedFilePath);
    exit;

}
?>
    
    