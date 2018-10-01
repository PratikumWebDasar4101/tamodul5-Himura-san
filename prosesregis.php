<?php
    session_start();
    @$data = $_SESSION['data'];

    if(isset($_GET['remove'])){
        unset($_SESSION['data']);
        header("Location: registrasi.php");
    }

    if (isset($_POST['tambah'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $prodi = $_POST['prodi'];
        $fakultas = $_POST['fakultas'];
        $hobi = $_POST['hobi'];
        $email = $_POST['email'];

        $nama_foto = $_FILES['foto']['name'];
        $tmp_foto = $_FILES['foto']['tmp_name'];
        $dir_foto = "photos/";
        $target_foto = $dir_foto . $nama_foto;

        $count_nim = strlen($nim);
        $count_nama = strlen($nama);

        if ($count_nim > 10) {
            ?>
            <script>
                alert("NIM harus kurang dari 10..");
                location = "registrasi.php";
            </script>
            <?php
        } elseif ($count_nama > 25) {
            ?>
            <script>
                alert("Nama harus kurang dari 25..");
                location = "registrasi.php";
            </script>
            <?php
        } else {
            if (!move_uploaded_file($tmp_foto, $target_foto))
                die("Foto gagal di upload..!!");

            $baris = count($_SESSION['data']);
            $newArray = array(
                "NIM"       => $nim,
                "Nama"      => $nama,
                "JK"        => $jk,
                "Prodi"     => $prodi,
                "Fakultas"  => $fakultas,
                "Hobi"      => $hobi,
                "Email"     => $email,
                "Foto"      => $target_foto
            );
            $_SESSION['data'][$baris] = $newArray;

            ?>
            <script>
                alert("Data berhasil tersimpan..");
                location = "prosesregis.php";
            </script>
            <?php
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View Data</title>
        <style>
            body {
                background-color: #EFEFEF;
                margin: 0;
            }

            button {
                outline: 0;
            }
            /* ===================================================================== */
            #green {
                float: right;
                border: 0;
                background-color: darkgreen;
                padding: 0.6% 0.8%;
                margin: 1% 1% 0 0;
                box-shadow: 0 0 10px black;
                border-radius: 5px; 
                cursor: pointer;
                color: white;
                transition: 0.5s;
            }

            #green:hover {
                background-color: green;
                transition: 0.5s;
            }
            /* ===================================================================== */
            #red {
                float: right;
                border: 0;
                background-color: darkred;
                padding: 0.6% 0.8%;
                margin: 1% 1% 0 0;
                box-shadow: 0 0 10px black;
                border-radius: 5px;
                cursor: pointer;
                color: white;
                transition: 0.5s;
            }

            #red:hover {
                background-color: red;
                transition: 0.5s;
            }
            /* ===================================================================== */
            table {
                text-align: center;
                background-color: white;
                float: left;
                width: 98%;
                margin: 1%;
                border-spacing: 0;
            }

            th {
                background-color: darkred;
                color: white;
            }
            /* ===================================================================== */
            img {
                width: 35%;
                transition: 0.5s;
            }

            img:hover {
                width: 50%;
                transition: 0.5s;
            }
        </style>
    </head>
    <body>
        <a href="registrasi.php"><button id="green">Kembali</button></a>
        <a href="proseslogin.php?logout=yes" onclick="return confirm('Apakah anda yakin ingin Logout..?');"><button id="red">Logout</button></a>
        <a href="?remove=all" onclick="return confirm('Apakah anda yakin ingin menghapus semua data..?');"><button id="red">Hapus Semua Data</button></a>
        <table border="1" align="center">
            <tr>
                <th width="8%">NIM</th>
                <th width="17%">Nama</th>
                <th width="8%">Jenis Kelamin</th>
                <th width="12%">Program Studi</th>
                <th width="5%">Fakultas</th>
                <th width="10%">Hobi</th>
                <th width="12%">Email</th>
                <th>Foto</th>
            </tr>
            <?php
                if (count($data) == null) {
                    ?>
                    <tr>
                        <td colspan="8"><h3>Data tidak ada..</h3></td>
                    </tr>
                    <?php
                } else {
                    for ($i = 0; $i < count($data) ; $i++) {
                        ?>
                        <tr>
                            <td><?php echo $data[$i]['NIM'];?></td>
                            <td><?php echo $data[$i]['Nama'];?></td>
                            <td><?php echo $data[$i]['JK'];?></td>
                            <td><?php echo $data[$i]['Prodi'];?></td>
                            <td><?php echo $data[$i]['Fakultas'];?></td>
                            <td>
                                <?php 
                                    for ($j = 0; $j < count($data[$i]['Hobi']) ; $j++) { 
                                        echo "- " . $data[$i]['Hobi'][$j] . "<br>";
                                    }
                                ?>
                            </td>
                            <td><?php echo $data[$i]['Email'];?></td>
                            <td><img src="<?php echo $data[$i]['Foto'];?>"></td>
                        </tr>
                        <?php
                    }
                }
            ?>
        </table>
    </body>
</html>
