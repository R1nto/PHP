<h3>Insert User</h3>
<div class="mb-3">
    <form action="" method="post">
    <div class="mb-3 w-50">
        <label for="" class="form-label">Nama User : </label>
        <input type="text" name="user" required placeholder="isi user" class="form-control">
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
    <div class="mb-3 w-50">
        <label for="" class="form-label">Level</label>
        <select name="level" id="">
            <option value="admin">Admin</option>
            <option value="kasir">Kasir</option>
            <option value="koki">Koki</option>
        </select>
    </div>
    <div class="float-start">
        <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
    </div>
    <div class="float-end">
        <a href="?f=user&m=select" class="btn btn-primary">back</a>
    </div>
    </form>
</div>
<?php

    if (isset($_POST['simpan'])) {
        $user=$_POST['user'];
        $email=$_POST['email'];
        $password=hash('sha256',$_POST['password']);
        $konfirmasi=hash('sha256',$_POST['konfirmasi']);
        $level=$_POST['level'];

        if ($password === $konfirmasi) {
            $sql = "INSERT INTO tbluser VALUES ('','$user','$email','$password','$level',1)";
            $db->runSql($sql);
            header("location:?f=user&m=select");
        }
        else {
            echo "<h3>MAKANE NEK NGETIK SING NGGENAH<h3>";
        }
    }
?>