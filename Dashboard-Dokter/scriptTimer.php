<?php 
    session_start();

    date_default_timezone_set("Asia/Makassar");
    $waktu_Realtime = date('H:i:s');

    //set seconds berdasarkan waktu konsul + 1 jam ini akan menjadi batas konsultasi (1 jam kedepan)
    $waktukonsul_selesai = intval($_SESSION['waktukonsul']) + 1;
    $totalDetik_selesai = 3600*$waktukonsul_selesai;

    // membagi array menjadi string dengan separator : menggunakan function explode
    list($jam, $menit, $detik) = explode(":", $waktu_Realtime);

    // mengparse ke bilangan bulat
    $jam = intval($jam);
    $menit = intval($menit);
    $detik = intval($detik);

    // Hitung total detik
    $totalDetik_Realtime = ($jam * 3600) + ($menit * 60) + $detik;

    $timer = gmdate("H:i:s", $totalDetik_selesai - $totalDetik_Realtime);
    if (($totalDetik_selesai - $totalDetik_Realtime) < 0) {
        echo 'selesai';
    } else {
        echo $timer;
    }
?>