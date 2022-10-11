<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg"><?php echo "<b>".$item->name." ".$item->surname."</b>" ?> Kaydını Düzenliyorsunuz
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("members/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Hasta Ad *</label>
                            <input class="form-control" id="name" name="name" placeholder="Hasta Adı" value="<?= isset($form_error) ? set_value("name") : $item->name; ?>">
                            <?php if (isset($form_error)) {?>
                                <small class="input-form-error"><?php echo form_error("name"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Hasta Soyad *</label>
                            <input class="form-control" id="surname" name="surname" placeholder="Hasta Soyadı" value="<?= isset($form_error) ? set_value("surname") : $item->surname; ?>">
                            <?php if (isset($form_error)) {?>
                                <small class="input-form-error"><?php echo form_error("surname"); ?></small>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>TC Numara *</label>
                            <input class="form-control" id="tcnumber" name="tcnumber" placeholder="TC" value="<?= isset($form_error) ? set_value("tcnumber") : $item->tcnumber; ?>">
                            <?php if (isset($form_error)) {?>
                                <small class="input-form-error"><?php echo form_error("tcnumber"); ?></small>
                            <?php } ?>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="datetimepicker4">Doğum Tarihi</label>
                            <div class='input-group date' id='datetimepicker4' data-plugin="datetimepicker" data-options="{ viewMode: 'years', format: 'YYYY.MM.DD' }">
                                <input type='text' class="form-control" name="dob" id="dob" value="<?= $item->dob ?>"/>
                                <span class="input-group-addon bg-info text-white">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            <?php if (isset($form_error)) {?>
                                <small class="input-form-error"><?php echo form_error("dob"); ?></small>
                            <?php } ?>
                        </div>


                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Telefon *</label>
                            <input class="form-control" id="phone" name="phone" placeholder="Telefon" value="<?= isset($form_error) ? set_value("phone") : $item->phone; ?>">
                            <?php if (isset($form_error)) {?>
                                <small class="input-form-error"><?php echo form_error("phone"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Adres</label>
                            <input class="form-control" id="address" name="address" placeholder="Adres" value="<?= isset($form_error) ? set_value("address") : $item->address; ?>">
                            <?php if (isset($form_error)) {?>
                                <small class="input-form-error"><?php echo form_error("address"); ?></small>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>E-Posta</label>
                            <input class="form-control" id="email" name="email" placeholder="E-Posta" value="<?= isset($form_error) ? set_value("email") : $item->email; ?>">
                            <?php if (isset($form_error)) {?>
                                <small class="input-form-error"><?php echo form_error("email"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Meslek</label>
                            <input class="form-control" id="job" name="job" placeholder="Meslek" value="<?= isset($form_error) ? set_value("job") : $item->job; ?>">
                            <?php if (isset($form_error)) {?>
                                <small class="input-form-error"><?php echo form_error("job"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Referans</label>
                            <input class="form-control" id="reffer" name="reffer" placeholder="Referans" value="<?= isset($form_error) ? set_value("reffer") : $item->reffer; ?>">
                            <?php if (isset($form_error)) {?>
                                <small class="input-form-error"><?php echo form_error("reffer"); ?></small>
                            <?php } ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("members"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div>
    </div>
</div>