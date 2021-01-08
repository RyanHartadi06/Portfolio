<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php $this->load->view("admin/_partials/head.php") ?>
<?php $this->load->view("admin/_partials/modal/save.php") ?>

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
                                <div class="page-header-icon"><i data-feather="edit-3"></i></div>
                                <span>Edit Skill</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <form action="" method="post">
                    <div class="card mb-4">
                        <div class="card-header">Edit Skill</div>
                        <div class="card-body">
                            <div class="row">
                                <?php foreach($data as $d){?>
                                <div class="form-group col-lg-4 col-sm-12">
                                    <label>Skill Name</label>
                                    <input class="form-control" id="skill_name" name="skill_name" type="text" placeholder="Skill Name" value="<?= $d['name']?>" />
                                </div>
                                <div class="form-group col-lg-4 col-sm-12">
                                    <label>Skill Percentage</label>
                                    <input class="form-control" id="skill_percentage" name="skill_percentage" type="text" placeholder="Skill Percentage" value="<?= $d['persentase']?>"/>
                                </div>
                                <div class="form-group col-lg-4 col-sm-12">
                                    <label>Status</label>
                                    <select class="form-control" id="skill_status"name="skill_status">
                                    <?php if($d['active'] == 1){?>
                                        <option value="1">Active</option>
                                        <option value="0">Disabled</option>
                                    <?php } else {?>
                                        <option value="0">Disabled</option>
                                        <option value="1">Active</option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <?php } ?>
                            </div>
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