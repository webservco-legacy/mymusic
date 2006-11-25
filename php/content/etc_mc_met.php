<?php
if(!isset($content)) { die('Oups!'); }
include './include/lang_mc.inc.php'; 
include './include/php/mc_functions.php';

include './include/dbopen.inc.php';

$sortare = 'id';

$mc_id = '1';

if(isset($_GET['sortare'])) {$sortare = $_GET['sortare'];}

$rowsPerPage = 8;

$pageNum = 1;

if(isset($_GET['pagenr']))
{
    $pageNum = $_GET['pagenr'];
}

$offset = ($pageNum - 1) * $rowsPerPage;

$query_rst = "SELECT * FROM `etc_mc_met` ORDER BY $sortare ASC LIMIT $offset, $rowsPerPage";
$rst = mysql_query($query_rst) or die('Oups!<br>' . mysql_error());
$row_rst = mysql_fetch_assoc($rst);
$totalRows_rst = mysql_num_rows($rst);

$query   = "SELECT COUNT(id) AS numrows FROM `etc_mc_met`";
$result  = mysql_query($query) or die('Oups!<br>' . mysql_error());
$row     = mysql_fetch_array($result, MYSQL_ASSOC);
$numrows = $row['numrows'];

$title = array("ro"=>"Metallica - colec&#355;ie de casete audio", "en"=>"Metallica - audio tapes collection");
$TotalTitles = $numrows;

?>
<BR>
<TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0" ALIGN="center">
<TR>
    <TD CLASS="ub_ct_t1">
        <IMG SRC="<?=PHP_DIR?>titlepic.php?tt=<?=$title[$ln]?>&amp;fs=10" WIDTH="400" HEIGHT="30" HSPACE="0" VSPACE="0" BORDER="0" ALT="<?=LN_ALT_DEFAULT?>" />
    </TD>
    <TD CLASS="ub_ct_t2">
        <?=$TotalTitles?>&nbsp;<?=LN_MC_TITLES?>
    </TD>
</TR>
</TABLE>

<BR>

<TABLE BORDER="0" CELLPADDING="1" CELLSPACING="0" ALIGN="center">
<TR CLASS="etc_mc_met_1">
    <TD CLASS="etc_mc_met_1">
    <A CLASS="etc_mc_sort" HREF="<?=BASE_HREF?>etc_mc_met&amp;sortare=artist"><?=LN_MC_ARTIST?></A>
    </TD>
    <TD CLASS="etc_mc_met_1">
    <A CLASS="etc_mc_sort" HREF="<?=BASE_HREF?>etc_mc_met&amp;sortare=titlu"><?=LN_MC_TITLE?></A>
    </TD>
    <TD CLASS="etc_mc_met_1">
    <A CLASS="etc_mc_sort" HREF="<?=BASE_HREF?>etc_mc_met&amp;sortare=anul"><?=LN_MC_YEAR?></A>
    </TD>
    <TD CLASS="etc_mc_met_1">
    <A CLASS="etc_mc_sort" HREF="<?=BASE_HREF?>etc_mc_met&amp;sortare=nrpiese"><?=LN_MC_TRACKS?></A>
    </TD>
    <TD CLASS="etc_mc_met_1">
    <A CLASS="etc_mc_sort" HREF="<?=BASE_HREF?>etc_mc_met&amp;sortare=nrdiscuri"><?=LN_MC_VOLUMES?></A>
    </TD>
    <TD CLASS="etc_mc_met_1">
    <A CLASS="etc_mc_sort" HREF="<?=BASE_HREF?>etc_mc_met&amp;sortare=release"><?=LN_MC_RELEASE?></A>
    </TD>
    <TD CLASS="etc_mc_met_1">
    <A CLASS="etc_mc_sort" HREF="<?=BASE_HREF?>etc_mc_met&amp;sortare=tip"><?=LN_MC_TYPE?></A>
    </TD>
    <TD CLASS="etc_mc_met_1">
    <A CLASS="etc_mc_sort" HREF="<?=BASE_HREF?>etc_mc_met&amp;sortare=stare"><?=LN_MC_CONDITION?></A>
    </TD>
</TR>
<?php do { ?>
<TR>
    <TD CLASS="etc_mc_met_2">
    <?=$row_rst['artist']?>
    </TD>
    <TD CLASS="etc_mc_met_2" WIDTH="170">
    <?=$row_rst['titlu']?>
    </TD>
    <TD CLASS="etc_mc_met_2">
    <?php if ($row_rst['anul'] == '0000') {echo '-';} else {echo $row_rst['anul'];}?>
    </TD>
    <TD CLASS="etc_mc_met_2">
    <?php if ($row_rst['nrpiese'] == '0') {echo '-';} else {echo $row_rst['nrpiese'];}?>
    </TD>
    <TD CLASS="etc_mc_met_2">
    <?=$row_rst['nrdiscuri']?>
    </TD>
    <TD CLASS="etc_mc_met_2">
    <?php mc_release($row_rst['release']); ?>
    </TD>
    <TD CLASS="etc_mc_met_2">
    <?php mc_type($row_rst['tip']); ?>
    </TD>
    <TD CLASS="etc_mc_met_2">
    <?php mc_condition($row_rst['stare']); ?>
    </TD>
</TR>
<?php } while ($row_rst = mysql_fetch_assoc($rst));?>
<TR CLASS="etc_mc_nav">
    <TD CLASS="etc_mc_nav" COLSPAN="8">
        <BR>
<?php
$maxPage = ceil($numrows/$rowsPerPage);

if ($pageNum > 1)
{
    $page = $pageNum - 1;
    $prev = "&nbsp;<A CLASS=\"default\" HREF=\"" . BASE_HREF . "etc_mc_met&amp;sortare=$sortare&amp;pagenr=$page\">" . LN_NAV_PREV . "</A>&nbsp;";
    
    $first = "&nbsp;<A CLASS=\"default\" HREF=\"" . BASE_HREF . "etc_mc_met&amp;sortare=$sortare&amp;pagenr=1\">" . LN_NAV_FIRST . "</A>&nbsp;";
} 
else
{
    $prev  = "&nbsp;" . LN_NAV_PREV . "&nbsp;";
    $first = "&nbsp;" . LN_NAV_FIRST . "&nbsp;";
}

if ($pageNum < $maxPage)
{
    $page = $pageNum + 1;
    $next = "&nbsp;<A CLASS=\"default\" HREF=\"" . BASE_HREF . "etc_mc_met&amp;sortare=$sortare&amp;pagenr=$page\">" . LN_NAV_NEXT . "</A>&nbsp;";
    
    $last = "&nbsp;<A CLASS=\"default\" HREF=\"" . BASE_HREF . "etc_mc_met&amp;sortare=$sortare&amp;pagenr=$maxPage\">" . LN_NAV_LAST . "</A>&nbsp;";
} 
else
{
    $next = "&nbsp;" . LN_NAV_NEXT . "&nbsp;";
    $last = "&nbsp;" . LN_NAV_LAST . "&nbsp;";
}

echo $first . "&nbsp;" . $prev . "&nbsp;" . LN_NAV_PAGE . " <B>$pageNum</B> " . LN_NAV_OF . " <B>$maxPage</B>" . "&nbsp;" . $next . "&nbsp;" . $last;
?>
    </TD>
</TR>
</TABLE>

<BR>

<?php include './include/php/form_mc.php'; ?>

<BR>

<TABLE BORDER="0" CELLPADDING="3" CELLSPACING="0" ALIGN="center">
<TR>
    <TD CLASS="etc_mc_nav">
        <BR>
        &nbsp;<A CLASS="default" HREF="<?=BASE_HREF?>etc_mc"><?=LN_MC_BACK?></A>&nbsp;
    </TD>
</TR>
</TABLE>

<?php
mysql_free_result($rst);
mysql_free_result($result);
include './include/dbclose.inc.php';
?>