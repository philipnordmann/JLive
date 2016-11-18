<?php
include('db.php');
include("helper.php");
if($_POST)
{
    $q = mysqli_real_escape_string($connection,$_POST['search']);
    $table = $_POST['table'];
    $id = $_POST['id'];
    $strSQL_Result = mysqli_query($connection,"select k_id, bezeichnung from $table where t_id = $id and bezeichnung like '%$q%' order by k_id desc LIMIT 9");
    if (!$strSQL_Result) {
        printf("Error: %s\n", mysqli_error($connection));
        exit();
    }
    while($row=mysqli_fetch_array($strSQL_Result))
    {
        $bezeichnung   = $row['bezeichnung'];
        $b_bezeichnung = '<strong>'.$q.'</strong>';
        $final_bezeichnung = str_ireplace($q, $b_bezeichnung, $bezeichnung);
        $onclick = "toggleArray(".$id.")";
        _createTileWithoutLink($onclick, $bezeichnung, 10, $id);
    }
}
?>