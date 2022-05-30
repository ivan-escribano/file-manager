<?php

if(isset($_POST["sarchFile"])){
    echo "File Button";
}
else if(isset($_POST["searchImage"])){
    echo "Image Button";
}

else if(isset($_POST["searchVideo"])){
    echo "Video Button";
}
else{
    echo "not found";
}