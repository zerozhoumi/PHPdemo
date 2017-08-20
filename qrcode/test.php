<?php

include 'phpqrcode/qrlib.php';

//public static function png($text, $outfile = false, $level = QR_ECLEVEL_L, $size = 3, $margin = 4, $saveandprint=false)
//{
//    $enc = QRencode::factory($level, $size, $margin);
//    return $enc->encodePNG($text, $outfile, $saveandprint=false);
//}

QRcode::png('11111111','abc.jpg',true);