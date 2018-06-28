<?php

$compteur ;
$compteur++;
if ($compteur == 1){
exec("./berceuse\n");
echo "ça roule";
}else if ($compteur == 2) 
{
include("eventEnd.php");
$compteur = 0;
}

?>
