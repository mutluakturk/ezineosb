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
    <div class="flexslider flexslider-simple h-full loading">
        <ul class="slides">
            <?php $this->load->view("includes/web_includes/slides"); ?>
        </ul>
    </div>
    <?php //print_r($this->session->settings->logo) ?>
    <?php //var_dump($this->session->settings); ?>
    <section class="background-white  text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10 col-md-6">
                    <h3 class="color-primary fs-2 fs-lg-3">En Son Haberler</h3>
                    <p class="px-lg-4 mt-3">Ezine Organize Sanayi Hakkındaki En Son Haberler</p>
                    <hr class="short"
                        data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}'
                        data-zanim-trigger="scroll"/>
                </div>
            </div>
            <div class="row mt-4 mt-md-5">
                <?php foreach ($haber as $h) { ?>
                    <div class="col-sm-6 col-lg-3 mt-4" data-zanim-timeline='{"delay":0.1}' data-zanim-trigger="scroll">
                        <?php if ($h->news_type != "video") { ?>
                            <img src="<?= base_url('uploads/news_v/' . $h->img_url) ?>" width="150" height="100">
                        <?php } else { ?>
                            <iframe class="radius-tr-secondary radius-tl-secondary" width="150"
                                    height="100" autoplay muted controls
                                    src="<?= str_replace("watch?v=", "embed/", $h->video_url) . '?controls=0'; ?>">
                            </iframe>
                        <?php } ?>
                        <h5 class="mt-4" data-zanim='{"delay":0.1}'><?= substr($h->title, 0, 40); ?></h5>
                        <!--<p class="mb-0 mt-3 px-3" style="max-height: 45px; overflow: hidden"
                           data-zanim='{"delay":0.2}'><? /*= strip_tags($h->description); */ ?>
                        </p>-->
                        <a class="btn btn-outline-info btn-sm"
                           href="<?= base_url('Web/haberDetay/' . $h->url) ?>">Devamını Oku</a>
                    </div>
                <?php } ?>


            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>

    <section class="background-white  text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10 col-md-6">
                    <h3 class="color-primary fs-2 fs-lg-3">En Son Duyurular</h3>
                    <p class="px-lg-4 mt-3">Ezine Organize Sanayi Hakkındaki En Son Duyurular</p>
                    <hr class="short"
                        data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}'
                        data-zanim-trigger="scroll"/>
                </div>
            </div>
            <div class="row mt-4 mt-md-5">
                <?php foreach ($duyuru as $h) { ?>
                    <div class="col-sm-6 col-lg-3 mt-4" data-zanim-timeline='{"delay":0.1}' data-zanim-trigger="scroll">
                        <?php if ($h->news_type != "video") { ?>
                            <img src="<?= base_url('uploads/announcenments_v/' . $h->img_url) ?>" width="150"
                                 height="100">
                        <?php } else { ?>
                            <iframe class="radius-tr-secondary radius-tl-secondary" width="150"
                                    height="100" autoplay muted controls
                                    src="<?= str_replace("watch?v=", "embed/", $h->video_url) . '?controls=0'; ?>">
                            </iframe>
                        <?php } ?>
                        <h5 class="mt-4" data-zanim='{"delay":0.1}'><?= substr($h->title, 0, 40); ?></h5>
                        <!--<p class="mb-0 mt-3 px-3" style="max-height: 45px; overflow: hidden"
                           data-zanim='{"delay":0.2}'><? /*= strip_tags($h->description); */ ?>
                        </p>-->
                        <a class="btn btn-outline-info btn-sm"
                           href="<?= base_url('Web/haberDetay/' . $h->url) ?>">Devamını Oku</a>
                    </div>
                <?php } ?>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>

    <?php if ($mainpage->video) { ?>
        <section class="pt-0">
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-11 col-md-12">
                        <div class="pos-relative mt-4 py-5 py-md-11">
                            <div class="background-holder radius-secondary"
                                 style="background-image:url(<?= base_url('uploads/mainpage_v/' . $mainpage->kapak) ?>);">
                            </div>
                            <!--/.background-holder-->
                            <a class="video-modal" href="<?= $mainpage->video ?>" data-start="6" data-end="168">
                                <div class="btn-elixir-play" style="transform: scale(0.8)" data-zanim-trigger="scroll"
                                     data-zanim='{"from":{"opacity":0,"scale":0.8},"to":{"opacity":1,"scale":1},"duration":1}'>
                                    <img src="site_assets/images/play_icon.png">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!--/.row-->
            </div>

            <!--/.container-->
        </section>
    <?php } ?>

    <!--<section class="background-11">
        <div class="container">
            <h3 class="text-center fs-2 fs-md-3">Açık İş İlanları</h3>
            <hr class="short"
                data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}'
                data-zanim-trigger="scroll"/>
            <div class="row no-gutters pos-relative mt-6">
                <div class="elixir-caret d-none d-lg-block"></div>
                <div class="col-lg-6 py-3 py-lg-0 mb-0" style="min-height:400px;">
                    <div class="background-holder radius-tl-secondary radius-tr-secondary radius-tr-lg-0"
                         style="background-image:url(site_assets/images/noimage.jpg);"></div>

                <div
                        class="col-lg-6 px-lg-5 py-lg-6 p-4 my-lg-0 background-white radius-bl-secondary radius-bl-lg-0 radius-br-secondary radius-br-lg-0 radius-tr-lg-secondary">
                    <div class="d-flex align-items-center h-100">
                        <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="overflow-hidden"><h5 data-zanim='{"delay":0}'>Firma adı ve Ünvanı</h5></div>
                            <div class="overflow-hidden"><p class="mt-3" data-zanim='{"delay":0.1}'>Firma hakkında
                                    yazısı faaliyet alanları vs, ilan açıklama yazısı alanı... </p></div>
                            <div class="overflow-hidden">
                                <div data-zanim='{"delay":0.2}'><a class="d-flex align-items-center" href="#">İlanı
                                        İncele
                                        <div class="overflow-hidden ml-2"><span class="d-inline-block"
                                                                                data-zanim='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'>⟶</span>
                                        </div>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters pos-relative mt-4 mt-lg-0">
                <div class="elixir-caret d-none d-lg-block"></div>
                <div class="col-lg-6 py-3 py-lg-0 mb-0 order-lg-2" style="min-height:400px;">
                    <div class="background-holder radius-tl-secondary radius-tl-lg-0 radius-tr-secondary radius-tr-lg-0"
                         style="background-image:url(site_assets/images/noimage.jpg);"></div>
                </div>
                <div
                        class="col-lg-6 px-lg-5 py-lg-6 p-4 my-lg-0 background-white radius-bl-secondary radius-bl-lg-0 radius-br-secondary radius-br-lg-0">
                    <div class="d-flex align-items-center h-100">
                        <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="overflow-hidden"><h5 data-zanim='{"delay":0}'>Firma adı ve Ünvanı</h5></div>
                            <div class="overflow-hidden"><p class="mt-3" data-zanim='{"delay":0.1}'>Firma hakkında
                                    yazısı faaliyet alanları vs, ilan açıklama yazısı alanı...</p></div>
                            <div class="overflow-hidden">
                                <div data-zanim='{"delay":0.2}'><a class="d-flex align-items-center" href="#">İlanı
                                        İncele
                                        <div class="overflow-hidden ml-2"><span class="d-inline-block"
                                                                                data-zanim='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'>⟶</span>
                                        </div>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters pos-relative mt-4 mt-lg-0">
                <div class="elixir-caret d-none d-lg-block"></div>
                <div class="col-lg-6 py-3 py-lg-0 mb-0" style="min-height:400px;">
                    <div
                            class="background-holder radius-tl-secondary radius-tr-secondary radius-tr-lg-0 radius-tl-lg-0 radius-bl-0 radius-bl-lg-secondary"
                            style="background-image:url(site_assets/images/noimage.jpg);"></div>

                </div>
                <div
                        class="col-lg-6 px-lg-5 py-lg-6 p-4 my-lg-0 background-white radius-bl-secondary radius-bl-lg-0 radius-br-secondary">
                    <div class="d-flex align-items-center h-100">
                        <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="overflow-hidden"><h5 data-zanim='{"delay":0}'>Firma adı ve Ünvanı</h5></div>
                            <div class="overflow-hidden"><p class="mt-3" data-zanim='{"delay":0.1}'>Firma hakkında
                                    yazısı faaliyet alanları vs, ilan açıklama yazısı alanı...</p></div>
                            <div class="overflow-hidden">
                                <div data-zanim='{"delay":0.2}'><a class="d-flex align-items-center" href="#">İlanı
                                        İncele
                                        <div class="overflow-hidden ml-2"><span class="d-inline-block"
                                                                                data-zanim='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'>⟶</span>
                                        </div>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section>
        <div class="container">
            <div class="row mb-6">
                <div class="col">
                    <h3 class="text-center fs-2 fs-lg-3">Ezine Gıda İhtisas Organize Sanayi Bölgesi Müdürü</h3>
                    <h2 class="text-center fs-2 fs-lg-3">Alper ALTINOK</h2>
                    <hr class="short"
                        data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}'
                        data-zanim-trigger="scroll">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 pr-0 pr-lg-3">
                    <img class="radius-secondary" src="site_assets/images/alperAltinok.png" alt=""/></div>
                <div class="col-lg-6 px-lg-5 mt-6 mt-lg-0" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                    <div class="overflow-hidden">
                        <div class="px-4 px-sm-0" data-zanim='{"delay":0}'><h5 class="fs-0 fs-lg-1">
                                <span class="ion-chatbubble-working fs-2 mr-2 icon-position-fix fw-800"></span>TARİHÇE
                            </h5>
                            <p class="mt-3 px-lg-3">Çanakkale Valiliği öncülüğünde, Çanakkale İl Özel İdaresi, Ezine
                                Belediyesi ve Çanakkale Ticaret ve Sanayi Odası Başkanlığı' nın katılımıyla 2016 yılında
                                Bilim, Sanayi ve Teknoloji Bakanlığı'nın 326 Sicil numarası ile kurulmuştur.</p>
                        </div>
                    </div>
                    <div class="overflow-hidden">
                        <div class="px-4 px-sm-0 mt-5" data-zanim='{"delay":0.1}'><h5 class="fs-0 fs-lg-1">
                                <span class="ion-android-color-palette fs-2 mr-2 icon-position-fix fw-800"></span>HAKKIMIZDA
                            </h5>
                            <p class="mt-3 px-lg-3">Ezine Gıda İhtisas Organize Sanayi Bölgesi Çanakkale - İzmir
                                karayolu üzerinde Ezine' ye 2 Km mesafede Çınarköy ve Balıklı Köyü hudutları dahilinde
                                1.360.000 m2 alan üzerine kurulmuş olup 8 Bin kişiye istihdam sağlayacaktır.</p></div>
                    </div>
                    <div class="overflow-hidden">
                        <div class="px-4 px-sm-0 mt-5" data-zanim='{"delay":0.2}'><h5 class="fs-0 fs-lg-1"><span
                                        class="ion-ios-timer fs-2 mr-2 icon-position-fix fw-600"></span>BAŞKANIN MESAJI
                            </h5>
                            <p class="mt-3 px-lg-3">Bizler; tek tek, köy köy dolaşıp OSB’yi anlatmayı, gerekirse Mesleki
                                Eğitimleri köylerde vermeyi düşünüyoruz. Ezine Gıda İhtisas OSB’sinde dışarıdan gelen
                                işçiler yerine kendi yöre halkımızın çalışması, yöre halkımıza iş fırsatı vermenin daha
                                doğru olacağına inanıyoruz.</p>
                        </div>
                    </div>
                </div>
            </div><!--/.row--></div>
        <!--/.container-->
    </section>

    <section class="background-primary">
        <div class="container">
            <div class="row align-items-center color-white">
                <div class="col-lg-4">
                    <div class="border border-2x border-color-warning p-4 py-lg-5 text-center radius-secondary"
                         data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="overflow-hidden">
                            <h4 class="color-white" data-zanim='{"delay":0}'>Şikayet & Öneri</h4>
                        </div>
                        <div class="overflow-hidden">
                            <p class="px-lg-1 color-11 mb-0" data-zanim='{"delay":0.1}'>Şikayet öneri metin alanı size
                                daha iyi hizmet verebilmemiz adına vs...</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 pl-lg-5 mt-6 mt-lg-0">
                    <h5 class="color-white">Size daha iyi nasıl hizmet verebiliriz?</h5>
                    <form class="mt-4" id="suggestion" name="suggestion">
                        <div class="row">
                            <div class="col-6">
                                <input class="form-control" type="text"
                                       placeholder="Adınız Soyadınız" name="adSoyad" id="adSoyad"
                                       aria-label="Text input with dropdown button" required/>
                            </div>
                            <div class="col-6">
                                <input class="form-control" type="text" placeholder="Telefon Numaranız" name="telefon"
                                       id="telefon"
                                       aria-label="Text input with dropdown button" required/>
                            </div>
                            <div class="col-6 mt-4">
                                <input class="form-control" type="text" placeholder="Konu" name="konu" id="konu"
                                       aria-label="Text input with dropdown button" required/></div>
                            <div class="col-6 mt-4">
                                <button class="btn btn-warning btn-block" name="sendSuggest" id="sendSuggest"
                                        type="button">Gönder
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>
    <!--<section class="background-11  text-center">
        <div class="container">
            <div class="row mb-6">
                <div class="col">
                    <h3 class="fs-2 fs-md-3"> Yönetim Kurulu</h3>
                    <hr class="short"
                        data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}'
                        data-zanim-trigger="scroll">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="background-white pb-4 h-100 radius-secondary">
                        <img class="mb-4 radius-tr-secondary radius-tl-secondary"
                             src="site_assets/images/portrait-3.jpg"
                             alt="Profile Picture"/>
                        <div class="px-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="overflow-hidden">
                                <h5 data-zanim='{"delay":0}'>Ad Soyad</h5>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="fw-400 color-7" data-zanim='{"delay":0.1}'>Mevki</h6></div>
                            <div class="overflow-hidden">
                                <p class="py-3 mb-0" data-zanim='{"delay":0.2}'>Kişi hakkında açıklama alanı.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4 mt-4 mt-sm-0">
                    <div class="background-white pb-4 h-100 radius-secondary">
                        <img class="mb-4 radius-tr-secondary radius-tl-secondary"
                             src="site_assets/images/portrait-4.jpg"
                             alt="Profile Picture"/>
                        <div class="px-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="overflow-hidden">
                                <h5 data-zanim='{"delay":0}'>Ad Soyad</h5>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="fw-400 color-7" data-zanim='{"delay":0.1}'>Mevki</h6>
                            </div>
                            <div class="overflow-hidden">
                                <p class="py-3 mb-0" data-zanim='{"delay":0.2}'>Kişi hakkında açıklama alanı.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4 mt-4 mt-lg-0">
                    <div class="background-white pb-4 h-100 radius-secondary">
                        <img class="mb-4 radius-tr-secondary radius-tl-secondary"
                             src="site_assets/images/portrait-5.jpg"
                             alt="Profile Picture"/>
                        <div class="px-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="overflow-hidden">
                                <h5 data-zanim='{"delay":0}'>Ad Soyad</h5>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="fw-400 color-7" data-zanim='{"delay":0.1}'>Mevki</h6>
                            </div>
                            <div class="overflow-hidden">
                                <p class="py-3 mb-0" data-zanim='{"delay":0.2}'>Kişi hakkında açıklama alanı.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4 mt-4 mt-lg-0">
                    <div class="background-white pb-4 h-100 radius-secondary">
                        <img class="mb-4 radius-tr-secondary radius-tl-secondary"
                             src="site_assets/images/portrait-5.jpg"
                             alt="Profile Picture"/>
                        <div class="px-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="overflow-hidden">
                                <h5 data-zanim='{"delay":0}'>Ad Soyad</h5>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="fw-400 color-7" data-zanim='{"delay":0.1}'>Mevki</h6>
                            </div>
                            <div class="overflow-hidden">
                                <p class="py-3 mb-0" data-zanim='{"delay":0.2}'>Kişi hakkında açıklama alanı.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4 mt-4 mt-sm-0">
                    <div class="background-white pb-4 h-100 radius-secondary">
                        <img class="mb-4 radius-tr-secondary radius-tl-secondary"
                             src="site_assets/images/portrait-4.jpg"
                             alt="Profile Picture"/>
                        <div class="px-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="overflow-hidden">
                                <h5 data-zanim='{"delay":0}'>Ad Soyad</h5>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="fw-400 color-7" data-zanim='{"delay":0.1}'>Mevki</h6>
                            </div>
                            <div class="overflow-hidden">
                                <p class="py-3 mb-0" data-zanim='{"delay":0.2}'>Kişi hakkında açıklama alanı.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4 mt-4 mt-lg-0">
                    <div class="background-white pb-4 h-100 radius-secondary">
                        <img class="mb-4 radius-tr-secondary radius-tl-secondary"
                             src="site_assets/images/portrait-5.jpg"
                             alt="Profile Picture"/>
                        <div class="px-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="overflow-hidden">
                                <h5 data-zanim='{"delay":0}'>Ad Soyad</h5>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="fw-400 color-7" data-zanim='{"delay":0.1}'>Mevki</h6>
                            </div>
                            <div class="overflow-hidden">
                                <p class="py-3 mb-0" data-zanim='{"delay":0.2}'>Kişi hakkında açıklama alanı.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>-->

    <section>
        <div class="background-holder overlay overlay-elixir"
             style="background-image:url(site_assets/images/background-15.jpg);"></div>
        <!--/.background-holder-->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="media">
                        <span class="ion-android-checkmark-circle fs-5 color-warning mr-3"
                              style="transform: translateY(-1rem)"></span>
                        <div class="media-body">
                            <h2 class="color-warning fs-3 fs-lg-4">Rakamlarla EGİOSB,<br/>
                                <span class="color-white">yatırımın en değerli bölgesi.</span>
                            </h2>
                            <div class="row mt-4 pr-lg-12">
                                <div class="col-md-2 overflow-hidden" data-zanim-timeline="{}"
                                     data-zanim-trigger="scroll">
                                    <div class="fs-3 fs-lg-4 mb-0 lh-2 fw-700 color-white mt-lg-5 mt-3"
                                         data-zanim='{"delay":0.1}'><?= $mainpage->elektrik ?>
                                        <small>kWh</small>
                                    </div>
                                    <h6 class="fs-0 color-white" data-zanim='{"delay":0.2}'>Elektrik Tüketimi</h6>
                                </div>
                                <div class="col col-lg-2 overflow-hidden" data-zanim-timeline="{}"
                                     data-zanim-trigger="scroll">
                                    <div class="fs-3 fs-lg-4 mb-0 lh-2 fw-700 color-white mt-lg-5 mt-3"
                                         data-zanim='{"delay":0.1}'><?= $mainpage->su ?><small>m<sup>3</sup></small>
                                    </div>
                                    <h6 class="fs-0 color-white" data-zanim='{"delay":0.2}'>Su Tüketimi</h6>
                                </div>
                                <!--<div class="w-100 d-flex d-lg-none">
                                </div>-->
                                <div class="col-md-4 overflow-hidden" data-zanim-timeline="{}"
                                     data-zanim-trigger="scroll">
                                    <div class="fs-3 fs-lg-4 mb-0 lh-2 fw-700 color-white mt-lg-5 mt-3"
                                         data-zanim='{"delay":0.1}'><?= $mainpage->yuzolcum ?>
                                        <small>m<sup>2</sup></small>
                                    </div>
                                    <h6 class="fs-0 color-white" data-zanim='{"delay":0.2}'>Yüz Ölçümü</h6>
                                </div>
                                <div class="col col-lg-2 overflow-hidden" data-zanim-timeline="{}"
                                     data-zanim-trigger="scroll">
                                    <div class="fs-3 fs-lg-4 mb-0 lh-2 fw-700 color-white mt-lg-5 mt-3"
                                         data-zanim='{"delay":0.1}'><?= $mainpage->kurulus ?>
                                    </div>
                                    <h6 class="fs-0 color-white" data-zanim='{"delay":0.2}'>Kuruluş Yılı</h6>
                                </div>
                                <div class="col col-lg-2 overflow-hidden" data-zanim-timeline="{}"
                                     data-zanim-trigger="scroll">
                                    <div class="fs-3 fs-lg-4 mb-0 lh-2 fw-700 color-white mt-lg-5 mt-3"
                                         data-zanim='{"delay":0.1}'><?= $mainpage->firmaSayisi ?>
                                    </div>
                                    <h6 class="fs-0 color-white" data-zanim='{"delay":0.2}'>Kayıtlı Firma</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>

    <section class="background-10 py-6">
        <div class="container">
            <div class="row align-items-center" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                <?php foreach ($brands as $brand) { ?>
                    <div class="col-4 col-md-2 my-3 overflow-hidden">
                        <img src="<?= base_url('uploads/brands_v/' . $brand->img_url); ?>" alt="" data-zanim="{}"/>
                    </div>
                <?php } ?>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>
    <!--<section class="background-11">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="text-center fs-2 fs-lg-3">Projeler</h3>
                    <hr class="short"
                        data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}'
                        data-zanim-trigger="scroll"/>
                </div>
            </div>
            <div class="row mt-lg-6">
                <div class="col-md-6 col-lg-4 py-0 mt-4 mt-lg-0">
                    <div class="background-white pb-4 h-100 radius-secondary">
                        <img class="w-100 radius-tr-secondary radius-tl-secondary" src="site_assets/images/9.jpg"
                             alt="Featured Image"/>
                        <div class="px-4 pt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="overflow-hidden">
                                <a href="news.html">
                                    <h5 data-zanim='{"delay":0}'>Proje başlık alanı</h5></a>
                            </div>
                            <div class="overflow-hidden">
                                <p class="color-7" data-zanim='{"delay":0.1}'>Admin tarafından yazıldı</p>
                            </div>
                            <div class="overflow-hidden">
                                <p class="mt-3" data-zanim='{"delay":0.2}'>Proje açıklama alanı yazısı </p>
                            </div>
                            <div class="overflow-hidden">
                                <div class="d-inline-block" data-zanim='{"delay":0.3}'><a
                                            class="d-flex align-items-center" href="#">Devamını Oku
                                        <div class="overflow-hidden ml-2"
                                             data-zanim='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'>
                                            <span class="d-inline-block">⟶</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 py-0 mt-4 mt-lg-0">
                    <div class="background-white pb-4 h-100 radius-secondary">
                        <img class="w-100 radius-tr-secondary radius-tl-secondary" src="site_assets/images/10.jpg"
                             alt="Featured Image"/>
                        <div class="px-4 pt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="overflow-hidden">
                                <a href="news.html">
                                    <h5 data-zanim='{"delay":0}'>Proje başlık alanı</h5>
                                </a>
                            </div>
                            <div class="overflow-hidden">
                                <p class="color-7" data-zanim='{"delay":0.1}'>Admin tarafından yazıldı</p>
                            </div>
                            <div class="overflow-hidden">
                                <p class="mt-3" data-zanim='{"delay":0.2}'>Proje açıklama alanı yazısı</p>
                            </div>
                            <div class="overflow-hidden">
                                <div class="d-inline-block" data-zanim='{"delay":0.3}'>
                                    <a class="d-flex align-items-center" href="#">Devamını Oku
                                        <div class="overflow-hidden ml-2"
                                             data-zanim='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'>
                                            <span class="d-inline-block">⟶</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 py-0 mt-4 mt-lg-0">
                    <div class="background-white pb-4 h-100 radius-secondary">
                        <img class="w-100 radius-tr-secondary radius-tl-secondary" src="site_assets/images/14.jpg"
                             alt="Featured Image"/>
                        <div class="px-4 pt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="overflow-hidden">
                                <a href="news.html">
                                    <h5 data-zanim='{"delay":0}'>Proje başlık alanı</h5>
                                </a>
                            </div>
                            <div class="overflow-hidden">
                                <p class="color-7" data-zanim='{"delay":0.1}'>Admin tarafından yazıldı</p>
                            </div>
                            <div class="overflow-hidden">
                                <p class="mt-3" data-zanim='{"delay":0.2}'>Proje açıklama alanı yazısı</p>
                            </div>
                            <div class="overflow-hidden">
                                <div class="d-inline-block" data-zanim='{"delay":0.3}'>
                                    <a class="d-flex align-items-center" href="#">Devamını Oku
                                        <div class="overflow-hidden ml-2"
                                             data-zanim='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'>
                                            <span class="d-inline-block">⟶</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <?php $this->load->view("includes/web_includes/top_footer"); ?>
    <?php $this->load->view("includes/web_includes/footer"); ?>
</main>
<!--  -->

<?php $this->load->view("includes/web_includes/site_scripts"); ?>
</body>
</html>