<section>
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <h3 class="text-center fs-2 fs-lg-3">Galeri</h3>

                <hr class="short"
                    data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}'
                    data-zanim-trigger="scroll">
                <div class="row">
                    <?php if (!empty($galleryItems)) { ?>
                        <?php foreach ($galleryItems as $galleryItem) { ?>
                            <?php if ($gallery->gallery_type == "image") { ?>
                                <div class="column photo">
                                    <a href="<?= base_url($galleryItem->url) ?>" class="photo" data-lightbox="r1"
                                       data-title="Resim Başlığı">
                                        <img src="<?= base_url($galleryItem->url) ?>" class="photo"
                                             style="width: 353px; height: 353px">
                                    </a>
                                </div>
                            <?php } else if ($gallery->gallery_type == "video") { ?>
                                <div class="column video">
                                    <!--<iframe
                                            style="width: 353px; height: 353px"
                                            src="<? /*= str_replace("watch?v=", "embed/", $galleryItem->url) . '?controls=0'; */ ?>"
                                            frameborder="0"
                                            gesture="media"
                                            allow="encrypted-media"
                                            allowfullscreen
                                            controls>
                                    </iframe>-->

                                    <div class="column video" style="width: 353px; height: 353px">
                                        <span class="youtube-link"
                                              youtubeid="<?= explode("=", $galleryItem->url)[1]; ?>">
                                        <img src="<?= base_url('uploads/galleries_v/' . $gallery->img_url) ?>"
                                             style="width: 353px; height: 353px"></span>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="col-12">
                            <p class="text-center alert alert-info">Henüz bu galeride resim ya da video
                                bulunmamaktadır</p>
                        </div>
                    <?php } ?>
                </div>


            </div><!--/.row-->
        </div>
        <!--/.container-->
</section>