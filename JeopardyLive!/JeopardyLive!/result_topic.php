<?php
include ('db.php');
include ("helper.php");
if ($_POST) {
	$table = $_POST ['table'];
	if (isset ( $_POST ['search'] )) {
		$q = mysqli_real_escape_string ( $connection, $_POST ['search'] );
		$strSQL_Result = mysqli_query ( $connection, "select t_id, bezeichnung from $table where bezeichnung like '%$q%' order by t_id desc LIMIT 10" );
		if (! $strSQL_Result) {
			printf ( "Error: %s\n", mysqli_error ( $connection ) );
			exit ();
		}
		while ( $row = mysqli_fetch_array ( $strSQL_Result ) ) {
			$id = $row ['t_id'];
			$bezeichnung = $row ['bezeichnung'];
			$link = "choose_category.php?id=" . $id . "";
			createTile ( $link, $bezeichnung, 10 );
		}
	} else {
		$strSQL_Result = mysqli_query ( $connection, "select t_id, bezeichnung from $table order by t_id desc LIMIT 10" );
		if (! $strSQL_Result) {
			printf ( "Error: %s\n", mysqli_error ( $connection ) );
			exit ();
		}
		while ( $row = mysqli_fetch_array ( $strSQL_Result ) ) {
			$id = $row ['t_id'];
			$bezeichnung = $row ['bezeichnung'];
			$link = "choose_category.php?id=" . $id . "";
			createTile ( $link, $bezeichnung, 10 );
		}
	}
}
?>