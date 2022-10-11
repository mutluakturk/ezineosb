<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Sayfa İçerik Listesi
            <a href="<?php echo base_url("Page/new_form") ?>" class="btn btn-outline btn-primary btn-xs pull-right "> <i
                        class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($allMenuItems)) { ?>
                <div class="alert alert-info text-center">
                    <p>Kayıt Bulunamadı Eklemek için <a href="<?php echo base_url("Page/new_form") ?>">tıklayınız</a>
                    </p>
                </div>
            <?php } else { ?>
                <table class="table table-hover table-striped table-bordered content-container">
                    <thead>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th class="w50">#id</th>
                    <th>Menu Elemanı</th>
                    <th>Tags</th>
                    <th>Seo</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("Page/rankSetter"); ?>">
                    <?php foreach ($allMenuItems as $item) { ?>
                        <tr id="ord-<?php echo $item->id ?>">
                            <td class="text-center"><i class="fa fa-reorder"></i></td>
                            <td class="w50 text-center"># <?php echo $item->id ?></td>
                            <td><?php echo get_menu_title($item->menuId) ?></td>
                            <td><?php echo $item->tags; ?></td>
                            <td><?php echo $item->seo; ?></td>
                            <td>
                                <?php if (!$item->ineffaceable) {?>
                                <button data-url="<?php echo base_url("Page/delete/$item->id"); ?>"
                                        class="btn btn-danger btn-sm btn-outline remove-btn">
                                    <i class="fa fa-trash"></i></button>
                                <?php } ?>
                                <a href="<?php echo base_url("Page/update_form/$item->id") ?>"
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