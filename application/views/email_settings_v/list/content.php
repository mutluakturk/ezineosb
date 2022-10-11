<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">E-Posta Listesi
            <a href="<?php echo base_url("emailsettings/new_form") ?>" class="btn btn-outline btn-primary btn-xs pull-right "> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($items)) {?>
            <div class="alert alert-info text-center">
                <p>Kayıt Bulunamadı Eklemek için <a href="<?php echo base_url("emailsettings/new_form") ?>">tıklayınız</a></p>
            </div>
            <?php } else { ?>
            <table class="table table-hover table-striped table-bordered content-container">
                <thead>
                    <th class="w50">#id</th>
                    <th>E-Posta Başlık</th>
                    <th>Sunucu Adı</th>
                    <th>Protokol</th>
                    <th>Port</th>
                    <th>E-Posta</th>
                    <th>Kimden</th>
                    <th>Kime</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                </thead>
                <tbody>
                <?php foreach ($items as $item) {?>
                    <tr>
                        <td class="w50 text-center"># <?php echo $item->id ?></td>
                        <td class="text-center"><?php echo $item->user_name ?></td>
                        <td class="text-center"><?php echo $item->host ?></td>
                        <td class="text-center"><?php echo $item->protocol ?></td>
                        <td class="text-center"><?php echo $item->port ?></td>
                        <td class="text-center"><?php echo $item->user ?></td>
                        <td class="text-center"><?php echo $item->from ?></td>
                        <td class="text-center"><?php echo $item->to ?></td>
                        <td class="text-center">
                            <input
                                data-url="<?php echo base_url("emailsettings/isActiveSetter/$item->id") ?>"
                                class="isActive"
                                type="checkbox"
                                data-switchery
                                data-color="#10c469"
                                data-size="small"
                            <?php echo ($item->isActive) ? "checked" : "" ?>
                            />
                        </td>
                        <td>
                            <button data-url="<?php echo base_url("emailsettings/delete/$item->id"); ?>"
                                    class="btn btn-danger btn-sm btn-outline remove-btn">
                                <i class="fa fa-trash"></i></button>
                            <a href="<?php echo base_url("emailsettings/update_form/$item->id") ?>" class="btn btn-info btn-sm btn-outline"><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php } ?>
        </div><!-- .widget -->
    </div>
</div>