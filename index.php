<?php
error_reporting(E_ALL);
include './include/config.inc.php';

//$search_string = 'horror punk';
//if (isset($_GET['q'])) {$search_string = $_GET['q'];}

if (isset($_POST['q']) && $_POST['q'] != '') {

    $search_string = trim($_POST['q']);
    
    include './include/dbopen.inc.php';

// one word search
//    $query_rstSearch = "SELECT * FROM `col_movies_tt` WHERE `movie_tt` LIKE '%".$search_string."%' OR `movie_tt_inf` LIKE '%".$search_string."%'";
// fulltext search
    $query_rstSearch = "SELECT *, MATCH (`movie_tt`, `movie_tt_inf`) AGAINST ('".$search_string."') AS `relevance` FROM `col_movies_tt` WHERE MATCH (`movie_tt`, `movie_tt_inf`) AGAINST ('".$search_string."')";
    $rstSearch = mysql_query($query_rstSearch) or die('Oups!<br>' . mysql_error());
    $totalResults = mysql_num_rows($rstSearch);

    echo 'you searched for: ' . $search_string;
    echo '<BR>';
    echo 'total results: ' . $totalResults;

    if ($totalResults != 0) {
        echo '<BR><BR>';
        for ($i=1; $i<=mysql_num_rows($rstSearch); $i++) {
            $row_rstSearch = mysql_fetch_assoc($rstSearch);
            echo $row_rstSearch['movie_tt'] . '&nbsp;' . '(' . $row_rstSearch['relevance'] . ')';
            echo '<BR>';
        }
    }
    
    echo '<BR><BR>' . 'search again?' . '<BR>';
    mysql_free_result($rstSearch);
    include './include/dbclose.inc.php';
}
else {
echo 'use this form to search' . '<BR>';
}
?>
<FORM CLASS="search_form" NAME="search_form" ID="search_form" ACTION="" METHOD="post">
<INPUT TYPE="text" NAME="q" ID="q" SIZE="30" MAXLENGTH="100" VALUE="" />
<INPUT TYPE="submit" NAME="search" ID="search" VALUE="search">
</FORM>