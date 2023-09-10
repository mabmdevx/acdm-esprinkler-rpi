#!/bin/sh
#
#
# GPIO-Pin  11 (OUT)
echo "11" >  /sys/class/gpio/export
chmod 777 -R /sys/class/gpio/gpio11
echo "out" > /sys/class/gpio/gpio11/direction
echo "1" > /sys/class/gpio/gpio11/value

# GPIO-Pin  14 (OUT)
#echo "14" >  /sys/class/gpio/export
#chmod 777 -R /sys/class/gpio/gpio14
#echo "out" > /sys/class/gpio/gpio14/direction
#echo "1" > /sys/class/gpio/gpio14/value

