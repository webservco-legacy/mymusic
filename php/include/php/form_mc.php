<?php if(!isset($content)) { die('Oups!'); } ?>
<?php
    $astazi = date("Y-m-d");
    $mesajEr = LN_MC_C_MES1;
    $produsul = '';
    $numele = LN_MC_C_NAME;
    $adresa = LN_MC_C_EMAIL;
    $mesajul = LN_MC_C_MESSAGE;
    $dataform = '';
    $msgstyle = 'formc_mesaj';
    if (isset($_POST['produsul'])) {$produsul = $_POST['produsul'];}
    if (isset($_POST['numele'])) {$numele = block_tags(stripslashes(trim($_POST['numele'])));}
    if (isset($_POST['adresa'])) {$adresa = block_tags(trim($_POST['adresa']));}
    if (isset($_POST['mesajul'])) {$mesajul = block_tags(stripslashes(trim($_POST['mesajul'])));}
    if (isset($_POST['dataform'])) {$dataform = $_POST['dataform'];}

if (isset($_POST['submit'])) {
    $err = '0';
    if (trim($numele) == '' || trim($numele) == LN_MC_C_NAME) {$mesajEr = LN_MC_C_MES2; $msgstyle = 'formc_mesaje'; $err = '1';}
    else if (trim($adresa) == '' || trim($adresa) == LN_MC_C_EMAIL) {$mesajEr = LN_MC_C_MES3; $msgstyle = 'formc_mesaje'; $err = '1';}
    else if (!isEmail($adresa)) {$mesajEr = LN_MC_C_MES4; $msgstyle = 'formc_mesaje'; $err = '1';}
    else if (trim($mesajul) == '' || trim($mesajul) == LN_MC_C_MESSAGE) {$mesajEr = LN_MC_C_MES5; $msgstyle = 'formc_mesaje'; $err = '1';}

    if ($err == '0') {
        $query_rstId = "SELECT MAX(id) FROM `etc_mc_contact`";
        $rstId=mysql_query($query_rstId) or die('Oups!<br>' . mysql_error());
	    $row_rstId = mysql_result($rstId, 0);
		$cid=$row_rstId+1;

		$query = "INSERT INTO `etc_mc_contact` (id, produsul, numele, adresa, subiectul, mesajul, dataform, citit, raspuns) VALUES ('".$cid."', '".$produsul."', '".$numele."', '".$adresa."', 'shop', '".$mesajul."', '".$dataform."', '0', '0')";
		mysql_query($query) or die('Oups!<br>' . mysql_error());
		
		$msgstyle = 'formc_mesaj';
        $mesajEr = LN_MC_C_MES6;
	    $produsul = '';
        $numele = LN_MC_C_NAME;
        $adresa = LN_MC_C_EMAIL;
        $mesajul = LN_MC_C_MESSAGE;
    }
}
?>
<FORM ID="formcontact" NAME="formcontact" METHOD="post" ACTION="">
<INPUT TYPE="hidden" NAME="produsul" ID="produsul" VALUE="<?=$mc_id?>" />
<INPUT TYPE="hidden" NAME="dataform" ID="dataform" VALUE="<?=$astazi?>" />

<TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0" ALIGN="center">
<TR>
    <TD>
        <TABLE BORDER="0" CELLPADDING="5" CELLSPACING="0" ALIGN="center" WIDTH="300">
        <TR>
            <TD CLASS="<?=$msgstyle?>" COLSPAN="2">
                <?=$mesajEr?>
            </TD>
        </TR>
        </TABLE>
        <TABLE BORDER="0" CELLPADDING="3" CELLSPACING="0" ALIGN="center" WIDTH="300">
        <TR>
            <TD CLASS="formc_input_1">
                <INPUT CLASS="form_mc" TYPE="text" TABINDEX="1" NAME="numele" ID="numele" SIZE="20" MAXLENGTH="40" VALUE="<?=$numele?>" onFocus="if(this.value=='<?=LN_MC_C_NAME?>')this.value='';" onblur="if(this.value=='')this.value='<?=LN_MC_C_NAME?>';" />
            </TD>
            <TD CLASS="formc_input_2" ROWSPAN="2">
                <TEXTAREA CLASS="form_mc_txt" TABINDEX="3" NAME="mesajul" ID="mesajul" COLS="20" ROWS="2" onFocus="if(this.value=='<?=LN_MC_C_MESSAGE?>')this.value='';" onblur="if(this.value=='')this.value='<?=LN_MC_C_MESSAGE?>';"><?=$mesajul?></TEXTAREA>
            </TD>
        </TR>
        <TR>
            <TD CLASS="formc_input_1">
                <INPUT CLASS="form_mc" TYPE="text" TABINDEX="2" NAME="adresa" ID="adresa" SIZE="20" MAXLENGTH="40" VALUE="<?=$adresa?>" onFocus="if(this.value=='<?=LN_MC_C_EMAIL?>')this.value='';" onblur="if(this.value=='')this.value='<?=LN_MC_C_EMAIL?>';" />
            </TD>
        </TR>
        </TABLE>
        <BR>
        <TABLE BORDER="0" CELLPADDING="5" CELLSPACING="0" ALIGN="center" WIDTH="300">
        <TR>
            <TD CLASS="formc_submit_2">
                <INPUT CLASS="submit" TYPE="reset" TABINDEX="5" NAME="reset" ID="reset" VALUE="<?=LN_MC_C_CLEAR?>" />
            </TD>
            <TD CLASS="formc_submit_3">
                <INPUT CLASS="submit" TYPE="submit" TABINDEX="4" NAME="submit" ID="submit" VALUE="<?=LN_MC_C_SEND?>" />
            </TD>
        </TR>
        </TABLE>
    </TD>
</TR>
</TABLE>
</FORM>