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
                                <span>Edit Contact</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Edit Contact</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-4 col-sm-12">
                                    <label>Contact Name</label>
                                    <input class="form-control" id="contact_name" type="text" placeholder="Contact Name" />
                                </div>
                                <div class="form-group col-lg-4 col-sm-12">
                                    <label>Link</label>
                                    <input class="form-control" id="contact_link" type="text" placeholder="Link" />
                                </div>
                                <div class="form-group col-lg-4 col-sm-12">
                                    <label>Status</label>
                                    <select class="form-control" id="contact_status">
                                        <option>Choose Status</option>
                                        <option>Active</option>
                                        <option>Disabled</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary mr-2" href="#" data-toggle="modal" data-target="#modalSave">
                        Save
                    </a>
                    <a class="btn btn-danger" href="javascript:history.go(-1)">
                        Cancel
                    </a>
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