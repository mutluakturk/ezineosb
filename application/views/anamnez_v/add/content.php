<div class="row">
    <div class="col-md-12">
        <form action="<?php echo base_url("anamnez/save"); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Temel Tıbbi Bilgiler </label>
            <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 50}"> <?= isset($form_error) ? set_value("description") : ""; echo $patient->medicaldata; ?></textarea>
        </div>
    </div>
<?php //print_r($patient); ?>
    <div class="col-md-12">
        <h4 class="m-b-lg"><b><?= $patient->name." ".$patient->surname." (".date_diff(date_create($patient->dob), date_create(date("Y-m-d")))->format('%y')." yaşında)";; ?></b> isimli hasta için Yeni Anamnez Ekle
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">

                    <div class="row" style="padding: 15px">

                        <div class="form-group">
                            <label>Geliş Şikayeti</label>
                            <textarea name="gelissikayet" class="m-0" data-plugin="summernote" data-options="{height: 250}"> <?= isset($form_error) ? set_value("gelissikayeti") : ""; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Muayene Bulguları</label>
                            <textarea name="muayenebulgu" class="m-0" data-plugin="summernote" data-options="{height: 250}"> <?= isset($form_error) ? set_value("muayenebulgu") : ""; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Öneri ve Tedaviler</label>
                            <textarea name="oneritedavi" class="m-0" data-plugin="summernote" data-options="{height: 250}"> <?= isset($form_error) ? set_value("oneritedaviler") : ""; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Notlar</label>
                            <textarea name="notes" class="m-0" data-plugin="summernote" data-options="{height: 250}"> <?= isset($form_error) ? set_value("notlar") : ""; ?></textarea>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Ücret</label>
                            <input class="form-control" type="number" id="price" name="price" placeholder="Ücret" value="<?= isset($form_error) ? set_value("ucret") : ""; ?>">
                            <?php if (isset($form_error)) {?>
                                <small class="input-form-error"><?php echo form_error("price"); ?></small>
                            <?php } ?>
                        </div>

                        <div class="form-group col-md-2">
                            <label>Ücret Birim</label>
                            <select class="form-control" id="pricetype" name="pricetype">
                                <option value="-1">Para Birimi Seçin</option>
                                <option value="tl">TL ₺</option>
                                <option value="usd">Dolar $</option>
                                <option value="eu">Euro €</option>
                                <option value="gbp">Pound £</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Randevulu / Randevusuz</label><br>
                            <input class="form-control" type="checkbox" data-switchery id="randevu" name="randevu" checked>
                        </div>
                        <div class="form-group col-md-2" id="zamansecici" hidden>
                            <label>Saat</label><br>
                            <input class="form-control" type="time" id="zaman" name="zaman" >
                        </div>
                    </div>
                    <input type="text" value="<?= $this->uri->segment(3); ?>" id="hastano" name="hastano" hidden>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("anamnez/list/".$this->uri->segment(3)); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div>
    </div>
</div>

<script>
    $("#randevu").on("change", function () {
        $("#zamansecici").toggle(500);
    })
</script>