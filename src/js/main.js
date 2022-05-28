//!GENERAL VARIABLES
const formCreateFolder = document.getElementById("createFolder");
const formcreateFile = document.getElementById("createFile");
const inputFile = document.getElementById("inputFile");
//!EVENTS
formCreateFolder.addEventListener("submit", createFolder);
formcreateFile.addEventListener("submit", createFile);

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
