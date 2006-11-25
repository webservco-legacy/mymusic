<?php
if(!isset($content)) { die('Oups!'); }
include './include/lang_mc.inc.php'; 
include './include/php/mc_functions.php';
include './include/dbopen.inc.php';

$sortare = 'artist';

if(isset($_GET['sortare'])) {$sortare = $_GET['sortare'];}

$rowsPerPage = 15;

$pageNum = 1;

if(isset($_GET['pagenr']))
{
    $pageNum = $_GET['pagenr'];
}

$offset = ($pageNum - 1) * $rowsPerPage;

$query_rst     = "SELECT * FROM `etc_mc_titles` WHERE `id` != '1' ORDER BY '$sortare' ASC LIMIT $offset, $rowsPerPage";
$rst           = mysql_query($query_rst) or die('Oups!<br>' . mysql_error());
$row_rst       = mysql_fetch_assoc($rst);
$totalRows_rst = mysql_num_rows($rst);

$query    = "SELECT COUNT(id) AS numrows FROM `etc_mc_titles`";
$result   = mysql_query($query) or die('Oups!<br>' . mysql_error());
$row      = mysql_fetch_array($result, MYSQL_ASSOC);
$numrowsx = $row['numrows'];
$numrows  = $numrowsx - 1;

$TotalTitles = $numrows + 1;
?>
<BR>
<TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0" ALIGN="center">
<TR>
    <TD CLASS="ub_ct_t1">
        <IMG SRC="<?=PHP_DIR?>titlepic.php?tt=<?=LN_ETC_MC?>&amp;fs=15" WIDTH="400" HEIGHT="30" HSPACE="0" VSPACE="0" BORDER="0" ALT="<?=LN_ALT_DEFAULT?>" />
    </TD>
    <TD CLASS="ub_ct_t2">
        <?=$TotalTitles?>&nbsp;<?=LN_MC_TITLES?>
    </TD>
</TR>
</TABLE>

<BR>

<TABLE BORDER="0" CELLPADDING="1" CELLSPACING="0" ALIGN="center">
<TR CLASS="etc_mc_index_1">
    <TD CLASS="etc_mc_index_1">
    <A CLASS="etc_mc_sort" HREF="<?=BASE_HREF?>etc_mc&amp;sortare=artist"><?=LN_MC_ARTIST?></A>
    </TD>
    <TD CLASS="etc_mc_index_1">
    <A CLASS="etc_mc_sort" HREF="<?=BASE_HREF?>etc_mc&amp;sortare=titlu"><?=LN_MC_TITLE?></A>
    </TD>
    <TD CLASS="etc_mc_index_1">
    <A CLASS="etc_mc_sort" HREF="<?=BASE_HREF?>etc_mc&amp;sortare=format1"><?=LN_MC_FORMAT?></A>
    </TD>
</TR>

<?php if ($pageNum == '1') { ?>
<TR>
    <TD CLASS="etc_mc_index_2">
        Metallica
    </TD>
    <TD CLASS="etc_mc_index_2">
    <A CLASS="default" HREF="<?=BASE_HREF?>etc_mc_met">
        <?=LN_MC_METDESC?>
    </A>
    </TD>
    <TD CLASS="etc_mc_index_2">
    -
    </TD>
</TR>
<?php } ?>
<?php do { 
?>
<TR CLASS="etc_mc_index_2">
    <TD CLASS="etc_mc_index_2">
    <?=$row_rst['artist']?>
    </TD>
    <TD CLASS="etc_mc_index_2">
    <A CLASS="default" HREF="<?=BASE_HREF?>etc_mc_det&amp;sortare=<?=$sortare?>&amp;pagenr=<?=$pageNum?>&amp;mc_id=<?=$row_rst['id']?>">
    <?=$row_rst['titlu']?>
    </A>
    </TD>
    <TD CLASS="etc_mc_index_2">
    <?php mc_formats($row_rst['format1'], $row_rst['format2']); ?>
    </TD>
</TR>
<?php } while ($row_rst = mysql_fetch_assoc($rst));?>
<TR>
    <TD CLASS="etc_mc_nav" COLSPAN="8">
        <BR>

<?php
$maxPage = ceil($numrows/$rowsPerPage);

if ($pageNum > 1)
{
    $page = $pageNum - 1;
    $prev = "&nbsp;<A CLASS=\"default\" HREF=\"" . BASE_HREF . "etc_mc&amp;sortare=$sortare&amp;pagenr=$page\">" . LN_NAV_PREV . "</A>&nbsp;";
    
    $first = "&nbsp;<A CLASS=\"default\" HREF=\"" . BASE_HREF . "etc_mc&amp;sortare=$sortare&amp;pagenr=1\">" . LN_NAV_FIRST . "</A>&nbsp;";
} 
else
{
    $prev  = "&nbsp;" . LN_NAV_PREV . "&nbsp;";
    $first = "&nbsp;" . LN_NAV_FIRST . "&nbsp;";
}

if ($pageNum < $maxPage)
{
    $page = $pageNum + 1;
    $next = "&nbsp;<A CLASS=\"default\" HREF=\"" . BASE_HREF . "etc_mc&amp;sortare=$sortare&amp;pagenr=$page\">" . LN_NAV_NEXT . "</A>&nbsp;";
    
    $last = "&nbsp;<A CLASS=\"default\" HREF=\"" . BASE_HREF . "etc_mc&amp;sortare=$sortare&amp;pagenr=$maxPage\">" . LN_NAV_LAST . "</A>&nbsp;";
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
<?php
mysql_free_result($rst);
mysql_free_result($result);
include './include/dbclose.inc.php';
?>