    <?php
    require_once 'connection.php';
    $nim = (int)$_GET['nim'];
    $sql = "DELETE FROM `biodata` WHERE `nim` = '$nim'";
    if (mysqli_query($conn, $sql)) {
        header("Location: list-student.php");
    }
