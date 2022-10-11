<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Hizmetler Listesi
            <a href="<?php echo base_url("services/new_form") ?>"
               class="btn btn-outline btn-primary btn-xs pull-right "> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($items)) { ?>
                <div class="alert alert-info text-center">
                    <p>Kayıt Bulunamadı Eklemek için <a
                                href="<?php echo base_url("services/new_form") ?>">tıklayınız</a></p>
                </div>
            <?php } else { ?>
                <table class="table table-hover table-striped table-bordered content-container">
                    <thead>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th class="w50">#id</th>
                    <th>Başlık</th>
                    <th>url</th>
                    <th>Görsel</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("services/rankSetter"); ?>">
                    <?php foreach ($items as $item) { ?>
                        <tr id="ord-<?php echo $item->id ?>">
                            <td class="text-center"><i class="fa fa-reorder"></i></td>
                            <td class="w50 text-center"># <?php echo $item->id ?></td>
                            <td><?php echo $item->title ?></td>
                            <td><?php echo $item->url ?></td>
                            <td class="text-center">
                                <!--                            <img width="90" src="-->
                                <?php //echo base_url("uploads/$viewFolder/$item->img_url") ?><!--" alt="" class="img-rounded">-->
                                <img width="90" src="<?php echo get_picture($viewFolder, $item->img_url, "100x200"); ?>"
                                     alt="" class="img-rounded">
                            </td>
                            <td class="text-center">
                                <input
                                        data-url="<?php echo base_url("services/isActiveSetter/$item->id") ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        data-size="small"
                                    <?php echo ($item->isActive) ? "checked" : "" ?>
                                />
                            </td>
                            <td>
                                <button data-url="<?php echo base_url("services/delete/$item->id"); ?>"
                                        class="btn btn-danger btn-sm btn-outline remove-btn">
                                    <i class="fa fa-trash"></i></button>
                                <a href="<?php echo base_url("services/update_form/$item->id") ?>"
                                   class="btn btn-info btn-sm btn-outline"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div><!-- .widget -->
    </div>
</div>