<?php
    require_once "../config/koneksi.php";

    $querySoal = mysqli_query($connection,"SELECT * FROM tb_soal WHERE deleted = 0");
    $key = 0;
    while ($row = $querySoal->fetch_assoc()) {
        $soal[] = $row;
        $quryOpt = mysqli_query($connection,"SELECT * FROM tb_option WHERE id_soal = ".$row['id_soal']);
        while ($op = $quryOpt->fetch_assoc()){
            
            $option[$key][] = $op;
        }
        
        $key++;
    }

    $data = [$soal,$option];
    echo json_encode($data);
?>