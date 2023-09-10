<?php
include_once("../lib/lib.dbConnection.php");
include_once("../config/constants.inc.php");
include_once("../lib/lib.commonFunc.php");
include_once("../lib/lib.sysFunc.php");
include_once("../lib/lib.syslog.php");
include_once("../lib/lib.phpserial.php");
include_once("../lib/lib.rpiFunc.php");


log_activity("eSprinkler API - Poll Webserver Called.");

$qry="select * from settingsconfig where sc_id = 1";
$res=$dbObj->fireQuery($qry,'select');

$webserver_url = "";

if(isset($res) && count($res)>0 && $res!=false)
{
	$webserver_url = $res[0]['sc_webserver_url'];
}

$lastRpiOperation = "";
$rpiOperation = "";

//for($k=0;$k<4;$k++)
//{
	$moisture_sensor_reading = get_moisture_sensor_reading();
	
	$request_url = $webserver_url."/api/api_rpi_rcv.php?moisture_sensor_reading=".$moisture_sensor_reading;
	echo $request_url; echo "<br/>";
	
	$xml = @simplexml_load_file($request_url) or log_activity("url not loading : ".$request_url);
	
	if(isset($xml) && ($xml!==FALSE))
	{
		$rpiOperation = (string)$xml->operation;
	}
	echo $rpiOperation; echo "<br/>";
		
	if($lastRpiOperation != $rpiOperation)
	{	
		if($rpiOperation=="on")
		{
			rpi_turn_on(11);
			echo "Sprinkler Turned ON."; echo "<br/>";
			log_activity("Sprinkler Turned ON.");
		}
		elseif($rpiOperation=="off")
		{
			rpi_turn_off(11);	 
			echo "Sprinkler Turned OFF."; echo "<br/>";
			log_activity("Sprinkler Turned OFF.");
		}
		else
		{
			echo "Invalid Operation."; echo "<br/>";	 
			log_activity("Invalid Operation.");
		}
	}
	
	//$lastRpiOperation = $rpiOperation;	
	//sleep(15);
//}
?>