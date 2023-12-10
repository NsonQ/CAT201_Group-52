// Event listener for the file input change event
document.getElementById("file").addEventListener("change", function (e) {
  var files = e.target.files; // Get the FileList object

  // Clear the file list
  document.getElementById("file-list").innerHTML = "";

  // Iterate over each file
  for (var i = 0; i < files.length; i++) {
    var fileName = files[i].name;
    var fileContainer = document.createElement("div");
    fileContainer.className = "uploaded-file";

    var pdfIcon = document.createElement("img");
    pdfIcon.src = "txt-icon.png"; // Replace with the path to your PDF icon
    pdfIcon.alt = "TXT-icon";
    fileContainer.appendChild(pdfIcon);

    var fileNameText = document.createTextNode(fileName);
    fileContainer.appendChild(fileNameText);

    document.getElementById("file-list").appendChild(fileContainer);
  }
});

// Get the form element
var form = document.querySelector("form");

// Prevent the default behavior of the dragover event
form.addEventListener(
  "dragover",
  function (e) {
    e.preventDefault();
    e.stopPropagation();
  },
  false
);

// When a file is dropped onto the form
form.addEventListener("drop", function (e) {
  e.preventDefault();
  e.stopPropagation();

  var files = e.dataTransfer.files; // Get the FileList object

  // Clear the file list
  document.getElementById("file-list").innerHTML = "";

  // Iterate over each file
  for (var i = 0; i < files.length; i++) {
    var fileName = files[i].name;
    var fileContainer = document.createElement("div");
    fileContainer.className = "uploaded-file";

    var pdfIcon = document.createElement("img");
    pdfIcon.src = "txt-icon.png"; // Replace with the path to your PDF icon
    pdfIcon.alt = "TXT-icon";
    fileContainer.appendChild(pdfIcon);

    var fileNameText = document.createTextNode(fileName);
    fileContainer.appendChild(fileNameText);

    document.getElementById("file-list").appendChild(fileContainer);
  }
});

document.getElementById("summon-hamster").addEventListener("submit", function (e) {
  // Allow the form to be submitted immediately
  // No need to call e.preventDefault()

  // Delay the summon-hamster action by 500 milliseconds (0.5 seconds)
  setTimeout(function() {
    // Trigger the summon-hamster action
    var fileContainer = document.getElementById("upload-box-done");
    fileContainer.innerHTML = `<div class="hamster-with-text">
    <div aria-label="Orange and tan hamster running in a metal wheel" role="img" class="wheel-and-hamster">
    <div class="wheel"></div>
    <div class="hamster">
    <div class="hamster__body">
      <div class="hamster__head">
        <div class="hamster__ear"></div>
        <div class="hamster__eye"></div>
        <div class="hamster__nose"></div>
      </div>
      <div class="hamster__limb hamster__limb--fr"></div>
      <div class="hamster__limb hamster__limb--fl"></div>
      <div class="hamster__limb hamster__limb--br"></div>
      <div class="hamster__limb hamster__limb--bl"></div>
      <div class="hamster__tail"></div>
    </div>
    </div>
    <div class="spoke"></div>
    </div>
    <p class="hamster-text">Reveal the engineer of our website...</p>
    <div class="convert-more-container-biggest">
        
      </div>
    
      <div class="convert-more-container">
      <svg
      class="convert-more-icon"
      xmlns="http://www.w3.org/2000/svg"
      width="57"
      height="41"
      viewBox="0 0 57 41"
      fill="none"
    >
      <path
        d="M47.88 18.1812C48.2452 17.2282 48.45 16.1862 48.45 15.0996C48.45 10.3793 44.6203 6.54961 39.9 6.54961C38.1455 6.54961 36.5067 7.08398 35.153 7.99242C32.6859 3.71742 28.0814 0.849609 22.8 0.849609C14.9269 0.849609 8.55 7.22648 8.55 15.0996C8.55 15.3401 8.55891 15.5805 8.56781 15.821C3.58031 17.5755 0 22.3315 0 27.9246C0 35.0051 5.74453 40.7496 12.825 40.7496H45.6C51.8967 40.7496 57 35.6463 57 29.3496C57 23.8366 53.0812 19.2321 47.88 18.1812ZM35.0372 23.6496H29.2125V33.6246C29.2125 34.4084 28.5712 35.0496 27.7875 35.0496H23.5125C22.7287 35.0496 22.0875 34.4084 22.0875 33.6246V23.6496H16.2628C14.9892 23.6496 14.3569 22.1177 15.2564 21.2182L24.6436 11.831C25.1958 11.2788 26.1042 11.2788 26.6564 11.831L36.0436 21.2182C36.9431 22.1177 36.3019 23.6496 35.0372 23.6496Z"
        fill="#1F7FF0"
      />
    </svg>
    
          <button
            class="convert-more-button"
            onclick="location.href='TXT-PDF.html'"
          >
            Convert More
          </button>
          
        </div>
    
    
    </div>`; // Your existing summon-hamster HTML...
  }, 500);
});



