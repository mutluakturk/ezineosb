<?php $user = get_active_user(); ?>

<aside id="menubar" class="menubar light">
    <div class="app-user">
        <div class="media">
            <div class="media-left">
                <div class="avatar avatar-md avatar-circle">
                    <a href="javascript:void(0)">
                        <img class="img-responsive"
                             src="<?php echo base_url(); ?>/uploads/settings_v/<?= $this->session->settings->logo ?>"
                             alt="<?php //echo convertToSEO($user->full_name); ?>"/></a>
                </div>
            </div>
            <div class="media-body">
                <div class="foldable">
                    <h5><a href="javascript:void(0)" class="username"><?php echo $user->full_name; ?></a></h5>
                    <ul>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <small style="color: red"><?= $user->user_type; ?></small>
                                <small>İşlemler</small>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li>
                                    <a class="text-color" href="<?php echo base_url(); ?>">
                                        <span class="m-r-xs"><i class="fa fa-home"></i></span>
                                        <span>Site Önizleme</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="<?php echo base_url("users/update_form/$user->id") ?>">
                                        <span class="m-r-xs"><i class="fa fa-user"></i></span>
                                        <span>Profilim</span>
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a class="text-color" href="<?php echo base_url("logout") ?>">
                                        <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                                        <span>Çıkış</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- .media-body -->
        </div><!-- .media -->
    </div><!-- .app-user -->

    <div class="menubar-scroll">
        <div class="menubar-scroll-inner">
            <ul class="app-menu">
                <!--<li>
                    <a href="<?php //echo base_url(); ?>">
                        <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
                        <span class="menu-text">Giriş</span>
                    </a>
                </li>-->
                <li>
                    <a href="<?php echo base_url('dashboard'); ?>">
                        <i class="menu-icon zmdi zmdi-view-web zmdi-hc-lg"></i>
                        <span class="menu-text">Ana Sayfa</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('menu'); ?>">
                        <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                        <span class="menu-text">Menü Yönetimi</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('page'); ?>">
                        <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                        <span class="menu-text">Sayfa Yönetimi</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('slides'); ?>">
                        <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                        <span class="menu-text">Slider Yönetimi</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("galleries"); ?>">
                        <i class="menu-icon zmdi zmdi-apps zmdi-hc-lg"></i>
                        <span class="menu-text">Galeri Yönetimi</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url("Comments"); ?>">
                        <i class="menu-icon zmdi zmdi-comment zmdi-hc-lg"></i>
                        <span class="menu-text">Yorum Yönetimi</span>
                        <span class="label label-warning menu-label unreadcount" id="unreadcount"><?= get_unchecked_comment_count(); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('mainpage'); ?>">
                        <i class="menu-icon zmdi zmdi-puzzle-piece zmdi-hc-lg"></i>
                        <span class="menu-text">Tasarım</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('news'); ?>">
                        <i class="menu-icon fa fa-newspaper-o"></i>
                        <span class="menu-text">Haberler</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('Announcenment'); ?>">
                        <i class="menu-icon fa fa-newspaper-o"></i>
                        <span class="menu-text">Duyurular</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('Application'); ?>">
                        <i class="menu-icon fa fa-newspaper-o"></i>
                        <span class="menu-text">İş Başvuruları</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("newsletter"); ?>">
                        <i class="menu-icon fa fa-users"></i>
                        <span class="menu-text">Haber Bülteni Aboneleri</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("suggestions"); ?>">
                        <i class="menu-icon fa fa-users"></i>
                        <span class="menu-text">Şikayet/Öneri</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('brands'); ?>">
                        <i class="menu-icon zmdi zmdi-puzzle-piece zmdi-hc-lg"></i>
                        <span class="menu-text">Firma Logoları</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("settings") ?>">
                        <i class="menu-icon zmdi zmdi-check zmdi-hc-lg"></i>
                        <span class="menu-text">Ayarlar</span>
                    </a>
                </li>

                <!--<li>
                    <a href="<?php /*echo base_url('references'); */ ?>">
                        <i class="menu-icon zmdi zmdi-check zmdi-hc-lg"></i>
                        <span class="menu-text">İş İlanları</span>
                    </a>
                </li>-->

                <?php /*if ($this->session->user->user_type == "Yönetim") { */ ?><!--
                    <li class="has-submenu">
                        <a href="javascript:void(0)" class="submenu-toggle">
                            <i class="menu-icon zmdi zmdi-settings"></i>
                            <span class="menu-text">Yönetim İşlemleri</span>
                            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                        </a>
                        <ul class="submenu">

                            <li>
                                <a href="<?php /*echo base_url("settings") */ ?>">
                                    <span class="menu-text">Ayarlar</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php /*echo base_url("Emailsettings"); */ ?>">
                                    <span class="menu-text">E-Posta Ayarları</span>
                                </a>
                            </li>

                         <li>
                                <a href="<?php /*echo base_url('users'); */ ?>">
                                    <span class="menu-text">Kullanıcılar</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php /*echo base_url('Reports'); */ ?>">
                                    <span class="menu-text">Raporlar</span>
                                </a>
                            </li>

                            <li class="has-submenu">
                                <a href="javascript:void(0)" class="submenu-toggle">
                                    <span class="menu-text">Raporlar</span>
                                    <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                                </a>
                                <ul class="submenu">
                                    <li>
                                        <a href="#">
                                            <span class="menu-text">Günlük Raporlar</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <span class="menu-text">Aylık Raporlar</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <span class="menu-text">Yıllık Raporlar</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>


                        </ul>
                    </li>
                --><?php /*} */ ?>

                <!--<li>
                    <a href="<?php /*echo base_url('services') */ ?>">
                        <i class="menu-icon fa fa-cutlery"></i>
                        <span class="menu-text">Hizmetlerimiz</span>
                    </a>
                </li>
-->


                <!--
                <li>
                    <a href="<?php echo base_url("members"); ?>">
                        <i class="menu-icon fa fa-users"></i>
                        <span class="menu-text">Hastalar</span>
                    </a>
                </li>


                <li>
                    <a href="<?php echo base_url("appointments"); ?>">
                        <i class="menu-icon fa fa-apple"></i>
                        <span class="menu-text">Randevular</span>
                    </a>
                </li>



                <li>
                    <a href="<?php echo base_url('product') ?>">
                        <i class="menu-icon fa fa-cubes"></i>
                        <span class="menu-text">Ürünler</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url('services') ?>">
                        <i class="menu-icon fa fa-cutlery"></i>
                        <span class="menu-text">Hizmetlerimiz</span>
                    </a>
                </li>

                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon fa fa-asterisk"></i>
                        <span class="menu-text">Portfolyo İşlemleri</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo base_url("portfolio_categories") ?>">
                                <span class="menu-text">Portfolyo Kategorileri</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('portfolio'); ?>">
                                <span class="menu-text">Portfolyo</span>
                            </a>
                        </li>

                    </ul>
                </li>




                <li>
                    <a href="<?php echo base_url('courses'); ?>">
                        <i class="menu-icon fa fa-calendar"></i>
                        <span class="menu-text">Eğitimler</span>
                    </a>
                </li>





                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon zmdi zmdi-lamp zmdi-hc-lg"></i>
                        <span class="menu-text">Popups Hizmeti</span>
                    </a>
                </li>  -->


            </ul><!-- .app-menu -->
        </div><!-- .menubar-scroll-inner -->
    </div><!-- .menubar-scroll -->
</aside>