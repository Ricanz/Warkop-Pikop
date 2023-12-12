<?php
include './partials/head.php';
include '../config/connection.php';
include '../config/function_library.php';

$id = $_GET['id'];
$data = global_select_single('playings', '*', "id=$id");
$film_id = $data['film_id'];
$studio_id = $data['studio_id'];
$film = global_select_single('movies', 'title, price', "id=$film_id");
$studio = global_select_single('studios', 'name, seat', "id=$studio_id");
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
                    <h1 class="h3 mb-2 text-gray-800">Detail Kursi</h1>
                    <h1 class="h4 mb-2 text-gray-800"><?php echo $film['title'] ?></h1>
                    <h1 class="h4 mb-2 text-gray-800"><?php echo $studio['name'] ?></h1>
                    <h1 class="h5 mb-2 text-gray-800"><?php echo $data['playing_time'] ?></h1>

                    <div id="resetBtn" class="btn btn-danger">Reset</div>

                    <div class="process-seat">
                        <div class="seat-map">
                            <?php
                            // Anda dapat menggunakan PHP untuk menghasilkan kursi secara dinamis sesuai dengan kebutuhan
                            $totalSeats = floatval($studio['seat']); // Jumlah total kursi

                            $num = 1;
                            for ($i = 1; $i <= $totalSeats; $i++) {
                                // Menentukan label sesuai dengan kelompok 10 kursi
                                $label = chr(65 + floor(($i - 1) / 10)); // ASCII 'A' dimulai dari 65
                                $label_seat = $label . $num;

                                // Pindahkan pengecekan status kursi ke dalam blok kondisional
                                if ($check_seat = $db->query("SELECT `taken` FROM `seats` WHERE `playing_id`='$id' AND `taken`='$label_seat' LIMIT 1")) {
                                    if ($check_seat->num_rows > 0) {
                                        $stl = 'seat occupied';
                                    } else {
                                        $stl = 'seat';
                                    }
                                }

                                echo '<div class="' . $stl . '" id="seat-' . $label_seat . '">' . $label_seat . '</div>';

                                // Reset $num setelah mencapai 10 kursi di setiap kelompok
                                if ($i % 10 == 0) {
                                    $num = 1;
                                } else {
                                    $num++;
                                }
                            }
                            ?>
                            <div class="monitor">Layar Bioskop</div>
                        </div>
                        <div class="payment-seat">
                            <div class="card shadow mb-4 p-4">
                                <form action="./lib/do_proses.php" method="POST" class="form-group">
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-2">
                                            <label for="name">Kursi yang dipilih</label>
                                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id ?>">
                                            <input type="text" class="form-control" name="selectedSeatInput" id="selectedSeatInput" placeholder="Masukkan Nama Studio">
                                        </div>
                                        <div class="col-sm-12 mb-2">
                                            <label for="seat">Total tiket</label>
                                            <input type="text" class="form-control" name="totalTicket" id="totalSeat" placeholder="Masukkan Total Kursi">
                                        </div>
                                        <div class="col-sm-12 mb-2">
                                            <label for="seat">Total Harga</label>
                                            <input disabled type="hidden" class="form-control" name="price" id="price" value="<?php echo $film['price'] ?>">
                                            <input type="text" class="form-control" name="totalPrice" id="totalPrice" placeholder="Masukkan Total Harga">
                                        </div>
                                        <div class="col-sm-12 mb-2">
                                            <label for="dibayar">Bayar</label>
                                            <input type="number" class="form-control" name="dibayar" id="dibayar" oninput="bayar(event)">
                                        </div>
                                        <div class="col-sm-12 mb-2">
                                            <label for="kembalian">Kembalian</label>
                                            <input type="number" class="form-control" name="kembalian" id="kembalian">
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Simpan</button>
                                </form>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var selectedSeats = []; // Variabel untuk menyimpan ID kursi yang dipilih

            var seats = document.querySelectorAll('.seat');
            seats.forEach(function(seat) {
                seat.addEventListener('click', function() {
                    var clickedSeat = this;

                    // Cek apakah kursi sudah diisi (mempunyai class "occupied")
                    if (!clickedSeat.classList.contains('occupied')) {
                        // Toggle class "choose" pada elemen yang diklik
                        clickedSeat.classList.toggle('choose');

                        // Dapatkan ID dari kursi yang diklik
                        var seatId = clickedSeat.id;

                        // Tambahkan atau hapus ID dari variabel selectedSeats
                        var index = selectedSeats.indexOf(seatId);
                        if (index === -1) {
                            selectedSeats.push(seatId);
                        } else {
                            selectedSeats.splice(index, 1);
                        }

                        $('#selectedSeatInput').val(selectedSeats);
                        $('#totalSeat').val(selectedSeats.length);

                        var price = $('#price').val();

                        var totalPrice = selectedSeats.length * price;
                        $('#totalPrice').val(totalPrice);


                        // Tampilkan ID kursi yang dipilih
                        console.log(selectedSeats);
                    } else {
                        // Kursi sudah diisi, tindakan lain atau abaikan
                        alert("Kursi ini sudah diisi. Pilih kursi yang kosong.");
                    }
                });
            });

            $("#resetBtn").on("click", function() {
                // Hapus kelas "choose" dari semua elemen kursi
                var seats = document.querySelectorAll('.seat');
                seats.forEach(function(seat) {
                    seat.classList.remove('choose');
                });

                // Kosongkan variabel selectedSeats
                selectedSeats = [];

                // Update nilai input
                $('#selectedSeatInput').val(selectedSeats);
                $('#totalSeat').val(selectedSeats.length);
                $('#totalPrice').val(0);

                alert("Kursi telah di-reset.");
            });

            $("#prosesBtn").on("click", function() {
                // Tampilkan konfirmasi
                var confirmation = confirm("Apakah Anda yakin ingin melanjutkan?");

                // Jika pengguna menekan "OK" dalam konfirmasi
                if (confirmation) {
                    // Kirim data ke backend menggunakan AJAX
                    var playing_id = "<?php echo $id; ?>";
                    $.ajax({
                        type: "POST",
                        url: "lib/do_proses.php?id=" + playing_id,
                        data: {
                            selectedSeats: selectedSeats,
                            id: playing_id
                        },
                        success: function(response) {
                            // Tanggapan dari backend
                            console.log(response);

                            // Reload halaman
                            location.reload();

                            // Handle tanggapan sesuai kebutuhan Anda
                        },
                        error: function(error) {
                            console.error("Error:", error);
                        }
                    });
                } else {
                    location.reload();
                }
            });
        });

        function bayar(e) {
            var value = e.target.value;
            var totalPrice = $('#totalPrice').val();

            var kembalian = value - totalPrice;
            $('#kembalian').val(kembalian);
        }
    </script>

</body>

</html>