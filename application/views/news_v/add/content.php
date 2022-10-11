<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Yeni Haber Ekle
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("news/save"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Başlık</label>
                        <input class="form-control" id="title" name="title" placeholder="Başlık">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("title"); ?></small>
                        <?php } ?>

                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="m-0" data-plugin="summernote"
                                  data-options="{height: 250}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="control-demo-6" class="">Haber Türü</label>
                        <div id="control-demo-6" class="">
                            <select class="form-control news_type_select" name="news_type">
                                <option <?php echo (isset($news_type) && $news_type == "image") ? "selected" : ""; ?>
                                        value="image">Resim
                                </option>
                                <option <?php echo (isset($news_type) && $news_type == "video") ? "selected" : ""; ?>
                                        value="video">Video
                                </option>
                            </select>
                        </div>
                    </div>
                    <?php if (isset($form_error)) { ?>
                        <div class="form-group img_upload_container"
                             style="display: <?php echo ($news_type == "image") ? "block" : "none"; ?>">
                            <label>Görsel Seçiniz</label>
                            <input type="file" name="img_url" class="form-control">
                        </div>

                        <div class="form-group video_url_container"
                             style="display: <?php echo ($news_type == "video") ? "block" : "none"; ?>">
                            <label>Video URL</label>
                            <input class="form-control" name="video_url" placeholder="Video URL">
                            <?php if (isset($form_error)) { ?>
                                <small class="input-form-error"><?php echo form_error("video_url"); ?></small>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <div class="form-group img_upload_container">
                            <label>Görsel Seçiniz</label>
                            <input type="file" name="img_url" class="form-control">
                        </div>

                        <div class="form-group video_url_container">
                            <label>Video URL</label>
                            <input class="form-control" name="video_url" placeholder="Video URL">
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <label>Etiketler <small class="text-danger" style="font-weight: bolder">Etiketlerin arasına
                                virgül koyunuz!</small></label>
                        <input name="tags" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("news"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div>
    </div>
</div>