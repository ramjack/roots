<header class="banner navbar navbar-default navbar-static-top" role="banner"
        style="background-image: url('<?php echo get_header_image(); ?>'); background-color: #<?php echo get_header_textcolor(); ?>; background-position: initial initial; background-repeat: initial initial;">
    <div class="navbar-header-top">
        <div class="container">
            <div class="clearfix">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse4">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="pull-right">
                    <span class="label label-top-nav hidden-xs">
                        <span class="glyphicon glyphicon-time"></span> Call Us Today!</span>

                    <a class="navbar-brand" href="tel:<?php echo get_theme_mod("rjfs_phone", "NOT SET"); ?>">
                        <span class="phone-number black">
                            <?php echo get_theme_mod("rjfs_phone", "NOT SET"); ?>
                        </span>
                    </a>
                </div>
            </div>
            <div class="clearfix">
                <nav class="collapse navbar-collapse4" role="navigation">
                    <?php
                    if (has_nav_menu('primary_navigation')) :
                        wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
                    endif;
                    ?>
                </nav>
            </div>
        </div>
    </div>


    <div class="navbar-header-logo clearfix">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <a class="logo" href="<?php echo home_url(); ?>/">
                        <img class="img-responsive" src="<?php echo esc_url(get_theme_mod('rjfs_logo')); ?>"
                             alt="<?php bloginfo('name'); ?>">
                    </a>
                </div>
                <div class="col-sm-8 hidden-xs text-right">
                    <h3><?php echo html_entity_decode(get_theme_mod('rjfs_header_caption', "NOT SET"), ENT_QUOTES); ?>
                        <br/>
                        <small><?php echo html_entity_decode(get_theme_mod('rjfs_header_desc', "NOT SET"), ENT_QUOTES); ?></small>
                    </h3>
                </div>
            </div>
        </div>

        <?php
        if (has_nav_menu('service_areas_navigation')) { ?>
            <div class="navbar-service-area hidden-xs ">
                <div class="service-area">
                    <?php wp_nav_menu(array('theme_location' => 'service_areas_navigation', 'menu_class' => 'nav navbar-nav')); ?>
                </div>
            </div>
        <?php } ?>

        <div class="navbar-header-nav">
            <div class="bg-primary">
                <div class="container">
                    <nav class="collapse navbar-collapse" role="navigation">
                        <?php
                        if (has_nav_menu('primary_navigation')) :
                            wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
                        endif;
                        ?>
                    </nav>
                </div>
            </div>
            <?php if (is_front_page()) { ?>
                <div class="front-page-carousel">
                    <div class="row">
                        <div class="col-lg-12">

                            <?php if (get_theme_mod('rjfs_header_use_revolution_slider', false)) : ?>
                                <?php if (is_plugin_active('revslider/revslider.php')) : ?>
                                    <div class="carousel slide">
                                        <?php putRevSlider("homepage") ?>
                                    </div>
                                <?php else : ?>
                                    <h1>Revolution Slider not istalled or activated.</h1>
                                <?php endif; ?>

                            <?php else : ?>

                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">

                                        <?php
                                        $teasers = new WP_Query(array('post_type' => 'teaser'));
                                        $idx = 0;
                                        while ($teasers->have_posts()) :
                                            $teasers->the_post();
                                            $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                                            ?>
                                            <div class="item <?php echo ($idx == 0) ? "active" : "" ?>">
                                                <img src="<?php echo $url; ?>">

                                                <div class="carousel-caption">
                                                    <h3><?php the_title(); ?></h3>

                                                    <div class="hidden-xs"><?php the_excerpt(); ?></div>
                                                    <a href="<?php echo get_permalink($post->ID); ?>"
                                                       class="btn btn-danger hidden-xs">Learn More</a>
                                                </div>
                                            </div>
                                            <?php
                                            $idx++;
                                        endwhile;
                                        wp_reset_query();
                                        ?>

                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row nav-widgets mt15">
                    <div class="col-lg-4 col-md-4 col-sm-4 mb15">
                        <?php dynamic_sidebar('nav-left'); ?>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 mb15">
                        <?php dynamic_sidebar('nav-middle'); ?>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 mb15">
                        <?php dynamic_sidebar('nav-right'); ?>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</header>
