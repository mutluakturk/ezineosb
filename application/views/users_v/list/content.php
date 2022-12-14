<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Kullanıcı Listesi
            <a href="<?php echo base_url("users/new_form") ?>" class="btn btn-outline btn-primary btn-xs pull-right "> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($items)) {?>
            <div class="alert alert-info text-center">
                <p>Kayıt Bulunamadı Eklemek için <a href="<?php echo base_url("users/new_form") ?>">tıklayınız</a></p>
            </div>
            <?php } else { ?>
            <table class="table table-hover table-striped table-bordered content-container">
                <thead>
                    <th class="w50">#id</th>
                    <th>Kullanıcı Adı</th>
                    <th>Ad Soyad</th>
                    <th>E-Posta</th>
                    <th>Tip</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                </thead>
                <tbody>
                <?php foreach ($items as $item) {?>
                    <tr>

                        <td class="w50 text-center"># <?php echo $item->id ?></td>
                        <td><?php echo $item->user_name ?></td>
                        <td><?php echo $item->full_name ?></td>
                        <td class="text-center"><?php echo $item->email ?></td>
                        <td class="text-center"><?php echo $item->user_type ?></td>
                        <td class="text-center">
                            <input
                                data-url="<?php echo base_url("users/isActiveSetter/$item->id") ?>"
                                class="isActive"
                                type="checkbox"
                                data-switchery
                                data-color="#10c469"
                                data-size="small"
                            <?php echo ($item->isActive) ? "checked" : "" ?>
                            />
                        </td>
                        <td>
                            <button data-url="<?php echo base_url("users/delete/$item->id"); ?>"
                                    class="btn btn-danger btn-sm btn-outline remove-btn">
                                <i class="fa fa-trash"></i></button>
                            <a href="<?php echo base_url("users/update_form/$item->id") ?>" class="btn btn-info btn-sm btn-outline"><i class="fa fa-pencil"></i></a>
                            <a href="<?php echo base_url("users/update_pasasword_form/$item->id") ?>" class="btn btn-purple btn-sm btn-outline"><i class="fa fa-key"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php } ?>
        </div><!-- .widget -->
    </div>
</div>