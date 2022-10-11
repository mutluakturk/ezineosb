<div class="znav-white znav-container sticky-top navbar-elixir" id="znav-container">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand overflow-hidden pr-3" href="<?= base_url(); ?>">
                <img src="<?= base_url('uploads/settings_v/ezine-osb2.png') ?>" width="113"
                     height="113"/></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger hamburger--emphatic">
                    <div class="hamburger-box">
                        <div class="hamburger-inner">
                        </div>
                    </div>
                </div>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav fs-0 fw-700">
                    <?php foreach ($this->session->allMenuItems as $menuItem) { ?>
                        <li>
                            <?php if ($menuItem->parent == -1) { ?>
                                <a href="JavaScript:void(0)"><?= $menuItem->title ?></a>
                            <?php } ?>
                            <ul class="dropdown fs--1">
                                <?php foreach ($this->session->allMenuItems as $menuItem2) { ?>
                                    <?php if ($menuItem->id == $menuItem2->parent) {

                                        ?>
                                        <li>
                                            <?php if ($menuItem2->controller != "getPage") { ?>
                                                <a href="<?php echo (!$menuItem2->controller) ? base_url("#") : base_url($menuItem2->controller) ?>"><?= $menuItem2->title ?></a>
                                            <?php } else { ?>
                                                <a href="<?php echo base_url('web/getPage/' . $menuItem2->id); ?>"><?= $menuItem2->title ?></a>
                                            <?php } ?>
                                        </li>

                                        <?php

                                    }
                                } ?>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
                <ul class="navbar-nav ml-lg-auto">
                    <li><a class="btn btn-outline-primary btn-capsule btn-sm border-2x fw-700"
                           href="https://egiosb.org.tr/firmalar"
                           target="https://egiosb.org.tr/firmalar">Firmalar</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>