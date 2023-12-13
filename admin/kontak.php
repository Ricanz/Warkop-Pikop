<?php
include './partials/head.php';
include '../config/function_library.php';


$data = global_select_single('contact', '*', "id='1'");

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
                    <h1 class="h3 mb-2 text-gray-800">Kontak Pikop</h1>


                    <div class="card shadow mb-4 p-4">
                        <form action="./lib/do_update_contact.php" method="POST" class="form-group" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-2">
                                    <label for="poster">Foto</label>
                                    <input type="hidden" name="def_poster" value="<?php echo $data['image'] ?>">
                                    <input type="file" class="form-control" name="poster" id="uploadInput" accept="image/*,application/pdf" onchange="displayImage(this)" /><?php 
                                        if ($data['image'] === null or $data['image'] === '') {
                                            echo '<img id="uploadedImage" src="" alt="Uploaded Image" style="width: 100px; max-width: 100%; display: none; margin-top: 10px;">';
                                        } else {
                                            echo '<img id="uploadedImage" src="'. $baseUrl . $data['image'].'" alt="Uploaded Image" style="width: 100px; max-width: 100%; margin-top: 10px;">';
                                        }
                                    ?>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $data['id'] ?>">
                                    <label for="title">Judul</label>
                                    <input type="text" class="form-control" name="title" id="title" value="<?php echo $data['title'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="phone_number">Nomor Telepon</label>
                                    <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo $data['phone_number'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $data['email'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="website">Website</label>
                                    <input type="text" class="form-control" name="website" id="website" value="<?php echo $data['website'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" class="form-control" name="facebook" id="facebook" value="<?php echo $data['facebook'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" class="form-control" name="twitter" id="twitter" value="<?php echo $data['twitter'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" class="form-control" name="instagram" id="instagram" value="<?php echo $data['instagram'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="address">Alamat</label>
                                    <textarea class="form-control ckeditor"  name="address" id="address" cols="30" rows="10"><?php echo $data['address'] ?></textarea>
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
        function displayImage(input) {
            var uploadedImage = document.getElementById('uploadedImage');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    uploadedImage.src = e.target.result;
                    uploadedImage.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>

</html>