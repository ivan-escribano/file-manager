<?php
//Get the path for the folders and files
require_once "./src/php/get_path.php"
?>
<div class="row">
    <ul class="bred_crumbs">
        <?php
        //TODO BREADCRUMBS
        //Do functinality of breadcrumbs
        require_once "./src/php/breadcrumbs.php"
        ?>
    </ul>
</div>
<br /><br />
<div class="row">
    <ul class="files_listing">
        <?php
        //Do functionality to listing files
        require_once "./src/php/list_files.php";
        ?>
    </ul>
</div>