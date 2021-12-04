<?php 
    include 'koneksi.php';
?>
    <h3>Form Pencarian DATA KHS Dengan PHP </h3>
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
    ?>
    <table border="1">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Kode MK</th>
            <th>Matkul</th>
            <th>Nilai</th>
        </tr>
            <?php 
                if(isset($_GET['cari'])){
                    $cari = $_GET['cari'];
                    $sql="select a.nim,a.nama,b.kodeMK,b.nama_matkul,c.nilai from mahasiswa as a INNER JOIN khs as c on c.nim=a.nim INNER JOIN matakuliah as b on c.kodeMK=b.kodeMK where c.nim like'%".$cari."%'";
                    $tampil = mysqli_query($con,$sql);
            }else{
                $sql="select * from KHS JOIN mahasiswa on khs.nim=mahasiswa.nim  JOIN matakuliah on khs.kodeMK=matakuliah.kodeMK";
                $tampil = mysqli_query($con,$sql);
            }
            $no = 1;
            while($r = mysqli_fetch_array($tampil)){
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $r['nim']; ?></td>
                    <td><?php echo $r['nama']; ?></td>
                    <td><?php echo $r['kodeMK']; ?></td>
                    <td><?php echo $r['nama_matkul']; ?></td>
                    <td><?php echo $r['nilai']; ?></td>
                </tr>
                <?php } ?>
    </table>