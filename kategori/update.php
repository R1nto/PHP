<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tblkategori WHERE idkategori=$id";
        $row=$db->getItem($sql);
    }
?>
<h3>Update Kategori</h3>
<div class="mb-3">
    <form action="" method="post">
    <div class="mb-3 w-50">
        <label for="" class="form-label">Nama Kategori : </label>
        <input type="text" name="kategori" required value=<?php echo $row['kategori']?> class="form-control">
    </div>
    <div class ="float-start">
        <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
    </div>
    <div class = "float-end">
        <a href="?f=kategori&m=select" class="btn btn-primary">Back</a>
    </div>
    </form>
</div>
<?php

    if (isset($_POST['kategori'])) {
        $kategori=$_POST['kategori'];

        $sql = "UPDATE tblkategori SET kategori='$kategori' WHERE idkategori=$id";

        $db->runSql($sql);

        header("location:?f=kategori&m=select");
    }
?>