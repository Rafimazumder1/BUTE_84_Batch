<?PHP
//header('Content-Type: text/html; charset=utf-8'); 
$PDBMIS=
"(DESCRIPTION =
(ADDRESS = (PROTOCOL = TCP)(HOST = 172.17.35.10)(PORT = 1521))
(CONNECT_DATA =(SERVER = DEDICATED)(SERVICE_NAME = ITBL)
)
)";



$db_charset = 'AL32UTF8'; 


// $conn = ocilogon( "BCSWN", "system1",$PDBMIS,"WE8ISO8859P15");

$conn = ocilogon( "BANDHAN_84", "bandhan_84",$PDBMIS,"AL32UTF8");


?>