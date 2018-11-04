<?php
require "TimeTravel.php";



$docTravel = new TimeTravel( );

$docTravel->setStart (new DateTime('31-12-1985 13:21:20'));
$docTravel->setEnd (new DateTime('1954-04-24 06:35:20'));




echo $docTravel->getTravelInfo ( );


echo $docTravel->findDate(-1000000000);


$docTravel2 = new TimeTravel( );

$docTravel2->setStart (new DateTime('31-12-1985 13:21:20'));
$docTravel2->setEnd (new DateTime('1954-04-24 06:35:20'));
echo $docTravel2->backToFutureStepByStep();