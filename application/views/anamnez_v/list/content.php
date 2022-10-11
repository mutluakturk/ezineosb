<div class="row">
    <div class="col-md-12">
        <?php //var_dump($userData);
            if ($userData == null){
                redirect(base_url('appointments'));
            }

        ?>
        <h4 class="m-b-lg"><b><?= $userData->name." ".$userData->surname ?> </b> isimli hastaya ait Anamnez Listesi
            <a href="<?php echo base_url("anamnez/new_form/".$this->uri->segment(3)) ?>" class="btn btn-outline btn-primary btn-xs pull-right "> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget p-lg widget table-responsive">
            <?php if (empty($items)) {?>
            <div class="alert alert-info text-center">
                <p>Kayıt Bulunamadı Eklemek için <a href="<?php echo base_url("anamnez/new_form/".$this->uri->segment(3)) ?>">tıklayınız</a></p>
            </div>
            <?php } else { ?>
                <table id="responsive-datatable" data-plugin="DataTable" data-options="{
                responsive: true,
                keys: true
            }" class="table table-hover table-striped table-bordered content-container" cellspacing="0" width="100%">
                    <thead>
                    <th class="w50">Tarih</th>
                    <th class="w100">Şikayet</th>
                    <th class="w15">Randevusuz</th>
                    <th class="w50">Döküman</th>
                    <th class="w50">İşlem</th>
                    </thead>
                    <?php foreach ($items as $item) {?>
                        <tr>
                            <td><?php echo $item->tarih ?></td>
                            <td><?php echo $item->gelissikayeti ?></td>
                            <td class="text-center w100">
                                <input
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        data-size="small"
                                        readonly
                                    <?php echo ($item->randevusuz) ? "checked" : "" ?>
                                />
                            </td>
                            <td class="text-center">
                                <?php if ($item->img_url) {?>
                                    <a href="<?php echo base_url("uploads/anamnez_v/$item->img_url") ?>" target="_blank" class="btn btn-purple btn-sm btn-outline"><i class="fa fa-file-pdf-o"></i></a>
                                    <!--<a href="<?php //echo base_url("anamnez/dosyaGonder/$item->id") ?>" target="_blank" class="btn btn-purple btn-sm btn-outline"><i class="fa fa-envelope"></i></a>-->
                                    <a href="whatsapp://send?text=<?= base_url('/uploads/anamnez_v/'.$item->img_url); ?>" class="btn btn-purple btn-sm btn-outline"><i class="fa fa-whatsapp"></i></a>
                                <?php } ?>
                            </td>
                            <td>
                                <button disabled data-url="<?php echo base_url("anamnez/delete/$item->id"); ?>"
                                        class="btn btn-danger btn-sm btn-outline remove-btn">
                                    <i class="fa fa-trash"></i></button>
                                <?php if ($this->session->user->user_type == "Yönetim") {?>
                                <a href="<?php echo base_url("anamnez/update_form/$item->id") ?>" class="btn btn-info btn-sm btn-outline"><i class="fa fa-pencil"></i></a>
                                <?php } else {?>
                                    <a href="<?php echo base_url("anamnez/price_update_form/$item->id") ?>" class="btn btn-info btn-sm btn-outline"><i class="fa fa-pencil"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } ?>
        </div>
    </div>
</div>