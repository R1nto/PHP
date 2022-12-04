<h3>Registrasi Pelanggan</h3>
<div class="mb-3">
    <form action="" method="post">
    <div class="mb-3 w-50">
        <label for="" class="form-label">Nama Pelanggan : </label>
        <input type="text" name="pelanggan" required placeholder="isi user" class="form-control">
    </div>
    <div class="mb-3 w-50">
        <label for="" class="form-label">Alamat : </label>
        <input type="text" name="alamat" required placeholder="alamat" class="form-control">
    </div>
    <div class="mb-3 w-50">
        <label for="" class="form-label">Telp : </label>
        <input type="text" name="telp" required placeholder="no telp" class="form-control">
    </div>
    <div class="mb-3 w-50">
        <label for="" class="form-label">Email : </label>
        <input type="email" name="email" required placeholder="email" class="form-control">
    </div>
    <div class="mb-3 w-50">
        <label for="" class="form-label">Password : </label>
        <input type="password" name="password" required placeholder="password" class="form-control">
    </div>
    <div class="mb-3 w-50">
        <label for="" class="form-label">Konfirmasi Password : </label>
        <input type="password" name="konfirmasi" required placeholder="password" class="form-control">
    </div>
    <div class="float-start">
        <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
    </div>
    <div class="float-end">
        <a href="./index.php" class="btn btn-primary">back</a>
    </div>
    </form>
</div>
<?php

    if (isset($_POST['simpan'])) {
        $pelanggan=$_POST['pelanggan'];
        $alamat=$_POST['alamat'];
        $telp=$_POST['telp'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $konfirmasi=$_POST['konfirmasi'];

        if ($password === $konfirmasi) {
            $sql = "INSERT INTO tblpelanggan VALUES ('','$pelanggan','$alamat','$telp','$email','$password',1)";
            $db->runSql($sql);
            header("location:?f=home&m=info");
        }
        else {
            echo "<h3>MAKANE NEK NGETIK SING NGGENAH<h3>";
        }
    }
?>