<section style="background-color: #3D4C6F">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="background-primary color-white p-5 p-lg-6 radius-secondary">
                    <h3 class="color-white fs-1 fs-lg-2 mb-1">E-mail bültenimize abone olun</h3>
                    <p class="color-white">Yeniliklerden haberdar olmak için mail bültenimize abone olun</p>
                    <form id="newslatter" name="newslatter" class="mt-4">
                        <div class="row align-items-center">
                            <div class="col-md-7 pr-md-0">
                                <div class="input-group">
                                    <input class="form-control" type="email"
                                           placeholder="E-Mail Adresinizi Giriniz" name="abnMail" id="abnMail"/>
                                </div>
                            </div>
                            <div class="col-md-5 mt-3 mt-md-0">
                                <button class="btn btn-warning btn-block" type="button" name="abnol" id="abnol">
                                    <span class="color-primary fw-600">ABONE OL</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="row">
                    <div class="col-6 col-lg-4 color-white ml-lg-auto">
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <a class="color-white" href="<?= base_url('tarihte-ezine') ?>">Tarihte Ezine</a></li>
                            <li class="mb-3">
                                <a class="color-white" href="<?= base_url('ezine-cografi-yapisi') ?>">Ezine Coğrafi
                                    Yapısı</a></li>
                            <li class="mb-3"><a class="color-white" href="<?= base_url('egitim') ?>">Eğitim</a>
                            </li>
                            <li class="mb-3"><a class="color-white" href="<?= base_url('turizm') ?>">Turizm</a>
                            </li>
                            <li class="mb-3"><a class="color-white" href="<?= base_url('ekonomi') ?>">Ekonomi</a>
                            </li>
                            <li class="mb-3"><a class="color-white" href="<?= base_url('fotograflarla-ezine') ?>">Fotoğraflarla
                                    Ezine</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-sm-5 ml-sm-auto">
                        <a href="<?= 'http://' . $this->session->settings->linkedin; ?>" target="_blank">
                            <div class="row mb-3 align-items-center no-gutters">
                                <div class="col-auto">
                                    <div
                                            class="background-primary text-center d-flex align-items-center radius-primary"
                                            style="height: 40px; width: 40px;">
                                        <span class="w-100 fa fa-linkedin color-white"></span>
                                    </div>
                                </div>
                                <div class="col-6 pl-3">
                                    <h5 class="fs-0 color-white mb-0 d-inline-block">Linkedin</h5>
                                </div>
                            </div>
                        </a>
                        <a href="<?= 'http://' . $this->session->settings->twitter; ?>" target="_blank">
                            <div class="row mb-3 align-items-center no-gutters">
                                <div class="col-auto">
                                    <div
                                            class="background-primary text-center d-flex align-items-center radius-primary"
                                            style="height: 40px; width: 40px;">
                                        <span class="w-100 fa fa-twitter color-white"></span>
                                    </div>
                                </div>
                                <div class="col-6 pl-3">
                                    <h5 class="fs-0 color-white mb-0 d-inline-block">Twitter</h5>
                                </div>
                            </div>
                        </a>
                        <a href="<?= 'http://' . $this->session->settings->facebook; ?>" target="_blank">
                            <div class="row mb-3 align-items-center no-gutters">
                                <div class="col-auto">
                                    <div
                                            class="background-primary text-center d-flex align-items-center radius-primary"
                                            style="height: 40px; width: 40px;">
                                        <span class="w-100 fa fa-facebook color-white"></span>
                                    </div>
                                </div>
                                <div class="col-6 pl-3">
                                    <h5 class="fs-0 color-white mb-0 d-inline-block">Facebook</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div><!--/.row-->
        </div>
        <!--/.container-->
</section>