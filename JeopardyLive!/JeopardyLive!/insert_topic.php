<?php
include("function.php");
$table="Themen";
    //$_POST["table"];
$result=sendsql("select * from $table;");
$handle= fopen ("test.txt", "r");
echo "$handle";
fclose($handle);
echo "<h1>";
echo "$table";
echo "</h1>";
echo "<form action=\"insert.php\" method=\"POST\" target=\"\">
                 <table style=\"text-align: right;\">";

$anz=mysql_num_fields($result);
for ($i=0;$i<$anz;$i++)
    {
		echo "<tr><td>";
		echo mysql_field_name($result,$i);
		echo "</td><td><input type=\"Text\" name=\"";
		echo mysql_field_name($result,$i);
		echo "\" ><br/> </td></tr>";
    }

	echo "</table>";
	echo "<input type=\"Submit\" name=\"\" value=\"Ausführen\"></form>";
?>