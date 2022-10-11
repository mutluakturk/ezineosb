<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Rapor Parametreleri

        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("reports/result_form"); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-5 text-center">
                            <label style="font-weight: bolder; font-size: large">Başlangıç Tarihi</label>
                            <input type="hidden" name="start_date" data-plugin="datetimepicker" data-options="{ inline: true, viewMode: 'days', format : 'YYYY-MM-DD' }" />
                        </div>

                        <div class="col-md-5 col-md-offset-2 text-center">
                            <label style="font-weight: bolder; font-size: large">Bitiş Tarihi</label>
                            <input type="hidden" name="end_date" data-plugin="datetimepicker" data-options="{ inline: true, viewMode: 'days', format : 'YYYY-MM-DD' }" />
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("courses"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div>
    </div>
</div>