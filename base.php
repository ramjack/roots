<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

<!--[if lt IE 8]>
<div class="alert alert-warning">
    <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your
    browser</a> to improve your experience.', 'roots'); ?>
</div>
<![endif]-->

<?php
do_action('get_header');
// check to see if we have a full width header or not
if (get_theme_mod('rjfs_full_width_header', false)) {
    get_template_part('templates/header', 'fullwidth');
} else {
    get_template_part('templates/header');
}
?>

<div class="wrap container" role="document">
    <div class="content row">
        <?php if (!is_front_page() && is_breadcrumbs_enabled()) {
            novrian_breadcrumbs('');
        }?>
        <main class="main" role="main">
            <?php include roots_template_path(); ?>
        </main>
        <!-- /.main -->
        <?php if (roots_display_sidebar()) : ?>
            <aside class="sidebar" role="complementary">
                <?php include roots_sidebar_path(); ?>
            </aside><!-- /.sidebar -->
        <?php endif; ?>
    </div>
    <!-- /.content -->
</div>
<!-- /.wrap -->

<?php get_template_part('templates/footer'); ?>

</body>
</html>
