<?php
include './partials/head.php';
include '../config/connection.php';
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
                    <h1 class="h3 mb-2 text-gray-800">Daftar Film</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Manajemen Studio</h6>
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
                                            <th width="54%">Studio</th>
                                            <th style="text-align: center;">Total Kursi</th>
                                            <th width="20%" style="text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM studios WHERE status = 'active' ORDER BY name ASC";
                                            $result = $db->query($query);
                                            

                                            if ($result->num_rows > 0) {
                                                // Output data of each row
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $row['name'] ?></td>
                                                            <td style="text-align: center;"><?php echo $row['seat'] ?></td>
                                                            <td style="text-align: center;">
                                                                <a href="<?php echo './edit-studio.php?id='.$row['id'] ?>" class="btn btn-warning btn-sm">Detail</a>
                                                                <a href="<?php echo './lib/delete_studio.php?id='.$row['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
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