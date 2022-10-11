<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Ana Sayfanızı Düzenliyorsunuz
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <!--<form action="<?php //echo base_url("settings/update/$item->id"); ?>" method="post" enctype="multipart/form-data"> -->
        <div class="widget">
            <div class="m-b-lg nav-tabs-horizontal">
                <!-- tabs list -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#tab-1" aria-controls="tab-3" role="tab" data-toggle="tab">Slider Tasarımı</a>
                    </li>
                    <li role="presentation">
                        <a href="#tab-6" aria-controls="tab-6" role="tab" data-toggle="tab">Video ve
                            İstatistikler</a>
                    </li>

                    <li role="presentation"><a href="#tab-8" aria-controls="tab-9" role="tab"
                                               data-toggle="tab">Sosyal Medya</a></li>

                    <!--<li role="presentation">
                        <a href="#tab-5" aria-controls="tab-4" role="tab" data-toggle="tab">Sosyal Medya</a>
                    </li>
                    <li role="presentation">
                        <a href="#tab-7" aria-controls="tab-7" role="tab" data-toggle="tab">Logo</a>
                    </li>
                    <li role="presentation">
                        <a href="#tab-8" aria-controls="tab-8" role="tab" data-toggle="tab">Seo</a>
                    </li>-->
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
                            <form action="<?= base_url('Mainpage/update/' . $item->id) ?>" id="videoistatistik"
                                  name="videoistatistik" enctype="multipart/form-data" method="post">

                                <?php if ($item->kapak) { ?>
                                    <div class="form-group col-md-12 img_upload_container">
                                        <label>Mevcut Kapak Resmi</label>
                                        <br>
                                        <img src="<?= base_url('uploads/mainpage_v/' . $item->kapak) ?>" alt=""
                                             width="200" height="200">
                                    </div>
                                <?php } ?>
                                <div class="form-group col-md-12 img_upload_container">
                                    <label>Video Kapak Resmi</label>
                                    <input type="file" name="img_url" class="form-control">
                                </div>


                                <div class="form-group col-md-12">
                                    <label>Video Youtube Link</label>
                                    <input name="videoadres" class="form-control m-0" id="videoadres"
                                           placeholder="Anasayfa video adresi"
                                           value="<?= $item->video ?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Elektrik Tüketimi</label>
                                    <input name="elektrikTuk" class="form-control m-0" id="elektrikTuk"
                                           placeholder="Elektrik Tüketim Miktarı"
                                           value="<?= $item->elektrik ?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Su Tüketimi</label>
                                    <input name="suTuk" class="form-control m-0" id="suTuk"
                                           placeholder="Su Tüketim Miktarı"
                                           value="<?= $item->su ?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Yüz Ölçümü</label>
                                    <input name="yuzolcumu" class="form-control m-0" id="yuzolcumu"
                                           placeholder="Yüz Ölçümü"
                                           value="<?= $item->yuzolcum ?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Kuruluş Yılı</label>
                                    <input name="kurulusYil" class="form-control m-0" id="kurulusYil"
                                           placeholder="Kuruluş Yılı"
                                           value="<?= $item->kurulus ?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Kayıtlı Firma</label>
                                    <input name="kayitliFirma" class="form-control m-0" id="kayitliFirma"
                                           placeholder="Kayıtlı Firma"
                                           value="<?= $item->firmaSayisi ?>">
                                </div>

                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary btn-md">Güncelle</button>
                                    <a href="<?php echo base_url("mainpage"); ?>"
                                       class="btn btn-md btn-danger">İptal</a>
                                </div>
                            </form>
                        </div>
                    </div><!-- .tab-pane  -->

                    <div role="tabpanel" class="tab-pane fade" id="tab-8">
                        <form action="<?php echo base_url("settings/updateSocial/" . $settings[0]->id); ?>"
                              method="post">
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label>E-Posta Adresiniz</label>
                                    <input class="form-control" id="email" name="email"
                                           placeholder="E-Posta Adresiniz"
                                           value="<?php echo $settings[0]->email; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Facebook</label>
                                    <input class="form-control" id="facebook" name="facebook"
                                           placeholder="Facebook Adresiniz"
                                           value="<?php echo $settings[0]->facebook; ?>">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Twitter</label>
                                    <input class="form-control" id="twitter" name="twitter"
                                           placeholder="Twitter Adresiniz"
                                           value="<?php echo $settings[0]->twitter; ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Instagram</label>
                                    <input class="form-control" id="instagram" name="instagram"
                                           placeholder="Instagram Adresiniz"
                                           value="<?php echo $settings[0]->instagram; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Linkedin</label>
                                    <input class="form-control" id="linkedin" name="linkedin"
                                           placeholder="Linkedin Adresiniz"
                                           value="<?php echo $settings[0]->linkedin; ?>">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Whatsapp</label>
                                    <input class="form-control" id="whatsapp" name="whatsapp"
                                           placeholder="Whatsapp Numaranız"
                                           value="<?php echo $settings[0]->whatsapp; ?>">
                                    <small>Bu alanı doldurduğunuzda whatsapp butonu tüm sayfalarda
                                        görüntülenecektir.</small>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Whatsapp Mesajı</label>
                                    <input class="form-control" id="wmessage" name="wmessage"
                                           placeholder="Whatsapp Mesajı"
                                           value="<?php echo $settings[0]->whatsapp_message; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary btn-md">Güncelle</button>
                                    <a href="<?php echo base_url("settings"); ?>"
                                       class="btn btn-md btn-danger">İptal</a>
                                </div>
                            </div>

                        </form>
                    </div>

                </div><!-- .tab-content  -->

            </div><!-- .nav-tabs-horizontal -->
        </div><!-- .widget -->
        <!--</form> -->
    </div><!-- END column -->
</div>