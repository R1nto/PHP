<?php
    require_once('./dbcontroller.php');
    $db = new DB;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <title>Login User Pelanggan</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4 mx-auto mt-4 w-100 ">
                <h3>LOGIN USER PELANGGAN</h3>
            <form action="" method="post">
                <div class="mb-3 w-50" >
                    <label for="" class="form-label">Email : </label>
                    <input type="email" name="email" required placeholder="email" class="form-control">
                </div>
                <div class="mb-3 w-50">
                    <label for="" class="form-label">Password : </label>
                    <input type="password" name="password" required placeholder="password" class="form-control">
                </div>
                <div class="float-start">
                    <input type="submit" name="login" value="login" class="btn btn-primary">
                </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password' AND aktif=1 ";

        $count = $db->rowCount($sql);

        if ($count == 0) {
            echo "<center><h3>email atau password salah</h3></center>";
        }
        else {
            $sql = "SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password' AND aktif=1 ";
            $row = $db->getITEM($sql);

            $_SESSION['pelanggan']=$row['email'];
            $_SESSION['idpelanggan']=$row['idpelanggan'];

            header("location:?f=home&m=produk");
        }
    }

?>