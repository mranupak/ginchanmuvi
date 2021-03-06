<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">




        <main class="site-main" id="main">
        <table class="mb-2">
                <tbody>

                    <tr>
                        <th style="text-align:center; padding: 1px; ">
                            <?= get_option('ads_1'); ?>
                        </th>

                    </tr>
                </tbody>
            </table>

            <div class="ann"><?php echo get_option('config_infoweb'); ?></div>
            <?php if ( have_posts() ) : ?>

            <div class="latest ">
                <h1><?php
						the_archive_title();
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
                </h1>
                <div class="los bg-white mt-2 p-2 rounded shadow-sm">
                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                    <?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', get_post_format() );
						?>

                    <?php endwhile; ?>
                </div>
                <?php understrap_pagination(); ?>
            </div>
            <?php else : ?>

            <?php get_template_part( 'loop-templates/content', 'none' ); ?>

            <?php endif; ?>

        </main><!-- #main -->

        <!-- The pagination component -->


        <!-- Do the right sidebar check -->




    </div><!-- #content -->

</div><!-- #archive-wrapper -->

<?php get_footer(); ?>