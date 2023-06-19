<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Dokter</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styling -->

        <link rel="stylesheet" href="styling/style.css">
        <link rel="stylesheet" href="styling/nav-style.css">
        <link rel="stylesheet" href="styling/main-style.css">
        <link rel="stylesheet" href="styling/dropdown-style.css">


</head>
<body>

<?php

    session_start();
    include '../Helper/ConnectionUtil.php';
    use Helper\ConnectionUtil;
    if ($_SESSION['role'] != 'dokter') {
        header('location:../Login-Register/LoginForm.php');
    }


    unset($_SESSION['fromWho']);
    unset($_SESSION['id_from']);
    $myId = $_SESSION['id'];

    $data = mysqli_query(ConnectionUtil::connect(), "SELECT * 
    FROM dokters WHERE id_dokter = $myId ");
    $result = mysqli_fetch_array($data);
    // 1 = checked
    // 0 == not checked
    $status = $result['status'];

?>

    <input type="checkbox" name="dropdown__setting" id="dropdown__setting">
    <div class="setting">

        <p>Availability Status</p>

        <br><br>

        <div id="availability__box">

            <p class="available__status"><!-- Javascript --></p>
            
            <form action="setStatus.php" method="POST" id="setStatus">
            <label for="available__status">
                <!-- PHP selected dibawah -->
                <input type="checkbox" name="available__status" onchange="document.getElementById('setStatus').submit()" id="available__status" <?php echo $status == 1 ? 'checked' : ''  ?>>
                <input type="text" name="status" value="<?php echo $status == 1? 0 : 1 ?>" hidden>
                <div class="toggle"></div>
            </label>
            
            </form>
                
            </form>
            

        </div>

        <a href="../Login-Register/Logout.php" class="logout">
            <li>Log Out</li>
        </a>
    </div>

    
    <nav>

        <?php
        $iniHTMLDiDalemPHP = <<<HTML
            <div class="logo">
                <h1>MINDFUL <span>SPACE</span></h1>
            </div>
        HTML;

        echo $iniHTMLDiDalemPHP;
        ?>
        

        <div class="profile">

            <div class="image">
                <img src="../image/BudhiSwag-removebg-preview.png" alt="">
            </div>

            <div>
                <h2>BUDHI</h2>
                <p>The Rapist</p>
            </div>

            <div>
                <label for="dropdown__setting">
                    <i class="fa fa-chevron-down dropdown__setting"></i>
                </label>
            </div>

        <div>
            <?php echo $_SESSION['username']; ?>

        </div>

    </nav>
    
    <hr>
    
    <br><br><br><br><br>
    <br><br><br><br><br>

    <main>

        <div class="top">
            
        <?php

        $iniHTMLDiDalemPHP = <<<HTML
            <h2>DASHBOARD</h2>
        HTML;

        echo $iniHTMLDiDalemPHP;
        ?>
            <!-- <h2>DASHBOARD</h2> -->

            <form action="dashboard.php?tes=1">

                <!-- <label for="tanggal"><i class="fa-solid fa-calendar-days"></i></label> -->
                <input type="date" name="tanggal" id="tanggal">
                <h4> Senin, 30 Februari 2023</h4>

                <input type="submit" value="" hidden>

            </form>

        </div>

        <br>

        <section class="data__shown">
            
            <div class="left__col">
    
    <?php 
        // <!-- fetch data dari table antrian where id_dokter = $_SESSION['id'] -->
        $data = mysqli_query(ConnectionUtil::connect(), "SELECT users.username, antrian.* 
                                                    FROM antrian JOIN users 
                                ON antrian.id_pasien = users.id
                                WHERE id_dokter = $myId ");
?>
                <div>

                    <div class="card">
                        
                        <h4>Total Pasien</h4>
                        <h3><?php echo sizeof(mysqli_fetch_all($data))?></h3>
        
                    </div>
                    
                    <div class="card">
        <?php 
        $data = mysqli_query(ConnectionUtil::connect(), "SELECT users.username, antrian.* 
        FROM antrian JOIN users 
        ON antrian.id_pasien = users.id
        WHERE id_dokter = $myId AND status != 'selesai' ");
        ?>
                        <h4>Antrian saat ini</h4>
                        <h3><?php echo sizeof(mysqli_fetch_all($data))?></h3>
        
                    </div>

                </div>
               
                <table>
    
                    <thead>
            
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Waktu</th>
                            <th>Status</th>
                        </tr>
    
                    </thead>
                    
                    <tbody>
                    <?php
                    $data = mysqli_query(ConnectionUtil::connect(), "SELECT users.username, antrian.* 
                    FROM antrian JOIN users 
        ON antrian.id_pasien = users.id
        WHERE id_dokter = $myId ORDER BY waktu ASC");
                        while ($row = mysqli_fetch_array($data)){
                    ?>
                        <tr>
                            <td class="center">1</td>
                            <td><a href="../Dashboard-Dokter/dashboard.php?id=<?php echo $row['id_pasien']?>"><?php echo $row['username']?></a></td>
                            <td class="center"><?php echo $row['waktu']?>.00 - <?php echo $row['waktu']+1?>.00</td>
                            <td class="center"><?php echo $row['status']?></td>
                        </tr>
                    <?php 
                    }
                    ?>
                    </tbody>
    
                </table>

                <!-- <div class="pagination">

                        <a href=""><- previous page</a>
                        <a href="">next page -></a>

                </div> -->
    
            </div>

            <div class="right__col">
    
                <div class="card hijau">
                <?php
                $statusQueueQuery = <<<SQL
                    SELECT users.username, antrian.* 
                    FROM antrian JOIN users 
                    ON antrian.id_pasien = users.id
                    WHERE id_dokter = $myId AND status = 'selesai';
                SQL;
                
        $data = mysqli_query(ConnectionUtil::connect(), $statusQueueQuery);
        ?>
                        <h4>Pasien selesai</h4>
                        <h3><?php echo sizeof(mysqli_fetch_all($data))?></h3>
    
                </div>
                
                <!-- PHP UNTUK PROFIL USER DISINI -->
                <div class="user__manage">
    
                    <!-- SEARCH BAR -->
                    <form action="dashboard.php" method="get">
                        
                        <input type="text" name="search" placeholder=" Cari Username">
                        <input type="submit" value="" hidden>
                        
                    </form>
    
                    <!-- PROFIL YANG KELUAR DISAAT DOKTER KLIK
                    DATA USER YANG TERTERA PADA TABEL. -->
                    <div class="profile__user">
                    <?php 
                        $checkCurrentProfileQuery = <<<SQL
                            SELECT users.username, identitas.* 
                            FROM identitas JOIN users 
                            ON identitas.id_user = users.id;
                        SQL;

                        $data = mysqli_query(ConnectionUtil::connect(), $checkCurrentProfileQuery);
                        if (isset($_GET['id'])) {
                            $otherId = $_GET['id'];

                            $checkOtherProfileQuery = <<<SQL
                                SELECT users.username, identitas.* 
                                FROM identitas JOIN users 
                                ON identitas.id_user = users.id WHERE id_user = $otherId
                            SQL;
                            
                            $data = mysqli_query(ConnectionUtil::connect(), $checkOtherProfileQuery);
                        }
        while($row = mysqli_fetch_array($data)){
        ?>
                        <div class="profile__picture">
                            <img src="<?php echo $row['url_image']?$row['url_image']: '' ?>" alt="">
                        </div>
    
                        <div class="identity">
                            <h1><?php echo $row['username']? $row['username']:''  ?></h1>
                            <p><?php echo $row['namalengkap']?$row['namalengkap']:'' ?></p>
                            <p><?php echo $row['jeniskelamin']?$row['jeniskelamin']:'p' ?> | <?php echo $row['umur'] ?> Tahun</p>
                        </div>
    
                    </div>
                    <?php }?>
    
                    <form action="chat.php" method="post">
                        <input type="text" value="<?php echo isset($_GET['id'])? $_GET['id']:'' ?>" hidden>
                        <button class="message" type="submit">
                            Message
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>
    
                </div>
    
            </div>

        </section>

    </main>


    <script src="styling/script.js"></script>


</body>
</html>
