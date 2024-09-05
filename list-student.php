<?php
require_once("connection.php");

$sql = "SELECT * FROM `biodata` ORDER BY `id` DESC";
$result = [];
if (mysqli_query($conn, $sql)) {
    $result = mysqli_query($conn, $sql);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./index.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h1 class="h1-nav">Raka Sanjaya</h1>
        <img src="./public/icon/menu-open.svg" onclick="openNav()" id="buttonNav"></img>
    </header>
    <h1 class="h1-title">List Data</h1>
    <div style="padding-left: 1rem; padding-right: 1rem;margin-bottom: 1rem">
        <hr>
    </div>
    <section class="section-card">
        <?php foreach ($result as $data) : ?>
            <div class="box-card">
                <h1 style="font-weight: 700; font-size: 1.2rem;"><?= $data["nama"]; ?></h1>
                <p><?= $data["saran"]; ?></p>
                <hr />
                <div class="container-content">
                    <div>
                        <h1><?= $data["kelas"]; ?></h1>
                        <p><?= $data["nim"]; ?></p>
                    </div>
                    <div class="container-action" style="margin-top:0.5rem">
                        <a href="edit.php?id=<?= $data['id']; ?>" class="p-2 bg-neutral-700 rounded-md hover:bg-neutral-600">
                            <img src="./public/icon/edit.svg" alt="">
                        </a>
                        <a href="detail.php?nim=<?= $data['nim']; ?>" class="p-2 bg-neutral-700 rounded-md hover:bg-neutral-600">
                            <img src="./public/icon/eye.svg" alt="">
                        </a>
                        <a href="delete.php?nim=<?= $data['nim']; ?>" class="p-2 bg-red-800 rounded-md hover:bg-red-900" onclick="return confirm('Anda yakin untuk menghapus mahasiswa dengan nama <?= $data['nama']; ?>?')">
                            <img src="./public/icon/trash.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </section>

    <section id="footer" style="border-top: 3px solid #fff;">
        <a href=" index.php">
            <img src="./public/icon/add-active.svg" alt="">
            <span class="mt-1">Add Student</span>
        </a>
        <a href="list-student.php" style="background-color: #262626;">
            <img src="./public/icon/note-unactive.svg" alt="">
            <span class="mt-1">See Student</span>
        </a>
    </section>
    <script src="script.js"></script>
</body>

</html>