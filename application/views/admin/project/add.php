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
                            <div class="row">
                                <div class="form-group col-lg-4 col-sm-12">
                                    <label>Project Name</label>
                                    <input class="form-control" name="project_name" type="text" placeholder="Project Name" />
                                </div>
                                <div class="form-group col-lg-4 col-sm-12">
                                    <label>Company</label>
                                    <input class="form-control" name="company" type="text" placeholder="Company" />
                                </div>
                                <div class="form-group col-lg-4 col-sm-12">
                                    <label>Category</label>
                                    <select class="form-control" name="category">
                                    <?php foreach($kat as $k){?>
                                        <option value="<?= $k['id']?>"><?= $k['name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4 col-sm-6">
                                    <label>Date</label>
                                    <input class="form-control" name="date_start" type="date" placeholder="DD/MM/YYYY" />
                                </div>
                                <!-- <div class="form-group col-lg-4 col-sm-12">
                                    <label>Date End</label>
                                    <input class="form-control" name="date_end" type="date" placeholder="DD/MM/YYYY" />
                                </div> -->
                                <div class="form-group col-lg-4 col-sm-6">
                                    <label>Project Picture</label>
                                    <input name="project_picture" id="project_picture" type="file" accept="image/*" class="form-control border-dark small mb-3" placeholder="" aria-describedby="basic-addon2">
                                </div>
                               
                                <div class="col-sm-12 col-lg-4">
                                    <div class="input-group">
                                        <label>Image Preview</label>
                                        <br/>
                                        <img id="preview" src="" alt="" style="width:140px"/> <br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-lg-4 col-sm-12">
                                    <label>Url</label>
                                    <input class="form-control" name="url" type="text" placeholder="Url" />
                            </div>
                            <div class="form-group col-lg-4 col-sm-12">
                                    <label>Project Description</label>
                                    <textarea class="form-control" name="project_description" name="project_description" rows="2" cols="50"></textarea>
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

        $("#project_picture").change(function() {
            readURL(this);
        });</script>
</html>