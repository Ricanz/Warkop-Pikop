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
                    <h1 class="h3 mb-2 text-gray-800">Laporan Pendapatan Film</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Laporan</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            $total_pendapatan = 0;
                            if (isset($_GET['success'])) {
                                $successMessage = urldecode($_GET['success']);
                                echo '<div style="color: green;">' . htmlspecialchars($successMessage) . '</div>';
                            }

                            if (isset($_POST['filter_range_total'])) {
                                // Baca nilai parameter start_date dan end_date
                                $start_date = $_POST['start_date'];
                                $end_date = $_POST['end_date'];
                                $studio_id = $_POST['studio_id'];

                                $sql_film = $studio_id !== '' ? "AND studios.id = $studio_id" : '';
                                $sql_range = ($start_date !== '' && $end_date !== '') ? "AND transactions.created_at BETWEEN STR_TO_DATE('$start_date', '%Y-%m-%d') AND STR_TO_DATE('$end_date', '%Y-%m-%d %H:%i:%s')" : '';
                                
                                $query = "
                                    SELECT
                                        DATE(transactions.created_at) AS tanggal_transaksi,
                                        studio_id, name AS studio,
                                        COUNT(*) AS jumlah_transaksi,
                                        SUM(transactions.total_price) AS total_harga_per_hari
                                    FROM transactions
                                    JOIN playings ON transactions.playing_id = playings.id
                                    JOIN studios ON playings.studio_id = studios.id
                                    WHERE transactions.status = 'done' 
                                    $sql_film
                                    $sql_range
                                    GROUP BY tanggal_transaksi, studio_id
                                    ORDER BY tanggal_transaksi, studio_id;
                                ";
                            } else {
                                $query = "
                                    SELECT
                                        DATE(transactions.created_at) AS tanggal_transaksi,
                                        studio_id, name AS studio,
                                        COUNT(*) AS jumlah_transaksi,
                                        SUM(transactions.total_price) AS total_harga_per_hari
                                    FROM transactions
                                    JOIN playings ON transactions.playing_id = playings.id
                                    JOIN studios ON playings.studio_id = studios.id
                                    WHERE transactions.status = 'done'
                                    GROUP BY tanggal_transaksi, studio_id
                                    ORDER BY tanggal_transaksi, studio_id;
                                ";
                            }

                            $result = $db->query($query);
                            if ($result->num_rows > 0) {

                                while ($row = $result->fetch_assoc()) {
                                    // Konversi format tanggal
                                    $total_pendapatan = $total_pendapatan + floatval($row['total_harga_per_hari']);
                                }
                            }
                            ?>
                            <form action="" method="POST" class="form-group" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-3 mb-2">
                                        <label for="start_date">Tanggal Awal</label>
                                        <input type="date" class="form-control" name="start_date" id="start_date">
                                    </div>
                                    <div class="col-sm-3 mb-2">
                                        <label for="end_date">Tanggal Akhir</label>
                                        <input type="date" class="form-control" name="end_date" id="end_date">
                                    </div>
                                    <div class="col-sm-3 mb-2">
                                        <label for="studio_id">Studio</label>
                                        <select name="studio_id" id="studio_id" class="form-control">
                                            <option value="" selected>-- Pilih Studio --</option>

                                            <?php
                                            $q_studio = "SELECT * FROM studios WHERE status = 'active' ORDER BY name ASC";
                                            $res_film = $db->query($q_studio);


                                            if ($res_film->num_rows > 0) {
                                                // Output data of each row
                                                while ($row = $res_film->fetch_assoc()) {
                                            ?>
                                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 mb-2">
                                        <label for="end_date">Filter</label>
                                        <button type="submit" name="filter_range_total" class="btn btn-primary btn-block">Terapkan</button>
                                    </div>
                                </div>
                            </form>
                            <div class="col-sm-3 mb-2">
                                <label for="total">Total Pendapatan : </label>
                                <div class="total">
                                    <label for="total" style="font-size: 20px; color: green;">Rp. <?php echo number_format($total_pendapatan) ?></label>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="20%">Tanggal</th>
                                            <th width="30%">Studio</th>
                                            <th style="text-align: center;">Total Transaksi</th>
                                            <th width="20%" style="text-align: center;">Total Pendapatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $res = $db->query($query);

                                        if ($res->num_rows > 0) {
                                            // Output data of each row
                                            while ($row = $res->fetch_assoc()) {
                                                // Konversi format tanggal
                                                $tanggal_transaksi = date("Y-m-d", strtotime($row['tanggal_transaksi']));
                                        ?>
                                                <tr>
                                                    <td><?php echo $tanggal_transaksi; ?></td>
                                                    <td><?php echo $row['studio']; ?></td>
                                                    <td style="text-align: center;"><?php echo $row['jumlah_transaksi']; ?></td>
                                                    <td style="text-align: center;">Rp. <?php echo number_format($row['total_harga_per_hari']); ?></td>
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