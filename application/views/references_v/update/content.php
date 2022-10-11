<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg"><?php echo "<b>".$item->title."</b>" ?> Kaydını Düzenliyorsunuz
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("references/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Başlık</label>
                        <input class="form-control" id="title" name="title" placeholder="Başlık" value="<?php echo $item->title ?>">
                        <?php if (isset($form_error)) {?>
                            <small class="input-form-error"><?php echo form_error("title"); ?></small>
                        <?php } ?>

                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->description ?></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-1 img_upload_container">
                            <img src="<?php echo base_url("uploads/$viewFolder/$item->img_url"); ?>" alt="" class="img-responsive">
                        </div>
                        <div class="col-md-9 form-group img_upload_container">
                            <label>Görsel Seçiniz</label>
                            <input type="file" name="img_url" class="form-control">
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("references"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div>
    </div>
</div>