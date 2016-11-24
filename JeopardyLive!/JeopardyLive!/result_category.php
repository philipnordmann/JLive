<?php
include ('db.php');
include ("helper.php");
if ($_POST) {
	$table = $_POST ['table'];
	$id = $_POST ['id'];
	if (isset ( $_POST ['search'] )) {
		$q = mysqli_real_escape_string ( $connection, $_POST ['search'] );
		$strSQL_Result = mysqli_query ( $connection, "select k_id, bezeichnung from $table where t_id = $id and bezeichnung like '%$q%' order by k_id desc LIMIT 9" );
		if (! $strSQL_Result) {
			printf ( "Error: %s\n", mysqli_error ( $connection ) );
			exit ();
		}
		while ( $row = mysqli_fetch_array ( $strSQL_Result ) ) {
			$k_id = $row ['k_id'];
			$bezeichnung = $row ['bezeichnung'];
			$b_bezeichnung = '<strong>' . $q . '</strong>';
			$final_bezeichnung = str_ireplace ( $q, $b_bezeichnung, $bezeichnung );
			$onclick = "toggleArray(" . $k_id . ")";
			_createTileWithoutLink ( $onclick, $bezeichnung, 10, $k_id );
		}
	} else {
		$strSQL_Result = mysqli_query ( $connection, "select k_id, bezeichnung from $table where t_id = $id order by k_id desc LIMIT 9" );
		if (! $strSQL_Result) {
			printf ( "Error: %s\n", mysqli_error ( $connection ) );
			exit ();
		}
		while ( $row = mysqli_fetch_array ( $strSQL_Result ) ) {
			$k_id = $row ['k_id'];
			$bezeichnung = $row ['bezeichnung'];
			$link = "#";
			$onclick = "toggleArray(" . $k_id . ")";
			_createTileWithoutLink ( $onclick, $bezeichnung, 10, $k_id );
		}
	}
}

?>