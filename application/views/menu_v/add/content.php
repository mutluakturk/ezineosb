<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Yeni Menü Elemanı Ekle
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("Menu/save"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Menü Elemanı</label>
                        <input class="form-control" id="title" name="title" placeholder="Başlık">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Menü Kontrol Ünitesi</label>
                        <input class="form-control" id="controller" name="controller" placeholder="Kontrol Ünitesi"
                               value="getPage" readonly>
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("controller"); ?></small>
                        <?php } ?>
                    </div>

                    <!-- <div class="form-group">
                        <label>Menü Elemanı EN</label>
                        <input class="form-control" id="title_En" name="title_En" placeholder="Başlık EN">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("title_En"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Menü Elemanı DE</label>
                        <input class="form-control" id="title_De" name="title_De" placeholder="Başlık DE">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("title_De"); ?></small>
                        <?php } ?>
                    </div> -->

                    <div class="form-group">
                        <label>Menü Elemanı</label>
                        <input
                                class="isActive"
                                type="checkbox"
                                data-switchery
                                data-color="#10c469"
                                data-size="small"
                                checked
                                id="altEleman"
                                name="altEleman"
                        />
                    </div>

                    <div class="form-group" id="ustElemanlar">
                        <label>Bağlı Olduğu Eleman</label>
                        <select name="parent" id="parent" class="form-control">
                            <option value="-1">Üst Menü Seçiniz</option>
                            <?php foreach ($items as $item) { ?>
                                <option value="<?= $item->id; ?>"><?= $item->title; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- <div class="form-group img_upload_container" id="gorsel">
                        <label>Görsel Seçiniz</label>
                        <input type="file" name="img_url" class="form-control">
                    </div>

                    <div class="form-group" id="ustElemanlar">
                        <label>Listelenecek Ürün Grubu</label>
                        <select name="product_group" id="product_group" class="form-control">
                            <option value="#">Ürün Grubu Seçiniz</option>
                            <?php foreach ($productGroups as $group) { ?>
                                <option value="<?= $group->id; ?>"><?= $group->title; ?></option>
                            <?php } ?>
                        </select>
                    </div>-->
                    <script>
                        $("#altEleman").on("change", function () {
                            $("#ustElemanlar").toggle(1000);
                            $("#gorsel").toggle(1000);
                        });
                    </script>

                    <!--<div class="form-group">
                        <label>Döküman İçeriği</label>
                        <textarea name="description" id="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                    </div>-->

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("Menu"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div>
    </div>
</div>