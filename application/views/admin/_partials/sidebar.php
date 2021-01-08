<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">

                <!-- DASHBOARD -->
                <div class="sidenav-menu-heading">Dashboard</div>
                <a class="nav-link" href="<?php echo base_url('admin/Dashboard') ?>">
                    <div class="nav-link-icon"><i data-feather="home"></i></div>
                    Dashboard
                </a>

                <!-- ABOUT -->
                <div class="sidenav-menu-heading">Master Data</div>
                <a class="nav-link" href="<?php echo base_url('admin/About') ?>">
                    <div class="nav-link-icon"><i data-feather="user"></i></div>
                    About
                </a>

                <!-- Account -->
                <!-- <a class="nav-link collapsed" href="<?php echo base_url('admin/Account') ?>">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    Account
                </a> -->

                <!-- CATEGORY -->
                <a class="nav-link collapsed" href="<?php echo base_url('admin/Category') ?>">
                    <div class="nav-link-icon"><i data-feather="grid"></i></div>
                    Category
                </a>

                <!-- CONTACT -->
                <a class="nav-link" href="<?php echo base_url('admin/Contact') ?>">
                    <div class="nav-link-icon"><i data-feather="mail"></i></div>
                    Contact
                </a>

                <!-- HERO -->
                <a class="nav-link collapsed" href="<?php echo base_url('admin/Hero') ?>">
                    <div class="nav-link-icon"><i data-feather="image"></i></div>
                    Hero
                </a>

                <!-- PAGE -->
                <a class="nav-link collapsed" href="<?php echo base_url('admin/Skill/data') ?>">
                    <div class="nav-link-icon"><i data-feather="monitor"></i></div>
                    Skill
                </a>

                <!-- PROJECT -->
                <a class="nav-link collapsed" href="<?php echo base_url('admin/Project/data') ?>">
                    <div class="nav-link-icon"><i data-feather="file-text"></i></div>
                    Project
                </a>

                <!-- QUOTE -->
                <a class="nav-link collapsed" href="<?php echo base_url('admin/Quote/data') ?>">
                    <div class="nav-link-icon"><i data-feather="message-square"></i></div>
                    Quote
                </a>

                <!-- SKILL -->
                <!-- <a class="nav-link collapsed" href="<?php echo base_url('admin/Skill/data') ?>">
                    <div class="nav-link-icon"><i data-feather="monitor"></i></div>
                    Skill
                </a> -->

            </div>
        </div>
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title"><?= $Pengguna['name']?></div>
            </div>
        </div>
    </nav>
</div>