<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php $this->load->view("admin/_partials/head.php") ?>

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
                                <div class="page-header-icon"><i data-feather="file-text"></i></div>
                                <span>Add New Project</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card mb-4">
                        <div class="card-header">Add New Project</div>
                        <div class="card-body">
                        <?php foreach($ku as $b){?>
                            <div class="row">
                                <div class="form-group col-lg-4 col-sm-12">
                                    <label>Project Name</label>
                                    <input class="form-control" name="project_name" type="text" placeholder="Project Name" value="<?= $b['name']?>"/>
                                </div>
                                <div class="form-group col-lg-4 col-sm-12">
                                    <label>Company</label>
                                    <input class="form-control" name="company" type="text" placeholder="Company"  value="<?= $b['nama_instansi']?>"/>
                                </div>
                                <div class="form-group col-lg-4 col-sm-12">
                                    <label>Category</label>
                                    <select class="form-control" name="category">
                                    <?php foreach ($kat as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>" <?= ($b['id_kategori'] == $row['id'] ? 'selected' : '') ?>>
                                            <?php echo $row['name']; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <!-- <div class="form-group col-lg-4 col-sm-12">
                                    <label>Date Start</label>
                                    <input class="form-control" id="date_start" type="date" placeholder="DD/MM/YYYY" />
                                </div> -->
                                
                                <div class="form-group col-lg-4 col-sm-12">
                                    <label>Date</label>
                                    <input class="form-control" name="date" type="date" placeholder="DD/MM/YYYY" value="<?= $b['tanggal']?>" />
                                </div>
                                <div class="form-group col-lg-4 col-sm-12">
                                    <label>Project Description</label>
                                    <textarea class="form-control" id="project_description" name="project_description" rows="2" cols="50">
                                    <?= $b['deskripsi']?>
                                    </textarea>
                                </div>
                                <div class="form-group col-lg-4 col-sm-12">
                                    <label>Status</label>
                                    <select class="form-control" name="project_status">
                                    <?php if($b['active'] == 1){?>
                                        <option value="1">Active</option>
                                        <option value="0">Disabled</option>
                                    <?php } else {?>
                                        <option value="0">Disabled</option>
                                        <option value="1">Active</option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4 col-sm-12">
                                    <label>Project Picture</label>
                                    <input name="project_picture" name="project_picture" type="file" accept="image/*" class="form-control border-dark small mb-3" placeholder="" aria-describedby="basic-addon2">
                                </div>
                                <div class="form-group col-lg-4 col-sm-12">
                                    <label>Picture Preview</label>
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

</html>