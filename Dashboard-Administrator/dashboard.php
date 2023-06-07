<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styling -->
    <link rel="stylesheet" href="styling/style.css">
    <link rel="stylesheet" href="styling/nav-style.css">
    <link rel="stylesheet" href="styling/main-style.css">
    <link rel="stylesheet" href="styling/manajemen-style.css">
    <link rel="stylesheet" href="styling/modal-style.css">

</head> 
<body>
   
<!-- MODAL -->

    <!-- Tambah Dokter -->
    <input type="checkbox" name="tambah__dokter" id="tambah__dokter">
    <div class="box__tambah__dokter">
        
        <form action="" method="">
    
            <h1>Tambah Dokter</h1>
    
            <br><br>

            <label for="username">Username</label>
            <input type="text" name="username" id="">
    
            <br><br><br>
    
            <label for="password">Password</label>
            <input type="password" name="password" id="">
    
            <br><br><br><br>
    
            <div>

                <label for="tambah__dokter">Batal</label>
                <input type="submit" value="Tambah Akun">

            </div>

        </form>

    </div>

    <!-- Tambah Artikel -->
    <input type="checkbox" name="tambah__artikel" id="tambah__artikel">
    <div class="box__tambah__artikel">

    <form action="" method="">
    
        <h1>Tambah Artikel</h1>

        <br><br>

        <label for="gambar">Unggah Gambar</label>
        <input type="file" name="gambar" id="gambar">

        <br><br>

        <label for="judul">Judul</label>
        <input type="text" name="judul" id="">

        <br><br>

        <label for="deskripsi">Deskripsi</label>
        <input type="text" name="deskripsi" id="">

        <br><br>

        <label for="link">Tautan</label>
        <input type="text" name="link">

        <br><br><br>

        <div>

            <label for="tambah__artikel">Batal</label>
            <input type="submit" value="Tambah Artikel">
            
        </div>

</form>

    </div>

    <!-- Navigasi -->
    <nav>
        
        <div class="logo">
            <h1>MINDFUL <span>SPACE</span> <span class="admin">@Admin</span></h1>
        </div>
    
        <div class="navigation">

            <ul>

                <a href="">
                    <li>Beranda</li>
                </a>
            
                <a href="#administrasi">
                    <li>Administrasi</li>
                </a>

                <a href="#manajemen">
                    <li>Manajemen Artikel</li>
                </a>

                <li class="line">
                    <hr>
                </li>

                <a href="../Login-Register/LoginForm.php" class="logout">
                    <li>Log Out</li>
                </a>
                
            </ul>
            
        </div>
    
    </nav>

    <br><br><br><br>
    <br><br><br><br>

    <!-- Main -->
    <div class="body">

        <main>
    
            <div class="left__col">
    
                <h2 id="administrasi">ADMINISTRASI</h2>
            
                <label for="total__user" id="label__user" class="radio__label">
                    
                    <h4>Total User</h4>
                    <h3>01</h3>
                    
                </label>    
                
                <label for="total__dokter" id="label__dokter" class="radio__label">
                    
                    <h4>Total Dokter</h4>
                    <h3>02</h3>
                    
                </label>    
                
                <label for="tambah__dokter" class="box">
                    
                    <div class="tambah__dokter">
                        <p>TAMBAH<br>DOKTER</p>
                    </div>
    
                    <div class="plus">
    
                        <div>
                            <p>+</p>
                        </div>
    
                    </div>
                    
                </label>
                
            </div>
            
            <div class="right__col">
                
                <form action="dashboard.php" method="get">
                    
                    <input type="text" name="search" placeholder="Cari Username">
                    <input type="submit" value="" hidden>
                    
                </form>
                
                <div class="table">
    
                    <!-- TABEL DOKTER -->
    
                    <input type="radio" name="total" id="total__user" checked>
                    <table class="table__dokter">
    
                        <thead>
    
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Aksi</th>
                            </tr>
    
                        </thead>
    
                        <tbody>
                            
                        <?php 
                        // DISINI PHP 
                        ?>
    
                            <tr>
                                <!-- NOMOR -->
                                <td  class="number">1</td>
                                <!-- USERNAME -->
                                <td>Prof. Dr. Budhi Jago, S.T., M.T.</td>
                                <!-- AKSI -->
                                <td class="action">
                                
                                    <a href="">Update</a>
                                    <a href="">Delete</a>
    
                                </td>
                            </tr>
    
                       <?php 
                        // DISINI PHP
                       ?>
    
                        </tbody>
    
                    </table>
    
                    <!-- TABEL USER -->
    
                    <input type="radio" name="total" id="total__dokter">
                    <table class="table__user">
                        
                        <tr>
                            <th class="number">No</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
        
                        <?php 
                            // DISINI PHP 
                        ?>
    
                            <tr>
                                <!-- NOMOR -->
                                <td  class="number">1</td>
                                <!-- USERNAME -->
                                <td>Budhi Jago</td>
                                <!-- AKSI -->
                                <td class="action">
                                
                                    <a href="">Update</a>
                                    <a href="">Delete</a>
    
                                </td>
                            </tr>
    
                       <?php 
                        // DISINI PHP
                       ?>
        
                    </table>
    
                    <div class="pagination">
                        <a href=""><- previous page</a>
                        <a href="">next page -></a>
                    </div>
    
                </div>
    
            </div>
            
        </main>
         
        <section class="manajemen">
    
            <br>
            <br>
            <br>
    
            <div class="top">
            
                    <h2 id="manajemen">MANAJEMEN ARTIKEL</h2>
        
                    <label for="tambah__artikel" class="artikel">
    
                        <div>
                            Tambah Artikel
                        </div>
                        
                        <div>
                            +
                        </div>
    
                    </label>
                
            </div>
    
            <br>
    
            <table class="berita">
    
            <thead>
                
                <tr>
        
                    <th>
                        Gambar
                    </th>
                    
                    <th>
                        Judul
                    </th>
        
                    <th>
                        Deskripsi
                    </th>
        
                    <th>
                        Link
                    </th>
        
                    <th>
                        Action
                    </th>
        
                </tr>
    
            </thead>
    
            <tbody>
    
                <tr>
    
                    <td>
                        <!--gambar -->
                    </td>
    
                    <td>
                        <!-- judul -->
                    </td>
    
                    <td>
                        <!-- deskripsi -->
                    </td>
    
                    <td>
                        <!-- link -->
                    </td>
                    
                    <td class="action">
                        <!-- action -->
                        <a href="">Update</a>
                        <a href="">Delete</a>
                    </td>
    
                </tr>
    
            </tbody>
    
            </table>
    
        </section>

    </div>

    <script src="styling/script.js"></script>

</body>
</html>