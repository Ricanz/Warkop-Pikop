<?php
include './partials/head.php';
include '../config/connection.php';

if (isset($_GET['type'])) {
    $type = strtolower(urldecode($_GET['type']));
} else {
    $type = 'user';
}
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
                    <h1 class="h3 mb-2 text-gray-800">Tambah <?php echo ucwords($type) ?></h1>


                    <div class="card shadow mb-4 p-4">
                        <form action="./lib/do_add_user.php" method="POST" class="form-group">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-2">
                                    <label for="name">Nama</label>
                                    <input type="hidden" class="form-control" name="role" id="role" value="<?php echo strtolower($type) ?>">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan Email">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="phone_number">No Telepon</label>
                                    <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Masukkan Nomor Telepon">
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