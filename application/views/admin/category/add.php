<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php $this->load->view("admin/_partials/head.php") ?>
<?php $this->load->view("admin/_partials/modal/save.php")?>

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
                                <div class="page-header-icon"><i data-feather="grid"></i></div>
                                <span>Add New Category</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                <form action="" method="post">
                    <div class="card mb-4">
                        <div class="card-header">Add New Category</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-12 col-sm-12">
                                    <label>Category Name</label>
                                    <input class="form-control" id="category_name" name="category_name" type="text" placeholder="Category Name" />
                                </div>
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