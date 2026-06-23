<!DOCTYPE html>
<html>
<head>
    <title>Sistem Donor Darah</title>

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f5f5f5;
            transition: 0.3s;
        }

        body.dark {
            background: #121212;
            color: white;
        }

        /* NAVBAR */
        .navbar {
            display: flex;
            justify-content: space-between;
            padding: 15px 30px;
            background: white;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        body.dark .navbar {
            background: #1e1e1e;
        }

        .logo {
            font-weight: bold;
            color: #e53935;
        }

        .menu a {
            margin: 0 10px;
            text-decoration: none;
            color: #e53935;
            font-weight: bold;
        }

        body.dark .menu a {
            color: #ff6b6b;
        }

        .dark-btn {
            border: none;
            background: transparent;
            font-size: 18px;
            cursor: pointer;
        }

        /* HERO */
        .hero {
            background: linear-gradient(135deg, #e53935, #b71c1c);
            color: white;
            padding: 90px 20px;
            text-align: center;
        }

        .hero h1 {
            font-size: 42px;
        }

        .hero-img {
            width: 120px;
            margin-top: 20px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        /* FEATURES */
        .container {
            padding: 60px 20px;
            text-align: center;
        }

        .features {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            background: white;
            padding: 20px;
            width: 220px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: 0.3s;
        }

        body.dark .card {
            background: #1e1e1e;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            width: 80px;
        }

        /* DATA SECTION */
        #data-section {
            margin-top: 30px;
            padding: 20px;
            border-radius: 10px;
            background: white;
        }

        body.dark #data-section {
            background: #1e1e1e;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            background: #e53935;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">🩸 Donor Darah</div>

    <div class="menu">
        <a href="/">Home</a>
        <a href="#features">Fitur</a>
        <a href="#kontak">Kontak</a>
        <a href="/login">Login</a>
        <a href="/register">Register</a>

        <button onclick="toggleDarkMode()" class="dark-btn">🌙</button>
    </div>
</div>

<!-- HERO -->
<div class="hero">
    <h1 data-aos="fade-up">Sistem Donor Darah</h1>
    <p data-aos="fade-up" data-aos-delay="100">
        Kelola data & stok darah dengan mudah
    </p>

    <img class="hero-img"
         src="https://cdn-icons-png.flaticon.com/512/3209/3209265.png"
         data-aos="zoom-in">
</div>

<!-- FEATURES -->
<div class="container" id="features">
    <h2 data-aos="fade-up">Fitur Sistem</h2>

    <div class="features">

        <div class="card" onclick="showSection('about')" data-aos="zoom-in">
            <img src="https://cdn-icons-png.flaticon.com/512/1077/1077012.png">
            <h3>Tentang Saya</h3>
            <p>Klik untuk lihat</p>
        </div>

        <div class="card" onclick="showSection('stok')" data-aos="zoom-in">
            <img src="https://cdn-icons-png.flaticon.com/512/3209/3209265.png">
            <h3>Stok Darah</h3>
            <p>Klik untuk lihat</p>
        </div>

        <div class="card" onclick="showSection('riwayat')" data-aos="zoom-in">
            <img src="https://cdn-icons-png.flaticon.com/512/2966/2966488.png">
            <h3>Riwayat</h3>
            <p>Klik untuk lihat</p>
        </div>

    </div>

    <!-- DATA OUTPUT -->
    <div id="data-section" style="display:none;">
        <h2 id="judul"></h2>

        <div id="about" style="display:none;">
            <p>👤 Nama: Annisa Alpitri</p>
            <p>💻 Role: Admin / Petugas / Pendonor</p>
            <p>📍 Lokasi: Padang</p>
        </div>

        <div id="stok" style="display:none;">
            <p>🩸 Golongan A: 10</p>
            <p>🩸 Golongan B: 8</p>
            <p>🩸 Golongan O: 15</p>
            <p>🩸 Golongan AB: 5</p>
        </div>

        <div id="riwayat" style="display:none;">
            <p>📅 10 Januari 2026 - Andi</p>
            <p>📅 12 Januari 2026 - Budi</p>
        </div>
    </div>
</div>

<!-- KONTAK -->
<div class="container" id="kontak">
    <h2 data-aos="fade-up">Kontak</h2>

    <div class="features">

        <div class="card">
            <h3>WhatsApp</h3>
            <p>+62 812-xxxx-xxxx</p>
            <a href="#" class="btn">Chat</a>
        </div>

        <div class="card">
            <h3>Email</h3>
            <p>email@gmail.com</p>
            <a href="#" class="btn">Email</a>
        </div>

        <div class="card">
            <h3>Instagram</h3>
            <p>@username</p>
            <a href="#" class="btn">Follow</a>
        </div>

    </div>
</div>

<!-- SCRIPT -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
AOS.init();

/* DARK MODE */
function toggleDarkMode() {
    document.body.classList.toggle("dark");
}

/* SHOW SECTION */
function showSection(type) {

    document.getElementById("data-section").style.display = "block";

    document.getElementById("about").style.display = "none";
    document.getElementById("stok").style.display = "none";
    document.getElementById("riwayat").style.display = "none";

    document.getElementById(type).style.display = "block";

    let title = {
        about: "Tentang Saya",
        stok: "Stok Darah",
        riwayat: "Riwayat Donor"
    };

    document.getElementById("judul").innerText = title[type];

    document.getElementById("data-section")
        .scrollIntoView({ behavior: "smooth" });
}
</script>

</body>
</html>