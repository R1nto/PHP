<div class="float-start">
    <h3>Menu</h3>
</div>
<div class="float-end">
    <a class="btn btn-primary" href="?f=menu&m=insert" role="button">TAMBAH DATA</a>
</div>
<br><br>
<?php
    if (isset($_POST['opsi'])) {
        $opsi = $_POST['opsi'];
        $where = "where idkategori= $opsi";
    }else {
        $opsi=0;
        $where = "";
    }
?>
<div class="mt-3 mb-4">
    <?php
        $row = $db->getAll("SELECT * FROM tblkategori ORDER BY kategori ASC");
    ?>
    <form action="" method="post">
        <select name="opsi" id="" onchange="this.form.submit()">
            <?php foreach($row as $r): ?>
            <option <?php if($r['idkategori']==$opsi) echo "selected" ?> value="<?php echo $r['idkategori']?>"><?php echo $r['kategori']?></option>
            <?php endforeach ?>
        </select>
    </form>
</div>

<?php
    $jumlahdata = $db->rowCount("SELECT idmenu FROM tblmenu $where");
    $banyak = 3;
    $halaman = ceil($jumlahdata / $banyak);
    if (isset($_GET['p'])) {
        $p = $_GET['p'];
        $mulai = ($p * $banyak) - $banyak;

    }else {
        $mulai = 0;    
    }
    $sql = "SELECT * FROM tblmenu $where ORDER BY menu ASC LIMIT $mulai,$banyak";
    $row = $db->getAll($sql); 
    $No = 1+$mulai;
?>

<table class="table table-bordered w-100 float-end">
    <thead>
        <tr>
            <th>No</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($row)) {?>
        <?php foreach($row as $r):?>
        <tr>
            <td><?php echo $No++?></td>
            <td><?php echo $r['menu']?></td>
            <td><?php echo $r['harga']?></td>
            <td><img style="width: 200px;" src="../gambar/<?php echo $r['gambar']?>" alt=""></td>
            <td><a href="?f=menu&m=update&id=<?php echo $r['idmenu']?>" class="btn btn-primary">Update</a></td>
            <td><a href="?f=menu&m=delete&id=<?php echo $r['idmenu']?>" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php endforeach?>
        <?php }?>
    </tbody>
</table>
<?php

    for ($i=1; $i <= $halaman ; $i++) { 
    echo '<a href="?f=menu&m=select&p='.$i.'">' .$i. '</a>';
    echo "&nbsp &nbsp &nbsp";
    }

?>