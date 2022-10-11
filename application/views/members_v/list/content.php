<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Hasta Listesi
            <a href="<?php echo base_url("members/new_form") ?>" class="btn btn-outline btn-primary btn-xs pull-right "> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget p-lg widget table-responsive">
            <?php if (empty($items)) {?>
            <div class="alert alert-info text-center">
                <p>Kayıt Bulunamadı Eklemek için <a href="<?php echo base_url("members/new_form") ?>">tıklayınız</a></p>
            </div>
            <?php } else { ?>
                <table id="responsive-datatable" data-plugin="DataTable" data-options="{
                responsive: true,
                keys: true
            }" class="table table-hover table-striped table-bordered content-container" cellspacing="0" width="100%">
                    <thead>
                    <th class="w30">#id</th>
                    <th class="w50">Tc No</th>
                    <th>Ad</th>
                    <th>Soyad</th>
                    <th class="w50">Telefon</th>
                    <th>Referans</th>
                    <th class="w150">İlk Kayıt Tarihi</th>
                    <th>İşlem</th>
                    </thead>
                    <?php foreach ($items as $item) {?>
                        <tr>
                            <td class="w50 text-center"># <?php echo $item->id ?></td>
                            <td><?php echo $item->tcnumber ?></td>
                            <td><?php echo $item->name ?></td>
                            <td><?php echo $item->surname ?></td>
                            <td><?php echo $item->phone ?></td>
                            <td><?php echo $item->reffer ?></td>
                            <td><?php echo get_readable_date($item->createdAt) ?></td>
                            <td>
                                <button data-url="<?php echo base_url("members/delete/$item->id"); ?>"
                                        class="btn btn-danger btn-sm btn-outline remove-btn">
                                    <i class="fa fa-trash"></i></button>
                                <a href="<?php echo base_url("members/update_form/$item->id") ?>" class="btn btn-info btn-sm btn-outline"><i class="fa fa-pencil"></i></a>
                                <?php //if ($this->session->user->user_type == "Yönetim") {?>
                                <a href="<?php echo base_url("anamnez/list/$item->id") ?>" class="btn btn-success btn-sm btn-outline"><i class="fa fa-heart"></i></a>
                                <?php //} ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } ?>
        </div>
    </div>
</div>