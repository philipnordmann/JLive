<?php
include('db.php');
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
?>
<a href="#" class="tile hvr-grow"><?php echo $final_bezeichnung; ?></a>
<?php
    }
?>
<a href="#openModal" class="tile hvr-grow">
    <img src="resources/plus-icon-13062.png" height="20" width="20" />
</a>
<?php
}
?>