<?php
    $jumlahdata = $db->rowCount("SELECT iduser FROM tbluser");
    $banyak = 3;
    $halaman = ceil($jumlahdata / $banyak);
    if (isset($_GET['p'])) {
        $p = $_GET['p'];
        $mulai = ($p * $banyak) - $banyak;

    }else {
        $mulai = 0;    
    }
    $sql = "SELECT * FROM tbluser ORDER BY user ASC LIMIT $mulai,$banyak";
    $row = $db->getAll($sql); 
    $No = 1+$mulai;
?>
<div class="float-start">
    <h3>User</h3>
</div>
<div class="float-end">
    <a class="btn btn-primary" href="?f=user&m=insert" role="button">TAMBAH DATA</a>
</div>
<br><br>
<table class="table table-bordered w-70">
    <thead>
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Email</th>
            <th>Level</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($row as $r):?>
            <?php
                if ($r['aktif']==1) {
                    $status = 'AKTIF';
                } 
                else {
                    $status = 'BANNED';
                }  
            ?>
        <tr>
            <td><?php echo $No++?></td>
            <td><?php echo $r['user']?></td>
            <td><?php echo $r['email']?></td>
            <td><?php echo $r['level']?></td>
            <td><a href="?f=user&m=delete&id=<?php echo $r['iduser']?>">Delete</a></td>
            <td><a href="?f=user&m=update&id=<?php echo $r['iduser']?>"><?php echo $status?></a></td>
        </tr>

        <?php endforeach?>
    </tbody>
</table>
<?php

    for ($i=1; $i <= $halaman ; $i++) { 
    echo '<a href="?f=user&m=select&p='.$i.'">' .$i. '</a>';
    echo "&nbsp &nbsp &nbsp";
    }

?>