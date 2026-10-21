<?php if(!isset($content)) { die('Oups!'); } ?>
<?php
/* --------------------------------------------------------------------------------------------------------------
    ENGLISH
    --------------------------------------------------------------------------------------------------------------*/
function ln_mc_en() {
    define('LN_MC_TITLES', 'Titles');
    define('LN_MC_ARTIST', 'Artist');
    define('LN_MC_TITLE', 'Title');
    define('LN_MC_YEAR', 'Year');
    define('LN_MC_TRACKS', 'Tracks');
    define('LN_MC_FORMAT', 'Format');
    define('LN_MC_VOLUMES', 'Volumes');
    define('LN_MC_RELEASE', 'Release');
    define('LN_MC_TYPE', 'Type');
    define('LN_MC_CONDITION', 'Condition');
    define('LN_MC_METDESC', 'collection of 40 audio tapes');
    define('LN_MC_BACK', 'back to music collection');
    define('LN_MC_C_MES1', 'If you are interested in this item please use the form to contact us');
    define('LN_MC_C_MES2', 'Please fill in your name!');
    define('LN_MC_C_MES3', 'Please fill in your e-mail!');
    define('LN_MC_C_MES4', 'e-mail address is not valid!');
    define('LN_MC_C_MES5', 'Please fill in your message!');
    define('LN_MC_C_MES6', 'Message sent! We will contact you soon!');
    define('LN_MC_C_NAME', 'name');
    define('LN_MC_C_EMAIL', 'e-mail');
    define('LN_MC_C_MESSAGE', 'message');
    define('LN_MC_C_CLEAR', 'clear');
    define('LN_MC_C_SEND', 'send');
}
/* --------------------------------------------------------------------------------------------------------------
    // ENGLISH
    --------------------------------------------------------------------------------------------------------------*/
/* --------------------------------------------------------------------------------------------------------------
    ROMANIAN
    --------------------------------------------------------------------------------------------------------------*/
function ln_mc_ro() {
    define('LN_MC_TITLES', 'Titluri');
    define('LN_MC_ARTIST', 'Artist');
    define('LN_MC_TITLE', 'Titlu');
    define('LN_MC_YEAR', 'An');
    define('LN_MC_TRACKS', 'Piese');
    define('LN_MC_FORMAT', 'Format');
    define('LN_MC_VOLUMES', 'Volume');
    define('LN_MC_RELEASE', 'Release');
    define('LN_MC_TYPE', 'Tip');
    define('LN_MC_CONDITION', 'Stare');
    define('LN_MC_METDESC', 'colec&#355;ie de 40 casete audio');
    define('LN_MC_BACK', '&#238;napoi la colec&#355;ia de muzic&#259;');
    define('LN_MC_C_MES1', 'Dac&#259; sunte&#355;i interesat de acest titlu folosi&#355;i formularul pentru a ne contacta');
    define('LN_MC_C_MES2', 'Completa&#355;i numele!');
    define('LN_MC_C_MES3', 'Completa&#355;i adresa de e-mail!');
    define('LN_MC_C_MES4', 'Adresa de e-mail nu este valid&#259;!');
    define('LN_MC_C_MES5', 'Completa&#355;i mesajul!');
    define('LN_MC_C_MES6', 'Mesajul a fost trimis! Ve&#355;i fi contactat &#238;n scurt timp!');
    define('LN_MC_C_NAME', 'nume');
    define('LN_MC_C_EMAIL', 'e-mail');
    define('LN_MC_C_MESSAGE', 'mesaj');
    define('LN_MC_C_CLEAR', 'anuleaz&#259;');
    define('LN_MC_C_SEND', 'trimite');
}
/* --------------------------------------------------------------------------------------------------------------
    ROMANIAN
    --------------------------------------------------------------------------------------------------------------*/

switch($ln) {
    case "en": {
        ln_mc_en();
        break;
    }
    case "ro": {
        ln_mc_ro();
        break;
    }
    default: {
        ln_mc_en();
        break;
    }
}
?>