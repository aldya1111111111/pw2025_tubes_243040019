<?php 

function koneksi()
{
    $conn = mysqli_connect('localhost', 'root', '', 'pw2025_tubes_243040019');
    return $conn;
}

function query($query)
{

    $conn = koneksi();
    
    $result = mysqli_query($conn, $query);
    
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}


?>

