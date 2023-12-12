<?php
include './partials/head.php';
include '../config/connection.php';
include '../config/function_library.php';
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
                    <h1 class="h3 mb-2 text-gray-800">Daftar Pemutaran Film</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="display: flex; align-items: center; justify-content: space-between;">
                            <h6 class="m-0 font-weight-bold text-primary">Manajemen Pemutaran Film</h6>
                            <?php if ($_SESSION['role'] === 'admin') { ?>
                                <a href="add-playing.php" class="btn btn-success">Tambah Jadwal Pemutaran Film</a>
                            <?php } ?>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['success'])) {
                                $successMessage = urldecode($_GET['success']);
                                echo '<div style="color: green;">' . htmlspecialchars($successMessage) . '</div>';
                            }
                            ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="30%">Judul Film</th>
                                            <th width="15%" style="text-align: center;">Studio</th>
                                            <th width="20%" style="text-align: center;">Jadwal Tayang</th>
                                            <th width="12%" style="text-align: center;">Total Kursi</th>
                                            <th width="20%" style="text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM playings WHERE status = 'active' ORDER BY playing_time ASC";
                                        $result = $db->query($query);


                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                $film_id = $row['film_id'];
                                                $studio_id = $row['studio_id'];
                                                $film = global_select_single('movies', 'title', "id=$film_id");
                                                $studio = global_select_single('studios', 'name, seat', "id=$studio_id");

                                        ?>
                                                <tr>
                                                    <td><?php echo $film['title'] ?></td>
                                                    <td style="text-align: center;"><?php echo $studio['name'] ?></td>
                                                    <td style="text-align: center;"><?php echo ubahFormatTanggal($row['playing_time']) ?></td>
                                                    <td style="text-align: center;"><?php echo $studio['seat'] ?></td>
                                                    <td style="text-align: center;">
                                                        <?php if ($_SESSION['role'] === 'admin') { ?>
                                                            <a href="<?php echo './edit-playing.php?id=' . $row['id'] ?>" class="btn btn-warning btn-sm mt-2">Detail</a>
                                                            <a href="<?php echo './lib/delete_playing.php?id=' . $row['id'] ?>" class="btn btn-danger btn-sm mt-2">Hapus</a>
                                                        <?php } ?>
                                                        <a href="<?php echo './proses.php?id=' . $row['id'] ?>" class="btn btn-success btn-sm mt-2">Proses</a>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

    <!-- Page level plugins -->
    <script src="./assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="./assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="./assets/js/demo/datatables-demo.js"></script>

</body>

</html>