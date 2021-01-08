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
                                    <label>Github</label>
                                    <input class="form-control" id="github" name="github" type="text" value="<?= $k['github']?>" />
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Twitter</label>
                                    <input class="form-control" id="twitter" name="twitter" type="text" placeholder="twitter" value="<?= $k['twitter']?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Facebook</label>
                                    <input class="form-control" id="fb" name="fb" type="text" placeholder="fb" value="<?= $k['fb']?>"  />
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Instagram</label>
                                    <input class="form-control" id="ig" name="ig" type="text" placeholder="ig" value="<?= $k['ig']?>" />
                                </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-lg-6 col-sm-12">
                                    <label>Whatsapp</label>
                                    <input class="form-control" id="wa" name="wa" type="text" placeholder="wa" value="<?= $k['wa']?>"  />
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Linkedin</label>
                                    <input class="form-control" id="linkedin" name="linkedin" type="text" placeholder="linkedin" value="<?= $k['linkedin']?>" />
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