<!DOCTYPE html>
<html lang="tr">
<head>
    <?php $this->load->view("includes/head"); ?>
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/assets/nestable/jquery-nestable.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
<!--============= start main area -->

<!-- APP NAVBAR ==========-->

    <!--========== END app navbar -->
    <?php $this->load->view("includes/navbar"); ?>
    <!-- APP ASIDE ==========-->

    <!--========== END app aside -->
    <?php $this->load->view("includes/aside"); ?>
    <!-- navbar search -->
    <?php $this->load->view("includes/navbar-search"); ?>
    <!-- .navbar-search -->

    <!-- APP MAIN ==========-->
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>
            </section><!-- #dash-content -->
        </div><!-- .wrap -->
        <!-- APP FOOTER -->
        <?php $this->load->view("includes/footer"); ?>
        <!-- /#app-footer -->
    </main>
    <!--========== END app main -->

<?php $this->load->view('includes/include_script') ?>
<script src="<?php echo base_url('assets'); ?>/assets/nestable/jquery.nestable.js"></script>
<script src="<?php echo base_url('assets'); ?>/assets/nestable/sortable-nestable.js"></script>
</body>
</html>