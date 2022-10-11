<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Haber Bülteni Aboneleri Listesi
            <!--<a href="<?php //echo base_url("members/new_form") ?>" class="btn btn-outline btn-primary btn-xs pull-right ">
                <i class="fa fa-plus"></i> Yeni Ekle</a> -->
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg widget table-responsive">
            <?php if (empty($items)) { ?>
                <div class="alert alert-info text-center">
                    <p>Kayıt Bulunamadı </p>
                    <!--Eklemek için <a href="<?php //echo base_url("members/new_form") ?>">tıklayınız</a> -->

                </div>
            <?php } else { ?>
                <table id="responsive-datatable" data-plugin="DataTable" data-options="{
                responsive: true,
                keys: true
            }" class="table table-hover table-striped table-bordered content-container" cellspacing="0"
                       width="100%">
                    <thead>
                    <th class="w30">#id</th>
                    <th>E-Posta</th>
                    <th>İlk Kayıt Tarihi</th>
                    <th>İşlem</th>
                    </thead>
                    <?php foreach ($items as $item) { ?>
                        <tr>
                            <td class="w50 text-center"># <?php echo $item->id ?></td>
                            <td><?php echo $item->title ?></td>

                            <td><?php echo get_readable_date($item->createdAt) ?></td>
                            <td class="text-center">

                                <button data-url="<?php echo base_url("newsletter/delete/$item->id") ?>"
                                        class="btn btn-sm btn-danger btn-outline btn-icon remove-btn"><i
                                            class="fa fa-trash"></i>
                                </button>
                        </tr>
                    <?php } ?>
                </table>
            <?php } ?>
        </div>
    </div>
</div>