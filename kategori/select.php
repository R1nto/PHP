<?php
    $jumlahdata = $db->rowCount("SELECT idkategori FROM tblkategori");
    $banyak = 3;
    $halaman = ceil($jumlahdata / $banyak);
    if (isset($_GET['p'])) {
        $p = $_GET['p'];
        $mulai = ($p * $banyak) - $banyak;

    }else {
        $mulai = 0;    
    }
    $sql = "SELECT * FROM tblkategori ORDER BY kategori ASC LIMIT $mulai,$banyak";
    $row = $db->getAll($sql); 
    $No = 1+$mulai;
?>
<div class="float-start">
    <h3>Kategori</h3>
</div>
<div class="float-end">
    <a class="btn btn-primary" href="?f=kategori&m=insert" role="button">TAMBAH DATA</a>
</div>
<br><br>
<table class="table table-bordered w-70">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($row)) {?>
        <?php foreach($row as $r):?>
        <tr>
            <td><?php echo $No++?></td>
            <td><?php echo $r['kategori']?></td>
            <td><a href="?f=kategori&m=update&id=<?php echo $r['idkategori']?>" class="btn btn-primary">Update</a></td>
            <td><a href="?f=kategori&m=delete&id=<?php echo $r['idkategori']?>" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php endforeach?>
        <?php } ?>
    </tbody>
</table>
<?php

    for ($i=1; $i <= $halaman ; $i++) { 
    echo '<a href="?f=kategori&m=select&p='.$i.'">' .$i. '</a>';
    echo "&nbsp &nbsp &nbsp";
    }

?>