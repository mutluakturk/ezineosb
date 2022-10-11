<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg"><?php echo "<b>".$item->user_name."</b>" ?> Kaydının Parolasını Değiştiriyorsunuz
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("users/update_password/$item->id"); ?>" method="post">

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

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("users"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div>
    </div>
</div>