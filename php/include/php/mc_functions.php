<?php if(!isset($content)) { die('Oups!'); } ?>
<?php
function mc_formats($format1, $format2) {
    switch ($format1) {
        case "0": { // other
            $format1x = 'other';
            if ($format2 == '0') {$format2x = 'other';}
            echo $format1x;
            echo '&nbsp;';
            echo $format2x;
            break;
        } // 0
        case "1": { // vinyl
            $format1x = 'Vinyl';
            if ($format2 == '0') {$format2x = 'other';}
            if ($format2 == '1') {$format2x = '7" SP';}
            if ($format2 == '2') {$format2x = '7" EP';}
            if ($format2 == '3') {$format2x = 'FLEXI';}
            if ($format2 == '4') {$format2x = '10"';}
            if ($format2 == '5') {$format2x = '12"';}
            if ($format2 == '6') {$format2x = 'LP';}
            echo $format1x;
            echo '&nbsp;';
            echo $format2x;
            break;
        } // 1
        case "2": { // cassette
            $format1x = 'Cassette';
            if ($format2 == '0') {$format2x = 'tape';}
            echo $format1x;
            echo '&nbsp;';
            echo $format2x;
            break;
        } // 2
        case "3": { // vhs
            $format1x = 'VHS';
            if ($format2 == '0') {$format2x = 'tape';}
            echo $format1x;
            echo '&nbsp;';
            echo $format2x;
            break;
        } // 3
        case "4": { // cd-da
            $format1x = 'CD Audio';
            if ($format2 == '0') {$format2x = 'other';}
            if ($format2 == '1') {$format2x = 'CD';}
            if ($format2 == '2') {$format2x = 'CD-Text';}
            if ($format2 == '3') {$format2x = 'CD-Maxi';}
            if ($format2 == '4') {$format2x = 'CD Promo';}
            echo $format1x;
            echo '&nbsp;';
            echo $format2x;
            break;
        } // 4
        case "5": { // cd-rom
            $format1x = 'CD-Rom';
            if ($format2 == '0') {$format2x = 'other';}
            echo $format1x;
            echo '&nbsp;';
            echo $format2x;
            break;
        } // 5
        case "6": { // cd-multi
            $format1x = 'CD-Multi';
            if ($format2 == '0') {$format2x = 'other';}
            echo $format1x;
            echo '&nbsp;';
            echo $format2x;
            break;
        } // 6
        case "7": { // dvd
            $format1x = 'DVD';
            if ($format2 == '0') {$format2x = 'other';}
            echo $format1x;
            echo '&nbsp;';
            echo $format2x;
            break;
        } // 7
        case "8": { // mp3
            $format1x = 'mp3';
            if ($format2 == '0') {$format2x = 'other';}
            echo $format1x;
            echo '&nbsp;';
            echo $format2x;
            break;
        } // 8
        default: {
            break;
        }
    }
}

function mc_release($release) {
    switch ($release) {
        case "0": {$releasex = 'other'; echo $releasex; break;}
        case "1": {$releasex = 'album'; echo $releasex; break;}
        case "2": {$releasex = 'single'; echo $releasex; break;}
        case "3": {$releasex = 'ep'; echo $releasex; break;}
        case "4": {$releasex = 'compilation'; echo $releasex; break;}
        case "5": {$releasex = 'live'; echo $releasex; break;}
        case "6": {$releasex = 'v.a.'; echo $releasex; break;}
        default: {break;}
    }
}

function mc_type($tip) {
    switch ($tip) {
        case "0": {$tipx = 'other'; echo $tipx; break;}
        case "1": {$tipx = 'original'; echo $tipx; break;}
        case "2": {$tipx = 'bootleg'; echo $tipx; break;}
        case "3": {$tipx = 'original copy'; echo $tipx; break;}
        case "4": {$tipx = 'bootleg copy'; echo $tipx; break;}
        case "5": {$tipx = 'recorded'; echo $tipx; break;}
        default: {break;}
    }
}

function mc_condition($stare) {
    switch ($stare) {
        case "0": {$starex = 'other'; echo $starex; break;}
        case "1": {$starex = 'sealed'; echo $starex; break;}
        case "2": {$starex = 'new'; echo $starex; break;}
        case "3": {$starex = 'good'; echo $starex; break;}
        case "4": {$starex = 'used'; echo $starex; break;}
        case "5": {$starex = 'poor'; echo $starex; break;}
        case "6": {$starex = 'very poor'; echo $starex; break;}
        default: {break;}
    }
}
?>