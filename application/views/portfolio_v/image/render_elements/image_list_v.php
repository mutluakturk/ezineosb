<?php if (empty($item_images)) {?>
    <div class="alert alert-info text-center">
        <p>Kayıt Bulunamadı..</p>
    </div>
<?php } else { ?>

    <table class="table table-bordered table-striped table-hover pictures_list ">
        <thead>
        <th class="order"><i class="fa fa-reorder"></i></th>
        <th>#id</th>
        <th>Görsel</th>
        <th>Resim Ad</th>
        <th>Durumu</th>
        <th>Kapak</th>
        <th>İşlem</th>
        </thead>
        <tbody class="sortable" data-url="<?php echo base_url("portfolio/imageRankSetter"); ?>">
        <?php foreach ($item_images as $img) { ?>

            <tr id="ord-<?php echo $img->id ?>">
                <td class="order"><i class="fa fa-reorder"></i></td>
                <td class="w50 text-center"># <?php echo $img->id; ?></td>
                <td class="w100 text-center">
                    <img width="30" src="<?php echo base_url("uploads/{$viewFolder}/$img->img_url"); ?>" alt="<?php echo $img->img_url; ?>" class="img-responsive">
                </td>
                <td><?php echo $img->img_url; ?></td>
                <td class="w100 text-center"><input
                        data-url="<?php echo base_url("portfolio/imageIsActiveSetter/$img->id") ?>"
                        class="isActive"
                        type="checkbox"
                        data-switchery
                        data-color="#10c469"
                        data-size="small"
                        <?php echo ($img->isActive) ? "checked" : "" ?>
                    /></td>

                <td class="w100 text-center"><input
                            data-url="<?php echo base_url("portfolio/isCoverSetter/$img->id/$img->portfolio_id") ?>"
                            class="isCover"
                            type="checkbox"
                            data-switchery
                            data-color="#f9c851"
                            data-size="small"
                        <?php echo ($img->isCover) ? "checked" : "" ?>
                    /></td>


                <td class="w100 text-center">
                    <button data-url="<?php echo base_url("portfolio/imageDelete/$img->id/$img->portfolio_id"); ?>"
                         class="btn btn-danger btn-sm btn-outline remove-btn btn-block">
                        <i class="fa fa-trash"></i> Sil</button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php } ?>