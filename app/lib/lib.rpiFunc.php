<?php

function rpi_turn_off($pin)
{
	exec("echo \"1\" > /sys/class/gpio/gpio".$pin."/value");
}

function rpi_turn_on($pin)
{
	exec("echo \"0\" > /sys/class/gpio/gpio".$pin."/value");
}

function get_moisture_sensor_reading()
{
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
	$readAvgRound=round($readAvg);
	//echo round($readAvg); echo "<br/>";
	
	$serial->deviceClose();
	
	return $readAvgRound;
}
?>