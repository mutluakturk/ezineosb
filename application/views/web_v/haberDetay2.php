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
    <?php //$this->load->view("includes/web_includes/top_header"); ?>
    <?php //$this->load->view("includes/web_includes/menu"); ?>
    <!--    =============================================-->
    <section class="background-11 " style="padding: 0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="overflow-hidden" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div data-zanim='{"delay":0}'>
                            <a class="d-inline-block color-7" href="#"><?= get_username($haber->createdBy); ?></a>,
                             
                            <a class="d-inline-block color-7"
                               href="#"><?= get_readable_just_date($haber->createdAt); ?></a>
                        </div>
                        <h4 data-zanim='{"delay":0.1}'><?= $haber->title; ?></h4>
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
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <img class="radius-tr-secondary radius-tl-secondary"
                                 src="<?= base_url('uploads/' . $path . '/' . $haber->img_url) ?>"
                                 alt="<?= $haber->url ?>">
                        </div>
                        <div class="col-12">
                            <div class="background-white p-5 radius-secondary">
                                <p class="dropcap"><?php echo $haber->description ?></p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row mt-6">
                                <div class="col-12">
                                    <div class="background-white p-5 radius-tl-secondary radius-tr-secondary">
                                        <h4>Son Yorumlar</h4>

                                        <?php foreach ($comments as $comment) {
                                        if ($comment->status == 0){
                                        ?>
                                        <div class="row my-5 alert alert-danger">
                                            <?php } else { ?>
                                                <div class="row my-5 alert alert-success">
                                                    <?php } ?>
                                                    <div class="col-10">
                                                        <h5 class="mb-1"><?= $comment->title ?></h5>
                                                        <p class="fs--1 color-7">Yorum Tarih ve Saat
                                                            // <?= get_readable_date($comment->createdAt) ?></p>
                                                        <p><?php echo strip_tags($comment->description); ?></p>
                                                        <hr class="muted">
                                                    </div>
                                                </div>
                                            <?php
                                            } ?>
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
                        </div>
                    </div>
                </div>
                <!--  -->
                <!--    Benzer Konular // Second Right Side Area End-->
                <!--    =============================================-->

                <!--<div class="row px-2 mt-5">
                <div class="col">
                    <div class="background-white p-5 radius-secondary">
                        <h5>Etiketler</h5>
                        <ul class="nav tags mt-3 fs--1">
                            <?php /*foreach ($tags as $tag) { */ ?>
                                <li><a class="btn btn-sm btn-outline-primary m-1 p-2" href="#"><? /*= $tag; */ ?></a></li>
                            <?php /*} */ ?>
                        </ul>
                    </div>
                </div>


                <!--/.row-->
            </div>

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