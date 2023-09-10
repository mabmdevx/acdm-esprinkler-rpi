<?php 
include_once("lib/lib.phpserial.php");	
?>
<html>
 <head>
  <title>PHP Serial Port Test</title>
 </head>
 <body>
<?php
echo '<p>PHP Serial Port Test</p>';

$serial = new phpSerial;
$serial->deviceSet("/dev/ttyACM0");
$serial->confBaudRate(9600);
$serial->confParity("none");
$serial->confCharacterLength(8);
$serial->confStopBits(1);
$serial->deviceOpen();
sleep(2);
//$serial->sendMessage("Hello from my PHP script, say hi back!");

$read = trim($serial->readPort());
//echo $read; echo "<br/>";
$readArr=explode("\n",$read);
$read = implode("-",$readArr);
//var_dump($read);
$readArr=explode("--",$read);
//var_dump(($readArr));
$readAvg=(array_sum($readArr)/count($readArr));
echo round($readAvg); echo "<br/>";

$serial->deviceClose();

echo "done"; echo "<br/>";
?> 
 </body>
</html>