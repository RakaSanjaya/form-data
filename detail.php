<?php
require_once("connection.php");

if (isset($_GET['nim'])) {
    $nim = (int)$_GET['nim'];
    $sql = "SELECT * FROM `biodata` WHERE `nim` = '$nim'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        header("Location: list-student.php");
        exit();
    }
} else {
    header("Location: list-student.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./index.css">
    <title>Details | <?= $data['nama']; ?></title>
</head>

<body class="h-full bg-neutral-950" style="font-family:poppins; color:white;">
    <header>
        <h1 class="h1-nav">Raka Sanjaya</h1>
        <img src="./public/icon/menu-open.svg" onclick="openNav()" id="buttonNav"></img>
    </header>
    <h1 class="h1-title">Details - <?= $data['nama']; ?></h1>
    <hr>
    <section class="container-data">
        <div class="box-data">
            <p>Nama:</p>
            <h1><?= $data["nama"]; ?></h1>
        </div>
        <div class="box-data">
            <p>NIM:</p>
            <h1><?= $data["nim"]; ?></h1>
        </div>
        <div class="box-data">
            <p>Kelas:</p>
            <h1><?= $data["kelas"]; ?></h1>
        </div>
        <div class="box-data">
            <p>Jenis Kelamin:</p>
            <h1><?= $data["kelamin"]; ?></h1>
        </div>
        <div class="box-data">
            <p>Email:</p>
            <h1><?= $data["email"]; ?></h1>
        </div>
        <div class="box-pesan">
            <p>Pesan:</p>
            <div><?= $data["saran"]; ?></div>
        </div>
        <a href="list-student.php" id="kembali" class="block text-center bg-sky-800 w-full hover:bg-sky-700 text-white font-semibold py-3 rounded-lg text-sm">Kembali</a>
    </section>
    </div>

    <section id="footer" style="border-top: 3px solid #fff;">
        <a href="index.php">
            <img src="./public/icon/add-active.svg" alt="">
            <span class="mt-1">Add Student</span>
        </a>
        <a href="list-student.php" style="background-color: #262626;">
            <img src="./public/icon/note-unactive.svg" alt="">
            <span class="mt-1">See Student</span>
        </a>
    </section>
    <script src="./script.js"></script>
</body>

</html>