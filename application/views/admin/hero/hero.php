<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php $this->load->view("admin/_partials/head.php") ?>
<!-- <?php $this->load->view("admin/_partials/modal/save.php") ?> -->

<body class="nav-fixed">

    <!-- Topbar -->
    <?php $this->load->view("admin/_partials/topbar.php") ?>

    <div id="layoutSidenav">

        <!-- Sidebar -->
        <?php $this->load->view("admin/_partials/sidebar.php") ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                    <div class="container-fluid">
                        <div class="page-header-content">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="image"></i></div>
                                <span>Hero</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="card mb-4">
                            <div class="card-header">Hero Menu</div>
                            <div class="card-body">
                                <div class="col">
                                    <?php echo $this->session->flashdata('pesan') ?>
                                </div>
                                <?php foreach ($data as $d) { ?>
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label>Profile Name</label>
                                            <input class="form-control" id="profile_name" name="profile_name" type="text" placeholder="Profile Name" value="<?= $d['name'] ?>" />
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label>Profession</label>
                                            <input class="form-control" id="profession" name="profession" type="text" placeholder="Profession" value="<?= $d['profession'] ?>" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <p>Upload Background Photo</p>
                                            <div class="form-group">
                                                <input name="background" id="background" name="background" type="file" accept="image/*" onchange="tampilkanPreview(this, 'preview')" class="form-control border-dark small mb-3 my-auto" placeholder="" aria-describedby="basic-addon2">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="input-group">
                                                <label>Image Preview</label>
                                                <br />
                                                <img id="preview" src="" alt="" width="320px" /> <br>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <button name="save" id="save" type="submit" class="btn btn-primary mr-2" href="#">
                            Save
                        </button>
                        <a class="btn btn-danger" href="javascript:history.go(-1)">
                            Cancel
                        </a>
                    </form>
                </div>
            </main>

            <!-- Footer -->
            <?php $this->load->view("admin/_partials/footer.php") ?>

        </div>
    </div>

    <!-- JS -->
    <?php $this->load->view("admin/_partials/js.php") ?>

</body>
<script>
 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#background").change(function() {
            readURL(this);
        });
</script>
</html>