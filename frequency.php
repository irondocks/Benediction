<?php
$string = "Come near, you nations, to hear; and listen, you people: let the earth hear, and all that is therein; the world, and all things that come forth of it.";
$string = "At the start, God created a heaven and a earth. 2The earth was without form and void, and darkness was over the face of the deep. And the Spirit of God was hovering over the face of the waters.";
//$string = "At the start, is from where I began";
//$string = "Listen plus pay attention equals gained understanding";
//$string = "I spent all night and today on it. It requires a password, but you don't exactly need one to recreate the private information. You just need the public and private keys. Think how hard the maker of PGP probably had it selling one.";
//$string = "s'ok. it has good days and bad days";
//$string = "I created something no one will ever get tired of I think";

//$string = "Double slit test:
//Problem: Electron does not identify as a wave or particle, it does both determined as observation allows.
//a wave cannot pass through the slit since its wave state is determined by the actuality. So actually a wave is a particle & they are combined";
//$string = "Theresa's last name is, Pillsbury";
function colorImage(string $string)
{
    $sku_height = 255;
    $sku_width = 127;
    /* $realWidth = 50 * (strlen($string) + 1);
    $realHeight = 200;
    $srcWidth = $realWidth * 2;
    $srcHeight = $realHeight * 2;

    // create the larger source image


    // create the real/final image
    $destImage = imagecreatetruecolor($realWidth,$realHeight);
    $img = \imagecreatetruecolor(50 * (strlen($string) + 1), 200); // bias can be Height of radiogram/sku (ex. 64,127,256) */
    $img = imagecreatetruecolor(50 * (strlen($string) + 1), 200);
    $white = imagecolorallocate($img, 50, 0, 0);
    imageantialias($img, true);
    imagesetthickness($img, 3);
    imagefill($img, 0, 0, 0xffffff);
    for ($x = 0; $x < strlen($string); $x+=2) {
        if ($string[$x] == " ") {
            $x--;
            continue;
        }
        $first = ord($string[$x]);
        $second = ord($string[$x+1]);
        $lower = abs($first - $second);
        $higher = abs($second - $first);
        $brush_color = ($first < $second) ? $higher : $lower << 8;
        if ($first == $second) {
            $brush_color = $first << 16;
        }
        if (strtolower($string[$x + 1]) < strtolower($string[$x])) {
            imagearc($img, ($x + 1) * 50, 100, 75, 100, 58, 0, $brush_color);
        }

        if (strtolower($string[$x + 1]) > strtolower($string[$x])) {
            imagearc($img, ($x + 1) * 50, 56, 100, 50, 64, 0, $brush_color);
        }

        if (strtolower($string[$x + 1]) < strtolower($string[$x])) {
            imagearc($img, ($x + 1) * 50, 50, 68, 90, 92, 0, $brush_color);
        }

        if (strtolower($string[$x + 1]) > strtolower($string[$x])) {
            imagearc($img, ($x + 1) * 50, 50, 100, 100, 90, 0, $brush_color);
        }

        if (strtolower($string[$x + 1]) == strtolower($string[$x])) {
            imagearc($img, ($x) * 100, 100, 50, 100, 90, 0, $brush_color);
        }
    }
    for ($x = 0; $x < strlen($string); $x++) {
        imagestring($img, 25, (($x + 1) * 50), 150, strtolower($string[$x]), 0xFF0000);
    }
    //imagecopyresampled($destImage,$srcImage,0,0,0,0,
    //    $realWidth,$realHeight,$srcWidth,$srcHeight);
    imagepng($img, "x.png");
    echo "<img src='x.png'/>";
}
colorImage($string);
