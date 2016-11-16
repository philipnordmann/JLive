<?php
include('db.php');
if($_POST)
{
    $q = mysqli_real_escape_string($connection,$_POST['search']);
    $table = $_POST['table'];
    $id = $_GET['id'];
    $strSQL_Result = mysqli_query($connection,"select k_id, bezeichnung from $table where k_id = $id and bezeichnung like '%$q%' LIMIT 5");
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
<a href="#" class="tile hvr-grow">PLUS</a>
<?php
}
?>