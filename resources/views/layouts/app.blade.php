<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Inventaris </title>
  <!-- bootstrap 5 css -->
  <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
    integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK"
    crossorigin="anonymous"
  />
  <!-- custom css -->
  <!-- <link rel="stylesheet" href="style.css" /> -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
  />

  <style>
    li {
      list-style: none;
      margin: 20px 0 20px 0;
    }

    a {
      text-decoration: none;
    }

    .sidebar {
      width: 250px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      background-color: rgb(0, 0, 0); /* Update background color */
      padding: 20px;
    }

    .main-content {
      margin-left: 250px; /* Adjust the margin based on the sidebar width */
      transition: margin-left 0.4s;
      padding: 20px;
    }

    #button-toggle {
      position: fixed;
      top: 10px;
      left: 10px;
    }

    #main-content {
      transition: 0.4s;
    }
  </style>
</head>

<body>
  <div class="sidebar" id="sidebar">
    <h4 class="mb-5 text-white">INVENTARIS</h4>
    <li>
      <a class="text-white" href="{{ route('siswa.index') }}">
        <i class="bi bi-person mr-2"></i>
        Siswa
      </a>
    </li>
    <li>
        <a class="text-white" href="{{ route('siswa.create') }}">
          <i class="bi bi-plus-lg mr-2"></i>
          Tambah Siswa
        </a>
      </li>
    <li>
      <a class="text-white" href="{{ route('barang.index') }}">
        <i class="bi bi-box2 mr-2"></i>
        Barang
      </a>
    </li> 
    <li>
        <a class="text-white" href="{{ route('barang.create') }}">
          <i class="bi bi-plus-lg mr-2"></i>
          Tambah Barang
        </a>
      </li>
    <li>
      <a class="text-white" href="{{ route('peminjaman.index') }}">
        <i class="bi bi-clipboard2 mr-2"></i>
        Peminjaman
      </a>
    </li>
    <li>
        <a class="text-white" href="{{ route('peminjaman.create') }}">
          <i class="bi bi-plus-lg mr-2"></i>
          Tambah Peminjaman
        </a>
      </li>
      <li>
        <a class="text-white" href="{{ "/sesi/logout" }}">
          <i class="bi bi-box-arrow-right"></i>
          Logout
        </a>
      </li>
  </div>

  <div class="main-content" id="main-content">
    <div class="container py-5">
        @yield('konten')

      <div class="card-body" >
        
      </div>
    </div>
  </div>

  <script>
    document.getElementById("button-toggle").addEventListener("click", () => {
      document.getElementById("sidebar").classList.toggle("active-sidebar");
      document.getElementById("main-content").classList.toggle("active-main-content");
    });
  </script>
</body>
</html>