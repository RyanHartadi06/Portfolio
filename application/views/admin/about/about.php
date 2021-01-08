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
                                <div class="page-header-icon"><i data-feather="user"></i></div>
                                <span>About</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="card mb-4">
                        <div class="card-header">About Menu</div>
                        <?php foreach($ku as $k){?>
                        <div class="card-body">
                            <div class="col">
                                <?php echo $this->session->flashdata('pesan') ?>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Birthday</label>
                                    <input class="form-control" id="birthday" name="birthday" type="date" placeholder="DD/MM/YYYY" value="<?= $k['birthday']?>" />
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Age</label>
                                    <input class="form-control" id="age" name="age" type="text" placeholder="Age" value="<?= $k['umur']?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>City</label>
                                    <input class="form-control" id="city" name="city" type="text" placeholder="City" value="<?= $k['kota']?>"  />
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Website</label>
                                    <input class="form-control" id="website" name="website" type="text" placeholder="Website" value="<?= $k['website']?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Description</label>
                                    <textarea class="form-control" id="description" name="description" type="text" placeholder="Description">
                                    <?= $k['deskripsi']?>
                                    </textarea>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Freelance Status</label>
                                    <input class="form-control" id="freelance_status" name="freelance_status" type="text" placeholder="Freelance Status" value="<?= $k['freelance']?>"  />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-lg-6">
                                    <p>Upload Profile Photo</p>
                                    <div class="form-group">
                                        <input id="foto" name="foto" type="file" accept="image/*" onchange="tampilkanPreview(this, 'preview')" class="form-control border-dark small mb-3 my-auto" placeholder="" aria-describedby="basic-addon2">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <div class="input-group">
                                        <label>Image Preview</label>
                                        <img id="preview" src="" alt="" /> <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <button name="save" id="save" type="submit" class="btn btn-primary mr-2" href="#" data-toggle="modal" data-target="#modalSave">
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

</html>