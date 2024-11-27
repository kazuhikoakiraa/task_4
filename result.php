<?php
session_start(); // Memulai sesi

// Cek apakah data ada di sesi
if (!isset($_SESSION['data'])) {
    die('Tidak ada data yang tersedia. Silakan kembali ke form.');
}

$data = $_SESSION['data'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #f8f9fa;
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 800px;
        margin: auto;
        background: white;
        padding: 20px 30px;
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
        font-size: 14px;
        word-wrap: break-word;
        /* Memastikan teks terbungkus */
        max-width: 250px;
        /* Menetapkan lebar kolom */
        vertical-align: top;
        /* Memastikan teks di bagian atas sel */
    }

    th {
        background: #4facfe;
        color: white;
    }

    tr:nth-child(even) {
        background: #f9f9f9;
    }

    tr:hover {
        background: #e6f7ff;
    }

    td {
        max-width: 500px;
        overflow-wrap: break-word;
        word-wrap: break-word;
        white-space: normal;
        height: auto;
        max-height: 100px;
        /* Batas tinggi untuk sel konten */
        overflow-y: auto;
        /* Tambahkan scroll vertikal jika konten melebihi batas */
    }

    table td {
        max-width: 500px;
        overflow: hidden;
        text-overflow: ellipsis;
    }


    th {
        background: #4facfe;
        color: white;
    }

    tr:nth-child(even) {
        background: #f9f9f9;
    }

    tr:hover {
        background: #e6f7ff;
    }

    .button {
        text-align: center;
    }

    .button a {
        display: inline-block;
        padding: 10px 20px;
        background: #4facfe;
        color: white;
        text-decoration: none;
        font-size: 14px;
        font-weight: bold;
        border-radius: 5px;
        transition: background 0.3s ease;
    }

    .button a:hover {
        background: #007bff;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Hasil Pendaftaran</h2>
        <table>
            <tr>
                <th>Field</th>
                <th>Data</th>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td><?= htmlspecialchars($data['name']); ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= htmlspecialchars($data['email']); ?></td>
            </tr>
            <tr>
                <td>Usia</td>
                <td><?= htmlspecialchars($data['age']); ?></td>
            </tr>
            <tr>
                <td>Biografi</td>
                <td><?= nl2br(htmlspecialchars($data['bio'])); ?></td>
            </tr>
            <tr>
                <td>Browser/Sistem</td>
                <td><?= htmlspecialchars($data['browserInfo']); ?></td>
            </tr>
        </table>

        <h3>Isi File:</h3>
        <table>
            <tr>
                <th>Baris</th>
                <th>Konten</th>
            </tr>
            <?php foreach ($data['fileContent'] as $lineNumber => $line): ?>
            <tr>
                <td><?= $lineNumber + 1; ?></td>
                <td><?= htmlspecialchars($line); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <div class="button">
            <a href="form.php">Kembali ke Form</a>
        </div>
    </div>
</body>

</html>