<?php
require_once("connection.php");

if (isset($_POST['submit'])) {
    $nama = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['nama']));
    $nim = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['nim']));
    $kelas = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['kelas']));
    $email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email']));
    $kelamin = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['jenis_kelamin']));
    $pesan = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['pesan']));

    $checkSql = "SELECT * FROM `biodata` WHERE `nim` = '$nim'";
    $checkResult = mysqli_query($conn, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script>alert('Data dengan NIM ini sudah ada!')</script>";
    } else {
        $insertSql = "INSERT INTO `biodata` (`nim`, `nama`, `kelas`, `email`, `saran`, `kelamin`) VALUES ('$nim', '$nama', '$kelas','$email', '$pesan', '$kelamin')";
        $insertResult = mysqli_query($conn, $insertSql);

        if ($insertResult) {
            echo "<script>alert('Data berhasil ditambahkan!')</script>";
        } else {
            echo "<script>alert('Data gagal ditambahkan!')</script>";
        }
    }
}
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./index.css">
    <title>Home</title>
</head>

<body>
    <main>
        <header>
            <h1 class="h1-nav">Raka Sanjaya</h1>
            <img src="./public/icon/menu-open.svg" onclick="openNav()" id="buttonNav"></img>
        </header>
        <h1 class="h1-title">Tambah Data</h1>
        <section class="section-form">
            <form method="post" action="" id="form">
                <hr>
                <div class="input-container">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" required>
                </div>
                <div class="input-container">
                    <label for="nim">NIM</label>
                    <input type="number" name="nim" id="nim" placeholder="233140XXXXX" required>
                </div>
                <div class="input-container">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas" required>
                        <option value="T3A">T3A</option>
                        <option value="T3B">T3B</option>
                        <option value="T3C">T3C</option>
                        <option value="T3D">T3D</option>
                        <option value="T3E" selected>T3E</option>
                    </select>
                </div>
                <div class="input-container">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Johndoe@student.ub.ac.id" required>
                </div>
                <div class="input-container">
                    <h1 class="jk-heading">Jenis Kelamin</h>
                        <div class="container-radio">
                            <div class="container-item-jk">
                                <input type="radio" id="pria" name="jenis_kelamin" value="Pria" required>
                                <label for="pria">Pria</label>
                            </div>
                            <div class="container-item-jk">
                                <input type="radio" id="wanita" name="jenis_kelamin" value="Wanita" required>
                                <label for="wanita">Wanita</label>
                            </div>
                        </div>
                </div>
                <div class="input-container">
                    <label for="message">Message</label>
                    <textarea name="pesan" class="py-3 rounded-lg placeholder:text-sm bg-neutral-800 text-white text-sm p-4 focus:border focus:border-white border border-transparent outline-none" rows="5" placeholder="Masukkan Pesan" required></textarea>
                </div>
                <button name="submit" id="submit" class="bg-sky-800 hover:bg-sky-700 text-white font-semibold py-3 rounded-lg text-sm">Send</button>
            </form>
        </section>
    </main>

    <section id="footer" style="border-top: 3px solid #fff;">
        <a href=" index.php" style="background-color: #262626;">
            <img src="./public/icon/add-active.svg" alt="">
            <span class="mt-1">Add Student</span>
        </a>
        <a href="list-student.php" class="flex flex-col hover:bg-neutral-800 text-white w-1/2 justify-center items-center align-middle text-xs h-full py-3">
            <img src="./public/icon/note-unactive.svg" alt="">
            <span class="mt-1">See Student</span>
        </a>
    </section>

    <script src="script.js"></script>
</body>

</html>