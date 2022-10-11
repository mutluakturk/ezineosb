<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Randevu Listesi
            <a href="<?php echo base_url("appointments/new_form") ?>" class="btn btn-outline btn-primary btn-xs pull-right "> <i class="fa fa-plus"></i> Yeni Ekle</a>
            <a href="<?php echo base_url("appointments/calendar") ?>" class="btn btn-outline btn-deepOrange btn-xs pull-right "> <i class="fa fa-calendar"></i> Takvim</a>
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($items)) {?>
            <div class="alert alert-info text-center">
                <p>Kayıt Bulunamadı Eklemek için <a href="<?php echo base_url("appointments/new_form") ?>">tıklayınız</a></p>
            </div>
            <?php } else { ?>
            <table id="responsive-datatable" data-plugin="DataTable" data-options="{
                    responsive: true,
                    keys: true
                    }" class="table table-hover table-striped table-bordered content-container" cellspacing="0" width="100%">
                <thead>
                    <th>Hasta Ad Soyad</th>
                    <th>Tarih</th>
                    <th>Saat</th>
                    <th>Telefon</th>
                    <th>Oluşturulma</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                </thead>
                <tbody>
                <?php foreach ($items as $item) {?>
                    <tr>
                        <td class="w150"><?php echo $item->name." ".$item->surname; ?></td>
                        <td class="text-center w100"><?php echo get_readable_just_date($item->event_date); ?></td>
                        <td class="text-center w50"><?= ($item->event_time == -1) ? "Randevusuz" : $item->event_time ; ?></td>
                        <td class="text-center w100"><?php echo $item->phone; ?></td>
                        <td class="text-center w100"><?php echo get_readable_just_date($item->createdAt); ?></td>
                        <td class="text-center w50">
                            <input
                                data-url="<?php echo base_url("appointments/isActiveSetter/$item->id") ?>"
                                class="isActive"
                                type="checkbox"
                                data-switchery
                                data-color="#10c469"
                                data-size="small"
                                <?php echo ($item->isActive) ? "checked" : "" ?>
                            />
                        </td>
                        <td class="w100">
                            <button data-url="<?php echo base_url("appointments/delete/$item->id"); ?>"
                                    class="btn btn-danger btn-sm btn-outline remove-btn">
                                <i class="fa fa-trash"></i></button>
                            <a href="<?php echo base_url("appointments/update_form/$item->id") ?>" class="btn btn-info btn-sm btn-outline"><i class="fa fa-pencil"></i></a>
                            <?php if (patient_check($item->name, $item->surname) == -1) { ?>
                                <a href="<?php echo base_url("members/new_form_from_app/$item->id") ?>" class="btn btn-warning btn-sm" title="Bu hasta kayıtlı değildir."><i class="fa fa-warning"></i></a>
                            <?php } else {?>
                            <?php if ($this->session->user->user_type == "Yönetim") {?>
                                <a href="<?php echo base_url("anamnez/new_form/".patient_check($item->name, $item->surname)); ?>" class="btn btn-success btn-sm" title="Yeni anamnez"><i class="fa fa-heart"></i></a>
                            <?php } } ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php } ?>
        </div><!-- .widget -->
    </div>
</div>