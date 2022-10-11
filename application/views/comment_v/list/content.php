<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Yorum Listesi
            <!--            <a href="-->
            <?php //echo base_url("Comments/new_form") ?><!--" class="btn btn-outline btn-primary btn-xs pull-right "> <i class="fa fa-plus"></i> Yeni Ekle</a>-->
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($items)) { ?>
                <div class="alert alert-info text-center">
                    <p>Kayıt Bulunamadı
                        <!-- Eklemek için <a href="<?php /*echo base_url("Comments/new_form") */ ?>">tıklayınız</a>--></p>
                </div>
            <?php } else { ?>
                <table class="table table-hover table-striped table-bordered content-container">
                    <thead>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th class="w50">#id</th>
                    <th>Başlık</th>
                    <th>İlgili Başlık</th>
                    <th>Tarih</th>
                    <th>Yorumcu</th>
                    <th>E-Posta</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("Comments/rankSetter"); ?>">
                    <?php foreach ($items as $item) { ?>
                        <tr id="ord-<?php echo $item->id ?>">
                            <td class="text-center"><i class="fa fa-reorder"></i></td>
                            <td class="w50 text-center"># <?php echo $item->id ?></td>
                            <td><?php echo $item->title ?></td>
                            <td><?php echo get_news_title($item->newsId) ?></td>
                            <td><?php echo get_readable_date($item->createdAt) ?></td>
                            <td><?php echo $item->name ?></td>
                            <td><?php echo $item->mail ?></td>
                            <td class="text-center">
                                <input
                                        data-url="<?php echo base_url("Comments/isActiveSetter/$item->id") ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        data-size="small"
                                    <?php echo ($item->status) ? "checked" : "" ?>
                                />
                            </td>
                            <td>
                                <button data-url="<?php echo base_url("Comments/delete/$item->id"); ?>"
                                        class="btn btn-danger btn-sm btn-outline remove-btn">
                                    <i class="fa fa-trash"></i> Sil
                                </button>
                                <!--                                <a href="-->
                                <?php //echo base_url("Comments/update_form/$item->id") ?><!--"-->
                                <!--                                   class="btn btn-info btn-sm btn-outline"><i class="fa fa-eye"></i> Gör</a>-->


                                <a class="pr-1 text-danger btn btn-sm  mr-1 togac "
                                   href="<?= base_url('Web/haberDetay2/') . $item->newsId; ?>"
                                   target="frame_adi" aria-expanded="false">
                                    <i class="fa fa-eye"></i> Gör
                                </a>


                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div><!-- .widget -->
    </div>
</div>

<div class="modal fade" id="composeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Haber Yorum İnceleme</h4>
            </div>
            <div class="modal-body">
                <iframe name="frame_adi" width="870" height="700" frameborder="0"></iframe>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script>
    $(".togac").on("click", function () {
        //alert("asd");
        //$("#exampleModalCenter").toogle();
        $('#composeModal').modal({
            autofocus: false
        }).modal('show');
    });
</script>