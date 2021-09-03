<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Delete Organisation</title>
</head>

<?php
include 'dbcon.php';

$id1 = $_GET['oid'];

$updatequery = "delete from organisations where oid=$id1";
$cn = mysqli_query($con, $updatequery);
if ($cn) {
?>
    <script>
        alert("Deleted Successfully");
    </script>
<?php
    header('location: adminPage.php');
} else {
?>
    <script>
        alert("Operation not completed.");
    </script>
<?php
}

?>