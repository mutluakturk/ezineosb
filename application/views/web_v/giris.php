<!DOCTYPE html>
<html lang="tr-TR">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <?php $this->load->view("includes/web_includes/head"); ?>
</head>

<body data-spy="scroll" data-target=".inner-link" data-offset="60">
<main>
    <?php $this->load->view("includes/web_includes/pre_loader"); ?>

    <section class="text-center py-0">
        <div class="background-holder overlay overlay-2" style="background-image:url(site_assets/images/header-5.jpg);">
        </div>
        <!--/.background-holder-->
        <div class="container">
            <div class="row h-full align-items-center">
                <div class="col-md-8 col-lg-5 mx-auto" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                    <div data-zanim='{"delay":0}'>
                        <a href="<?= base_url(); ?>">
                            <img src="site_assets/images/logo-light.png" alt=""/></a>
                    </div>
                    <div class="background-white radius-secondary p-4 p-md-5 mt-5" data-zanim='{"delay":0.1}'>
                        <h4 class="text-uppercase fs-0 fs-md-1">Yönetici Giriş Paneli</h4>

                        <form class="text-left mt-4" action="<?php echo base_url("userop/do_login"); ?>" method="post">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="input-group">
                                        <div class="input-group-addon background-11 fs-2">
                                            <span class="ion-ios-person-outline"></span>
                                        </div>
                                        <input id="sign-in-email" type="email" class="form-control"
                                               placeholder="E-Posta" name="user_email"
                                               placeholder="Kullanıcı adınızı giriniz"
                                               aria-label="Text input with dropdown button"/>
                                        <?php if (isset($form_error)) { ?>
                                            <small class="input-form-error"><?php echo form_error("user_email") ?></small>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 mt-sm-4">
                                    <div class="input-group">
                                        <div class="input-group-addon background-11 fs-2">
                                            <span class="ion-ios-locked-outline"></span>
                                        </div>
                                        <input id="sign-in-password" type="password" class="form-control"
                                               placeholder="Parolanızı Giriniz" name="user_password"
                                               aria-label="Text input with dropdown button"/>
                                        <?php if (isset($form_error)) { ?>
                                            <small class="input-form-error"><?php echo form_error("user_password") ?></small>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center mt-3">
                                <!--<div class="col-6">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox"/>
                                        <span class="color-7">Beni Hatırla</span></label>
                                </div>-->
                                <div class="col-6 mt-2 mt-sm-3">
                                    <button class="btn btn-primary btn-block" type="submit">Giriş</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>
</main>
<!--  -->

<?php $this->load->view("includes/web_includes/site_scripts"); ?>
</body>
</html>