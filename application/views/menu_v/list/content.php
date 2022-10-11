<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Menü Düzeni
            <a href="<?php echo base_url("Menu/new_form") ?>" class="btn btn-outline btn-primary btn-xs pull-right "> <i
                        class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->

    <!-- <div class="col-md-4">
        <div class="widget p-lg">
            <div class="card">
                <div class="body">
                    <div class="clearfix m-b-20">
                        <div class="dd nestable-dark-theme">
                            <ol class="dd-list">
                                <?php foreach ($allMenuItems as $item) {
                                    if ($item->parent == -1) {
                                        ?>
                                        <li class="dd-item" data-id="<?= $item->id; ?>">
                                            <div class="dd-handle"><?= $item->title; ?></div>
                                            <?php if ($item->hasChild == 1) { ?>
                                                <ul class="dd-list">
                                                    <?php
                                                    foreach ($allMenuItems as $item2) { ?>
                                                        <?php if ($item->id == $item2->parent) { ?>
                                                            <li class="dd-item" data-id="<?= $item2->id; ?>">
                                                                <div class="dd-handle"><?= $item2->title; ?></div>
                                                            </li>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </ul>
                                            <?php } ?>
                                        </li>
                                    <?php }
                                } ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($allMenuItems)) { ?>
                <div class="alert alert-info text-center">
                    <p>Kayıt Bulunamadı Eklemek için <a href="<?php echo base_url("Menu/new_form") ?>">tıklayınız</a>
                    </p>
                </div>
            <?php } else { ?>
                <table class="table table-hover table-striped table-bordered content-container">
                    <thead>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th class="w50">#id</th>
                    <th>Başlık</th>
                    <th>Bağlı Olduğu</th>
                    <th>Controller</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("Menu/rankSetter"); ?>">
                    <?php foreach ($allMenuItems as $item) { ?>
                        <tr id="ord-<?php echo $item->id ?>">
                            <td class="text-center"><i class="fa fa-reorder"></i></td>
                            <td class="w50 text-center"># <?php echo $item->id ?></td>
                            <td><?php echo $item->title ?></td>
                            <td><?php echo get_menu_title($item->parent); ?></td>
                            <td><?php echo $item->controller; ?></td>
                            <td class="text-center">
                                <input
                                        data-url="<?php echo base_url("Menu/isActiveSetter/$item->id") ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        data-size="small"
                                    <?php echo ($item->isActive == 1) ? "checked" : "" ?>
                                />
                            </td>
                            <td>
                                <?php if (!$item->ineffaceable) {?>
                                <button data-url="<?php echo base_url("Menu/delete/$item->id"); ?>"
                                        class="btn btn-danger btn-sm btn-outline remove-btn">
                                    <i class="fa fa-trash"></i></button>
                                <?php } ?>
                                <?php ?>
                                <a href="<?php echo base_url("Menu/update_form/$item->id") ?>"
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