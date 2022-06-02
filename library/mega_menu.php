<?php

/**
* CUSTOM WALKER
*---------------------------------------------------
*/
global $MegaMenuOpenDiv;

/*--- Frontend Walker ---*/
class ATBS_Walker extends Walker_Nav_Menu {

    function start_el( &$output, $object, $depth = 0, $args = array(), $id = 0) {
        parent::start_el( $output, $object, $depth, $args );

        global $MegaMenuOpenDiv;
        global $bk_megamenu_carousel_el;

        $buffType = 'megamenu';

        $bk_mega_menu = $object->bkmegamenu;

        $MegaMenuOpenDiv = 0;
        if(($bk_mega_menu == 1) && (($object->object != "category"))) {
            $MegaMenuOpenDiv = 1;
        }else {
            $MegaMenuOpenDiv = 0;
        }

        if ( $bk_mega_menu == NULL ) {
             $bk_mega_menu = '0';
        }

        $bk_output = $bk_posts = $bk_menu_featured = $bk_has_children = $bk_carousel_item_num = NULL;
        $bk_current_type = $object->object;
        $bk_current_classes = $object->classes;
        if ( in_array('menu-item-has-children', $bk_current_classes) ) { $bk_has_children = ' bk-with-sub'; }

        if ( $bk_mega_menu == 1 ) {

            $bk_megamenu_type = $object->bkmegamenu_type;

            if ($object->object == "category") {

                $output .= '<div class="atbs-keylin-mega-menu">';
                $bk_cat_id = $object->object_id;

                ATBS_Core::bk_add_buff($buffType, $bk_cat_id, 'html');

                /** Get Sub Categories **/
                $subCategories = ATBS_Core::bk_get_sub_categories($bk_cat_id);

                $bk_args = array(
                                    'cat' => $bk_cat_id,
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'ignore_sticky_posts' => 1,
                                    'posts_per_page' => 4
                                );
                $the_query = $bk_img = $bk_cat_link = NULL;
                //begin update megamenu
                $atbs_class_megamenu = 'atbs-megamenu-normal-wrap';
                if($bk_megamenu_type == '4th-large' ):
                    $bk_args['posts_per_page'] = 8;
                    $atbs_class_megamenu = 'atbs-megamenu-wrap';
                endif;
                //end update megamenu
                $the_query = new WP_Query($bk_args);
                if ( $the_query->have_posts() ) :
                $output .= '<div class="atbs-keylin-mega-menu__inner">';
                if($bk_megamenu_type == '1st-large') {
                    $output .= '<ul class="posts-list megamenu-1st-large list-unstyled '.$atbs_class_megamenu.'">';
                    $output .= ATBS_Header::bk_get_megamenu_1stlarge_posts($the_query);
                }elseif($bk_megamenu_type == '4th-large') {
                    $output .= '<ul class="posts-list megamenu-4th-large list-unstyled '.$atbs_class_megamenu.'">';
                    $output .= ATBS_Header::bk_get_megamenu_4thlarge_posts($the_query);
                }
                else{
                    $output .= '<ul class="posts-list list-unstyled '.$atbs_class_megamenu.'">';
                    $output .= ATBS_Header::bk_get_megamenu_posts($the_query);
                }

                $output .= '</ul>';

                if(count($subCategories) > 0) {
                    $output .= '<ul class="sub-categories list-unstyled">';
                    $output .= '<li class="menu-item-cat-'.$bk_cat_id.'"><a class="post__cat post__cat--bg cat-theme-bg cat-'.$bk_cat_id.'" href="' . get_category_link( $bk_cat_id ) . '" title="All" ' . '>'.esc_html__('All', 'keylin').'</a></li>';
                    foreach($subCategories as $key => $subCategory) {
                        ATBS_Core::bk_add_buff($buffType, $subCategory->term_id, 'html');
                        $output .= '<li class="menu-item-cat-'.$subCategory->term_id.'"><a class="post__cat post__cat--bg cat-theme-bg cat-'.$subCategory->term_id.'" href="' . get_category_link( $subCategory->term_id ) . '" title="'.$subCategory->name.'" ' . '>' . $subCategory->name.'</a></li>';
                    }
                    $output .= '</ul>';
                }
                $output .= '</div><!-- Close atbs-keylin-mega-menu__inner -->';
                endif;
                wp_reset_postdata();

            }else if ($object->object == "custom") {
                $output .= '<div class="atbs-keylin-mega-menu">';
                $output .= '<div class="atbs-keylin-mega-menu__inner">';
            }
        }

        if ( ($bk_has_children == NULL) && ($object->bkmegamenu == '1') ) {
            if ($object->object == "category") {
                $bk_closer = '</div><!-- Close Megamenu -->';
            }else {
                $bk_closer = '';
            }
        } else {
            $bk_closer = '';
        }
        $output .= $bk_closer;


    }

    //start of the sub menu wrap
    function start_lvl( &$output, $depth=0, $args = array() ) {
        global $MegaMenuOpenDiv;
        if ( $depth >= 1 )  { $output .= '<ul class="sub-menu clearfix list-unstyled">'; }
        if ( $depth == 0 )  {
            if ( $MegaMenuOpenDiv == 1 ) {
                $output .= '<ul class="sub-menu clearfix list-unstyled">';
            }else {
                $output .= '<div class="sub-menu"><div class="sub-menu-inner"><ul class="list-unstyled clearfix">';
            }
        }
    }

    //end of the sub menu wrap
    function end_lvl( &$output, $depth=0, $args = array() ) {
        if ( $depth == 0 ) { $output .= '</ul><!-- end 0 --></div><!-- Close atbssuga-menu__inner --></div><!-- Close atbssuga-menu -->'; }
        if ( $depth >= 1 ) { $output .= '</ul><!-- end -->'; }

    }
}

/*--- Backend Walker ---*/
class ATBS_Walker_backend extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {}
    function end_lvl( &$output, $depth = 0, $args = array() ) {}

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $_wp_nav_menu_max_depth;
        $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        ob_start();
        $item_id = esc_attr( $item->ID );
        if (empty($item->bkmegamenu[0])) {
            $bk_item_megamenu = NULL;
        } else {
            $bk_item_megamenu = esc_attr ($item->bkmegamenu[0]);
        }

        /** MegaMenu Type **/
        if (empty($item->bkmegamenu_type)) {
            $bk_item_megamenu_type = NULL;
        } else {
            $bk_item_megamenu_type = esc_attr ($item->bkmegamenu_type);
        }

        $removed_args = array( 'action','customlink-tab', 'edit-menu-item', 'menu-item', 'page-tab',  '_wpnonce', );

        $original_title = '';
        if ( 'taxonomy' == $item->type ) {
            $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
            if ( is_wp_error( $original_title ) )
                $original_title = false;
        } elseif ( 'post_type' == $item->type ) {
            $original_object = get_post( $item->object_id );
            $original_title = $original_object->post_title;
        }

        $classes = array(
            'menu-item menu-item-depth-' . $depth,
            'menu-item-' . esc_attr( $item->object ),
            'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
        );

        $title = $item->title;

        if ( ! empty( $item->_invalid ) ) {
            $classes[] = 'menu-item-invalid';
            /* translators: %s: title of menu item which is invalid */
            $title = sprintf( esc_html__( '%s (Invalid)' , 'keylin'), $item->title );
        } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
            $classes[] = 'pending';
            /* translators: %s: title of menu item in draft status */
            $title = sprintf( esc_html__('%s (Pending)' , 'keylin'), $item->title);
        }

        $title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

        $submenu_text = '';
        if ( 0 == $depth )
            $submenu_text = 'style="display: none;"';

        ?>
        <li id="menu-item-<?php echo esc_attr($item_id); ?>" class="<?php echo implode(' ', $classes ); ?>">
            <dl class="menu-item-bar">
                <dt class="menu-item-handle">
                    <span class="item-title"><span class="menu-item-title"><?php echo esc_html( $title ); ?></span> <?php if ($depth != 0) {?><span class="is-submenu" <?php echo esc_attr($submenu_text); ?>><?php esc_html_e( 'sub item' , 'keylin'); ?></span><?php }?></span>
                    <span class="item-controls">
                        <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
                        <span class="item-order hide-if-js">
                            <a href="<?php
                                echo wp_nonce_url(
                                    add_query_arg(
                                        array(
                                            'action' => 'move-up-menu-item',
                                            'menu-item' => $item_id,
                                        ),
                                        esc_url(remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) ))
                                    ),
                                    'move-menu_item'
                                );
                            ?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', 'keylin'); ?>">&#8593;</abbr></a>
                            |
                            <a href="<?php
                                echo wp_nonce_url(
                                    add_query_arg(
                                        array(
                                            'action' => 'move-down-menu-item',
                                            'menu-item' => $item_id,
                                        ),
                                        esc_url(remove_query_arg($removed_args, admin_url( 'nav-menus.php' )) )
                                    ),
                                    'move-menu_item'
                                );
                            ?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', 'keylin'); ?>">&#8595;</abbr></a>
                        </span>
                        <a class="item-edit" id="edit-<?php echo esc_attr($item_id); ?>" title="<?php esc_attr_e('Edit Menu Item', 'keylin'); ?>" href="<?php
                            echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : esc_url(add_query_arg( 'edit-menu-item', $item_id, esc_url(remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) )) ));
                        ?>"><?php esc_html_e( 'Edit Menu Item' , 'keylin'); ?></a>
                    </span>
                </dt>
            </dl>

            <div class="menu-item-settings" id="menu-item-settings-<?php echo esc_attr($item_id); ?>">
                <?php if( 'custom' == $item->type ) : ?>
                    <p class="field-url description bk-description-wide">
                        <label for="edit-menu-item-url-<?php echo esc_attr($item_id); ?>">
                            <?php esc_html_e( 'URL' , 'keylin'); ?><br />
                            <input type="text" id="edit-menu-item-url-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
                        </label>
                    </p>
                <?php endif; ?>
                <p class="description bk-description-thin">
                    <label for="edit-menu-item-title-<?php echo esc_attr($item_id); ?>">
                        <?php esc_html_e( 'Navigation Label' , 'keylin'); ?><br />
                        <input type="text" id="edit-menu-item-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
                    </label>
                </p>
                <p class="description bk-description-thin">
                    <label for="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>">
                        <?php esc_html_e( 'Title Attribute' , 'keylin'); ?><br />
                        <input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
                    </label>
                </p>
                <p class="field-link-target description">
                    <label for="edit-menu-item-target-<?php echo esc_attr($item_id); ?>">
                        <input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr($item_id); ?>" value="_blank" name="menu-item-target[<?php echo esc_attr($item_id); ?>]"<?php checked( $item->target, '_blank' ); ?> />
                        <?php esc_html_e( 'Open link in a new window/tab' , 'keylin'); ?>
                    </label>
                </p>
                <p class="field-css-classes description bk-description-thin">
                    <label for="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>">
                        <?php esc_html_e( 'CSS Classes (optional)' , 'keylin'); ?><br />
                        <input type="text" id="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
                    </label>
                </p>
                <p class="field-xfn description bk-description-thin">
                    <label for="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>">
                        <?php esc_html_e( 'Link Relationship (XFN)' , 'keylin'); ?><br />
                        <input type="text" id="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
                    </label>
                </p>

                <?php if ($depth == 0 && (($item->object == 'category') || ($item->object == 'custom'))) { ?>
                <p class="field-bkmegamenu description">
                    <label for="edit-menu-item-bkmegamenu-<?php echo esc_attr($item_id); ?>">Enable Megamenu</label>
                    <input style="margin-left: 10px;" type="checkbox" id="edit-menu-item-bkmegamenu-<?php echo esc_attr($item_id); ?>" name="menu-item-bkmegamenu[<?php echo esc_attr($item_id); ?>]" value="1" <?php checked( $bk_item_megamenu,1 ); ?> />
                </p>
                <?php } ?>

                <?php if ($depth == 0 && ($item->object == 'category')) { ?>
                <p class="field-bkmegamenu-type description" style="margin: 20px 0;">
                    <label for="edit-menu-item-bkmegamenu-type-<?php echo esc_attr($item_id); ?> ">Megamenu Options</label>
                    <select style="margin-left: 10px;" id="edit-menu-item-bkmegamenu-type-<?php echo esc_attr($item_id); ?>" name="menu-item-bkmegamenu-type[<?php echo esc_attr($item_id); ?>]" style="width:100%;">
                        <option value='<?php echo esc_attr( 'default' ); ?>' <?php if ('default' == $bk_item_megamenu_type) echo 'selected="selected"'; ?>><?php esc_html_e( 'Default: 4 Normal Posts', 'keylin'); ?></option>
                        <option value='<?php echo esc_attr( '1st-large' ); ?>' <?php if ('1st-large' == $bk_item_megamenu_type) echo 'selected="selected"'; ?>><?php esc_html_e( 'First Large Then Normal Posts', 'keylin'); ?></option>
                        <option value='<?php echo esc_attr( '4th-large' ); ?>' <?php if ('4th-large' == $bk_item_megamenu_type) echo 'selected="selected"'; ?>><?php esc_html_e( '4 Small Posts Then Normal Posts', 'keylin'); ?></option>
                    </select>
                </p>
                <?php } ?>

                <p class="field-description description bk-description-wide">
                    <label for="edit-menu-item-description-<?php echo esc_attr($item_id); ?>">
                        <?php esc_html_e( 'Description' , 'keylin'); ?><br />
                        <textarea id="edit-menu-item-description-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo esc_attr($item_id); ?>]">
                            <?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
                        <span class="description"><?php esc_html_e('The description will be displayed in the menu if the current theme supports it.' , 'keylin'); ?></span>
                    </label>
                </p>
                <p class="field-move hide-if-no-js description bk-description-wide">
                    <label>
                        <span><?php esc_html_e( 'Move' , 'keylin'); ?></span>
                        <a href="#" class="menus-move-up"><?php esc_html_e( 'Up one' , 'keylin'); ?></a>
                        <a href="#" class="menus-move-down"><?php esc_html_e( 'Down one' , 'keylin'); ?></a>
                        <a href="#" class="menus-move-left"></a>
                        <a href="#" class="menus-move-right"></a>
                        <a href="#" class="menus-move-top"><?php esc_html_e( 'To the top' , 'keylin'); ?></a>
                    </label>
                </p>

                <div class="menu-item-actions bk-description-wide submitbox">
                    <?php if( 'custom' != $item->type && $original_title !== false ) : ?>
                        <p class="link-to-original">
                            <?php printf( esc_html__('Original: %s' , 'keylin'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
                        </p>
                    <?php endif; ?>
                    <a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr($item_id); ?>" href="<?php
                    echo wp_nonce_url(
                        add_query_arg(
                            array(
                                'action' => 'delete-menu-item',
                                'menu-item' => $item_id,
                            ),
                            admin_url( 'nav-menus.php' )
                        ),
                        'delete-menu_item_' . $item_id
                    ); ?>"><?php esc_html_e( 'Remove' , 'keylin'); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo esc_attr($item_id); ?>" href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $item_id, 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );
                        ?>#menu-item-settings-<?php echo esc_attr($item_id); ?>"><?php esc_html_e('Cancel' , 'keylin'); ?></a>
                </div>

                <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($item_id); ?>" />
                <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
                <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
                <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
                <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
                <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
            </div><!-- .menu-item-settings-->
            <ul class="menu-item-transport"></ul>
        <?php
        $output .= ob_get_clean();
    }
}

if ( ! function_exists( 'atbs_megamenu_walker' ) ) {
    function atbs_megamenu_walker($walker) {
            if ( $walker === 'Walker_Nav_Menu_Edit' ) {
                        $walker = 'ATBS_Walker_backend';
                  }
           return $walker;
        }
}
add_filter( 'wp_edit_nav_menu_walker', 'atbs_megamenu_walker');

if ( ! function_exists( 'atbs_megamenu_walker_save' ) ) {
    function atbs_megamenu_walker_save($menu_id, $menu_item_db_id) {

        if  (isset($_POST['menu-item-bkmegamenu'][$menu_item_db_id])) {
            update_post_meta( $menu_item_db_id, '_menu_item_bkmegamenu', $_POST['menu-item-bkmegamenu'][$menu_item_db_id]);
        } else {
            update_post_meta( $menu_item_db_id, '_menu_item_bkmegamenu', '0');
        }

        if  (isset($_POST['menu-item-bkmegamenu-type'][$menu_item_db_id])) {
            update_post_meta( $menu_item_db_id, '_menu_item_bkmegamenu_type', $_POST['menu-item-bkmegamenu-type'][$menu_item_db_id]);
        } else {
            update_post_meta( $menu_item_db_id, '_menu_item_bkmegamenu_type', 'default');
        }

    }
}
add_action( 'wp_update_nav_menu_item', 'atbs_megamenu_walker_save', 10, 2 );

if ( ! function_exists( 'atbs_megamenu_walker_loader' ) ) {
    function atbs_megamenu_walker_loader($menu_item) {
        $menu_item->bkmegamenu = get_post_meta($menu_item->ID, '_menu_item_bkmegamenu', true);
        $menu_item->bkmegamenu_type = get_post_meta($menu_item->ID, '_menu_item_bkmegamenu_type', true);
        return $menu_item;
     }
}
add_filter( 'wp_setup_nav_menu_item', 'atbs_megamenu_walker_loader' );