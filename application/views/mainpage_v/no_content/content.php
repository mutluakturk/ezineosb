<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Site Çalışma Ayarları
            <a href="<?php echo base_url("settings/new_form") ?>" class="btn btn-outline btn-primary btn-xs pull-right "> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($items)) {?>
            <div class="alert alert-info text-center">
                <p>Kayıt Bulunamadı Eklemek için <a href="<?php echo base_url("settings/new_form") ?>">tıklayınız</a></p>
            </div>
            <?php } ?>
        </div><!-- .widget -->
    </div>
</div>