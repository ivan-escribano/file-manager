//!GENERAL VARIABLES
const formCreateFolder = document.getElementById("createFolder");
const formcreateFile = document.getElementById("createFile");
const inputFile = document.getElementById("inputFile");
const searchBarForm = document.getElementById("searchBarForm");
const filesContainer = document.getElementById("fileContainer");
//!EVENTS
formCreateFolder.addEventListener("submit", createFolder);
formcreateFile.addEventListener("submit", createFile);
searchBarForm.addEventListener("submit", searchFiles);

//!FUNCTIONS CREATE AND UPLOAD VIA FETCHAPI
function createFolder(e) {
  e.preventDefault();
  const data = new FormData(formCreateFolder);
  //Current url of the page "index";
  const url = `${window.location.pathname}src/php/create_folder.php`;
  //Post method , and pass data form
  fetch(url, {
    method: "POST",
    body: data,
  })
    .then((response) => response.text())
    .then((data) => {
      console.log(data);
      location.reload();
    });
}

function createFile(e) {
  e.preventDefault();
  const data = new FormData(formCreateFolder);
  //add "file" to data
  data.append("file", inputFile.files[0]);
  //Current url of the page "index";
  const url = `${window.location.pathname}src/php/create_file.php`;
  //Post method , and pass data form
  fetch(url, {
    method: "POST",
    body: data,
  })
    .then((response) => response.text())
    .then((data) => {
      console.log(data);
      location.reload();
    });
}

//!SEARCHBAR FUNCTIONALITY SEARCH FILES GET RESPONSE VIA FETCH AND UPDATE HTML ASYNCHRONOUS
function searchFiles(e) {
  e.preventDefault();
  const data = new FormData(searchBarForm);
  const url = `${window.location.pathname}src/php/searchbar.php`;
  filesContainer.textContent = "";
  fetch(url, {
    method: "POST",
    body: data,
  })
    .then((response) => response.text())
    .then((data) => {
      //If searched value has match
      if (data !== "") {
        // Convert the HTML string into a document object
        var parser = new DOMParser();
        var doc = parser.parseFromString(data, "text/html");
        //Now you need to select the elements inside the "document" because you have a entire HTML document when you do the "DOMPARSER" function
        const files = doc.querySelectorAll(".files__conatiner-item");
        files.forEach((file) => {
          filesContainer.append(file);
        });
      } else {
        //If no match with search value..
        const emptyString = document.createElement("p");
        emptyString.className = "empty-search";
        emptyString.textContent = "No files found with the given name";
        filesContainer.append(emptyString);
      }
    });
}
