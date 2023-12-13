<?php
include './partials/head.php';
include '../config/function_library.php';


$data = global_select_single('about', '*', "slug='about'");

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
                    <h1 class="h3 mb-2 text-gray-800">Tentang Pikop</h1>


                    <div class="card shadow mb-4 p-4">
                        <form action="./lib/do_update_about.php" method="POST" class="form-group" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-2">
                                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $data['id'] ?>">
                                    <label for="title">Judul</label>
                                    <input type="text" class="form-control" name="title" id="title" value="<?php echo $data['title'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="description">Deskripsi</label>
                                    <textarea class="form-control ckeditor"  name="description" id="description" cols="30" rows="10"><?php echo $data['description'] ?></textarea>
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