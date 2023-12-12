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
                    <h1 class="h3 mb-2 text-gray-800">Tambah Jadwal Pemutaran Film</h1>


                    <div class="card shadow mb-4 p-4">
                        <form action="./lib/do_add_playing.php" method="POST" class="form-group">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-2">
                                    <label for="film_id">Film</label>
                                    <select name="film_id" id="film_id" class="form-control">
                                        <option value="" selected>-- Pilih Film --</option>
                                        
                                        <?php
                                            $query = "SELECT * FROM movies WHERE status = 'active' ORDER BY title ASC";
                                            $result = $db->query($query);
                                            

                                            if ($result->num_rows > 0) {
                                                // Output data of each row
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['title'] ?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="studio_id">Studio</label>
                                    <select name="studio_id" id="studio_id" class="form-control">
                                        <option value="" selected>-- Pilih Studio --</option>
                                        
                                        <?php
                                            $query = "SELECT * FROM studios WHERE status = 'active' ORDER BY name ASC";
                                            $result = $db->query($query);
                                            

                                            if ($result->num_rows > 0) {
                                                // Output data of each row
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="time">Tayang Pada</label>
                                    <input type="datetime-local" class="form-control" name="time" id="time">
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