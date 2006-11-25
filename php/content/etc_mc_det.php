<?php
if(!isset($content)) { die('Oups!'); }

include './include/lang_mc.inc.php'; 
include './include/php/mc_functions.php';

include './include/dbopen.inc.php';

if(isset($_GET['mc_id'])) {$mc_id = $_GET['mc_id'];}
else {die ('Oups! <BR>No title defined!');}

if(isset($_GET['sortare'])) {$sortare = $_GET['sortare'];}
else {die ('Oups! <BR>No sorting defined!');}

if(isset($_GET['pagenr'])) {$pagenr = $_GET['pagenr'];}
else {die ('Oups! <BR>No page number defined!');}

$query_rst = "SELECT * FROM `etc_mc_titles` WHERE `id` = '$mc_id' LIMIT 1";
$rst = mysql_query($query_rst) or die('Oups!<br>' . mysql_error());
$row_rst = mysql_fetch_assoc($rst);
$totalRows_rst = mysql_num_rows($rst);

$Title = $row_rst['artist'] . "&nbsp;-&nbsp;" . $row_rst['titlu'];
?>
<BR>
        <IMG SRC="<?=PHP_DIR?>titlepic.php?tt=<?=$Title?>&amp;fs=10&amp;pic=3" WIDTH="500" HEIGHT="30" HSPACE="0" VSPACE="0" BORDER="0" ALT="<?=LN_ALT_DEFAULT?>" />

<BR>
<BR>

<TABLE BORDER="0" CELLPADDING="3" CELLSPACING="0" ALIGN="center">
<TR CLASS="etc_mc_det_1">
    <TD CLASS="etc_mc_det_1">
        <?=LN_MC_YEAR?>
    </TD>
    <TD CLASS="etc_mc_det_1">
        <?=LN_MC_TRACKS?>
    </TD>
    <TD CLASS="etc_mc_det_1">
        <?=LN_MC_FORMAT?>
    </TD>
    <TD CLASS="etc_mc_det_1">
        <?=LN_MC_VOLUMES?>
    </TD>
    <TD CLASS="etc_mc_det_1">
        <?=LN_MC_RELEASE?>
    </TD>
    <TD CLASS="etc_mc_det_1">
        <?=LN_MC_TYPE?>
    </TD>
    <TD CLASS="etc_mc_det_1">
        <?=LN_MC_CONDITION?>
    </TD>
</TR>
<TR>
    <TD CLASS="etc_mc_det_2">
    <?php if ($row_rst['anul'] == '0000') {echo '-';} else {echo $row_rst['anul'];}?>
    </td>
    <TD CLASS="etc_mc_det_2">
    <?php if ($row_rst['nrpiese'] == '0') {echo '-';} else {echo $row_rst['nrpiese'];}?>
    </td>
    <TD CLASS="etc_mc_det_2">
    <?php mc_formats($row_rst['format1'], $row_rst['format2']); ?>
    </td>
    <TD CLASS="etc_mc_det_2">
    <?=$row_rst['nrdiscuri']?>
    </td>
    <TD CLASS="etc_mc_det_2">
    <?php mc_release($row_rst['release']); ?>
    </td>
    <TD CLASS="etc_mc_det_2">
    <?php mc_type($row_rst['tip']); ?>
    </td>
    <TD CLASS="etc_mc_det_2">
    <?php mc_condition($row_rst['stare']); ?>
    </td>
</TR>
</TABLE>

<BR>

<?php include './include/php/form_mc.php'; ?>

<BR>

<TABLE BORDER="0" CELLPADDING="3" CELLSPACING="0" ALIGN="center">
<TR>
    <TD CLASS="etc_mc_nav">
        <BR>
        &nbsp;<A CLASS="default" HREF="<?=BASE_HREF?>etc_mc&amp;sortare=<?=$sortare?>&amp;pagenr=<?=$pagenr?>"><?=LN_MC_BACK?></A>&nbsp;
    </TD>
</TR>
</TABLE>

<?php
mysql_free_result($rst);
include './include/dbclose.inc.php';
?>