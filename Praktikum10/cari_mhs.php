<?php
include "koneksi.php";
$url = "http://localhost/prakpwd/Praktikum10/getdatamhs.php";
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($client);
$result = json_decode($response); 
?>
<h3>Form Pencarian Dengan PHP MAHASISWA</h3>
<form action="" method="get">
    <label>Cari :</label>
    <input type="text" name="cari">
    <input type="submit" value="Cari">
</form>
<?php 
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    echo "<b>Hasil pencarian : ".$cari."</b>";
}
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $sql="select * from mahasiswa where nim like'%".$cari."%'";
    //$result = json_decode($response);
    $result = mysqli_query($con, $sql);
}else{
    $sql="select * from mahasiswa";
    $result = mysqli_query($con, $sql);
}
$no = 1;
while($r = mysqli_fetch_array($result)){
 echo "<p>";
 echo "NIM : " . $r['nim'] . "<br />";
 echo "Nama : " . $r['nama'] . "<br />";
 echo "jenis kel : " . $r['jkel'] . "<br />";
 echo "Alamat : " . $r['alamat'] . "<br />";
 echo "Tgl Lahir : " . $r['tgllahir'] . "<br />";
 echo "Nomor HP : " . $r['hp'] . "<br />";
 echo "</p>";
}
?>