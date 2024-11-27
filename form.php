<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(to right, #4facfe, #00f2fe);
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #333;
    }

    .container {
        background: white;
        padding: 20px 30px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        max-width: 600px;
        width: 100%;
        animation: fadeIn 0.5s ease-in-out;
    }

    h2 {
        text-align: center;
        color: #333;
        font-weight: 600;
        margin-bottom: 20px;
    }

    label {
        font-size: 14px;
        font-weight: 600;
        color: #555;
        margin-bottom: 5px;
        display: block;
    }

    input,
    select,
    textarea {
        width: 100%;
        padding: 12px 15px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        background: #f9f9f9;
        transition: border-color 0.3s, background 0.3s;
    }

    input:focus,
    select:focus,
    textarea:focus {
        border-color: #4facfe;
        background: #fff;
        outline: none;
    }

    textarea {
        resize: none;
        height: 100px;
    }

    button {
        width: 100%;
        padding: 12px;
        background: linear-gradient(to right, #4facfe, #00f2fe);
        border: none;
        color: white;
        font-size: 16px;
        font-weight: 600;
        border-radius: 8px;
        cursor: pointer;
        transition: transform 0.3s ease, background 0.3s ease;
    }

    button:hover {
        background: linear-gradient(to right, #00c6ff, #0072ff);
        transform: scale(1.05);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Form Pendaftaran</h2>
        <form id="registrationForm" action="process.php" method="post" enctype="multipart/form-data">
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" required minlength="3" maxlength="50"
                placeholder="Masukkan nama lengkap Anda">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required placeholder="Masukkan email Anda">

            <label for="age">Usia</label>
            <input type="number" id="age" name="age" required min="18" max="100" placeholder="Masukkan usia Anda">

            <label for="bio">Biografi Singkat</label>
            <textarea id="bio" name="bio" required minlength="10" maxlength="300"
                placeholder="Tuliskan biografi singkat Anda"></textarea>

            <label for="file">Upload File Teks</label>
            <input type="file" id="file" name="file" accept=".txt" required>

            <button type="submit">Kirim</button>
        </form>
    </div>

    <script>
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        const fileInput = document.getElementById('file');
        const file = fileInput.files[0];
        if (file) {
            if (file.size > 1048576) { // Max 1MB
                alert('Ukuran file tidak boleh lebih dari 1MB.');
                event.preventDefault();
            }
            if (!file.name.endsWith('.txt')) {
                alert('Hanya file dengan ekstensi .txt yang diperbolehkan.');
                event.preventDefault();
            }
        }
    });
    </script>
</body>

</html>