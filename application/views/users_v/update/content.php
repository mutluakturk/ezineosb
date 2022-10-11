<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg"><?php echo "<b>".$item->user_name."</b>" ?> Kaydını Düzenliyorsunuz
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("users/update/$item->id"); ?>" method="post">

                    <div class="form-group">
                        <label>Kullanıcı Adı</label>
                        <input class="form-control" id="user_name" name="user_name" placeholder="Kullanıcı Adı" value="<?php echo isset($form_error) ? set_value("user_name") : $item->user_name; ?>">
                        <?php if (isset($form_error)) {?>
                            <small class="input-form-error"><?php echo form_error("user_name"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Ad Soyad</label>
                        <input class="form-control" id="full_name" name="full_name" placeholder="Ad Soyad" value="<?php echo isset($form_error) ? set_value("full_name") : $item->full_name; ?>">
                        <?php if (isset($form_error)) {?>
                            <small class="input-form-error"><?php echo form_error("full_name"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>E-Posta Adresi</label>
                        <input class="form-control" id="email" type="email" name="email" placeholder="E-Posta Adresi" value="<?php echo isset($form_error) ? set_value("email") : $item->email; ?>">
                        <?php if (isset($form_error)) {?>
                            <small class="input-form-error"><?php echo form_error("email"); ?></small>
                        <?php } ?>
                    </div>
                    <?php if ($this->session->user->user_type == "Yönetim") {?>
                    <div class="form-group">
                        <label>Kullanıcı Tipini Seçin</label>
                        <select name="user_type" id="user_type" class="form-control">
                            <option <?= ($item->user_type == "Yönetim") ? "selected" : ""; ?> value="Yönetim">Yönetici</option>
                            <option <?= ($item->user_type == "Çalışan") ? "selected" : ""; ?> value="Çalışan">Çalışan</option>
                        </select>
                        <?php if (isset($form_error)) {?>
                            <small class="input-form-error"><?php echo form_error("user_type"); ?></small>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("users"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div>
    </div>
</div>