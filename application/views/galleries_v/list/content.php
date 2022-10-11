<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Galeri Listesi
            <a href="<?php echo base_url("galleries/new_form") ?>"
               class="btn btn-outline btn-primary btn-xs pull-right "> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($items)) { ?>
                <div class="alert alert-info text-center">
                    <p>Kayıt Bulunamadı Eklemek için <a
                                href="<?php echo base_url("galleries/new_form") ?>">tıklayınız</a></p>
                </div>
            <?php } else { ?>
                <table class="table table-hover table-striped table-bordered content-container">
                    <thead>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th class="w50">#id</th>
                    <th>Galeri Adı</th>
                    <th>Türü</th>
<!--                    <th>Klasör Adı</th>-->
                    <th>Kapak</th>
                    <th>url</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("galleries/rankSetter"); ?>">
                    <?php foreach ($items as $item) { ?>
                        <tr id="ord-<?php echo $item->id ?>">
                            <td class="text-center"><i class="fa fa-reorder"></i></td>
                            <td class="w50 text-center"># <?php echo $item->id ?></td>
                            <td><?php echo $item->title ?></td>
                            <td class="text-center">
                                <?php
                                if ($item->gallery_type == "image") {
                                    $buttonIcon = "fa-image fa-2x";
                                    $button_url = "galleries/upload_form/$item->id";
                                } elseif ($item->gallery_type == "video") {
                                    $buttonIcon = "fa-play-circle-o fa-2x";
                                    $button_url = "galleries/gallery_video_list/$item->id";
                                } else {
                                    $buttonIcon = "fa-folder fa-2x";
                                    $button_url = "galleries/upload_form/$item->id";
                                }
                                //fa-file-image-o
                                //fa-image
                                //fa-folder

                                //$buttonImage = "fa-file-image-o";
                                ?>
                                <i class="fa <?php echo $buttonIcon; ?>"></i>
                            </td>
<!--                            <td>--><?php //echo $item->folder_name ?><!--</td>-->
                            <td><img src="<?php echo base_url('uploads/galleries_v/' . $item->img_url); ?>"
                                     style="width: 50px; height: 70px"></td>
                            <td><?php echo $item->url ?></td>
                            <td class="text-center">
                                <input
                                        data-url="<?php echo base_url("galleries/isActiveSetter/$item->id") ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        data-size="small"
                                    <?php echo ($item->isActive) ? "checked" : "" ?>
                                />
                            </td>
                            <td class="text-center">
                                <button data-url="<?php echo base_url("galleries/delete/$item->id"); ?>"
                                        class="btn btn-danger btn-sm btn-outline remove-btn">
                                    <i class="fa fa-trash"></i></button>
                                <a href="<?php echo base_url("galleries/update_form/$item->id") ?>"
                                   class="btn btn-info btn-sm btn-outline"><i class="fa fa-pencil"></i></a>
                                <a href="<?php echo base_url($button_url) ?>" class="btn btn-purple btn-sm btn-outline"><i
                                            class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div><!-- .widget -->
    </div>
</div>