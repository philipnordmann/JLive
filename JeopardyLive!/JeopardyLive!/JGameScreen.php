<?php
include("db.php");
echo file_get_contents( "template_game.html" );
//if ($_POST) {
//    echo '<pre>';
//    echo htmlspecialchars(print_r($_POST, true));
//    echo '</pre>';
//}

//$thema = $_GET['thema'];
//$katArray = $_GET['katArray'];


/*
$kategorie1 = $katarray(1);
$kategorie2 = $katarray(2);
$kategorie3 = $katarray(3);
$kategorie4 = $katarray(4);
$kategorie5 = $katarray(5);
$kategorie6 = $katarray(6);
*/
?>
<body>
<table id ="table" style="width:100%">
  <tr>
    <th><div>kat1</div></th>
    <th><div>kat2</div></th>
  	<th><div>kat3</div></th>
  	<th><div>kat4</div></th>
  	<th><div>kat5</div></th>
  	<th><div>kat6</div></th>
  </tr>
  <tr>
    <td><div class="tile">100</div></td>
  	<td><div class="tile">100</div></td>
  	<td><div class="tile">100</div></td>
	<td><div class="tile">100</div></td>
  	<td><div class="tile">100</div></td>
  	<td>
  		<div class="tile">100</div>
  	</td>
  </tr>
	<tr>
		<td>
            <div class="jeopardykastendings">200</div>
		</td>
		<td>
            <div class="jeopardykastendings">200</div>
		</td>
		<td>
            <div class="jeopardykastendings">200</div>
		</td>
		<td>
            <div class="jeopardykastendings">200</div>
		</td>
		<td>
            <div class="jeopardykastendings">200</div>
		</td>
		<td>
            <div class="jeopardykastendings">200</div>
		</td>
	</tr>
	<tr>
		<td>
            <div class="jeopardykastendings">300</div>
		</td>
		<td>
            <div class="jeopardykastendings">300</div>
		</td>
		<td>
            <div class="jeopardykastendings">300</div>
		</td>
		<td>
            <div class="jeopardykastendings">300</div>
		</td>
		<td>
            <div class="jeopardykastendings">300</div>
		</td>
		<td>
            <div class="jeopardykastendings">300</div>
		</td>
	</tr>
	<tr>
		<td>
            <div class="jeopardykastendings">400</div>
		</td>
		<td>
            <div class="jeopardykastendings">400</div>
		</td>
		<td>
            <div class="jeopardykastendings">400</div>
		</td>
		<td>
            <div class="jeopardykastendings">400</div>
		</td>
		<td>
            <div class="jeopardykastendings">400</div>
		</td>
		<td>
            <div class="jeopardykastendings">400</div>
		</td>
	</tr>
	<tr>
		<td>
            <div class="jeopardykastendings">500</div>
		</td>
		<td>
            <div class="jeopardykastendings">500</div>
		</td>
		<td>
            <div class="jeopardykastendings">500</div>
		</td>
		<td>
            <div class="jeopardykastendings">500</div>
		</td>
		<td>
            <div class="jeopardykastendings">500</div>
		</td>
		<td>
            <div class="jeopardykastendings">500</div>
		</td>
	</tr>

</table>

</body>




 