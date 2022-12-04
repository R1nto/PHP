<?php

    $row = $db->getAll("SELECT * FROM tblkategori ORDER BY kategori ASC");

?>
<h3 class="mb-3">Insert Menu</h3>
<div class="mb-3">
<form action="" method="post" enctype="multipart/form-data">
        <label for="">Kategori:</label><br>
        <select name="idkategori" id="">
            <?php foreach ($row as $r): ?>
            <option value="<?php echo $r["idkategori"];?>"><?php echo $r["kategori"];?></option>
            <?php endforeach ?>
        </select>
</div>
<div class="mb-3">
    <div class="mb-3 w-50">
        <label for="" class="form-label">Nama menu : </label>
        <input type="text" name="menu" required placeholder="isi menu" class="form-control">
    </div>
    <div class="mb-3 w-50">
        <label for="" class="form-label">Harga menu : </label>
        <input type="text" name="harga" number required placeholder="isi harga" class="form-control">
    </div>
    <div class="mb-3 w-50">
        <label for="" class="form-label">Gambar menu : </label><br>
        <input type="file" name="gambar">
    </div>
    <div class="float-start">
        <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
    </div>
    <div class="float-end">
        <a href="?f=menu&m=select" class="btn btn-primary">back</a>
    </div>
    </form>
</div>
<?php

    if (isset($_POST['menu'])) {
        $idkategori = $_POST['idkategori'];
        $menu=$_POST['menu'];
        $harga = $_POST['harga'];
        $gambar = $_FILES['gambar']['name'];
        $temp = $_FILES['gambar']['tmp_name'];

        if (empty($gambar)) {
            echo "<h3> gambar kosong blokkk <h3>";
        }else {
            $sql = "INSERT INTO tblmenu VALUES ('',$idkategori,'$menu','$gambar','$harga')";
            move_uploaded_file($temp,'../gambar/'.$gambar);  
            $db->runSql($sql);
            header("location:?f=menu&m=select");          
        }
    }
?>