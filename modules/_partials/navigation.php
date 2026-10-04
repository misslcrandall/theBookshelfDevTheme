<?php
    $headerCTA = get_field('header_cta', 'options');
?>
<?php
/***** CENTERED HEADER WITH SPLIT NAV *****/
/** Must Enable Left/Right in themesetup.php **/
/* <div class="nav-wrap centered">
    <div class="inner">
        <?php include 'social-menu.php';?>
        <div class="navbar">
            <nav role="navigation" id="main_menu">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main-left',
                            'container_class' => 'menu-left',
                            'menu_class'=>'nav-left'
                        )
                    );
                    $headerCTA = get_field('header_cta', 'options');
                ?>
                <div class="site-branding">
                    <?php 
                    $blog_info = get_bloginfo( 'name' );
                    if ( has_custom_logo() ){ ?>
                        <div class="logo"><?php the_custom_logo(); ?></div>
                    <?php } else{ ?>
                        <a class="title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a>
                    <?php } ?>
                </div>
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main-right',
                            'container_class' => 'menu-right',
                            'menu_class'=>'nav-right'
                        )
                    );
                ?>
            </nav>
            <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
            <label for="openSidebarMenu" class="sidebarIconToggle">
                <div class="spinner diagonal part-1"></div>
                <div class="spinner horizontal"></div>
                <div class="spinner diagonal part-2"></div>
            </label>
            <div class="offscreen-menu" id="sidebarMenu">
                <div class="content">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'mobile-menu',
                            'container_class' => 'mobile-menu-wrap',
                            'menu_class'=>'mobile-menu'
                        )
                    );
                    $headerCTA = get_field('header_cta', 'options');
                    if( $headerCTA['show_cta'] ){ ?>
                        <div class="mobile-cta">
                            <a class="button" href="<?php echo $headerCTA['btn_link']; ?>"><?php echo $headerCTA['btn_text']; ?></a>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <?php //CTA Button
        $headerCTA = get_field('header_cta', 'options');
        if( $headerCTA['show_cta'] ){ ?>
            <div class="cta">
                <a class="button" href="<?php echo $headerCTA['btn_link']; ?>"><?php echo $headerCTA['btn_text']; ?></a>
            </div>
        <?php }?>
    </div>
</div>
*/?>

<div class="nav-wrap left-aligned">
    <div class="topbar">
        <?php include 'social-menu.php';?>
    </div>
    <div class="inner">
        <div class="navbar">
            <nav role="navigation" id="main_menu">
                <div class="site-branding">
                    <?php 
                    $blog_info = get_bloginfo( 'name' );
                    if ( has_custom_logo() ){ ?>
                        <div class="logo"><?php the_custom_logo(); ?></div>
                    <?php } else{ ?>
                        <a class="title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a>
                    <?php } ?>
                </div>
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'header',
                            'container_class' => 'menu',
                            'menu_class'=>'navbar-nav'
                        )
                    );
                ?>
            </nav>
            <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
            <label for="openSidebarMenu" class="sidebarIconToggle">
                <div class="spinner diagonal part-1"></div>
                <div class="spinner horizontal"></div>
                <div class="spinner diagonal part-2"></div>
            </label>
            <div class="offscreen-menu" id="sidebarMenu">
                <div class="content">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'mobile-menu',
                            'container_class' => 'mobile-menu-wrap',
                            'menu_class'=>'mobile-menu'
                        )
                    );
                    $headerCTA = get_field('header_cta', 'options');
                    if( $headerCTA['show_cta'] ){ ?>
                        <div class="mobile-cta">
                            <a class="button" href="<?php echo $headerCTA['btn_link']; ?>"><?php echo $headerCTA['btn_text']; ?></a>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <?php //CTA Button
        $headerCTA = get_field('header_cta', 'options');
        if( $headerCTA['show_cta'] ){ ?>
            <div class="cta">
                <a class="button" href="<?php echo $headerCTA['btn_link']; ?>"><?php echo $headerCTA['btn_text']; ?></a>
            </div>
        <?php }?>
    </div>
</div>