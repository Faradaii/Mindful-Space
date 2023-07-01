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
    <link rel="stylesheet" href="styling/modal-style.css">
    <link rel="stylesheet" href="styling/manajemen-style.css">

</head> 
<body>
<?php 
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("location: ../Login-Register/LoginForm.php");
}
$show = isset($_GET['show'])? $_GET['show']:'user';
$autoshow = !isset($_GET['show'])? header('location:dashboard.php?show='.$show) : '';
$cari = isset($_GET['search'])? ('&search='.$_GET['search']):'';
?>
   
<!-- MODAL -->

    <!-- Tambah Dokter -->
    <input type="checkbox" name="tambah__dokter" id="tambah__dokter">
    <div class="box__tambah__dokter">
        
        <form action="addDokter.php" method="post">
            <input type="text" name="currentshow" value="<?php echo $show?>" hidden>
    
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
                <input type="submit" value="Tambah Dokter">

            </div>

        </form>

    </div>

    <!-- Tambah Artikel -->
    <input type="checkbox" name="tambah__artikel" id="tambah__artikel">
    <div class="box__tambah__artikel">

    <form action="addNews.php" method="post" enctype="multipart/form-data">
        <input type="text" name="currentshow" value="<?php echo $show?>" hidden>
    
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
            <input type="submit" name="submit" value="Tambah Artikel">
            
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

                <a href="../Homepage/HomePage-Visitor.php">
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

                <a href="../Login-Register/Logout.php" class="logout">
                    <li>LOG OUT</li>
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
                    <h3>
                        <?php
                        require_once "../Helper/ConnectionUtil.php";
                        use Helper\ConnectionUtil;
                        $data = mysqli_query(ConnectionUtil::connect(), "SELECT id FROM users WHERE role = 'user'");
                        $totalUser = mysqli_fetch_all($data);
                        if (sizeof($totalUser) < 10) {
                            echo "0".sizeof($totalUser);
                        } else {
                            echo sizeof($totalUser);
                        }
                        ?>
                    </h3>
                    
                </label>    
                
                <label for="total__dokter" id="label__dokter" class="radio__label">
                    
                    <h4>Total Dokter</h4>
                    <h3>
                        <?php
                        $data = mysqli_query(ConnectionUtil::connect(), "SELECT id FROM users WHERE role = 'dokter'");
                        $totalDokter = mysqli_fetch_all($data);
                        if (sizeof($totalDokter) < 10) {
                            echo "0".sizeof($totalDokter);
                        } else {
                            echo sizeof($totalDokter);
                        }
                        ?>
                    </h3>
                    
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
                    <input type="text" hidden name="show" value="<?php echo isset($_GET['show'])? $_GET['show']:'user'?>">
                    <input type="text" name="search" placeholder="Cari Username">
                    <input type="submit" value="" hidden>
                    
                </form>
                
                <div class="table">
    
                    <!-- TABEL DOKTER -->
                    <input type="radio" name="total" id="total__user" 
                    <?php echo isset($_GET['show'])? ($_GET['show'] == 'user'? 'checked' : '') : 'checked'?>>
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

                        if ($show == 'dokter'){
                            $no = 1;
                            $batas = 7; // <-- Magic number
                            $halaman= @$_GET['halaman'];
                            if (empty($halaman)){
                                $posisi= 0;
                                $halaman= 1;
                            } else {
                                $posisi = ($halaman-1)* $batas;
                                $no = $posisi + 1;
                            }

                            // search query
                            
                            if (isset($_GET['search'])) {
                                $search = $_GET['search'];
                                $query = "SELECT * FROM users WHERE role = 'dokter' AND username LIKE '%$search%'";
                                $data = mysqli_query(ConnectionUtil::connect(), $query);
                            } else {
                                $query = "SELECT * FROM users WHERE role = 'dokter'";
                                $data = mysqli_query(ConnectionUtil::connect(), $query);
                            }
                            $jmldata= mysqli_num_rows($data);
                            $jmlhal = ceil($jmldata/$batas);
                            $data = mysqli_query(ConnectionUtil::connect(), ($query." LIMIT ".$posisi.",".$batas));


                        while ($result = mysqli_fetch_array($data)){

                        ?>
    
                            <tr>
                                <!-- NOMOR -->
                                <td  class="number"><?php echo $no++; ?></td>
                                <!-- USERNAME -->
                                <td><?php echo $result['username']?></td>
                                <!-- AKSI -->
                                <td class="action">
                                
                                    <a href="editUser.php?id=<?php echo $result['id']?>">Update</a>
                                    <a href="delUserAction.php?show=<?php echo $show.'&id='; echo $result['id']?>">Delete</a>
    
                                </td>
                            </tr>
    
                       <?php 

                       }
                    }

                       ?>
    
                        </tbody>
    
                    </table>
    
                    <!-- TABEL USER -->
                    <input type="radio" name="total" id="total__dokter" <?php echo isset($_GET['show'])? ($_GET['show'] == 'dokter'? 'checked' : '') : ''?>>
                    <table class="table__user">
                        
                        <tr>
                            <th class="number">No</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
        

                        <?php
                        // DISINI PHP 
                        if ($show == 'user'){
                            $no = 1;
                            $batas = 7; // <-- Magic number
                            $halaman= @$_GET['halaman'];
                            if (empty($halaman)){
                                $posisi= 0;
                                $halaman= 1;
                            } else {
                                $posisi = ($halaman-1)* $batas;
                                $no = $posisi + 1;
                            }

                            
                        

                            // search query
                            
                            if (isset($_GET['search'])) {
                                $search = $_GET['search'];
                                $query = "SELECT * FROM users WHERE role = 'user' AND username LIKE '%$search%' ";
                                $data = mysqli_query(ConnectionUtil::connect(), $query);
                            } else {
                                $query = "SELECT * FROM users WHERE role = 'user'";
                                $data = mysqli_query(ConnectionUtil::connect(), $query);
                            }
                            $jmldata= mysqli_num_rows($data);
                            $jmlhal = ceil($jmldata/$batas);
                            $data = mysqli_query(ConnectionUtil::connect(), ($query." LIMIT ".$posisi.",".$batas));

                            while ($result = mysqli_fetch_array($data)){
                        ?>
    
                            <tr>
                                <!-- NOMOR -->
                                <td  class="number"><?php echo $no++; ?></td>
                                <!-- USERNAME -->
                                <td><?php echo $result['username']?></td>
                                <!-- AKSI -->
                                <td class="action">
                                
                                    <a href="editUser.php?id=<?php echo $result['id']?>">Update</a>
                                    <a href="delUserAction.php?id=<?php echo $result['id']?>
                                    " >Delete</a>
    
                                </td>
                            </tr>
    
                       <?php 

                        // DISINI PHP
                                }
                            }
                            

                       ?>
        
                    </table>
    
                    <div class="pagination">
                        <?php
                        if ($halaman > 1) {
                        ?>
                            <a href="dashboard.php?show=<?php echo $show; echo $cari?>&halaman=<?php echo $halaman - 1; ?>"><- previous page</a>
                        <?php
                        } 

                        if ($halaman < $jmlhal) {
                        ?>
                            <a href="dashboard.php?show=<?php echo $show; echo $cari?>&halaman=<?php echo $halaman + 1; ?>">next page -></a>
                        <?php
                        }
                        ?>
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
    
            <?php 
                $data = mysqli_query(ConnectionUtil::connect(), "SELECT * FROM newspaper ORDER BY id DESC LIMIT 3");
                while($news = mysqli_fetch_array($data)){
            ?>
                <tr>
    
                    <td>
                        <!--gambar -->
                        <img src="<?php echo $news['url_image'] ?>" width="200px">
                    </td>
    
                    <td>
                        <!-- judul -->
                        <h5 style="text-align:center;"><?php echo $news['judul']?></h5>
                    </td>
    
                    <td>
                        <!-- deskripsi -->
                        <p style="text-align:center;"> <?php echo $news['deskripsi']?> </p>
                    </td>
    
                    <td>
                        <!-- link -->
                        <p style="text-align:center;"> <?php echo $news['link']?> </p>
                    </td>
                    
                    <td class="action__berita">
                        <!-- action -->
                        <a href="../Dashboard-Administrator/updateNews.php?id=<?php echo $news['id']?>">Update</a>
                        <a href="../Dashboard-Administrator/delNews.php?id=<?php echo $news['id']?>&url_image=<?php echo $news['url_image']?>">Delete</a>
                    </td>
    
                </tr>
            <?php 
                }
            ?>
    
            </tbody>
    
            </table>
    
        </section>

    </div>

    <script src="styling/script.js"></script>

</body>
</html>