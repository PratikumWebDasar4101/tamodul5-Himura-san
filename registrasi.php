<!DOCTYPE html>
<html>
    <head>
        <title>Form Registrasi</title>
        <style>
            body {
                margin: 0;
                background-color: #EFEFEF;
            }

            input, select {
                outline: 0;
            }
            /* ===================================================================== */
            #green {
                background-color: darkgreen;
                float: right;
                padding: 0.6% 0.8%;
                border-radius: 5px;
                color: white;
                border: 0;
                box-shadow: 0 0 10px black;
                margin: 1%;
                cursor: pointer;
                outline: 0;
                transition: 0.5s;
            }

            #green:hover {
                background-color: green;
                transition: 0.5s;
            }

            #red {
                background-color: darkred;
                float: right;
                padding: 0.6% 0.8%;
                border-radius: 5px;
                color: white;
                border: 0;
                box-shadow: 0 0 10px black;
                margin: 1% 0;
                cursor: pointer;
                outline: 0;
                transition: 0.5s;
            }

            #red:hover {
                background-color: red;
                transition: 0.5s;
            }
            /* ===================================================================== */
            .form {
                width: 30%;
                float: left;
                background-color: white;
                margin: 2% 35% 5% 35%;
                text-align: center;
                border-radius: 5px; 
                box-shadow: 0 0 10px black;
            }

            #title {
                background-color: darkred;
                padding: 0.5% 0;
                border-radius: 5px 5px 0 0;
                color: white;
            }

            form {
                padding: 3% 0;
            }

            input[type='text'], input[type='email'], input[type='number'] {
                width: 92%;
                padding: 1% 2%;
                margin: 1% 0 2% 0;
                border: 0;
                border-bottom: 1px solid black;
                text-align: center;
            }

            select {
                width: 97%;
                padding: 1% 2%;
                margin: 1% 0 2% 0;
                border: 0;
                border-bottom: 1px solid black;
                text-align-last: center;
            }
            /* ===================================================================== */
            input[type='submit'] {
                background-color: darkgreen;
                border: 0;
                color: white;
                border-radius: 5px;
                box-shadow: 0 0 10px black;
                padding: 2% 3%;
                cursor: pointer;
                transition: 0.5s;
            }

            input[type='submit']:hover {
                background-color: green;
                transition: 0.5s;
            }

            input[type='reset'] {
                background-color: darkred;
                border: 0;
                color: white;
                border-radius: 5px;
                box-shadow: 0 0 10px black;
                padding: 2% 3%;
                cursor: pointer;
                transition: 0.5s;
            }

            input[type='reset']:hover {
                background-color: red;
                transition: 0.5s;
            }
        </style>
    </head>
    <body>
        <a href="prosesregis.php"><button id="green">Lihat Data</button></a>
        <a href="proseslogin.php?logout=yes"><button id="red" onclick="return confirm('Apakah anda yakin ingin Logout..?');">Logout</button></a>
        <div class="form">
            <div id="title">
                <h3>Input data</h3>
            </div>
            <form action="prosesregis.php" method="POST" enctype="multipart/form-data">
                NIM <input type="number" name="nim" placeholder="Masukkan NIM anda.." autofocus required>
                Nama  <input type="text" name="nama" placeholder="Masukkan Nama anda.." required>
                <br><br>
                Jenis Kelamin : <input type="radio" name="jk"  value="Laki-laki" required> Laki-laki <input type="radio" name="jk"  value="Perempuan" required> Perempuan 
                <br><br>
                Fakultas
                <select name="fakultas" onchange="changeFakultas(this.value)" required>
                    <option disabled selected>--- Select One ---</option>
                    <option value="FTE">FTE</option>
                    <option value="FRI">FRI</option>
                    <option value="FIF">FIF</option>
                    <option value="FEB">FEB</option>
                    <option value="FKB">FKB</option>
                    <option value="FIK">FIK</option>
                    <option value="FIT">FIT</option>
                </select>
                Program Studi 
                <select name="prodi" id="prodi" required>
                    <option disabled selected>--- Pilih Fakultas Dahulu ---</option>
                    <!-- <option value="D3 Teknik Komputer">D3 Teknik Komputer</option>
                    <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
                    <option value="D3 Teknik Telekomunikasi">D3 Teknik Telekomunikasi</option>
                    <option value="D3 Manajemen Pemasaran">D3 Manajemen Pemasaran</option>
                    <option value="D3 Perhotelan">D3 Perhotelan</option>
                    <option value="D3 Manajemen Informatika">D3 Manajemen Informatika</option>
                    <option value="D3 Komputerisasi Komputansi">D3 Komputerisasi Komputansi</option>
                    <option value="D4 Sistem Multimedia">D4 Sistem Multimedia</option> -->
                </select>           
                Hobi <br>
                <input type="checkbox" name="hobi[]" value="Football">Football 
                <input type="checkbox" name="hobi[]" value="Basket">Basket 
                <input type="checkbox" name="hobi[]" value="Main Games">Main Games
                <input type="checkbox" name="hobi[]" value="Hikikomori">Hikikomori               
                <br><br>
                Email <input type="email" name="email" pattern="[a-z0-9._-]+@+[a-z]+.com" placeholder="abcd@efg.com" required>
                Foto : <input type="file" name="foto" required>
                <br><br>
                <input type="submit" name="tambah" value="Tambah"> <input type="reset" value="Reset">
            </form>
        </div>
    </body>
</html>
<script>
    function changeFakultas(value){
        if (value == "FIT") {
            document.getElementById('prodi').innerHTML =
                "<option value='D3 Teknik Komputer'>D3 Teknik Komputer</option>" +
                "<option value='D3 Teknik Informatika'>D3 Teknik Informatika</option>" +
                "<option value='D3 Teknik Telekomunikasi'>D3 Teknik Telekomunikasi</option>" +
                "<option value='D3 Manajemen Pemasaran'>D3 Manajemen Pemasaran</option>" +
                "<option value='D3 Perhotelan'>D3 Perhotelan</option>" +
                "<option value='D3 Manajemen Informatika'>D3 Manajemen Informatika</option>" +
                "<option value='D3 Komputerisasi Komputansi'>D3 Komputerisasi Komputansi</option>" +
                "<option value='D4 Sistem Multimedia'>D4 Sistem Multimedia</option>";
        } else if (value == "FTE"){
            document.getElementById('prodi').innerHTML =
                "<option value='S1 Teknik Elektro'>S1 Teknik Elektro</option>" +
                "<option value='S1 Teknik Telekomunikasi'>S1 Teknik Telekomunikasi</option>" +
                "<option value='S1 Teknik Fisika'>S1 Teknik Fisika</option>" +
                "<option value='S1 Sistem Komputer'>S1 Sistem Komputer</option>" +
                "<option value='S2 Telekomunikasi Elektronik'>S2 Telekomunikasi Elektronik</option>";
        } else if (value == "FRI"){
            document.getElementById('prodi').innerHTML =
                "<option value='S1 Teknik Industri'>S1 Teknik Industri</option>" +
                "<option value='S1 Sistem Informasi'>S1 Sistem Informasi</option>" +
                "<option value='S2 Teknik Industri'>S2 Teknik Industri</option>";
        } else if (value == "FIF"){
            document.getElementById('prodi').innerHTML =
                "<option value='S1 Ilmu Komputasi'>S1 Ilmu Komputasi</option>" +
                "<option value='S1 Informatika'>S1 Informatika</option>" +
                "<option value='S1 Teknologi Informasi'>S1 Teknologi Informasi</option>" +
                "<option value='S2 Informatika'>S2 Informatika</option>";
        } else {
            document.getElementById('prodi').innerHTML = "<option> -- Pilih Fakultas Lain -- </option>";
        }
    };
</script>
