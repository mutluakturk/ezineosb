<section>
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <h3 class="text-center fs-2 fs-lg-3">Galeri</h3>
                <?php //var_dump($imageGalleries); ?>
                <hr class="short"
                    data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}'
                    data-zanim-trigger="scroll">

                <div class="main" style="text-align:center">
                    <div class="btn-group">
                        <button class="btn active" onclick="filterSelection('all')">TÜMÜ</button>
                        <button class="btn" onclick="filterSelection('photo')">FOTOĞRAF</button>
                        <button class="btn" onclick="filterSelection('video')">VİDEO</button>
                    </div>
                </div>

                <br>


                <div class="row">
                    <?php foreach ($imageGalleries as $gallery) { ?>
                        <?php if ($gallery->gallery_type == "image") { ?>
                            <div class="column photo">
                                <a href="<?= base_url('web/galleryDetail/' . $gallery->url) ?>"
                                   data-title="Resim Başlığı">
                                    <img src="<?= base_url('uploads/galleries_v/' . $gallery->img_url) ?>"
                                         style="width: 353px; height: 353px">
                                </a>
                            </div>
                        <?php } else if ($gallery->gallery_type == "video") { ?>
                            <div class="column video">
                                <a href="<?= base_url('web/galleryDetail/' . $gallery->url) ?>"
                                   data-title="Resim Başlığı">
                                    <img src="<?= base_url('uploads/galleries_v/' . $gallery->img_url) ?>"
                                         style="width: 353px; height: 353px">
                                </a>
                                <!--<div class="column video">
                                    <span class="youtube-link" youtubeid="liJVSwOiiwg">
                                    <img src="<? /*= base_url('uploads/galleries_v/' . $gallery->img_url) */ ?>"></span>
                                </div>-->

                                <!--<span class="youtube-link" youtubeid="liJVSwOiiwg">
                                <img src="<?php /* echo base_url('uploads/galleries_v/' . $gallery->img_url) */ ?>"style="width: 353px; height: 353px">
                                </span>-->
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div><!--/.row-->
        </div>
        <!--/.container-->
</section>