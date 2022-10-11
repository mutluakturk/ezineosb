
<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Yeni Kullanıcı Ekle
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("users/save"); ?>" method="post">
                    <div class="form-group">
                        <label>Kullanıcı Adı</label>
                        <input class="form-control" id="user_name" name="user_name" placeholder="Kullanıcı Adı" value="<?php echo isset($form_error) ? set_value("user_name") : ""; ?>">
                        <?php if (isset($form_error)) {?>
                            <small class="input-form-error"><?php echo form_error("user_name"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Ad Soyad</label>
                        <input class="form-control" id="full_name" name="full_name" placeholder="Ad Soyad" value="<?php echo isset($form_error) ? set_value("full_name") : ""; ?>">
                        <?php if (isset($form_error)) {?>
                            <small class="input-form-error"><?php echo form_error("full_name"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>E-Posta Adresi</label>
                        <input class="form-control" id="email" type="email" name="email" placeholder="E-Posta Adresi" value="<?php echo isset($form_error) ? set_value("email") : ""; ?>">
                        <?php if (isset($form_error)) {?>
                            <small class="input-form-error"><?php echo form_error("email"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Kullanıcı Tipini Seçin</label>
                        <select name="user_type" id="user_type" class="form-control">
                            <option value="Yönetim">Yönetici</option>
                            <option value="Çalışan">Çalışan</option>
                        </select>
                        <?php if (isset($form_error)) {?>
                            <small class="input-form-error"><?php echo form_error("user_type"); ?></small>
                        <?php } ?>
                    </div>


                    <div class="form-group">
                        <label>Şifre</label>
                        <input class="form-control" type="password" id="password" name="password" placeholder="Şifre">
                        <?php if (isset($form_error)) {?>
                            <small class="input-form-error"><?php echo form_error("password"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Şifre Tekrar</label>
                        <input class="form-control" type="password" id="re_password" name="re_password" placeholder="Şifre Tekrar">
                        <?php if (isset($form_error)) {?>
                            <small class="input-form-error"><?php echo form_error("re_password"); ?></small>
                        <?php } ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("users"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div>
    </div>
</div>