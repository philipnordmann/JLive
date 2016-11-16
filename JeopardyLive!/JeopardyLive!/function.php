<?php
/* Zugangsdaten zum MySQL-Datenbankserver */
/* ************************************** */
function connect()  {

if (!$linkID=mysql_connect("localhost","root","")) {
echo "Die Verbindung zum Server konnte nicht hergestelltwerden<br>"; }
return $linkID;
}


/* Starten einer Abfrage */
/* ********************* */
function sendsql ($sql)
{
connect();
if (!$Ergebnis=mysql_db_query("jl", $sql))
{
    echo mysql_error();
    exit;
}
return $Ergebnis;
}

/* Tabellarische Ausgabe */
/* ********************* */
function tab_out($result)
{
$anz=mysql_num_fields($result);
$breit=100/$anz."%";
echo "<table width=100% border=0 cellpadding='2' cellspacing='2'>";
echo "<tr bgcolor=#CCADFF>";
for ($i=0;$i<$anz;$i++)
    {
    echo "<th width='$breit'><font size='1'> ";
    echo mysql_field_name($result,$i);
    echo "</font> </th>";
     }
echo "</tr>";
echo "</table>";

$num = mysql_num_rows($result);
for ($j = 0; $j < $num; $j++)
    {
    $row = mysql_fetch_array($result);
    echo "<table width=100% border=0 cellpadding='2' cellspacing='2'>";
    echo "<tr bgcolor=#FFD0D0>";
    for ($k=0;$k<$anz;$k++)
        {
        $fn=mysql_field_name($result,$k);
        echo " <td width='$breit'> <font size='1'> $row[$fn] </font> </td> " ;
        }
    echo "</tr>";
    echo "</table>";
    }
//update mysql.user set `Password` = newpassword(Password) where user LIKE 'FS141%'
//update mysql.user SET PASSWORD = 'FS141_tobi_walt' where user like 'FS141_tobi_walt'
// update mysql.user SET Password=PASSWORD('FS141_tobi_walt') WHERE user='FS141_tobi_walt'
}   // Ende Funktion tab_out
?>