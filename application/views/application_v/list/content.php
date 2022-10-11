<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Gelen Başvurular Listesi
            <!--            <a href="-->
            <?php //echo base_url("brands/new_form") ?><!--" class="btn btn-outline btn-primary btn-xs pull-right "> <i class="fa fa-plus"></i> Yeni Ekle</a>-->
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($items)) { ?>
                <div class="alert alert-info text-center">
                    <p>Henüz herhangi bir firma iş başvuru almadı</p>
                </div>
            <?php } else { ?>
                <table class="table table-hover table-striped table-bordered content-container">
                    <thead>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th class="w50">#id</th>
                    <th class="well-lg">Firma</th>
                    <th>Aday Ad Soyad</th>
                    <th>Başvuru Zamanı</th>
                    <th class="well-lg">Detay/CV/Sil</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("brands/rankSetter"); ?>">
                    <?php foreach ($items as $item) { ?>
                        <tr id="ord-<?php echo $item->id ?>">
                            <td class="w15 text-center"><i class="fa fa-reorder"></i></td>
                            <td class="w50 text-center"># <?php echo $item->id ?></td>
                            <td class=""><?php echo $item->company ?></td>
                            <td class="text-center"><?php echo $item->fname . ' ' . $item->lname ?></td>
                            <td class="text-center"><?php echo get_readable_date($item->createdAt) ?></td>

                            <td class="text-center">
                                <button type="button" data-url="<?php echo base_url("Application/getDetail/$item->id"); ?>"
                                   class="btn btn-deepOrange btn-sm btn-outline detail-btn"><i
                                            class="fa fa-database"></i></button>
                                <a href="<?php echo base_url("uploads/application_v/$item->cv") ?>" target="_blank"
                                   class="btn btn-info btn-sm btn-outline"><i
                                            class="fa fa-paper-plane"></i></a>
                                <button data-url="<?php echo base_url("Application/delete/$item->id"); ?>"
                                        class="btn btn-danger btn-sm btn-outline remove-btn">
                                    <i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div><!-- .widget -->
    </div>
</div>