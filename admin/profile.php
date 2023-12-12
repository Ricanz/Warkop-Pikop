<?php
include './partials/head.php';
include '../config/function_library.php';

$id = $_SESSION['id'];

$data = global_select_single('users', '*', "id='$id'");

?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include './partials/sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include './partials/topbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Ubah Profile</h1>


                    <div class="card shadow mb-4 p-4">
                        <form action="./lib/do_update_profile.php" method="POST" class="form-group">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-2">
                                    <label for="name">Nama</label>
                                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $data['id'] ?>">
                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $data['name'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $data['email'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="phone_number">No Telepon</label>
                                    <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo $data['phone_number'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
                                </div>
                            </div>
                            <hr>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Simpan</button>
                        </form>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include './partials/footer.php' ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include './partials/others.php' ?>

    <?php
    include './partials/scripts.php'
    ?>

</body>

</html>