<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg"><?php echo "<b>" . $item->title . "</b>" ?> Ürününü Düzenliyorsunuz
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("galleries/update/$item->id/$item->gallery_type/$item->folder_name"); ?>"
                      method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Galeri Adı</label>
                        <input class="form-control" id="title" name="title" placeholder="Galerinin Adını Giriniz"
                               value="<?php echo $item->title ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group img_upload_container">
                        <label>Kapak Görseli Seçiniz</label>
                        <img src="<?= base_url('uploads/galleries_v/' . $item->img_url); ?>"
                             style="height: 80px; width: 80px">
                        <input type="file" name="img_url" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("galleries"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div>
    </div>
</div>