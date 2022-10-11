<!DOCTYPE html>
<html lang="tr-TR">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <?php $this->load->view("includes/web_includes/head"); ?>
</head>

<body data-spy="scroll" data-target=".inner-link" data-offset="60">
<main>
    <?php $this->load->view("includes/web_includes/pre_loader"); ?>

    <!--    =============================================-->
    <?php $this->load->view("includes/web_includes/top_header"); ?>
    <?php $this->load->view("includes/web_includes/menu"); ?>
    <!--    =============================================-->
    <section class="background-11 ">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="overflow-hidden" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div data-zanim='{"delay":0}'>
                            <a class="d-inline-block color-7" href="#"><?= get_username($haber->createdBy); ?></a>,
                             
                            <a class="d-inline-block color-7"
                               href="#"><?= get_readable_just_date($haber->createdAt); ?></a>
                        </div>
                        <h4 data-zanim='{"delay":0.1}'><?= strip_tags($haber->title); ?></h4>
                    </div>
                </div>
                <?php
                switch ($icerik) {
                    case "news":
                        $path = "news_v";
                        $path2 = "haberDetay";
                        break;
                    case "announcenments":
                        $path = "announcenments_v";
                        $path2 = "duyuruDetay";
                        break;
                }
                ?>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <?php if ($haber->news_type != "video") { ?>
                                <img class="radius-tr-secondary radius-tl-secondary"
                                     src="<?= base_url('uploads/' . $path . '/' . $haber->img_url) ?>"
                                     alt="<?= $haber->url ?>">
                            <?php } else { ?>
                                <iframe class="radius-tr-secondary radius-tl-secondary" width="730" height="547"
                                        autoplay muted controls
                                        src="<?= str_replace("watch?v=", "embed/", $haber->video_url) . '?controls=0'; ?>">
                                </iframe>
                            <?php } ?>
                        </div>
                        <div class="col-12">
                            <div class="background-white p-5 radius-secondary">
                                <p class="dropcap"><?php echo $haber->description ?></p>
                            </div>
                        </div>
                        <?php if ($this->uri->segment(2) == "haberDetay") { ?>
                            <div class="col-12">
                                <div class="row mt-6">
                                    <div class="col-12">
                                        <div class="background-white p-5 radius-tl-secondary radius-tr-secondary">
                                            <h4>Son Yorumlar</h4>
                                            <?php if (!empty($comments)) { ?>
                                                <?php foreach ($comments as $comment) { ?>
                                                    <div class="row my-5">
                                                        <div class="col-10">
                                                            <h5 class="mb-1"><?= strip_tags($comment->title) ?></h5>
                                                            <p class="fs--1 color-7">Yorum Tarih ve Saat
                                                                // <?= get_readable_date($comment->createdAt) ?></p>
                                                            <p><?php echo strip_tags($comment->description); ?></p>
                                                            <hr class="muted">
                                                        </div>
                                                    </div>
                                                <?php }
                                            } else { ?>
                                                <div class="row my-5">
                                                    <div class="col-10 text-center">
                                                        <p class=" alert alert-info">Henüz bu habere yorum
                                                            yapılmamıştır. İlk yorum yapan siz olmak ister misiniz?</p>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="background-white p-5 radius-bl-secondary radius-br-secondary">
                                            <h4>Yorum Yap</h4>
                                            <form class="mt-4" action="<?= base_url('Web/yorumKaydet'); ?>"
                                                  method="post">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <input class="form-control background-white" type="text"
                                                               placeholder="Adınız"
                                                               aria-label="Text input with dropdown button"
                                                               name="name" id="name" required
                                                        >
                                                    </div>
                                                    <div class="col-12 mt-4">
                                                        <input class="form-control background-white" type="email"
                                                               placeholder="Email"
                                                               aria-label="Text input with dropdown button"
                                                               name="email" id="email" required
                                                        >
                                                    </div>
                                                    <div class="col-12 mt-4">
                                                        <input class="form-control background-white" type="text"
                                                               placeholder="Başlık"
                                                               aria-label="Text input with dropdown button"
                                                               name="commentTitle" id="commentTitle" required
                                                        >
                                                    </div>
                                                    <div class="col-12 mt-4">
                                                    <textarea class="form-control background-white" rows="10"
                                                              placeholder="Yorumunuzu bu alana yazınız..."
                                                              aria-label="Text input with dropdown button"
                                                              name="comment" id="comment" required
                                                    ></textarea>
                                                    </div>
                                                    <input type="text" name="_id" id="_id" style="visibility: hidden"
                                                           value="<?= $this->uri->segment(3); ?>">
                                                    <div class="col-12 mt-4">
                                                        <button class="btn btn-primary" type="Submit"><span
                                                                    class="color-white fw-600">Gönder</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!--  -->
                <!--    First Right Side Area Start-->
                <!--    =============================================-->
                <div class="col-lg-4 text-center ml-auto mt-5 mt-lg-0">
                    <!--   <div class="row px-2">
                        <div class="col">
                            <div class="background-white p-5 radius-secondary">
                                <div class="overflow-hidden" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                    <img class="radius-round" data-zanim='{"delay":0}'
                                         src="<?= base_url() ?>site_assets/images/portrait-8.jpg" alt="">
                                    <h5 class="text-capitalize mt-3 mb-0" data-zanim='{"delay":0.1}'>Yazar Adı</h5>
                                    <div class="text-left">
                                        <ul style="list-style-type:none">
                                            <li><strong>Adı:</strong> Ahmet</li>
                                            <li><strong>Soyadı:</strong> Kardeş</li>
                                            <li><strong>Görevi:</strong> Admin</li>
                                        </ul>
                                    </div>
                                    <p class="mb-0 mt-3" data-zanim='{"delay":0.2}'>But also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                        with the release of Letraset sheets.</p>
                                    <div class="pt-4" data-zanim='{"delay":0.3}'>
                                        <a class="d-inline-block" href="#">
                                            <span class="fa fa-linkedin-square fs-2 mx-2 color-8"></span></a>
                                        <a class="d-inline-block" href="#">
                                            <span class="fa fa-twitter-square fs-2 mx-2 color-8"></span></a>
                                        <a class="d-inline-block" href="#">
                                            <span class="fa fa-facebook-square fs-2 mx-2 color-8"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <div class="row mt-5 px-2">
                        <div class="owl-carousel owl-theme owl-nav-outer owl-dot-round mt-4" data-options='{"items":1}'>
                            <?php
                            $cnt = 1;
                            foreach ($haberlerYan as $haberYan) {
                                if ($cnt <= 3) { ?>
                                    <div class="item">
                                        <div class="background-white pb-4 h-100 radius-secondary">
                                            <?php if ($haberYan->news_type != "video") { ?>
                                                <img class="w-100 radius-tr-secondary radius-tl-secondary"
                                                     src="<?= base_url('uploads/' . $path . '/' . $haberYan->img_url) ?>"
                                                     alt="<?= $haber->url ?>">
                                            <?php } else { ?>
                                                <iframe class="radius-tr-secondary radius-tl-secondary" width="364"
                                                        height="217" autoplay muted controls
                                                        src="<?= str_replace("watch?v=", "embed/", $haberYan->video_url) . '?controls=0'; ?>">
                                                </iframe>
                                            <?php } ?>
                                            <div class="px-4 pt-4">
                                                <a href="<?= base_url('Web/' . $path2 . '/' . $haberYan->url); ?>">
                                                    <h5><?= $haber->title; ?></h5></a>
                                                <p class="color-7"><?= get_username($haberYan->createdBy); ?></p>
                                                <?php if (strlen($haber->description) > 50) { ?>
                                                    <p class="mt-3"
                                                       data-zanim='{"delay":0.2}'><?= substr($haber->description, 0, 50); ?></p>
                                                <?php } else { ?>
                                                    <p class="mt-3"
                                                       data-zanim='{"delay":0.2}'><?= substr($haber->description, 0, 50); ?>
                                                        ...</p>
                                                <?php } ?>
                                                <a href="<?= base_url('Web/haberDetay/' . $haberYan->url); ?>">Devamını
                                                    Oku ⟶</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                $cnt++;
                            } ?>

                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--    Benzer Konular // Second Right Side Area End-->
            <!--    =============================================-->

            <?php if($icerik != "duyuruDetay") {?>
            <div class="row px-2 mt-5">
                <div class="col">
                    <div class="background-white p-5 radius-secondary">
                        <h5>Etiketler</h5>
                        <?php $tags = explode(',', strip_tags($tags)); ?>
                        <ul class="nav tags mt-3 fs--1">
                            <?php foreach ($tags as $tag) { ?>
                                <li><a class="btn btn-sm btn-outline-primary m-1 p-2"
                                       href="<?= base_url('web/haberler/'); ?>"><?= $tag; ?></a></li>
                                       <!--href="<?/*= base_url('web/etikettenGetir/'.$icerik.'/'.$tag); */?>"><?/*= $tag; */?></a></li>-->
                            <?php } ?>
                        </ul>
                    </div>
                </div>


            </div>
            <?php } ?>

            <!--/.container-->
    </section>

    <!--    =============================================-->
    <?php $this->load->view("includes/web_includes/top_footer"); ?>
    <?php $this->load->view("includes/web_includes/footer"); ?>
</main>
<!--  -->

<?php $this->load->view("includes/web_includes/site_scripts"); ?>
</body>
</html>