<?php
include './partials/head.php';
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
                    <h1 class="h3 mb-2 text-gray-800">Tambah Franchise</h1>


                    <div class="card shadow mb-4 p-4">
                        <form action="./lib/do_add_product.php" method="POST" class="form-group" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-2">
                                    <label for="title">Judul</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Masukkan Judul Franchise">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="price">Harga</label>
                                    <input type="text" class="form-control" name="price" id="price" placeholder="Masukkan Harga Franchise">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="icon">Icon</label>
                                    <input type="hidden" name="def_icon">
                                    <input type="file" class="form-control" name="icon" id="icon" accept="image/*" onchange="displayIcon(this)" />
                                    <img id="uploadedIcon" src="" alt="Uploaded Icon" style="width: 50px; max-width: 100%; display: none; margin-top: 10px;">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="poster">Banner</label>
                                    <input type="file" class="form-control" name="poster" id="poster" accept="image/*" onchange="displayImage(this)" />
                                    <img id="uploadedImage" src="" alt="Uploaded Image" style="width: 200px; max-width: 100%; display: none; margin-top: 10px;">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="description">Deskripsi</label>
                                    <textarea class="form-control ckeditor"  name="description" id="description" cols="30" rows="10"></textarea>
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
        function displayIcon(input) {
            var uploadedIcon = document.getElementById('uploadedIcon');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    uploadedIcon.src = e.target.result;
                    uploadedIcon.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>

</html>