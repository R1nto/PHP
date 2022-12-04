<h3>Menu</h3>
<?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $where = "WHERE idkategori=$id";
        $id="&id=".$id;
    }
    else {
        $where = "";
        $id = "";
    }


?>
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
    <?php if (!empty($row)) {?>
    <?php foreach($row as $r):?>
    <div class="card text-center" style=" width: 300px; float: left; margin-left: 15px;">
        <img src="gambar/<?php echo $r['gambar']?>" class="card-img-top" alt="" style=" width: 300px; height:200px;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $r['menu']?></h5>
                <p style="font-size: 150%;"><?php echo $r['harga']?></p>
                <a class="btn btn-primary" href="?f=home&m=beli&id=<?php echo $r['idmenu']?>">Pesan</a>
            </div>        
        </div>
        <?php endforeach?>
        <?php }?>
        <div style= "clear: both;">
<?php

    for ($i=1; $i <= $halaman ; $i++) { 
    echo '<a href="?f=home&m=produk&p='.$i.$id.'">' .$i. '</a>';
    echo "&nbsp &nbsp &nbsp";
    }

?>