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
                                <div class="page-header-icon"><i data-feather="monitor"></i></div>
                                <span>Skills List</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">
                            <a class="btn btn-primary btn-sm shadow-sm" href="<?php echo base_url('admin/Skill/add') ?>">
                                Add Skill
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="col">
                                <?php echo $this->session->flashdata('pesan') ?>
                            </div>
                            <div class="datatable table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>Skill Name</th>
                                            <th>Skill Percentage</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($data as $d) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $d['name'] ?></td>
                                                <td><?= $d['persentase'] ?>%</td>
                                                <td>
                                                    <?php if ($d['active'] == 1) { ?>
                                                        <div class="badge badge-primary badge-pill">Active</div>
                                                    <?php } else { ?>
                                                        <div class="badge badge-danger badge-pill">Off</div>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-datatable btn-icon btn-transparent-dark" href="<?php echo base_url('admin/Skill/edit/' . $d['id']) ?>"><i data-feather="edit-2"></i></a>
                                                    <?php if ($d['active'] == 1) { ?>
                                                        <a class="btn btn-datatable btn-icon btn-transparent-dark" href="" onclick="confirm_hapus('<?php echo base_url('admin/Skill/off/' . $d['id']) ?>')" data-toggle="modal" data-target="#modalDelete"><i data-feather="trash-2"></i></a>
                                                    <?php } else { ?>
                                                        <a class="btn btn-datatable btn-icon btn-transparent-dark" href="" onclick="confirm_hapus('<?php echo base_url('admin/Skill/on/' . $d['id']) ?>')" data-toggle="modal" data-target="#modalDelete"><i data-feather="trash-2"></i></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Ubah Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">Apakah Anda yakin untuk ubah data?</div>
                      <div class="modal-footer">
                        <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                        <a class="btn btn-danger" id="delete_link" type="button" href="">Ubah</a>
                      </div>
                    </div>
                  </div>
                </div>
                            </div>
                        </div>
                    </div>
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
    function confirm_hapus(add) {
        $('#modalDelete').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', add);
    }
</script>
</html>