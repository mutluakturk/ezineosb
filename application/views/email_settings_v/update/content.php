<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg"><?php echo "<b>".$item->user_name."</b>" ?> Kaydını Düzenliyorsunuz
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("emailsettings/update/$item->id"); ?>" method="post">

                    <div class="form-group">
                        <label>Protokol</label>
                        <input class="form-control" id="protocol" name="protocol" placeholder="Protokol" value="<?php echo isset($form_error) ? set_value("protocol") : $item->protocol; ?>">
                        <?php if (isset($form_error)) {?>
                            <small class="input-form-error"><?php echo form_error("protocol"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>E-Posta Sunucu Bilgisi</label>
                        <input class="form-control" id="host" name="host" placeholder="Hostname" value="<?php echo isset($form_error) ? set_value("host") : $item->host; ?>">
                        <?php if (isset($form_error)) {?>
                            <small class="input-form-error"><?php echo form_error("host"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Port Numarası</label>
                        <input class="form-control" id="port" type="text" name="port" placeholder="Port" value="<?php echo isset($form_error) ? set_value("port") : $item->port; ?>">
                        <?php if (isset($form_error)) {?>
                            <small class="input-form-error"><?php echo form_error("port"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>E-Posta Adresi (User)</label>
                        <input class="form-control" id="user" type="email" name="user" placeholder="E-Posta Adresi" value="<?php echo isset($form_error) ? set_value("user") : $item->user; ?>">
                        <?php if (isset($form_error)) {?>
                            <small class="input-form-error"><?php echo form_error("user"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Şifre</label>
                        <input class="form-control" type="password" id="password" name="password" placeholder="Şifre" value="<?php echo isset($form_error) ? set_value("password") : $item->password; ?>">
                        <?php if (isset($form_error)) {?>
                            <small class="input-form-error"><?php echo form_error("password"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Kimden Gidecek (From)</label>
                        <input class="form-control" id="from" type="email" name="from" placeholder="Kimden" value="<?php echo isset($form_error) ? set_value("from") : $item->from; ?>">
                        <?php if (isset($form_error)) {?>
                            <small class="input-form-error"><?php echo form_error("from"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Kime Gidecek (to)</label>
                        <input class="form-control" id="to" type="email" name="to" placeholder="Kime" value="<?php echo isset($form_error) ? set_value("to") : $item->to; ?>">
                        <?php if (isset($form_error)) {?>
                            <small class="input-form-error"><?php echo form_error("to"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>E-Posta Başlık</label>
                        <input class="form-control" id="user_name" type="text" name="user_name" placeholder="E-Posta Başlık" value="<?php echo isset($form_error) ? set_value("user_name") : $item->user_name; ?>">
                        <?php if (isset($form_error)) {?>
                            <small class="input-form-error"><?php echo form_error("user_name"); ?></small>
                        <?php } ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("emailsettings"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div>
    </div>
</div>