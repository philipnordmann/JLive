<?php
include('db.php');
if($_POST)
{
    $q = mysqli_real_escape_string($connection,$_POST['search']);
    $table = $_POST['table'];
    $strSQL_Result = mysqli_query($connection,"select t_id, bezeichnung from $table where bezeichnung like '%$q%' order by t_id desc LIMIT 9");
    if (!$strSQL_Result) {
        printf("Error: %s\n", mysqli_error($connection));
        exit();
    }
    while($row=mysqli_fetch_array($strSQL_Result))
    {
        $id = $row['t_id'];
        $bezeichnung = $row['bezeichnung'];
        $b_bezeichnung = '<strong>'.$q.'</strong>';
        $final_bezeichnung = str_ireplace($q, $b_bezeichnung, $bezeichnung);
?>
<a href="choose_category.php?id= <?php echo $id; ?>" class="tile hvr-grow"><?php echo $final_bezeichnung; ?></a>
<?php
    }
?>
<a href="#openModal" class="tile hvr-grow">
<img src="resources/plus-icon-13062.png" height="20" width="20" /></a>
<?php
}
?>