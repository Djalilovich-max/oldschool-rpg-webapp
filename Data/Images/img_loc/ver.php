<?
// ob_start("ob_gzhandler");

include 'config_mysql.php';


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
$date = date("Y-m-d H:i:s");

$newdate = strftime("%Y-%m-%d %H:%M:%S", strtotime("$date")-600);





$nik=2177412;




$sqli="SELECT * FROM chat WHERE id1 =$nik
        or id2 = $nik       UNION ALL SELECT * FROM chat_log WHERE id1 = $nik
       or id2 = $nik        ORDER BY chattime ASC";
$resulti=mysql_query($sqli);
WHILE ($rowi=mysql_fetch_object($resulti)) {


$sqlu="SELECT name FROM user WHERE id = $rowi->id1";
$resultu=mysql_query($sqlu);
$rowu=mysql_fetch_object($resultu);

$sqlu2="SELECT name FROM user WHERE id = $rowi->id2";
$resultu2=mysql_query($sqlu2);
$rowu2=mysql_fetch_object($resultu2);

echo "$rowi->chattime: $rowu->name - $rowu2->name: $rowi->logchat<br>";

}

?>
