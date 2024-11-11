<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Rental Mobil Toyota</title>
    <link rel="stylesheet" href="style/style.css">
    <!-- UJIAN TENGAH SEMESTER 3 -->
     <!-- MOHAMAD IKHSAN HAIDAR -->
        <!-- 2023310049 -->

</head>
<body>
    <div class="form-container">
        <h2>FORM RENTAL MOBIL TOYOTA</h2>
        <hr>    
        
        <form action="" method="POST">
            <div class="grup-form">
                <label for="tanggal_rental">Tanggal Rental:</label>
                <input type="date" id="tanggal_rental" name="tanggal_rental" required>
            </div>
            <div class="grup-form">
                <label for="nama_pemesan">Nama Pemesan:</label>
                <input type="text" id="nama_pemesan" name="nama_pemesan" placeholder="Ikhsan Haidar" required>
            </div>
            <div class="grup-form">
                <label>Jenis Kelamin:</label>
                <input type="radio" id="pria" name="jenis_kelamin" value="Pria" required>
                <label for="pria">Pria</label>
                <input type="radio" id="wanita" name="jenis_kelamin" value="Wanita" required>
                <label for="wanita">Wanita</label>
            </div>
            <div class="grup-form">
                <label for="pilihan_mobil">Pilihan Mobil:</label>
                <select id="pilihan_mobil" name="pilihan_mobil" required>
                    <option value="Innova">Innova</option>
                    <option value="Avanza">Avanza</option>
                    <option value="Agya">Agya</option>
                </select>
            </div>
            <div class="grup-form">
                <label for="lama_sewa">Lama Sewa:</label>
                <input type="number" id="lama_sewa" name="lama_sewa" placeholder="10" required> Hari
            </div>
            <div class="aksi-form">
                <button type="submit">Pesan</button>
                <button type="reset">Batal</button>
            </div>
        </form>
    </div>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tanggalRental = $_POST['tanggal_rental'];
        $namaPemesan = $_POST['nama_pemesan'];
        $jenisKelamin = $_POST['jenis_kelamin'];
        $pilihanMobil = $_POST['pilihan_mobil'];
        $lamaSewa = $_POST['lama_sewa'];

        $tarifPerHari = 0;
        if ($pilihanMobil == 'Innova') {
            $tarifPerHari = 500000;
        } elseif ($pilihanMobil == 'Avanza') {
            $tarifPerHari = 400000;
        } elseif ($pilihanMobil == 'Agya') {
            $tarifPerHari = 300000; 
        }
       
        switch ($jenisKelamin) {
        case 'Pria':
            $jenisKelamin = "Pria";
            break;
        case 'Wanita':
            $jenisKelamin = "Wanita";
            break;
        default:
            $jenisKelamin = "Tidak diketahui"; 
    }

        $biayaSewa = $lamaSewa * $tarifPerHari;
        $diskon = 0;
        if ($biayaSewa > 2500000) {
            $diskon = 0.2 * $biayaSewa;
        } elseif ($biayaSewa > 1000000) {
            $diskon = 0.1 * $biayaSewa;
        }
        $totalBayar = $biayaSewa - $diskon;

        echo "<div class='output-container'>";
        echo "<h3>Terima kasih sudah melakukan Rental mobil, berikut rinciannya:</h3>";
        echo "<div>Tanggal Rental: <span class='highlight'>$tanggalRental</span></div>";
        echo "<div>Nama Pemesan: <span class='highlight'>$namaPemesan</span></div>";
        echo "<div>Jenis Kelamin: <span class='highlight'>$jenisKelamin</span></div>";
        echo "<div>Pilihan Mobil: <span class='highlight'>$pilihanMobil</span></div>";
        echo "<div>Tarif: <span class='highlight'>Rp" . number_format($tarifPerHari, 0, ',', '.') . " /Hari</span></div>";
        echo "<div>Lama Sewa: <span class='highlight'>$lamaSewa Hari</span></div>";
        echo "<div>Biaya Sewa: <span class='highlight'>Rp" . number_format($biayaSewa, 0, ',', '.') . "</span></div>";
        echo "<hr>";
        echo "<div>Diskon: <span class='highlight'>" . ($diskon > 0 ? (number_format($diskon / $biayaSewa * 100, 0) . "%") : "0%") . "</span></div>";
        echo "<div>Total Bayar: <span class='highlight'>Rp" . number_format($totalBayar, 0, ',', '.') . "</span></div>";
        echo "<div class='back-link'><a href=''><<< Pesan Kembali</a></div>";
        echo "</div>";
    }
    ?>
    

</body>
</html>
