<?php if (empty($items)) {?>
    <div class="alert alert-info text-center">
        <p>Kayıt Bulunamadı..</p>
    </div>
<?php } else { ?>

    <table class="table table-bordered table-striped table-hover pictures_list ">
        <thead>
        <th class="order"><i class="fa fa-reorder"></i></th>
        <th>#id</th>
        <th>Görsel</th>
        <th>Dosya Yolu Ad</th>
        <th>Durumu</th>
        <th>İşlem</th>
        </thead>
        <tbody class="sortable" data-url="<?php echo base_url("Galleries/fileRankSetter/$item->gallery_type"); ?>">
        <?php foreach ($items as $item) { ?>

            <tr id="ord-<?php echo $item->id ?>">
                <td class="order"><i class="fa fa-reorder"></i></td>
                <td class="w50 text-center"># <?php echo $item->id; ?></td>
                <td class="w100 text-center">
                    <?php if($gallery_type == "image"){ ?>
                        <img width="30" src="<?php echo base_url("$item->url"); ?>" alt="<?php echo $item->url; ?>" class="img-responsive">
                    <?php } else if ($gallery_type == "file") {?>

                        <i class="fa fa-folder fa-2x"></i>

                    <?php } ?>
                </td>
                <td><?php echo $item->url; ?></td>
                <td class="w100 text-center"><input
                        data-url="<?php echo base_url("Galleries/fileIsActiveSetter/$item->id/$gallery_type") ?>"
                        class="isActive"
                        type="checkbox"
                        data-switchery
                        data-color="#10c469"
                        data-size="small"
                        <?php echo ($item->isActive) ? "checked" : "" ?>
                    /></td>

                <td class="w100 text-center">
                    <button data-url="<?php echo base_url("Galleries/fileDelete/$item->id/$item->gallery_id/$gallery_type"); ?>"
                         class="btn btn-danger btn-sm btn-outline remove-btn btn-block">
                        <i class="fa fa-trash"></i> Sil</button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php } ?>