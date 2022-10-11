<!DOCTYPE html>
<html lang="tr-TR">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <?php $this->load->view("includes/web_includes/head"); ?>
</head>

<body data-spy="scroll" data-target=".inner-link" data-offset="60">
<main>
    <?php $this->load->view("includes/web_includes/pre_loader"); ?>

    <!--    =============================================-->
    <?php $this->load->view("includes/web_includes/top_header"); ?>
    <?php $this->load->view("includes/web_includes/menu"); ?>
    <?php $this->load->view("includes/web_includes/bread_crumb"); ?>
    <!--    =============================================-->

    <section class="background-11">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="background-white px-3 px-0 py-5 px-lg-5 radius-secondary">
                        <p class="mt-3"><?= $this->session->icindekiler->content; ?></p>
                    </div>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>

    <?php $this->load->view("includes/web_includes/whatsapp"); ?>
    <!--    =============================================-->
    <?php $this->load->view("includes/web_includes/top_footer"); ?>
    <?php $this->load->view("includes/web_includes/footer"); ?>
</main>
<!--  -->

<?php $this->load->view("includes/web_includes/site_scripts"); ?>
</body>
</html>