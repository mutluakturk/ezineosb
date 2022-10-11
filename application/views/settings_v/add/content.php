<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Site Ayarı Ekle
        </h4>
    </div><!-- END column -->


    <div class="col-md-12">
        <form action="<?php echo base_url("settings/save"); ?>" method="post" enctype="multipart/form-data">
            <div class="widget">
                <div class="m-b-lg nav-tabs-horizontal">
                    <!-- tabs list -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab-1" aria-controls="tab-3" role="tab" data-toggle="tab">Site Bilgileri</a></li>
                        <li role="presentation"><a href="#tab-6" aria-controls="tab-6" role="tab" data-toggle="tab">Adres Bilgileri</a></li>
                        <li role="presentation"><a href="#tab-2" aria-controls="tab-1" role="tab" data-toggle="tab">Hakkımızda</a></li>
                        <li role="presentation"><a href="#tab-3" aria-controls="tab-2" role="tab" data-toggle="tab">Misyonumuz</a></li>
                        <li role="presentation"><a href="#tab-4" aria-controls="tab-3" role="tab" data-toggle="tab">Vizyonumuz</a></li>
                        <li role="presentation"><a href="#tab-5" aria-controls="tab-4" role="tab" data-toggle="tab">Sosyal Medya</a></li>
                        <li role="presentation"><a href="#tab-7" aria-controls="tab-7" role="tab" data-toggle="tab">Logo</a></li>
                        <li role="presentation"><a href="#tab-8" aria-controls="tab-8" role="tab" data-toggle="tab">Seo</a></li>
                    </ul><!-- .nav-tabs -->

                    <!-- Tab panes -->

                    <div class="tab-content p-md">
                        <div role="tabpanel" class="tab-pane in active fade" id="tab-1">
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label>Şirket Adı</label>
                                    <input class="form-control" id="company_name" name="company_name"
                                           placeholder="Şirketinizin yada Sitenizin Adı"
                                           value="<?php echo isset($form_error) ? set_value("company_name") : ""; ?>">
                                    <?php if (isset($form_error)) { ?>
                                        <small class="input-form-error"><?php echo form_error("company_name"); ?></small>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Telefon 1</label>
                                    <input class="form-control" id="phone_1" name="phone_1"
                                           placeholder="Telefon Numaranız"
                                           value="<?php echo isset($form_error) ? set_value("phone_1") : ""; ?>">
                                    <?php if (isset($form_error)) { ?>
                                        <small class="input-form-error"><?php echo form_error("phone_1"); ?></small>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Telefon 2</label>
                                    <input class="form-control" id="phone_2" name="phone_2" placeholder="Diğer Telefon Numaranız (ops.)">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Fax 1</label>
                                    <input class="form-control" id="fax_1" name="fax_1" placeholder="Fax Numaranız" >
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Fax 2</label>
                                    <input class="form-control" id="fax_2" name="fax_2" placeholder="Diğer Fax Numaranız (ops.)" >
                                </div>

                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-6">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Adres Bilgisi</label>
                                    <textarea name="address" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                                </div>
                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-2">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Hakkımızda</label>
                                    <textarea name="about_us" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                                </div>
                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-3">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Misyonumuz</label>
                                    <textarea name="mission" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                                </div>
                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-4">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Vizyonumuz</label>
                                    <textarea name="vision" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                                </div>
                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-5">
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label>E-Posta Adresiniz</label>
                                    <input class="form-control" id="email" name="email"
                                           placeholder="E-Posta Adresiniz"
                                           value="<?php echo isset($form_error) ? set_value("email") : ""; ?>">
                                    <?php if (isset($form_error)) { ?>
                                        <small class="input-form-error"><?php echo form_error("email"); ?></small>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Facebook</label>
                                    <input class="form-control" id="facebook" name="facebook"
                                           placeholder="Facebook Adresiniz" >
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Twitter</label>
                                    <input class="form-control" id="twitter" name="twitter"
                                           placeholder="Twitter Adresiniz" ">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Instagram</label>
                                    <input class="form-control" id="instagram" name="instagram"
                                           placeholder="Instagram Adresiniz" >
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Linkedin</label>
                                    <input class="form-control" id="linkedin" name="linkedin"
                                           placeholder="Linkedin Adresiniz">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Whatsapp</label>
                                    <input class="form-control" id="whatsapp" name="whatsapp" placeholder="Whatsapp Numaranız">
                                    <small>Bu alanı doldurduğunuzda whatsapp butonu tüm sayfalarda görüntülenecektir.</small>
                                </div>
                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-7">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Görsel Seçiniz</label>
                                    <input type="file" name="logo" class="form-control">
                                </div>
                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-8">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Description</label>
                                    <textarea class="form-control" id="description" name="description" placeholder="Seo Description" ></textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Keywords</label>
                                    <textarea class="form-control" id="keywords" name="keywords" placeholder="Seo Keywords" "></textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Author</label>
                                    <textarea class="form-control" id="author" name="author" placeholder="Author" ></textarea>
                                </div>
                            </div>
                        </div>

                    </div><!-- .tab-content  -->

                </div><!-- .nav-tabs-horizontal -->
            </div><!-- .widget -->
            <div class="widget">
                <div class="widget-body">
                    <button type="submit" class="btn btn-primary btn-md">Kaydet</button>
                    <a href="<?php echo base_url("settings"); ?>" class="btn btn-md btn-danger">İptal</a>
                </div>
            </div>
        </form>
    </div><!-- END column -->
</div>