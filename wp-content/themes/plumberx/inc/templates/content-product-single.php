<?php
if ( ! defined( 'ABSPATH' ) ) exit;

?>
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class('col-md-12'); ?>>

        <div class="row mbottom80">

            <div class="col-md-6 col-sm-6 tt-prod-images">
                <?php
                	/**
                	 * woocommerce_before_single_product_summary hook
                	 *
                	 * @hooked woocommerce_show_product_sale_flash - 10
                	 * @hooked woocommerce_show_product_images - 20
                	 */
                	do_action( 'woocommerce_before_single_product_summary' );
                ?>
            </div>

            <div class="col-sm-6 col-md-6  tt-prod-summary entry-summary ">
                <?php
                	/**
                	 * woocommerce_single_product_summary hook
                	 *
                	 * @hooked woocommerce_template_single_title - 5
                	 * @hooked woocommerce_template_single_price - 10
                	 * @hooked woocommerce_template_single_excerpt - 20
                	 * * @hooked woocommerce_template_single_rating - 25
                	 * @hooked woocommerce_template_single_add_to_cart - 30
                	 * @hooked woocommerce_template_single_meta - 40
                	 * @hooked woocommerce_template_single_sharing - 50
                	 */
                	do_action( 'woocommerce_single_product_summary' );
                ?>
            </div>

        </div>

        <div class="row mbottom80">
            <div class="col-sm-12">
                <?php
                	/**
                	 * woocommerce_after_single_product_summary hook
                	 *
                	 * @hooked woocommerce_output_product_data_tabs - 10
                	 * @hooked woocommerce_upsell_display - 15
                	 * @hooked woocommerce_output_related_products - 20
                	 */
                	do_action( 'woocommerce_after_single_product_summary' );
                ?>
            </div>
        </div>

</div><!-- #product-<?php the_ID(); ?> -->

