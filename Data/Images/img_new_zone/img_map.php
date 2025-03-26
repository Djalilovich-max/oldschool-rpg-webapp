<?

// img - файл картинки
// level - уровень



$image = urldecode($img);
$image2 = "";

$coin = imagecreatefromgif($image);
$coin2 = imagecreate(20,15);


$white = imagecolorallocate ($coin2, 144, 255, 0);
$black = imagecolorallocate ($coin2, 0, 0, 0);




ImageString($coin2, 3, 4, 0, "$level", $black);



imagecopy ($coin, $coin2, 30, 0, 0, 0, 20, 15);



ImageGIF ($coin); 
ImageDestroy ($coin);
?>