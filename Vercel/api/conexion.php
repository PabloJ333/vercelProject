<?php
function connection(){
    $host="154.12.254.242";
    //$host = "localhost";
    //$host = "localhost";
    $user="ratiosof74bo_uv_bd_user";
    //$user = "ianjflqf_freedb_esptest2";
    //$user = "namlas99_esptes1";
    //$user = "root";
    $pass="Estudiantes@2024";
    //$pass = "UsJg2EsU2955AnSUDt8k";
    //$pass = "EspTest1";
    //$pass = "";
    $bd = "ratiosof74bo_uv_bd";
    //$bd = "ianjflqf_freedb_esptest2";
    //$bd = "namlas99_esptes1";
    //$bd = "freedb_esptest2";
    $connect = mysqli_connect($host, $user, $pass);
    mysqli_select_db($connect, $bd);
    return $connect;
}
?>