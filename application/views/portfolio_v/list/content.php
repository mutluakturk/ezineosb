<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Portfolio Listesi
            <a href="<?php echo base_url("portfolio/new_form") ?>" class="btn btn-outline btn-primary btn-xs pull-right "> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($items)) {?>
            <div class="alert alert-info text-center">
                <p>Kayıt Bulunamadı Eklemek için <a href="<?php echo base_url("portfolio/new_form") ?>">tıklayınız</a></p>
            </div>
            <?php } else { ?>
            <table class="table table-hover table-striped table-bordered content-container">
                <thead>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th class="w50">#id</th>
                    <th>Başlık</th>
                    <th>url</th>
                    <th>Fiyat</th>
                    <th>Kategori</th>
                    <th>Müşteri</th>
                    <th>Bitiş Tarihi</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                </thead>
                <tbody class="sortable" data-url="<?php echo base_url("portfolio/rankSetter"); ?>">
                <?php foreach ($items as $item) {?>
                    <tr id="ord-<?php echo $item->id ?>">
                        <td class="text-center"><i class="fa fa-reorder"></i></td>
                        <td class="w50 text-center"># <?php echo $item->id ?></td>
                        <td class="text-center"><?php echo $item->title ?></td>
                        <td class="text-center"><?php echo $item->url ?></td>
                        <td class="text-center"><?php echo $item->price ?></td>
                        <td class="text-center"><?php echo get_category_title($item->category_id); ?></td>
                        <td class="text-center"><?php echo $item->client; ?></td>
                        <td class="text-center"><?php echo get_readable_date($item->finishedAt); ?></td>
                        <td class="text-center" class="text-center">
                            <input
                                    data-url="<?php echo base_url("portfolio/isActiveSetter/$item->id") ?>"
                                    class="isActive"
                                    type="checkbox"
                                    data-switchery
                                    data-color="#10c469"
                                    data-size="small"
                                <?php echo ($item->isActive) ? "checked" : "" ?>
                            />
                        </td>
                        <td>
                            <button data-url="<?php echo base_url("portfolio/delete/$item->id"); ?>"
                                    class="btn btn-danger btn-sm btn-outline remove-btn">
                                <i class="fa fa-trash"></i> Sil</button>
                            <a href="<?php echo base_url("portfolio/update_form/$item->id") ?>" class="btn btn-info btn-sm btn-outline"><i class="fa fa-pencil"></i> Düzenle</a>
                            <a href="<?php echo base_url("portfolio/image_form/$item->id") ?>" class="btn btn-purple btn-sm btn-outline"><i class="fa fa-file-image-o"></i> Resimler</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php } ?>
        </div><!-- .widget -->
    </div>
</div>