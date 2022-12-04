<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tblorder WHERE idorder=$id";
        $row=$db->getItem($sql);
    }
?>
<h3>Pembayaran</h3>
<div class="mb-3">
    <form action="" method="post">
    <div class="mb-3 w-50">
        <label for="" class="form-label">Total : </label>
        <input type="number" name="total" required value=<?php echo $row['total']?> class="form-control">
    </div>
    <div class="mb-3 w-50">
        <label for="" class="form-label">Bayar : </label>
        <input type="number" name="bayar" class="form-control">
    </div>
    <div class="float-start">
        <input type="submit" name="simpan" value="Confirm" class="btn btn-primary me-4">
    </div>
    <div class="float-end">
    <a href="?f=order&m=select" class="btn btn-primary">Back</a>
    </div>
    </form>
</div>
<?php

    if (isset($_POST['simpan'])) {
        $bayar=$_POST['bayar'];
        $kembali = $bayar - $row['total'];

        $sql = "UPDATE tblorder SET bayar=$bayar, kembali=$kembali, status=1 WHERE idorder=$id";

        if ($kembali < 0) {
            echo "<h3>Pembayaran Kurang</h3>";
        }
        else {
            $db->runSql($sql);
            header("location:?f=order&m=select");   
        }
    }
?>