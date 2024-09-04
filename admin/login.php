<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LOG IN ADMIN</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <!-- Teks DASHMIN dihapus -->
                            <h3>Sign In</h3>
                        </div>
                        <?php if(!empty($_GET['gagal'])){?>
                        <?php if($_GET['gagal']=="userKosong"){?>
                            <span class="text-danger">
                            Maaf Username Tidak Boleh Kosong
                            </span>
                            <?php } else if($_GET['gagal']=="passKosong"){?>
                            <span class="text-danger">
                            Maaf Password Tidak Boleh Kosong
                            </span>
                            <?php } else {?>
                            <span class="text-danger">
                            Maaf Username dan Password Anda Salah
                            </span>
                            <?php }?>
                         <?php }?>
                        <!-- Form login -->
                        <form action="konfirmasilogin.php" method="POST">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username" required>
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                                <label for="floatingPassword">Password</label>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Log In</button>
                        </form>
                        <!-- End of Form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>
</body>

</html>