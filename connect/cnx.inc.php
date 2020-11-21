<?php
function connexobjet($base,$param)
{
include_once($param.".inc.php"); 
$cnx = new mysqli(MYHOST,MYUSER,MYPASS,$base); 
/*if (!$cnx) 
{
echo "<script type=text/javascript>alert('Connexion Impossible à la base')</script>";
exit(); 
}echo "<script type=text/javascript>alert('Connexion etablie')</script>";*/
return $cnx; 
}
?>