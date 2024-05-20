<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <style> 
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 400px;
}

h1 {
    margin: 0 0 10px;
    font-size: 24px;
    text-align: center;
}

p {
    margin: 0 0 20px;
    text-align: center;
    color: #666;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group input,
.form-group select {
    width: calc(100% - 20px);
    padding: 8px;
    margin-bottom: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-group input[type="text"] {
    width: calc(50% - 10px);
}

.form-group input[type="email"],
.form-group input[type="tel"],
.form-group input[type="text"] {
    width: 100%;
}

.form-group select {
    width: calc(33.33% - 14px);
}

button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <p>Selamat Datang Di Web DeliveryToYou</p>
        <form>
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" placeholder="Masukkan Nama">
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender">
                    <option value="" disabled selected>Pilih</option>
                    <option value="male">Pria</option>
                    <option value="female">Perempuan</option>
                    <option value="other">Non-Binary</option>
                </select>
            </div>

            <div class="form-group">
                <label for="btt_lahir">Tanggal Lahir</label>
                <select id="bulan_lahir">
                    <option value="" disabled selected>Bulan</option>
                    <!-- Add month options here -->
                </select>
                <select id="tanggal_lahir">
                    <option value="" disabled selected>Tanggal</option>
                    <!-- Add day options here -->
                </select>
                <select id="tahun_lahir">
                    <option value="" disabled selected>Tahun</option>
                    <!-- Add year options here -->
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="example@example.com">
            </div>

            <div class="form-group">
                <label for="nomor_telepom">Nomor Telepon</label>
                <input type="tel" id="nomor_telepon" placeholder="+62">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" placeholder="Masukkan Alamat">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" id="password" placeholder="Masukkan Password">
            </div>

            <button type="submit">Submit</button>
        </form>
        <div class="login-link">
            Already have an account? <a href="{{ route('login') }}">Login</a>
        </div>

    </div>
</body>
</html>
