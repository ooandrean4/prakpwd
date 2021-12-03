<?php
session_start();
include "koneksi.php";
$id_user = $_POST['id_user'];
$nama_ibu = $_POST['ibu'];
$pass = md5($_POST['paswd']);
$sql = "SELECT * FROM users WHERE id_user='$id_user' AND password='$pass' AND nama_ibu='$nama_ibu'";
if ($_POST["captcha_code"] == $_SESSION["captcha_code"]) {
    $login = mysqli_query($con, $sql);
    $ketemu = mysqli_num_rows($login);
    $r = mysqli_fetch_array($login);
    if ($ketemu > 0) {

        $_SESSION['iduser'] = $r['id_user'];
        $_SESSION['passuser'] = $r['password'];
        $_SESSION['namaibu'] = $r['nama_ibu'];

        echo "USER BERHASIL LOGIN<br>";
        echo "id user =", $_SESSION['iduser'], "<br>";
        echo "password=", $_SESSION['passuser'], "<br>";
        echo "nama_ibu=", $_SESSION['namaibu'], "<br>";
        echo "<a href=logout.php><b>LOGOUT</b></a></center>";

    } else {
        echo "<center>Login gagal! username & password & nama ibu tidak benar<br>";
        echo "<a href=form_login.php><b>ULANGILAGI</b></a></center>";
    }
    mysqli_close($con);
} else {
    echo "<center>Login gagal! Captcha tidak sesuai!<br>";
    echo "<a href=form_login.php><b>ULANGILAGI</b></a></center>";
}
