# NyanCat

This is the project folder of CAT201 Assignment 1 by group 52.
Below are the group members: 
1. Chong Yi Jian 164364
2. Lim Ting Juin 163634
3. Anson Kiu Yi Kai 164554
4. Leon Then Leong Onn 163202

# NyanCat: A Filetype Converter Web Application

NyanCat is a web application designed to convert .pdf files to .txt files and vice versa. Built to run on the Linux Apache Web Server, this application is perfect for anyone who needs a quick and easy way to convert files.

## Prerequisites

To run NyanCat, you'll need:

- Java version 21
- PHP 8.1
- PHP zip extension
- Ubuntu WSL or Docker

## Setup

To set up the web application on your device, follow these steps:

If you're using WSL:

1. Move the files inside the repo into the folder of var/www/html: `mv /path/to/repo/* /var/www/html/`
2. Check the configuration.

If you're using Docker:

1. Build the Docker image: `docker build -t imagename:tag .`
2. Run the image inside a container: `docker run -d -p 80:80 imagename:tag`

Now, you can access the web application through the local host you configured and try out the conversion of file type!

## Troubleshooting

If you encounter any issues while setting up or using NyanCat, try the following:

- Make sure all prerequisites are installed and up-to-date.
- Check the file permissions of the input and output directories.
- Ensure the Docker container is running and accessible.


Happy converting!


## Preview of our website


![main](https://github.com/NsonQ/CAT_A1/assets/117012730/6b7a8379-8cb8-4de2-8f24-e2786818de4b)


![meet](https://github.com/NsonQ/CAT_A1/assets/117012730/232f1d53-d297-4a87-b86e-753913764716)


![TXT-PDF](https://github.com/NsonQ/CAT_A1/assets/117012730/2d6b848e-53a0-43f2-a4c1-7891f1e8e6af)


![PDF-TXT](https://github.com/NsonQ/CAT_A1/assets/117012730/e5cf9d3e-d53b-4f4c-ad30-71ef02c14494)

