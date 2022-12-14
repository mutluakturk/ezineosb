<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Portfolyo Kategori Listesi
            <a href="<?php echo base_url("portfolio_categories/new_form") ?>" class="btn btn-outline btn-primary btn-xs pull-right "> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($items)) {?>
            <div class="alert alert-info text-center">
                <p>Kayıt Bulunamadı Eklemek için <a href="<?php echo base_url("portfolio_categories/new_form") ?>">tıklayınız</a></p>
            </div>
            <?php } else { ?>
            <table class="table table-hover table-striped table-bordered content-container">
                <thead>
                    <th class="w50">#id</th>
                    <th>Başlık</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                </thead>
                <tbody>
                <?php foreach ($items as $item) {?>
                    <tr>
                        <td class="w50 text-center"># <?php echo $item->id ?></td>
                        <td><?php echo $item->title ?></td>

                        <td class="text-center w100">
                            <input
                                    data-url="<?php echo base_url("portfolio_categories/isActiveSetter/$item->id") ?>"
                                    class="isActive"
                                    type="checkbox"
                                    data-switchery
                                    data-color="#10c469"
                                    data-size="small"
                                <?php echo ($item->isActive) ? "checked" : "" ?>
                            />
                        </td>
                        <td class="w100">
                            <button data-url="<?php echo base_url("portfolio_categories/delete/$item->id"); ?>"
                                    class="btn btn-danger btn-sm btn-outline remove-btn">
                                <i class="fa fa-trash"></i></button>
                            <a href="<?php echo base_url("portfolio_categories/update_form/$item->id") ?>" class="btn btn-info btn-sm btn-outline"><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php } ?>
        </div><!-- .widget -->
    </div>
</div>