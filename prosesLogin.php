<?php
    session_start();

    $akun = array(
            array("zahid", "zahid"),
            array("petrus","petrus")
    );

    if(isset($_SESSION['sukses']))
        header("Location: registrasi.php");

    if(isset($_GET['logout'])){
        session_destroy();
        header("Location: login.php");
    }
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $cek = 0;
        for ( $i = 0; $i < count($akun) ; $i++) { 
            if( $akun[$i][0] == $username && $akun[$i][1] == $password ){
                $_SESSION['sukses'] = "sukses";
                header("Location: registrasi.php");
                $cek++;
            }
        }

        if( $cek == 0 ){
            ?>
            <script>
                alert("Username atau Password salah..!!");
                location = "login.php";
            </script>
            <?php
        }
    }
?>
