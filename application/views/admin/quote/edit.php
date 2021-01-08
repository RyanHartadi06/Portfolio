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
                <span>Edit Quote</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <form action="" method="post">
            <div class="card mb-4">
              <div class="card-header">Edit Quote</div>
              <div class="card-body">
                <?php foreach ($data as $d) { ?>
                  <div class="row">
                    <div class="form-group col-lg-4 col-sm-12">
                      <label>Page</label>
                      <select class="form-control" name="page">
                        <?php if ($d['page'] == "skill") { ?>
                          <option value="skill">Skill</option>
                          <option value="footer">Footer</option>
                          <option value="portfolio">Portfolio</option>
                        <?php } else if ($d['page'] == "footer") { ?>
                          <option value="footer">Footer</option>
                          <option value="skill">Skill</option>
                          <option value="portfolio">Portfolio</option>
                        <?php } else { ?>
                          <option value="portfolio">Portfolio</option>
                          <option value="footer">Footer</option>
                          <option value="skill">Skill</option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group col-lg-8 col-sm-12">
                      <label>Quote</label>
                      <input class="form-control" name="quote" type="text" placeholder="Quote" value="<?= $d['quote'] ?>" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-4 col-sm-12">
                      <label>Status</label>
                      <select class="form-control" name="page_status">
                        <?php if ($d['active'] == 1) { ?>
                          <option value="1">Active</option>
                          <option value="0">Disabled</option>
                        <?php } else { ?>
                          <option value="1">Active</option>
                          <option value="0">Disabled</option>
                        <?php }  ?>
                      </select>
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