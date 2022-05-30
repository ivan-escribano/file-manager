<?php
//Get the path for the folders and files
require_once "./src/php/get_path.php"
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
        require_once "./src/php/breadcrumbs.php"
        ?>
        </div>
        <div class="serchbar">
          <form action="">
            <input type="text" class="searchbar__input" />
            <button>SERCH</button>
          </form>
        </div>
      </nav>
      <section class="file__manager">
        <section class="left__menu">
          <div class="create__conatiner">
            <button class="primary__btn create__btn">CREATE</button>
            <button class="primary__btn upload__btn">UPLOAD</button>
          </div>
          <section class="search__type">
            <button class="search__type-button">FILES</button>
            <button class="search__type-button">IMAGES</button>
            <button class="search__type-button">VIDEOS</button>
          </section>
        </section>
        <section class="files__conatiner">
        <?php
        //Do functionality to listing files
        require_once "./src/php/list_files.php";
        ?>
        </section>
     
       

        <?php
        //Do functionality to show data
        require_once "./src/php/view_data.php";
        require_once "./src/php/edit_remove_files.php";
        ?>

        
      </section>
    </main>
  </body>
</html>
