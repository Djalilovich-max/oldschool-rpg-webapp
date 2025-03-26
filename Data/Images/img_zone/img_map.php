<?

include '../config_mysql.php';


$conn=@mysql_connect(hostname, username, password);
if(!$conn)
{
echo "<p>Сервер временно не работает по техническим причинам</p>";
  exit();
}
if(!mysql_select_db(dbname, $conn))
{
echo "<p>Ошибка при выборе базы данных</p>";
  mysql_close($conn);
  exit();
}





$sqlimg="SELECT imgzonemap,iduser FROM zone WHERE idzone = '$idzone'";
$resultimg=mysql_query($sqlimg);
$rowimg=mysql_fetch_object($resultimg); 


$fileimg = "$rowimg->imgzonemap";
$fileimg2 = "../img_klan/k_".$rowimg->iduser."_map.gif";

list($width, $height, $type, $attr) = getimagesize("$fileimg2"); 

$img = imagecreatefromgif($fileimg);
$img2 = imagecreatefromgif($fileimg2);

$width2 = 25 - $width / 2;
$height2 = 25 - $width / 2;



// ImageGammaCorrect($img,0.5,1.0);



imagecopy ($img, $img2, $width2, $height2, 0, 0, $width, $height);


// imagecopymerge ($img, $img2, $width2, $height2, 0, 0, $width, $height, 50);


ImageGIF($img);


ImageDestroy($img);
ImageDestroy($img2);

mysql_free_result($result);
mysql_free_result($resultimg);

mysql_close($conn);
?>