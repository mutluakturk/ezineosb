<?php
foreach ($slides as $slide) { ?>
    <li data-zanim-timeline="{}">
        <section class="py-0">
            <div>
                <div class="background-holder elixir-zanimm-scale"
                     style="background-image:url(<?php echo base_url("uploads/slides_v/1481x715/" . $slide->img_url); ?>);"
                     data-zanimm='{"from":{"opacity":0.1,"filter":"blur(10px)","scale":1.05},"to":{"opacity":1,"filter":"blur(0px)","scale":1}}'></div>

                <!--/.background-holder-->

                <div class="container">
                    <div class="row h-full py-8 align-items-center" data-inertia='{"weight":1.5}'>
                        <div class="col-sm-8 col-lg-7 px-5 px-sm-3">
                            <div class="overflow-hidden">
                                <h1 class="fs-4 fs-md-5 zopacity"
                                    data-zanim='{"delay":0}'><?php echo $slide->title ?></h1>
                            </div>
                            <div class="overflow-hidden">
                                <p class="color-primary mt-4 mb-5 lh-2 fs-1 fs-md-2 zopacity"
                                   data-zanim='{"delay":0.1}'><?php echo $slide->description ?></p>
                            </div>
                            <?php if ($slide->allowButton) {?>
                                <div class="overflow-hidden">
                                    <div class="zopacity" data-zanim='{"delay":0.2}'>
                                        <a class="btn btn-primary mr-3 mt-3" target="_blank" href="<?php echo $slide->button_url ?>"><?php echo $slide->button_caption ?><span
                                                    class="fa fa-chevron-right ml-2"></span></a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <!--/.row-->
            </div>

            <!--/.container-->
        </section>
    </li>
<?php } ?>