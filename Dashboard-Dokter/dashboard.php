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
    // session_start();
    // if ($_SESSION['role'] != 'dokter') {
    //     header('location:../Login-Register/LoginForm.php');
    // }

    // 1 = checked
    // 0 == not checked
    $status = 1;

?>

    <input type="checkbox" name="dropdown__setting" id="dropdown__setting">
    <div class="setting">

        <p>Availability Status</p>

        <br><br>

        <div id="availability__box">

            <p class="available__status"><!-- Javascript --></p>
            
            <label for="available__status">
                <!-- PHP selected dibawah -->
                <input type="checkbox" name="available__status" id="available__status" <?php echo $status == 1 ? 'checked' : ''  ?>>
                <div class="toggle"></div>
            </label>

        </div>


    </div>

    <nav>

        <div class="logo">
            <h1>MINDFUL <span>SPACE</span></h1>
        </div>

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

        </div>

    </nav>
    
    <hr>
    
    <br><br><br><br><br>
    <br><br><br><br><br>

    <main>

        <div class="top">
            
            <h2>DASHBOARD</h2>

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
    
                <div>

                    <div class="card">
                        
                        <h4>Total Pasien</h4>
                        <h3>14</h3>
        
                    </div>
                    
                    <div class="card">
        
                        <h4>Antrian saat ini</h4>
                        <h3>14</h3>
        
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
    
                        <tr>
                            <td class="center">1</td>
                            <td><a href="">Budhi</a></td>
                            <td class="center">08.00-09.00</td>
                            <td class="center">tes</td>
                        </tr>
                        <tr>
                            <td class="center">2</td>
                            <td><a href="">Budhi</a></td>
                            <td class="center">08.00-09.00</td>
                            <td class="center">tes</td>
                        </tr>
                        <tr>
                            <td class="center">3</td>
                            <td><a href="">Budhi</a></td>
                            <td class="center">08.00-09.00</td>
                            <td class="center">tes</td>
                        </tr>
                        <tr>
                            <td class="center">4</td>
                            <td><a href="">Budhi</a></td>
                            <td class="center">08.00-09.00</td>
                            <td class="center">tes</td>
                        </tr>
                        <tr>
                            <td class="center">5</td>
                            <td><a href="">Budhi</a></td>
                            <td class="center">08.00-09.00</td>
                            <td class="center">tes</td>
                        </tr>
                        <tr>
                            <td class="center">6</td>
                            <td><a href="">Budhi</a></td>
                            <td class="center">08.00-09.00</td>
                            <td class="center">tes</td>
                        </tr>
                        <tr>
                            <td class="center">7</td>
                            <td><a href="">Budhi</a></td>
                            <td class="center">08.00-09.00</td>
                            <td class="center">tes</td>
                        </tr>
                        <tr>
                            <td class="center">8</td>
                            <td><a href="">Budhi</a></td>
                            <td class="center">08.00-09.00</td>
                            <td class="center">tes</td>
                        </tr>
                        <tr>
                            <td class="center">9</td>
                            <td><a href="">Budhi</a></td>
                            <td class="center">08.00-09.00</td>
                            <td class="center">tes</td>
                        </tr>
                        <tr>
                            <td class="center">10</td>
                            <td><a href="">Budhi</a></td>
                            <td class="center">08.00-09.00</td>
                            <td class="center">tes</td>
                        </tr>
                       

                    </tbody>
    
                </table>

                <div class="pagination">

                        <a href=""><- previous page</a>
                        <a href="">next page -></a>

                </div>
    
            </div>
    
            <div class="right__col">
    
                <div class="card hijau">

                        <h4>Pasien selesai</h4>
                        <h3>14</h3>
    
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
    
                        <div class="profile__picture">
                            <img src="../image/BudhiSwag-removebg-preview.png" alt="">
                        </div>
    
                        <div class="identity">
                            <h1>BudhiPro</h1>
                            <p>I Made Bagus Mahatma Budhi</p>
                            <p>Laki - Laki | 19 Tahun</p>
                        </div>
    
                    </div>
    
                    <a href="" class="message">
                        Message
                        <i class="fa-solid fa-paper-plane"></i>
                    </a>
    
                </div>
    
            </div>

        </section>

    </main>

    <script src="styling/script.js"></script>

</body>
</html>
