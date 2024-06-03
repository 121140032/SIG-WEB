<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""
    />
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>USER | BERITA</title>
    <style>
        /* Sidebar styling */
        .sidebar {
            width: 250px;
            height: 100%;
            background-color: #f4f4f4;
            overflow-y: auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: width 0.3s ease;
            position: fixed;
            top: 0;
            left: 0;
            transform: translateX(0);
        }

        /* Hide sidebar when closed */
        .sidebar.closed {
            width: 0;
            background: #ccc;
            transform: translateX(-250px);
        }

        /* Map Container styling */
        .berita {
            height: 100vh;
            margin-left: 250px;
            transition: margin-left 0.3s ease;
        }

        /* Hide map margin when sidebar is closed */
        .berita.closed {
            margin-left: 60px;
        }

        .berita-content {
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .berita-content:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Konten di dalam sidebar -->
        <div class="sidebar-content">
            <!-- Isi sidebar -->
            <!-- Top Sidebar -->
            <div class="top">
                <h2 class="mb-4 text-center" style="font-weight: bold">Nama Kabupaten</h2>
                <img
                    src="../assets/logo-kabupaten-lampung-selatan-.png"
                    alt="Foto Kabupaten"
                    style="max-width: 50%; margin: 0 auto; display: block"
                />
                <hr
                    style="
                        width: 100%;
                        margin-top: 20px;
                        margin-bottom: 10px;
                        border-top: 1px solid #ccc;
                    "
                />
            </div>
            <!-- End Top Sidebar -->

            <!-- Button sidebar -->
            <div class="button-content">
                <li class="nav-item" style="list-style: none; margin-bottom: 10px">
                    <a
                        href="index.html"
                        class="nav-link"
                        style="
                            display: flex;
                            align-items: center;
                            padding: 10px 20px;
                            border-radius: 5px;
                            color: #000000;
                            text-decoration: none;
                            transition: background-color 0.3s;
                            border: none;
                            font-weight: bold;
                        "
                    >
                        <i class="mr-2 size-4" data-feather="home"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-item" style="list-style: none; margin-bottom: 10px">
                    <a
                        href="user-berita.php"
                        class="nav-link"
                        style="
                            display: flex;
                            align-items: center;
                            padding: 10px 20px;
                            border-radius: 5px;
                            color: #000000;
                            text-decoration: none;
                            transition: background-color 0.3s;
                            border: none;
                            font-weight: bold;
                        "
                    >
                        <i class="mr-2 size-4" data-feather="file-text"></i>
                        <p>Berita</p>
                    </a>
                </li>
                <li class="nav-item" style="list-style: none; margin-bottom: 10px">
                    <a
                        href="user-map.html"
                        class="nav-link"
                        style="
                            display: flex;
                            align-items: center;
                            padding: 10px 20px;
                            border-radius: 5px;
                            color: #000000;
                            text-decoration: none;
                            transition: background-color 0.3s;
                            border: none;
                            font-weight: bold;
                        "
                    >
                        <i class="mr-2 size-4" data-feather="map-pin"></i>
                        <p>Peta</p>
                    </a>
                </li>
            </div>
            <!-- End Button -->

            <!-- Login button -->
            <div class="login-button">
                <button
                    onclick="Login()"
                    class="btn-login"
                    style="
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        padding: 10px 20px;
                        margin: 20px auto;
                        border-radius: 5px;
                        color: #ffffff;
                        background-color: #5ebc67;
                        border: none;
                        font-weight: bold;
                        cursor: pointer;
                    "
                >
                    <i class="mr-2" data-feather="log-in"></i>
                    <span>Log-in</span>
                </button>
            </div>
            <!-- End Login button -->
        </div>
    </div>

    <!-- Hamburger Button -->
    <button
        onclick="toggleSidebar()"
        style="position: fixed; top: 20px; left: 20px; z-index: 1001"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            width="24"
            height="24"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16m-7 6h7"
            ></path>
        </svg>
    </button>

    <!-- Berita -->
    <div id="berita" class="berita ml-10">
        <h2 class="mt-16 mb-10 text-center font-bold text-3xl text-slate-700">Berita</h2>

       <!-- Berita -->
        <div id="berita" class="berita p-4 transition-all">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "sig_db";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) { die("Connection failed: " .
            $conn->connect_error); } $sql = "SELECT id, link, judul, deskripsi, foto
            FROM berita"; $result = $conn->query($sql); if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { echo '
            <div class="berita-content rounded-md shadow-lg overflow-hidden mb-10 sm:mb-0 sm :w-64 md:w-80 lg:w-72">
            <a href="'.$row["link"].'" target="_blank">
                <img src="'.$row["foto"].'" alt="'.$row["judul"].'" class="w-full h-auto" style="height: 200px;" />
                <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">'.$row["judul"].'</div>
                <p class="text-sm">'.$row["deskripsi"].'</p>
                </div>
            </a>

            </div>
            
            '; } } else { echo "0 results"; } $conn->close(); ?>
        </div>
        </div>
        <!-- End Berita -->

    <script>
        function toggleSidebar() {
        var sidebar = document.querySelector(".sidebar");
        var mapContainer = document.getElementById("berita");

        sidebar.classList.toggle("closed");
        mapContainer.classList.toggle("closed");
      }

      function Login() {
        window.location.href = "../client/login.html";
      }

      feather.replace();
    </script>
</body>
</html>
