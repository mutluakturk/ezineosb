<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg"><?php echo "<b>".$item->title."</b>" ?> Kaydını Düzenliyorsunuz
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("Menu/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Menü Elemanı</label>
                        <input class="form-control" id="title" name="title" placeholder="Başlık" value="<?php echo $item->title ?>">
                        <?php if (isset($form_error)) {?>
                            <small class="input-form-error"><?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Menü Kontrol Ünitesi</label>
                        <input class="form-control" id="controller" name="controller" placeholder="Kontrol Ünitesi" value="<?php echo $item->controller ?>">
                        <?php if (isset($form_error)) {?>
                            <small class="input-form-error"><?php echo form_error("controller"); ?></small>
                        <?php } ?>
                    </div>

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
                            <?php echo ($item->isActive) ? "checked" : "" ?>
                        />
                    </div>

                    <div class="form-group" id="ustElemanlar">
                        <label>Bağlı Olduğu Eleman</label>
                        <select name="parent" id="parent" class="form-control">
                            <option value="-1">Üst Menü Seçiniz</option>
                            <?php foreach ($items as $itemA) {?>
                                <option value="<?= $itemA->id; ?>" <?= ($itemA->id == $item->parent) ? "selected" : ""; ?>><?= $itemA->title; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!--<div class="row">
                        <div class="col-md-1 img_upload_container">
                            <img src="<?php //echo base_url("uploads/$viewFolder/$item->img_url"); ?>" alt="" class="img-responsive">
                        </div>
                        <div class="col-md-9 form-group img_upload_container">
                            <label>Görsel Seçiniz</label>
                            <input type="file" name="img_url" class="form-control">
                        </div>
                    </div>-->

                    <!--<div class="form-group" id="ustElemanlar">
                        <label>Listelenecek Ürün Grubu</label>
                        <select name="product_group" id="product_group" class="form-control">
                            <option value="#">Ürün Grubu Seçiniz</option>
                            <?php foreach ($productGroups as $group) {?>
                                <option value="<?= $group->id; ?>" <?= ($group->id == $item->listProduct) ? "selected" : ""; ?>><?= $group->title; ?></option>
                            <?php } ?>
                        </select>
                    </div>-->
                    <script>
                        $("#altEleman").on("change", function () {
                            $("#ustElemanlar").toggle(1000);
                            $("#gorsel").toggle(1000);
                        });
                    </script>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("Menu"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div>
    </div>
</div>