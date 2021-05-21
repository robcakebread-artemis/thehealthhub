<div id="header-basket" class="relative">
    <a id="show-the-basket" class="cart-contents" href="<?= wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping basket' ); ?>" rel="nofollow"><?= get_icon('basket'); ?><span class="basket-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
    <div id="show-basket">
        <div id="aws-minicart-top">
            <?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>
                    <ul class="aws-minicart-top-products">
                            <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                            $_product = $cart_item['data'];
                            // Only display if allowed
                            if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $_product->exists() || $cart_item['quantity'] == 0 ) continue;
                            // Get price
                            $product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax($_product) : wc_get_price_including_tax($_product);
                            $product_price = apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key );
                            ?>
                            <li class="aws-mini-cart-product clearfix relative">
                                    <div class="aws-mini-cart-thumbnail-wrapper">
                                            <span class="aws-mini-cart-thumbnail relative">
                                                    <?php echo $_product->get_image(); ?>
                                            </span>
                                    </div>
                                    <div class="aws-mini-cart-info">
                                            <a class="aws-mini-cart-title" href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">
                                                    <h4><?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?></h4>
                                            </a>
                                            <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="aws-mini-cart-quantity">' . $cart_item['quantity'] . '</span>', $cart_item, $cart_item_key ); ?> x <?php echo apply_filters( 'woocommerce_widget_cart_item_price', '<span class="woffice-mini-cart-price">' . $product_price . '</span>', $cart_item, $cart_item_key ); ?>

                                    </div>
                            </li>
                            <?php endforeach; ?>
                    </ul>
            <?php else : ?>
                    <p class="aws-mini-cart-product-empty"><?php _e( 'There are no products in your basket.', 'aws' ); ?></p>
            <?php endif; ?>
            <?php if (sizeof( WC()->cart->get_cart()) > 0) : ?>
                    <h4 class="text-center aws-mini-cart-subtotal"><?php _e( 'Basket Subtotal', 'aws' ); ?>: <?php echo WC()->cart->get_cart_subtotal(); ?></h4>
                    <div class="text-center">
                            <a class="button" href="<?php echo wc_get_cart_url(); ?>">
                                    <?= get_icon('basket'); ?> <?php _e( 'View Basket', 'aws' ); ?>
                            </a>
                            <a class="button checkout orange" href="<?php echo wc_get_checkout_url(); ?>">
                                <?= get_icon('credit-card'); ?> <?php _e( 'Checkout', 'aws' ); ?>
                            </a>
                    </div>
            <?php endif; ?>
        </div>
    </div>
</div>