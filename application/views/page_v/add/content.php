<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Yeni Sayfa Ekle</h4>
    </div>

    <div class="col-md-12">
        <div class="m-b-lg alert alert-danger text-center">
            <p><b>Önemli Uyarı. Henüz menü elemanını oluşturmadıysanız lünfen önce
                    <a href="<?php echo base_url("menu") ?>">buraya tıklayıp</a>
                    menü elemanı oluşturun.</b>
            </p>
        </div>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("Page/save"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Menü Elemanı</label>
                        <select name="parent" id="parent" class="form-control">
                            <option value="-1">Üst Menü Seçiniz</option>
                            <?php foreach ($items as $item) { ?>
                                <option value="<?= $item->id; ?>"><?= $item->title; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Sayfa Tanım</label><br>
                        <input class="form-control" id="pageDesc" name="pageDesc" placeholder="Sayfa Tanım">
                    </div>

                    <div class="form-group">
                        <label>Sayfa İçeriği</label><br>
                        <small class="text-danger">Lütfen HTML-CSS içerik kullanınız. Eğer isterseniz kod görünümünü
                            kapatabilirsiniz.</small>
                        <textarea name="description" id="description" class="m-0" data-plugin="summernote"
                                  data-options="{height: 250}"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Tags</label><br>
                        <small class="text-danger">Tagler arasında sade virgün kullanın boşluk bırakmayın.</small>
                        <input class="form-control" id="tags" name="tags" placeholder="Tags">

                    </div>

                    <div class="form-group">
                        <label>SEO</label><br>
                        <small class="text-danger">Kelimeler arasında sade virgün kullanın boşluk bırakmayın.</small>
                        <input class="form-control" id="seo" name="seo" placeholder="SEO">

                    </div>

                    <div class="form-group">
                        <label>Silinemez</label>
                        <input
                                class="isActive"
                                type="checkbox"
                                data-switchery
                                data-color="#FF0000"
                                data-size=""
                                id="silinemez"
                                name="silinemez"
                        />
                        <small class="text-danger"> Bu seçeneği açarsanız yaratacağınız menüyü silemeyeceksiniz.</small>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("Page/"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div>
    </div>
</div>