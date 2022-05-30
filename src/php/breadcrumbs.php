<?php
//TODO BREADCRUMBS
//With explode store in array every value in the path using  the string "/" as a separator of the values
// "root" / "test" ...
$bredCrumbsNames = explode("/", $urlPath);
$breadCPath = "";
//Loop trough the array of values in the actual path
foreach ($bredCrumbsNames as $key => $bredCrumb) {
    //if is not empty add "/" and the actual value of breadcrumb "test" example root/test, concatenating the string "breadCpath" to put it later in "a" element
    if (!empty($breadCPath)) {
        $breadCPath .= "/" . $bredCrumb;
    }
    //else add the first value to string "breadCPath" empty add "root" string first
    else {
        $breadCPath = $bredCrumb;
    }
    //TODO ">" string every value but not in the last value root ">" test ">" test2 ""
    $more = "";
    if ((count($bredCrumbsNames) - 1) != $key) {
        $more = "<span> > </span>";
    }
    //At the path to "a" element to every value of the breadcrumbs
    echo "<span class='breadcrumbs__item'><img src='src/assets/images/folder_icon.png' width='12' /><a  href='?path=$breadCPath'>$bredCrumb</a> &nbsp; $more</span>";
}
