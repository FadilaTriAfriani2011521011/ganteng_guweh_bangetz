<?php
// Include your initialization file
require_once('includes/init.php');

// Check user role
$user_role = get_role();
if($user_role == 'admin' || $user_role == 'user') {
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Resmi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .letterhead {
            text-align: center;
            margin-bottom: 20px;
        }

        .date {
            text-align: right;
            margin-bottom: 20px;
        }

        .recipient {
            margin-bottom: 20px;
        }

        .salutation {
            margin-bottom: 20px;
        }

        .content {
            width: 100%;
            margin: 0 auto;
            text-align: justify;
        }

        .closing {
            margin-top: 20px;
            text-align: right;
        }

        .signature {
            text-align: right;
            margin-top: 40px;
        }
    </style>
</head>
<body onload="window.print();">


	<div style="width:100%;margin:0 auto;text-align:center; border-bottom: 2px solid #000;">
    <!-- Logo Surau Tuo Nagari Taram -->
    <img src="../assets/img/logo 50 kota.png" alt="..." style="max-width: 80px; max-height: 80px;">
    
    <!-- Judul Surat -->
<h2 style="text-align: center; text-transform: uppercase; font-family: 'Times New Roman', Times, serif;">SURAT REKOMENDASI iMAM, KHATIB, DAN BILAL</h2>
<h2 style="text-align: center; text-transform: uppercase; font-family: 'Times New Roman', Times, serif;">DI SURAU TUO TARAM</h2>

    
</div>

    <div class="date">
        <p><?= date('d F Y'); ?></p>
    </div>

    <!-- <div class="recipient">
        <p>Recipient's Name</p>
        <p>Recipient's Address</p>
    </div> -->

	<style>
    body {
        font-family: 'Times New Roman', Times, serif;
    }

    .salutation,
    .content,
    .closing,
    .signature {
        margin-bottom: 10px;
    }
</style>

<div class="salutation">
    <p>Yth, Bapak Wali Nagari Taram</p>
    <p>di Tempat</p>
</div>

<div class="content">
    <p>Dengan hormat, </p>
    <p>Kami sampaikan hasil akhir pemilihan Imam, Khatib, dan Bilal di Surau Tuo Nagari Taram menggunakan Sistem Pendukung Keputusan (SPK) dengan metode Fuzzy-SAW. Berikut adalah daftar rekomendasi berdasarkan nilai yang diperoleh:</p>
    <p><strong>Imam:</strong></p>
    <p>[Nama Imam Terpilih] - Nilai: [Nilai Imam]</p>
    <p><strong>Khatib:</strong></p>
    <p>[Nama Khatib Terpilih] - Nilai: [Nilai Khatib]</p>
    <p><strong>Bilal:</strong></p>
    <p>[Nama Bilal Terpilih] - Nilai: [Nilai Bilal]</p>
    <p>Rekomendasi ini didasarkan pada perhitungan nilai yang melibatkan beberapa kriteria dan bobot tertentu. Semua proses pemilihan dilakukan dengan transparan dan mengikuti ketentuan yang telah ditetapkan.</p>

    <p>Demikian surat ini disampaikan, atas perhatian dan kerjasama yang baik diucapkan terima kasih.</p>
    
    <!-- Add more content as needed -->
</div>

<div class="closing">
    <p>Mengetahui,</p>
</div>

<div class="signature">
    <p>Niniak Mamak Suku</p>
</div>


</body>
</html>

<?php
} else {
    header('Location: login.php');
}
?>
