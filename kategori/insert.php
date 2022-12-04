<h3>Insert Kategori</h3>
<div class="mb-3">
    <form action="" method="post">
    <div class="mb-3 w-50">
        <label for="" class="form-label">Nama Kategori : </label>
        <input type="text" name="kategori" required placeholder="isi kategori" class="form-control">
    </div>
    <div class="float-start">
        <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
    </div>
    <div class="float-end">
        <a href="?f=kategori&m=select" class="btn btn-primary">back</a>
    </div>
    </form>
</div>
<?php

    if (isset($_POST['kategori'])) {
        $kategori=$_POST['kategori'];

        $sql = "INSERT INTO tblkategori VALUES ('','$kategori')";

        $db->runSql($sql);

        header("location:?f=kategori&m=select");
    }
?>