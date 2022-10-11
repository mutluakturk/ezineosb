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
    <?php $this->load->view("includes/web_includes/bread_crumb"); ?>
    <!--    =============================================-->
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
    <?php if ($haberler) { ?>

        <section class="background-11">
            <div class="container">
                <div class="row">
                    <?php foreach ($haberler as $haber) { ?>
                        <div class="col-md-6 col-lg-4 py-0 mt-4 mt-lg-0">
                            <div class="background-white pb-4 h-100 radius-secondary">
                                <?php if ($haber->news_type == "image") { ?>
                                    <img class="w-100 radius-tr-secondary radius-tl-secondary"
                                         style="width: 350px; height: 244px;"
                                         src="<?= base_url('uploads/' . $path . '/' . $haber->img_url) ?>"
                                         alt="<?= $haber->url ?>"/>
                                <?php } else { ?>
                                    <iframe class="w-100 radius-tr-secondary radius-tl-secondary" width="350"
                                            height="244" autoplay muted controls
                                            src="<?= str_replace("watch?v=", "embed/", $haber->video_url) . '?controls=0'; ?>">
                                    </iframe>
                                <?php } ?>
                                <div class="px-4 pt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                    <div class="overflow-hidden">
                                        <a href="<?= base_url('Web/' . $path2 . '/' . $haber->url); ?>">
                                            <h5 data-zanim='{"delay":0}'><?= $haber->title ?></h5>
                                        </a>
                                    </div>
                                    <div class="overflow-hidden">
                                        <p class="color-7"
                                           data-zanim='{"delay":0.1}'><?= get_readable_just_date($haber->createdAt); ?>
                                            - <?= get_username($haber->createdBy); ?></p>
                                    </div>
                                    <div class="overflow-hidden">
                                        <?php if (strlen($haber->description) > 250) { ?>
                                            <p class="mt-3"
                                               data-zanim='{"delay":0.2}'><?= strip_tags(substr($haber->description, 0, 250)); ?>
                                                ...</p>
                                        <?php } else { ?>
                                            <p class="mt-3"
                                               data-zanim='{"delay":0.2}'><?= strip_tags($haber->description); ?>
                                                </p>
                                        <?php } ?>
                                    </div>
                                    <div class="overflow-hidden">
                                        <div class="d-inline-block" data-zanim='{"delay":0.3}'><a
                                                    class="d-flex align-items-center"
                                                    href="<?= base_url('Web/haberDetay/' . $haber->url); ?>">Devamını
                                                Oku
                                                <div class="overflow-hidden ml-2"
                                                     data-zanim='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'>
                                                    <span class="d-inline-block">&xrarr;</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!--<div class="col-md-6 col-lg-4 py-0 mt-4 mt-lg-0">
                        <div class="background-white pb-4 h-100 radius-secondary">
                            <img class="w-100 radius-tr-secondary radius-tl-secondary" src="assets/images/no-image.jpg" alt="Featured Image"/>
                            <div class="px-4 pt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="overflow-hidden">
                                    <a href="news.html">
                                        <h5 data-zanim='{"delay":0}'>Haber Başlık Alanı</h5></a>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="color-7" data-zanim='{"delay":0.1}'>Haberi ekleyen kullanıcı</p>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="mt-3" data-zanim='{"delay":0.2}'>Haber detayları yazı alanı - Haber detayları yazı alanı - Haber detayları yazı alanı - Haber detayları yazı alanı  ...</p>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="d-inline-block" data-zanim='{"delay":0.3}'>
                                        <a class="d-flex align-items-center" href="#">Devamını Oku
                                            <div class="overflow-hidden ml-2" data-zanim='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'>
                                                <span class="d-inline-block">&xrarr;</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 py-0 mt-4 mt-lg-0">
                        <div class="background-white pb-4 h-100 radius-secondary">
                            <img class="w-100 radius-tr-secondary radius-tl-secondary" src="assets/images/no-image.jpg" alt="Featured Image"/>
                            <div class="px-4 pt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="overflow-hidden">
                                    <a href="news.html">
                                        <h5 data-zanim='{"delay":0}'>Haber Başlık Alanı</h5></a>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="color-7" data-zanim='{"delay":0.1}'>Haberi ekleyen kullanıcı</p>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="mt-3" data-zanim='{"delay":0.2}'>Haber detayları yazı alanı - Haber detayları yazı alanı - Haber detayları yazı alanı - Haber detayları yazı alanı  ...</p>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="d-inline-block" data-zanim='{"delay":0.3}'>
                                        <a class="d-flex align-items-center" href="#">Devamını Oku
                                            <div class="overflow-hidden ml-2" data-zanim='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'>
                                                <span class="d-inline-block">&xrarr;</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->

                    <!--<div class="col-auto mx-auto mt-4">
                        <nav class="font-1 mt-5" aria-label="Page navigation example">
                            <ul class="pagination pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">«</span>
                                        <span class="sr-only">Geri</span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">4</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">»</span>
                                        <span class="sr-only">İleri</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>-->
                    <?php if (count($haberler) > 9) { ?>
                        <!--                        <div class="col-auto mx-auto mt-4">-->
                        <!--                            <nav class="font-1 mt-5" aria-label="Page navigation example">-->
                        <!--                                <ul class="pagination pagination justify-content-center">-->
                        <!--                                    <li class="page-item">-->
                        <!--                                        <a class="page-link" href="#" aria-label="Previous">-->
                        <!--                                            <span aria-hidden="true">«</span>-->
                        <!--                                            <span class="sr-only">Geri</span>-->
                        <!--                                        </a>-->
                        <!--                                    </li>-->
                        <!--                                    <li class="page-item">-->
                        <!--                                        <a class="page-link" href="#">1</a>-->
                        <!--                                    </li>-->
                        <!--                                    <li class="page-item active">-->
                        <!--                                        <a class="page-link" href="#">2</a>-->
                        <!--                                    </li>-->
                        <!--                                    <li class="page-item">-->
                        <!--                                        <a class="page-link" href="#">3</a>-->
                        <!--                                    </li>-->
                        <!--                                    <li class="page-item">-->
                        <!--                                        <a class="page-link" href="#">4</a>-->
                        <!--                                    </li>-->
                        <!--                                    <li class="page-item">-->
                        <!--                                        <a class="page-link" href="#" aria-label="Next">-->
                        <!--                                            <span aria-hidden="true">»</span>-->
                        <!--                                            <span class="sr-only">İleri</span>-->
                        <!--                                        </a>-->
                        <!--                                    </li>-->
                        <!--                                </ul>-->
                        <!--                            </nav>-->
                        <!--                        </div>-->
                    <?php } ?>
                </div>
                <!--/.row-->
            </div>
            <!--/.container-->
        </section>

    <?php } else { ?>
        <section class="section section-lg pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="overflow-hidden">
                            <h2 class="font-weight-bold text-center" data-zanim='{"delay":0.1}'><?php switch ($icerik) {
                                    case "news":
                                        echo "Haberler";
                                        break;
                                    case "announcenments":
                                        echo "Duyurular";
                                        break;
                                } ?>
                                Bulunamadı</h2>
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-center" data-zanim='{"delay":0.2}'>Bu kategoride henüz içerik
                                bulunmamaktadır.
                                Bizi takip etmeye devam edin.</p>
                        </div>
                    </div>
                </div>
                <!--/.row-->
            </div>
            <!--/.container-->
        </section>
    <?php } ?>
    <?php $this->load->view("includes/web_includes/whatsapp"); ?>
    <!--    =============================================-->
    <?php $this->load->view("includes/web_includes/top_footer"); ?>
    <?php $this->load->view("includes/web_includes/footer"); ?>
</main>
<!--  -->

<?php $this->load->view("includes/web_includes/site_scripts"); ?>
</body>
</html>