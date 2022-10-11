
<div class="row">
    <div class="col-md-12">
        <form action="<?php echo base_url("anamnez/price_update/$item->id"); ?>" method="post" enctype="multipart/form-data">
    </div>
    <div class="col-md-12">
        <h4 class="m-b-lg"><?php echo "<b>".$item->tarih." "."</b>" ?> Tarihli Anamnezi Düzenliyorsunuz

        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">

                    <div class="row" style="padding: 15px">
                        <div class="form-group col-md-2">
                            <label>Ücret</label>
                            <input class="form-control" type="number" id="price" name="price" placeholder="Ücret" value="<?= isset($form_error) ? set_value("ucret") : $item->ucret; ?>">
                            <?php if (isset($form_error)) {?>
                                <small class="input-form-error"><?php echo form_error("price"); ?></small>
                            <?php } ?>
                        </div>

                        <div class="form-group col-md-2">
                            <label>Ücret Birim</label>
                            <select class="form-control" id="pricetype" name="pricetype">
                                <option value="-1">Para Birimi Seçin</option>
                                <option <?= ($item->ucretbirim == "tl") ? "selected" : ""; ?> value="tl">TL ₺</option>
                                <option <?= ($item->ucretbirim == "usd") ? "selected" : ""; ?> value="usd">Dolar $</option>
                                <option <?= ($item->ucretbirim == "eu") ? "selected" : ""; ?> value="eu">Euro €</option>
                                <option <?= ($item->ucretbirim == "gbp") ? "selected" : ""; ?> value="gbp">Pound £</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Randevulu / Randevusuz</label><br>
                            <input class="form-control" type="checkbox" disabled data-switchery id="randevu" name="randevu" <?= ($item->randevusuz == 1) ? "checked" : ""; ?>>
                        </div>
                        <div class="form-group col-md-2" id="zamansecici" hidden>
                            <label>Saat</label><br>
                            <input class="form-control" type="time" id="zaman" name="zaman" value="<?= $item->gelissaati ?>">
                        </div>


                    </div>
                    <div class="form-group img_upload_container">
                        <label>Dosya Seçiniz</label>
                        <input type="file" name="img_url" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("anamnez/list/".$item->hastaid); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div>
    </div>


</div>