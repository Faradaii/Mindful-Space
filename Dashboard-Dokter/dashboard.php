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
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'dokter') {
        header("location: ../Login-Register/LoginForm.php");
    }
    include '../Helper/ConnectionUtil.php';
    use Helper\ConnectionUtil;

    date_default_timezone_set("Asia/Makassar");
    unset($_SESSION['fromWho']);
    unset($_SESSION['id_from']);
    $myId = $_SESSION['id'];

    $datay = mysqli_query(ConnectionUtil::connect(), "SELECT * 
    FROM dokters WHERE id_dokter = $myId ");
    $resulty = mysqli_fetch_array($datay);
    $status = $resulty['status'];

    date_default_timezone_set("Asia/Makassar"); 
    $currentDate = date("d-m-Y");
    if (isset($_GET['tanggal'])) {
        $currentDate = $_GET['tanggal'];
    }

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
                    <div class="toggle"></div>
                    <input type="text" name="status" value="<?php echo $status == 1? 0 : 1 ?>" hidden>
                </label>
            
            </form>
                
            </form>

        </div>
        <a href="updateProfile.php" class="profile__set">
            <li>Profile</li>
        </a>

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
        <?php 
        
                       $datax = mysqli_query(ConnectionUtil::connect(), "SELECT users.role, identitas.* FROM identitas JOIN users ON users.id = identitas.id_user WHERE id_user = '$myId'");
                       $result = mysqli_fetch_array($datax);
                        ?>

        <div class="profile">

            <div class="image">
                <img src="<?php echo $result['url_image']?>" alt="">
            </div>

            <div>
                <h2><?php echo $result['namalengkap']?></h2>
                <p><?php echo $result['role']?></p>
            </div>

            <div>
                <label for="dropdown__setting">
                    <i class="fa fa-chevron-down dropdown__setting"></i>
                </label>
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

            <form action="dashboard.php" method="get" id="formtgl">

                <!-- <label for="tanggal"><i class="fa-solid fa-calendar-days"></i></label> -->
                <input type="date" name="tanggal" id="tanggal">
                <h4><?php $date = date_format(date_create_from_format('d-m-Y', $currentDate),'l, j F o'); echo ($date);  ?></h4>

                <input type="submit" value="" hidden>

            </form>
            <script>
                let formtgl = document.querySelector('#formtgl');
                let inputtgl = document.querySelector("#tanggal");
                inputtgl.addEventListener("change", function(){
                    console.log('s')
                    var date = new Date(inputtgl.value);
                    var options = { day: '2-digit', month: '2-digit', year: 'numeric' };
                    var tanggalString = date.toLocaleDateString('en-GB', options);
                    tanggalString = tanggalString.replace(/\//g, '-');
                    window.location = "dashboard.php?tanggal="+tanggalString;
                });
            </script>

        </div>

        <br>

        <section class="data__shown">
            
            <div class="left__col">
    
    <?php 
        // <!-- fetch data dari table antrian where id_dokter = $_SESSION['id'] -->
        $sql = <<<SQL
        SELECT users.username, antrian.* 
            FROM antrian JOIN users 
            ON antrian.id_pasien = users.id
            WHERE id_dokter = $myId AND tanggal = '$currentDate'
        SQL;
        $data = mysqli_query(ConnectionUtil::connect(), $sql);
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
        WHERE id_dokter = $myId AND status != 'selesai' AND tanggal = '$currentDate'");
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
        WHERE id_dokter = $myId AND status != 'selesai' AND tanggal = '$currentDate' ORDER BY waktu ASC");
        $no = 1;
                        while ($row = mysqli_fetch_array($data)){
                    ?>
                        <tr>
                            <td class="center"><?php echo $no++?></td>
                            <td><a href="../Dashboard-Dokter/dashboard.php?id=<?php echo $row['id_pasien']?>&waktu=<?php echo $row['waktu']?>"><?php echo $row['username']?></a></td>


                            <td class="center"><?php echo $row['waktu']?>.00 - <?php echo $row['waktu']+1?>.00</td>
                            <td class="center"><?php echo $row['status']?></td>
                        </tr>
                    <?php 
                    }
                    ?>
                    </tbody>
    
                </table>

    
            </div>

            <div class="right__col">
    
                <div class="card hijau">
                <?php
                $statusQueueQuery = <<<SQL
                    SELECT users.username, antrian.* 
                    FROM antrian JOIN users 
                    ON antrian.id_pasien = users.id
                    WHERE id_dokter = $myId AND status = 'selesai' AND tanggal = '$currentDate';
                SQL;
                
        $data = mysqli_query(ConnectionUtil::connect(), $statusQueueQuery);
        ?>
                        <h4>Pasien selesai</h4>
                        <h3><?php echo sizeof(mysqli_fetch_all($data))?></h3>
    
                </div>
                
                <!-- PHP UNTUK PROFIL USER DISINI -->
                <div class="user__manage">
    
                    <!-- PROFIL YANG KELUAR DISAAT DOKTER KLIK
                    DATA USER YANG TERTERA PADA TABEL. -->
                    <?php
                    if(isset($_GET['id'])){?>
                        <div class="profile__user">
                        <?php 
                            $checkCurrentProfileQuery = <<<SQL
                                SELECT users.username, identitas.* 
                                FROM identitas JOIN users 
                                ON identitas.id_user = users.id;
                            SQL;
    
                            if (isset($_GET['id'])) {
                                $data = mysqli_query(ConnectionUtil::connect(), $checkCurrentProfileQuery);
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
                                <p><?php echo $row['jeniskelamin']?$row['jeniskelamin']:'' ?> | <?php echo $row['umur'] ?> Tahun</p>
                            </div>
        
                        </div>
                        <?php }?>
        
                        <form action="chat.php" method="post">
                            <input type="text" value="<?php echo isset($_GET['waktu'])? $_GET['waktu']:'' ?>" name="waktukonsul" hidden>
    
                            <input type="text" value="<?php echo isset($_GET['id'])? $_GET['id']:'' ?>" name="id_from" hidden>
                            <button class="message" type="submit">
                                Message
                                <i class="fa-solid fa-paper-plane"></i>
                            </button>
                        </form>
        
                    </div>
                    <?php 
                    } else {?>
                        <div class="profile__user">
                            <div class="identity">
                                <p style="font-weight:900; padding-inline:3rem;">Saat ini, Anda belum memilih pengguna untuk memulai sesi chat dengan Anda. Silahkan pilih pengguna pada tabel disamping untuk memulainya! Silakan tetap siap dan tersedia untuk membantu pengguna yang membutuhkan</p>
                            </div>
                        </div>
        
                        <?php 
                        if ($status == 0) {
                        echo <<<HTML
                            <div class="profile__user" style="align-items:center; height:1rem;">
                                <div class="identity" >
                                    <p style="font-weight:900; padding-inline:3rem;">Jangan lupa untuk membuat status anda available agar pengguna bisa memulai sesi chat dengan anda!</p>
                                </div>
                            </div>
                        HTML;
                       }
                       ?>
                            
        
                    </div>
                    
                    <?php 
                    }
                    
                    ?>
    
            </div>

        </section>

    </main>


    <script src="styling/script.js"></script>


</body>
</html>
