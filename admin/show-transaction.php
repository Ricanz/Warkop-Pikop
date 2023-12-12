<?php
include './partials/head.php';
include '../config/function_library.php';

if (isset($_GET['id'])) {
    $id = urldecode($_GET['id']);
}
$data = global_select_single('transactions', '*', "id='$id'");

$playing_id = $data['playing_id'];
$playing = global_select_single('playings', '*', "id=$playing_id");
$film_id = $playing['film_id'];
$film = global_select_single('movies', '*', "id=$film_id");
$studio_id = $playing['studio_id'];
$studio = global_select_single('studios', '*', "id=$studio_id");
$status = $data['status'] === 'done' ? 'text-success' : 'text-danger';

$seat = global_select_to_string('seats', 'taken', "transaction_id=$id");


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
                    <h1 class="h3 mb-2 text-gray-800">Detail Transaksi</h1>


                    <div class="card shadow mb-4 p-4">
                        <form action="./lib/do_update_transaction.php" method="POST" class="form-group">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-2">
                                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $data['id'] ?>">
                                    <label for="film_id">Film</label>
                                    <select name="film_id" id="film_id" class="form-control" disabled>
                                        <option value="<?php echo $film_id ?>" selected><?php echo $film['title'] ?></option>
                                    </select>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="studio_id">Studio</label>
                                    <select name="studio_id" id="studio_id" class="form-control" disabled>
                                        <option value="<?php echo $studio_id ?>" selected><?php echo $studio['name'] ?></option>
                                    </select>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="kursi">Kursi</label>
                                    <input type="text" class="form-control" name="kursi" id="kursi" value="<?php echo $seat ?>" disabled>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="total_ticket">Total Ticket</label>
                                    <input type="text" class="form-control" disabled name="total_ticket" id="total_ticket" value="<?php echo $data['total_ticket'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="total_price">Total Harga</label>
                                    <input type="text" class="form-control" disabled name="total_price" id="total_price" value="<?php echo $data['total_price'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="dibayar">Dibayar</label>
                                    <input type="text" class="form-control" name="dibayar" id="dibayar" oninput="bayar(event)" value="<?php echo $data['dibayar'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="kembalian">Kembalian</label>
                                    <input type="text" class="form-control" name="kembalian" id="kembalian" value="<?php echo $data['kembalian'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="<?php echo $data['status'] ?>" selected><?php echo ucwords($data['status']) ?></option>
                                        <option value="done">Done</option>
                                        <option value="pending">Pending</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="status">Bukti Transfer</label> <hr>
                                    <?php
                                    if ($data['bukti_transfer'] === null or $data['bukti_transfer'] === '') {
                                        echo 'Belum ada data Transfer';
                                    } else {
                                        echo '<img id="uploadedImage" src="' . $baseUrl . $data['bukti_transfer'] . '" alt="Uploaded Image" style="width: 300px; max-width: 100%; margin-top: 10px;">';
                                    }
                                    ?>
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
    <script>
        function bayar(e) {
            var value = e.target.value;
            var totalPrice = $('#total_price').val();

            var kembalian = value - totalPrice;
            $('#kembalian').val(kembalian);
        }
    </script>

</body>

</html>