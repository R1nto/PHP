<h3>Detail Pembelian</h3>
<form action="" method="post">
    <div class="mb-3 w-50 float-start">
        <label for="" class="form-label">Tanggal Awal : </label>
        <input type="date" name="tawal"  class="form-control">
    </div>
    <div class="mb-3 w-50 float-end">
        <label for="" class="form-label">Tanggal Akhir : </label>
        <input type="date" name="takhir"  class="form-control">
    </div>
    <div>
        <input type="submit" name="simpan" value="Cari" class="btn btn-primary mb-3">
    </div>
    </form>
</form>
<?php
    $jumlahdata = $db->rowCount("SELECT idorderdetail FROM vorderdetail");
    $banyak = 3;
    $halaman = ceil($jumlahdata / $banyak);
    if (isset($_GET['p'])) {
        $p = $_GET['p'];
        $mulai = ($p * $banyak) - $banyak;

    }else {
        $mulai = 0;    
    }
    $sql = "SELECT * FROM vorderdetail ORDER BY idorderdetail DESC LIMIT $mulai,$banyak";
    if (isset($_POST['simpan'])) {
        $tawal = $_POST['tawal'];
        $takhir = $_POST['takhir'];
        $sql = "SELECT * FROM vorderdetail WHERE tglorder BETWEEN '$tawal' AND '$takhir'";
    }
    $row = $db->getAll($sql); 
    $No = 1+$mulai;
    $total = 0;
?>
<table class="table table-bordered w-70">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Alamat</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($row)) {?>
        <?php foreach($row as $r):?>
        <tr>
            <td><?php echo $No++?></td>
            <td><?php echo $r['pelanggan']?></td>
            <td><?php echo $r['tglorder']?></td>
            <td><?php echo $r['menu']?></td>
            <td><?php echo $r['harga']?></td>
            <td><?php echo $r['jumlah']?></td>
            <td><?php echo $r['alamat']?></td>
            <td><?php echo $r['jumlah'] * $r['harga']?></td>
            <?php $total = $total + ($r['jumlah'] * $r['harga'])?>
        </tr>
        <?php endforeach?>
        <?php } ?>
        <tr>
            <td colspan=7><h3>GRAND TOTAL</h3></td>
            <td><h4><?php echo $total ?></h4></td>
        </tr>

    </tbody>
</table>
<?php

    for ($i=1; $i <= $halaman ; $i++) { 
    echo '<a href="?f=orderdetail&m=select&p='.$i.'">' .$i. '</a>';
    echo "&nbsp &nbsp &nbsp";
    }

?>