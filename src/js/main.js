//!GENERAL VARIABLES
const formCreateFolder = document.getElementById("createFolder");
const formcreateFile = document.getElementById("createFile");
const inputFile = document.getElementById("inputFile");
const searchBarForm = document.getElementById("searchBarForm");
const searchFile = document.getElementById("searchFile");
const searchImage = document.getElementById("searchImage");
const searchVideo = document.getElementById("searchVideo");
const filesContainer = document.getElementById("fileContainer");
//!EVENTS
formCreateFolder.addEventListener("submit", createFolder);
formcreateFile.addEventListener("submit", createFile);
searchBarForm.addEventListener("submit", searchFiles);
searchFile.addEventListener("click", searchExtension);
searchImage.addEventListener("click", searchExtension);
searchVideo.addEventListener("click", searchExtension);
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
        const files = doc.querySelectorAll(".files__container-item");
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

//!SEARCH BUTTONS FUNCTIONALITY FILTER BY FILES/IMAGES/VIDEO
function searchExtension(e) {
  e.preventDefault();
  console.log(e.target.id);
  const btnClicked = e.target.id;
  const data = new FormData();
  if (btnClicked === "searchFile") {
    data.set("searchFile", btnClicked);
  } else if (btnClicked === "searchImage") {
    data.set("searchImage", btnClicked);
  } else if (btnClicked === "searchVideo") {
    data.set("searchVideo", btnClicked);
  }
  // const inputFile = document.getElementById("searchFile");
  // const inputImg = document.getElementById("searchImage");
  // const inputVideo = document.getElementById("searchVideo");
  // data.append("searchFile", inputFile);
  // data.append("searchImage", inputImg);
  // data.append("searchVideo", inputVideo);
  const url = `${window.location.pathname}src/php/searchButtons.php`;
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
        const files = doc.querySelectorAll(".files__container-item");
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
