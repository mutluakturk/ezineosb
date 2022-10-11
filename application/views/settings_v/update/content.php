<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg"><?php echo "<b>" . $item->company_name . "</b>" ?> Kaydını Düzenliyorsunuz
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <form action="<?php echo base_url("settings/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
            <div class="widget">
                <div class="m-b-lg nav-tabs-horizontal">
                    <!-- tabs list -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab-1" aria-controls="tab-3" role="tab"
                                                                  data-toggle="tab">Site Bilgileri</a></li>
                        <li role="presentation"><a href="#tab-6" aria-controls="tab-6" role="tab" data-toggle="tab">Adres
                                Bilgileri</a></li>
                        <!--<li role="presentation"><a href="#tab-2" aria-controls="tab-1" role="tab" data-toggle="tab">Hakkımızda</a>
                        </li>
                        <li role="presentation"><a href="#tab-3" aria-controls="tab-2" role="tab" data-toggle="tab">Başkanın
                                Mesajı</a>
                        </li>
                        <li role="presentation"><a href="#tab-4" aria-controls="tab-3" role="tab" data-toggle="tab">Tarihçe</a>
                        </li>-->
                        <!--<li role="presentation"><a href="#tab-5" aria-controls="tab-4" role="tab" data-toggle="tab">Sosyal
                                Medya</a></li>-->
                        <li role="presentation"><a href="#tab-7" aria-controls="tab-7" role="tab"
                                                   data-toggle="tab">Logo</a></li>
                    </ul><!-- .nav-tabs -->

                    <!-- Tab panes -->

                    <div class="tab-content p-md">
                        <div role="tabpanel" class="tab-pane in active fade" id="tab-1">
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label>Şirket Adı</label>
                                    <input class="form-control" id="company_name" name="company_name"
                                           placeholder="Şirketinizin yada Sitenizin Adı"
                                           value="<?php echo isset($form_error) ? set_value("company_name") : $item->company_name; ?>">
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
                                           value="<?php echo isset($form_error) ? set_value("phone_1") : $item->phone_1; ?>">
                                    <?php if (isset($form_error)) { ?>
                                        <small class="input-form-error"><?php echo form_error("phone_1"); ?></small>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Telefon 2</label>
                                    <input class="form-control" id="phone_2" name="phone_2"
                                           placeholder="Diğer Telefon Numaranız (ops.)"
                                           value="<?php echo isset($form_error) ? set_value("phone_2") : $item->phone_2; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Fax 1</label>
                                    <input class="form-control" id="fax_1" name="fax_1" placeholder="Fax Numaranız"
                                           value="<?php echo isset($form_error) ? set_value("fax_1") : $item->fax_1; ?>">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Fax 2</label>
                                    <input class="form-control" id="fax_2" name="fax_2"
                                           placeholder="Diğer Fax Numaranız (ops.)"
                                           value="<?php echo isset($form_error) ? set_value("fax_2") : $item->fax_2; ?>">
                                </div>

                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-6">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Adres Bilgisi</label>
                                    <textarea name="address" class="m-0" data-plugin="summernote"
                                              data-options="{height: 250}">
                                        <?php echo isset($form_error) ? set_value("address") : $item->address; ?>
                                    </textarea>
                                </div>
                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-2">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Hakkımızda</label>
                                    <textarea name="about_us" class="m-0" data-plugin="summernote"
                                              data-options="{height: 250}">
                                        <?php echo isset($form_error) ? set_value("about_us") : $item->about_us; ?>
                                    </textarea>
                                </div>
                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-3">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Başkanın Mesajı</label>
                                    <textarea name="mission" class="m-0" data-plugin="summernote"
                                              data-options="{height: 250}">
                                        <?php echo isset($form_error) ? set_value("mission") : $item->mission; ?>
                                    </textarea>
                                </div>
                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-4">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Tarihçe</label>
                                    <textarea name="vision" class="m-0" data-plugin="summernote"
                                              data-options="{height: 250}">
                                        <?php echo isset($form_error) ? set_value("vision") : $item->vision; ?>
                                    </textarea>
                                </div>
                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-5">
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label>E-Posta Adresiniz</label>
                                    <input class="form-control" id="email" name="email"
                                           placeholder="E-Posta Adresiniz"
                                           value="<?php echo isset($form_error) ? set_value("email") : $item->email; ?>">
                                    <?php if (isset($form_error)) { ?>
                                        <small class="input-form-error"><?php echo form_error("email"); ?></small>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Facebook</label>
                                    <input class="form-control" id="facebook" name="facebook"
                                           placeholder="Facebook Adresiniz"
                                           value="<?php echo isset($form_error) ? set_value("facebook") : $item->facebook; ?>">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Twitter</label>
                                    <input class="form-control" id="twitter" name="twitter"
                                           placeholder="Twitter Adresiniz"
                                           value="<?php echo isset($form_error) ? set_value("twitter") : $item->twitter; ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Instagram</label>
                                    <input class="form-control" id="instagram" name="instagram"
                                           placeholder="Instagram Adresiniz"
                                           value="<?php echo isset($form_error) ? set_value("instagram") : $item->instagram; ?>">
                                </div>
                            </div>
                            <div class="row">


                                <div class="form-group col-md-4">
                                    <label>Linkedin</label>
                                    <input class="form-control" id="linkedin" name="linkedin"
                                           placeholder="Linkedin Adresiniz"
                                           value="<?php echo isset($form_error) ? set_value("linkedin") : $item->linkedin; ?>">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Whatsapp</label>
                                    <input class="form-control" id="whatsapp" name="whatsapp"
                                           placeholder="Whatsapp Numaranız"
                                           value="<?php echo isset($form_error) ? set_value("whatsapp") : $item->whatsapp; ?>">
                                    <small>Bu alanı doldurduğunuzda whatsapp butonu tüm sayfalarda
                                        görüntülenecektir.</small>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Whatsapp</label>
                                    <input class="form-control" id="wmessage" name="wmessage"
                                           placeholder="Whatsapp Mesajı"
                                           value="<?php echo isset($form_error) ? set_value("whatsapp_message") : $item->whatsapp_message; ?>">
                                </div>
                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-7">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <img src="<?php echo base_url("uploads/$viewFolder/$item->logo"); ?>"
                                         alt="<?php echo $item->company_name; ?>" class="img-responsive">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Görsel Seçiniz</label>
                                    <input type="file" name="logo" class="form-control">
                                </div>
                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-8">
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label>E-Posta Adresiniz</label>
                                    <input class="form-control" id="email" name="email"
                                           placeholder="E-Posta Adresiniz"
                                           value="<?php echo isset($form_error) ? set_value("email") : $item->email; ?>">
                                    <?php if (isset($form_error)) { ?>
                                        <small class="input-form-error"><?php echo form_error("email"); ?></small>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Facebook</label>
                                    <input class="form-control" id="facebook" name="facebook"
                                           placeholder="Facebook Adresiniz"
                                           value="<?php echo isset($form_error) ? set_value("facebook") : $item->facebook; ?>">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Twitter</label>
                                    <input class="form-control" id="twitter" name="twitter"
                                           placeholder="Twitter Adresiniz"
                                           value="<?php echo isset($form_error) ? set_value("twitter") : $item->twitter; ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Instagram</label>
                                    <input class="form-control" id="instagram" name="instagram"
                                           placeholder="Instagram Adresiniz"
                                           value="<?php echo isset($form_error) ? set_value("instagram") : $item->instagram; ?>">
                                </div>
                            </div>
                            <div class="row">


                                <div class="form-group col-md-4">
                                    <label>Linkedin</label>
                                    <input class="form-control" id="linkedin" name="linkedin"
                                           placeholder="Linkedin Adresiniz"
                                           value="<?php echo isset($form_error) ? set_value("linkedin") : $item->linkedin; ?>">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Whatsapp</label>
                                    <input class="form-control" id="whatsapp" name="whatsapp"
                                           placeholder="Whatsapp Numaranız"
                                           value="<?php echo isset($form_error) ? set_value("whatsapp") : $item->whatsapp; ?>">
                                    <small>Bu alanı doldurduğunuzda whatsapp butonu tüm sayfalarda
                                        görüntülenecektir.</small>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Whatsapp</label>
                                    <input class="form-control" id="wmessage" name="wmessage"
                                           placeholder="Whatsapp Mesajı"
                                           value="<?php echo isset($form_error) ? set_value("whatsapp_message") : $item->whatsapp_message; ?>">
                                </div>
                            </div>
                        </div>

                    </div><!-- .tab-content  -->

                </div><!-- .nav-tabs-horizontal -->
            </div><!-- .widget -->
            <div class="widget">
                <div class="widget-body">
                    <button type="submit" class="btn btn-primary btn-md">Güncelle</button>
                    <a href="<?php echo base_url("settings"); ?>" class="btn btn-md btn-danger">İptal</a>
                </div>
            </div>
        </form>
    </div><!-- END column -->
</div>