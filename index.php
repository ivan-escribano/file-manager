<?php
//Get the path for the folders and files
require_once "./src/php/get_path.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="./src/js/main.js" defer></script>
  <link rel="stylesheet" href="src/style/style.css" />
  <title>FILE MANAGER</title>
</head>

<body>
  <main class="file-manager-container">
    <nav class="nav__menu">
      <div class="breadcrumbs">
        <?php
        //TODO BREADCRUMBS
        //Do functinality of breadcrumbs
        require_once "./src/php/breadcrumbs.php";
        ?>
      </div>
      <div class="searchbar">

        <form id="searchBarForm" >
          <input type="text" class="searchbar__input" name="searchValue" />
          <button type="submit" class="searchbar__btn primary-btn" name="sendSearch">SEARCH</button>
        </form>

      </div>
    </nav>
    <section class="file__manager">
      <section class="left__menu">
        <div class="create__container">
          <!--CREATE FOLDER-->
          <form id="createFolder">
            <button class="primary-btn create__btn" type="submit" name="submitFolder">CREATE</button>
            <label for="">
              Name Folder:
            <input type="text" name="nameFolder">
            <input type="hidden" name="url" value="<?= $urlPath ?>">
          </label>
          </form>
          <!--CREATE FILE-->
          <form id="createFile" enctype="multipart/form-data">
            <button class="primary-btn upload__btn" type="submit" name="submitFile">UPLOAD</button>
            Name:
            <input type="file" name="file" id="inputFile">
            <input type="hidden" name="url" value="<?= $urlPath ?>">
          </form>

        </div>
        <section class="search__type">
          <form id="searchFormBtn">
          <button class="search__type-button" type="submit" name="searchFile" id="searchFile">FILES</button>
          <button class="search__type-button" type="submit" name="searchImage" id="searchImage">IMAGES</button>
          <button class="search__type-button" type="submit" name="searchVideo" id="searchVideo">VIDEOS</button>
        </form>
        </section>
      </section>
      <section class="files__container" id="fileContainer">
        <?php
        //Do functionality to listing files
        require_once "./src/php/list_files.php";
        ?>
      </section>
        <?php
        //Do functionality to show data
        require_once "./src/php/view_data.php";
        require_once "./src/php/edit_name.php";
        ?>
    </section>
  </main>
</body>

</html>