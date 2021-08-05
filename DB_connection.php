<?php
/*
************************************************************
Course    : STD701 System Development Integration II
Student   : s00009622 Natalia Iudina
Date      : 25-03-2021
************************************************************
*/
?>

<?php
error_reporting(0);

//Connecting to a database
 $mysqli = new mysqli("localhost", "root", "", "MFCD");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

//Preventing SQL Injection
function cl($data) {
    $data = stripslashes($data);
    $data = mysqli_real_escape_string($GLOBALS['mysqli'], $data);
    $data = str_replace("'", "`", $data);
    return $data;
}

//Creating general pagination block
function paginator($Sql,$record_per_page) {

    $page            = '';
    $output          = '';
    if (isset($_POST["page"])) {
        $page = $_POST["page"];
    } else {
        $page = 1;
    }
    $start_from = ($page - 1) * $record_per_page;

    $nextdisabled = "";

    $query = $GLOBALS['mysqli']->query($Sql);

    $total_records = mysqli_num_rows($query);
    $total_pages   = ceil($total_records / $record_per_page);
    $disabled      = "";

    if ($page == 1) {
        $disabled = 'disabled';
    } else {
        $disabled = "";
    }
    if ($page == $total_pages) {
        $nextdisabled = 'disabled';
    } else {
        $nextdisabled = "";
    }
    $output .= '<ul class="pagination">';
    $output .= "<li class='page-item " . $disabled . "'><a href='javascript:void(0)' class='pagination_link page-link'  page_id='" . (1) . "'> << </a></li>";
    $output .= "<li class='page-item " . $disabled . "' ><a href='javascript:void(0)' class='pagination_link page-link '  page_id='" . ($page - 1) . "' > < </a></li>";

    for ($i = 1; $i <= $total_pages; $i++) {
        $class = "";

        if ($page == $i) {
            $class = 'active';
        } else {
            $class = "";
        }

        $output .= "<li class='page-item'><a href='javascript:void(0)' class='pagination_link page-link " . $class . " '  page_id='" . $i . "'>" . $i . "</a></li>";
    }
    $output .= "<li class='page-item " . $nextdisabled . "'' ><a href='javascript:void(0)' class='pagination_link page-link' page_id='" . ($page + 1) . "'> > </a></li>";
    $output .= "<li class='page-item " . $nextdisabled . "''><a href='javascript:void(0)' class='pagination_link page-link'  page_id='" . ($total_pages) . "'> >> </a></li>";
    $output .= '</ul>';
    return $output;

}

?>
