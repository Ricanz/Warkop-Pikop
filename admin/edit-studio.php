<?php
include './partials/head.php';
include '../config/function_library.php';

if (isset($_GET['id'])) {
    $id = urldecode($_GET['id']);
}
$data = global_select_single('studios', '*', "id='$id'");

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
                    <h1 class="h3 mb-2 text-gray-800">Ubah Studio</h1>


                    <div class="card shadow mb-4 p-4">
                        <form action="./lib/do_update_studio.php" method="POST" class="form-group">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-2">
                                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $data['id'] ?>">
                                    <label for="name">Nama Studio</label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $data['name'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="seat">Total Kursi</label>
                                    <input type="text" class="form-control" name="seat" id="seat" value="<?php echo $data['seat'] ?>">
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