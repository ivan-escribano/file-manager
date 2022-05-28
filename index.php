<?php
//Get the path for the folders and files
require_once "./src/php/get_path.php";
echo $urlPath;
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
  <main>
    <nav class="nav__menu">
      <div class="breadcrumbs">
        <?php
        //TODO BREADCRUMBS
        //Do functinality of breadcrumbs
        require_once "./src/php/breadcrumbs.php";
        ?>
      </div>
      <div class="serchbar">
        <form action="">
          <input type="text" class="searchbar__input" />
          <button>SEARCH</button>
        </form>
      </div>
    </nav>
    <section class="file__manager">
      <section class="left__menu">
        <div class="create__conatiner">
          <!--CREATE FOLDER-->
          <form id="createFolder">
            <button class="primary__btn create__btn" type="submit" name="submitFolder">CREATE</button>
            Name:
            <input type="text" name="nameFolder">
            <input type="text" name="url" value="<?= $urlPath ?>">
          </form>
           <!--CREATE FILE-->
           <form id="createFile" enctype="multipart/form-data">
          <button class="primary__btn upload__btn" type="submit" name="submitFile">UPLOAD</button>
            Name:
            <input type="file" name="file" id="inputFile">
            <input type="text" name="url" value="<?= $urlPath ?>">
          </form>

        </div>
        <section class="search__type">
          <button class="search__type-button">FILES</button>
          <button class="search__type-button">IMAGES</button>
          <button class="search__type-button">VIDEOS</button>
        </section>
      </section>
      <section class="files__conatiner" id="fileContainer">
        <?php
        //Do functionality to listing files
        require_once "./src/php/list_files.php";
        ?>
      </section>
      <aside class="aside__info">
        <div class="aside__btn">
          <button>aside btn</button>
        </div>
        <div class="aside__img">
          <img src="" alt="" />
        </div>
        <section class="aside__details">
          <ul class="aside__details-list">
            <li>Name</li>
            <li>Type</li>
            <li>Date Creation</li>
            <li>Date modification</li>
            <li>Size</li>
          </ul>
        </section>
      </aside>
    </section>
  </main>
</body>

</html>