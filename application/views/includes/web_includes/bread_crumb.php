<section>
    <div>
        <div class="background-holder overlay"
             style="background-image:url(<?= base_url() ?>site_assets/images/background-2.jpg);background-position: center bottom;">
        </div>
        <!--/.background-holder-->
        <div class="container">
            <div class="row pt-6" data-inertia='{"weight":1.5}'>
                <div class="col-md-8 px-md-0 color-white" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                    <div class="overflow-hidden">
                        <h1 class="color-white fs-4 fs-md-5 mb-0 zopacity" data-zanim='{"delay":0}'>
                            <?php switch ($icerik) {
                                case "news":
                                    echo "Haberler";
                                    break;
                                case "announcenments":
                                    echo "Duyurular";
                                    break;
                                case "Galeri":
                                    echo "Galeri";
                                    break;
                                default:
                                    echo get_menu_title($this->session->icindekiler->menuId);
                            } ?>
                            <?php ?>
                        </h1>
                        <div class="nav zopacity" aria-label="breadcrumb" role="navigation" data-zanim='{"delay":0.1}'>
                            <ol class="breadcrumb fs-1 pl-0 fw-700">
                                <li class="breadcrumb-item">
                                    <a class="color-white" href="<?= base_url() ?>">Ana Sayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php
                                    switch ($icerik) {
                                        case "news":
                                            echo "Haberler";
                                            break;
                                        case "announcenments":
                                            echo "Duyurular";
                                            break;
                                        case "Galeri":
                                            {
                                                if ($this->uri->segment(2) == "galleryDetail") {
                                                    echo $gallery->title;
                                                } else {
                                                    echo "Galeri";
                                                }
                                            }
                                            break;
                                        default:
                                            echo get_menu_title($this->session->icindekiler->menuId);
                                    } ?>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->
</section>