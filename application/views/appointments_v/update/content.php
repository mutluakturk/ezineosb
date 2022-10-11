<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg"><?php echo "<b>".$item->name." ".$item->surname." - ".get_readable_just_date($item->event_date)."</b>" ?> tarihli Randevu Kaydını Düzenliyorsunuz
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("appointments/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Tarih</label>
                            <!--<input class="form-control" id="tarih" name="tarih">-->
                            <!--<input type="hidden" name="event_date" data-plugin="datetimepicker" data-options="{ inline: true, viewMode: 'days', format : 'YYYY-MM-DD' }" />-->
                            <input class="form-control" type="date" name="event_date" id="event_date" value="<?= $item->event_date; ?>"/>
                            <?php if (isset($form_error)) {?>
                                <small class="input-form-error"><?php echo form_error("event_date"); ?></small>
                            <?php } ?>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Randevu Zamanı</label>
                            <select class="form-control" name="event_time" id="event_time">
                                <option <?= ($item->event_time == "-1") ? "selected" : ""; ?> value="-1">Randevu Zamanı</option>
                                <option <?= ($item->event_time == "09:00") ? "selected" : ""; ?> value="09:00">09:00</option>
                                <option <?= ($item->event_time == "09:30") ? "selected" : ""; ?> value="09:30">09:30</option>
                                <option <?= ($item->event_time == "10:00") ? "selected" : ""; ?> value="10:00">10:00</option>
                                <option <?= ($item->event_time == "10:30") ? "selected" : ""; ?> value="10:30">10:30</option>
                                <option <?= ($item->event_time == "11:00") ? "selected" : ""; ?> value="11:00">11:00</option>
                                <option <?= ($item->event_time == "11:30") ? "selected" : ""; ?> value="11:30">11:30</option>
                                <option <?= ($item->event_time == "12:00") ? "selected" : ""; ?> value="12:00">12:00</option>
                                <option <?= ($item->event_time == "13:00") ? "selected" : ""; ?> value="13:00">13:00</option>
                                <option <?= ($item->event_time == "13:30") ? "selected" : ""; ?> value="13:30">13:30</option>
                                <option <?= ($item->event_time == "14:00") ? "selected" : ""; ?> value="14:00">14:00</option>
                                <option <?= ($item->event_time == "14:30") ? "selected" : ""; ?> value="14:30">14:30</option>
                                <option <?= ($item->event_time == "15:00") ? "selected" : ""; ?> value="15:00">15:00</option>
                                <option <?= ($item->event_time == "15:30") ? "selected" : ""; ?> value="15:30">15:30</option>
                                <option <?= ($item->event_time == "16:00") ? "selected" : ""; ?> value="16:00">16:00</option>
                                <option <?= ($item->event_time == "16:30") ? "selected" : ""; ?> value="16:30">16:30</option>
                                <option <?= ($item->event_time == "17:00") ? "selected" : ""; ?> value="17:00">17:00</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Hasta Ad</label>
                            <input type="text" class="form-control col-md-4" id="ad" name="ad" value="<?= $item->name; ?>">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Hasta Soyad</label>
                            <input type="text" class="form-control col-md-4" id="soyad" name="soyad" value="<?= $item->surname; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Hasta Telefon</label>
                            <input type="text" class="form-control col-md-4" id="telefon" name="telefon" value="<?= $item->phone; ?>">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("appointments"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div>
    </div>
</div>