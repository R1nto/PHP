<?php
    session_start();
     require_once "../dbcontroller.php";
    $db = new DB; 

    if (!isset($_SESSION['user'])) {
        header("location:login.php");
    }
    if (isset($_GET['log'])) {
        session_destroy();
        header("location:index.php");
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Admin page | Aplikasi Restoran</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-3">
            <!-- <div class="row mt-1"> -->
                    <div class="col-md-10">
                    <div class="float-end mt-2">
                    <a href="index.php"><h3>Admin Page</h3></a>
                    </div>
                    <div class="float-start">
                    <?php
                    $level = $_SESSION['level'];
                    switch ($level) {
                        case 'admin':
                            echo '
                            <nav class="navbar">
                            <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link active" href="?f=kategori&m=select">Kategori</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="?f=menu&m=select">Menu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="?f=pelanggan&m=select">Pelanggan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="?f=order&m=select">Order</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="?f=orderdetail&m=select">Order Detail</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="?f=user&m=select">User</a>
                                </li>
                                </div>
                                </div>
                                </div>
                            </nav>
                            ';
                            break;
                        case 'kasir':
                            echo '
                            <nav class="navbar bg-light>
                            <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link active" href="?f=order&m=select">Order</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="?f=orderdetail&m=select">Order Detail</a>
                                </li>
                                </div>
                                </div>
                                </div>
                            </nav>
                            ';
                            break;
                        case 'koki':
                            echo '
                            <nav class="navbar bg-light>
                            <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link active" href="?f=orderdetail&m=select">Order Detail</a>
                                </li>
                                </div>
                                </div>
                                </div>
                            </nav>';
                            break;
                        default:
                            echo 'data tidak ada';
                            break;
                    }?>
                    </div>
                    </div>
            </div> 
            <div class="col-md-9">
                <div class="float-end mt-4"><a href="?log=logout">Logout</a></div>
                <div class="float-end me-4 mt-4 ">User : <a href="?f=user&m=updateuser&id=<?php echo $_SESSION['iduser'] ?>"><?php echo $_SESSION['user'] ?></a></div>
                <div class="float-end me-4 mt-4 ">Level : <?php echo $_SESSION['level']?> </div>
            </div>
        </div>
        <hr>
                <?php
                    if (isset($_GET['f']) && isset($_GET['m'])) {
                        $f = $_GET['f'];
                        $m = $_GET['m'];

                        $file = '../'.$f.'/'.$m.'.php';

                        require_once $file;
                    }
                ?>
        </div>

        <div class="row mt-5">
            <div class="col">
               <p class="text-center">2022 - Copyright@OmahKeren</p>
            </div>
        </div>
    </div>
    
</body>
</html>