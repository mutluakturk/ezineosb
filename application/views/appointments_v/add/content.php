<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Yeni Randevu Ekle
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("appointments/save"); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Tarih</label>
                            <!--<input class="form-control" id="tarih" name="tarih">-->
                            <!--<input type="hidden" name="event_date" data-plugin="datetimepicker" data-options="{ inline: true, viewMode: 'days', format : 'YYYY-MM-DD' }" />-->
                            <input class="form-control" type="date" name="event_date" id="event_date" />
                            <?php if (isset($form_error)) {?>
                                <small class="input-form-error"><?php echo form_error("event_date"); ?></small>
                            <?php } ?>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Randevu Zamanı</label>
                            <select class="form-control" name="event_time" id="event_time">
                                <option value="-1">Randevu Zamanı</option>
                                <!--<option value="09:00">09:00</option>
                                <option value="09:30">09:30</option>
                                <option value="10:00">10:00</option>
                                <option value="10:30">10:30</option>
                                <option value="11:00">11:00</option>
                                <option value="11:30">11:30</option>
                                <option value="12:00">12:00</option>
                                <option value="13:00">13:00</option>
                                <option value="13:30">13:30</option>
                                <option value="14:00">14:00</option>
                                <option value="14:30">14:30</option>
                                <option value="15:00">15:00</option>
                                <option value="15:30">15:30</option>
                                <option value="16:00">16:00</option>
                                <option value="16:30">16:30</option>
                                <option value="17:00">17:00</option>-->
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Hasta Ad</label>
                            <input type="text" class="form-control col-md-4" id="ad" name="ad">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Hasta Soyad</label>
                            <input type="text" class="form-control col-md-4" id="soyad" name="soyad">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Hasta Telefon</label>
                            <input type="text" class="form-control col-md-4" id="telefon" name="telefon">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("appointments"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div>
    </div>
</div>

<script>
    $('#event_date').on('change', function () {
        //alert($('#event_date').val());

        //burada ajax calısacak o tarihe ait olan randevuları getirecek
        var secilenTarih = 'tarih=' + $('#event_date').val();
        $.ajax({
            type: "post",
            url: "<?= base_url('appointments/secilisaatler'); ?>",
            data: secilenTarih,
            format: "json",
            success: function (res) {
                //alert(res);
                //swal("Oldu", "İlgili güne ait saat listesi alınamadı", "success");
                var saatler = ["09:00",
                    "09:30",
                    "10:00",
                    "10:30",
                    "11:00",
                    "11:30",
                    "12:00",
                    "13:00",
                    "13:30",
                    "14:00",
                    "14:30",
                    "15:00",
                    "15:30",
                    "16:00",
                    "16:30",
                    "17:00"];
                var saatler_vals = ["09:00",
                    "09:30",
                    "10:00",
                    "10:30",
                    "11:00",
                    "11:30",
                    "12:00",
                    "13:00",
                    "13:30",
                    "14:00",
                    "14:30",
                    "15:00",
                    "15:30",
                    "16:00",
                    "16:30",
                    "17:00"];

               //saatler.forEach(function (ent) {
               //    alert(ent);
               //})
                var doluSaatler = []; //ajax dönüsünden saatleri doldurucaz
                var kimler = []; //ajaxtan dönen dolu saatlerin kimler oldugunu tutar
                var obj = JSON.parse(res);
                //alert(obj);

                saatler = saatler_vals;

                var saatbox = document.getElementById('event_time');

                document.getElementById("event_time").options.length = 0;
                
                obj.forEach(function (obj_ent) {
                    //alert(obj_ent.event_time);
                    doluSaatler.push(obj_ent.event_time);
                    kimler.push(obj_ent.name + " " + obj_ent.surname);
                    //saatler.forEach(function (saat_ent) {
                    //    if (obj_ent)
                    //    alert(ent);
                    //})
                });


                for (i = 0; i <= saatler.length; i++){
                    if (doluSaatler.indexOf(saatler[i]) != -1){
                        var indis = doluSaatler.indexOf(saatler[i]);
                        saatler[i] = saatler[i] + " " + kimler[indis];
                    }
                }


                saatler = saatler.sort();
                for (i = 0; i <= saatler.length - 1; i++){
                    var opt = document.createElement("option");
                    opt.text = saatler[i];
                    opt.value = saatler[i];
                    saatbox.options.add(opt);
                }

                //alert(doluSaatler);
                //alert(kimler);
                //alert(saatler);
                //alert(saatler_vals);

                //var saatbox = document.getElementById('event_date');
                //if (saatbox.options.length() > 1){
                //    for (i = 0; i <= saatler.length; i++){
                //        saatbox.options.remove(i);
                //    }
                //}
                //for (i = 0; i <= saatler.length; i++){
                //    var opt = document.createElement("option");
                //    opt.text = saatler_vals[i];
                //    opt.value = saatler[i];
                //    saatbox.options.add(opt);
                //}
            },
            fail: function () {
                swal("Hata", "İlgili güne ait saat listesi alınamadı", "error");
            }
        });
    })
</script>