<?php
/**
 * The theme header
 * 
 * @package bootstrap-basic
 * Template Name: Halaman Authors
 */

get_header(); ?>
<!-- begin top section -->
        <div class="top-inner book">
          <header class="main-header nav-down">
            <div class="container">
              <div class="row">
                <div class="col-md-4">
                  <div class="top-logo clearfix">
                    <a href="/" class="bip-logo"><img src="<?php echo get_template_directory_uri() ?>/images/logo.png" alt="bhuana ilmu populer indonesia" class="img-responsive"></a>
                    <a href="/" class="logo-white"><img src="<?php echo get_template_directory_uri() ?>/images/logo-white.png" alt="bhuana ilmu populer indonesia" class="img-responsive"></a>
                    <h1>bhuana ilmu populer</h1>
                  </div>
                </div>
                <div class="col-md-8">
                  <nav class="main-navigation">
                    <?php
echo  wp_nav_menu(array('echo' => false,'theme_location' => 'primary', 'container' => false, 'container_class' => false, 'menu_class' => 'navigation-list list-unstyled', 'walker' => new BootstrapBasicMyWalkerNavMenu()));
?>
                  </nav>
                  <form class="language-option" style="display: none;">
                    <select class="form-control">
                      <option selected>English</option>
                      <option>Indonesia</option>
                    </select>
                  </form>
                  <a href="#search" class="search-top" role="button" data-toggle="collapse"  aria-expanded="false" aria-controls="search">
                    <span class="wd wd-search67"></span>
                  </a>
                  <a id="leftOverlay" href="#sidr"><i class="wd wd-clipboard96"></i></a>

                  <a id="mobMenu" href="#left-menu">Left Menu</a>
                </div>
              </div>
            </div>
            <div class="main-search collapse" id="search">
              <div class="container">
                <div class="row">
                  <div class="col-md-8 col-md-offset-2 col-sm-12">
                    <?php get_search_form(); ?>
                  </div>
                </div>
              </div>
            </div>
          </header>
        </div><!-- end of top section -->

         <!-- begin inner page -->
        <div class="inner-page">

          <div class="inner-top no-margin">
            <div class="container">
              <div class="top-title">
                <h3>Authors</h3>
              </div>
              <div class="breadcrumb">
                <div class="btn-group btn-breadcrumb">
                  <a href="/" class="btn btn-default"><i class="wd wd-home148"></i></a>
                  <a href="" class="btn btn-default active">Authors list</a>
                </div>
              </div>
            </div>
          </div>

<!--           <div class="news-page">
            <div class="top-news-intro">
              <div class="container">
                <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                    <h3>bhuana ilmu populer Authors</h3>
                    <p>Vivamus ultrices, tellus id volutpat tristique, sapien nibh tempor tortor, vel sollicitudin nisl dolor at nisl. Mauris velit tellus, consequat eget volutpat sed, tempus nec erat.</p>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="news-grid-layout">
              <div class="container">
                <div class="row">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args =  array('post_type' => 'book_author', 'posts_per_page' => 12, 'paged' => $paged );
                query_posts($args);
                if(have_posts()){
                  while(have_posts()){
                    the_post();
                ?>
                  <div class="col-md-4">
                    <div class="news-short">
                        <div class="news-thumbnail">
                          <div class="bip-item">
                          <a href="<?php echo get_permalink(); ?>">
                            <figure class="colored">
                            <?php 
                            $poto = get_field('photo');
                            if(file_exists('.'.@$poto['url'])) { ?>
                              <img src="<?php echo @$poto['url']; ?>" alt="news title" class="img-responsive" width="378px" height="236px"/>
                            <?php } else { ?>
                              <img src="<?php echo get_template_directory_uri() ?>/images/unknown.png" alt="news title" class="img-responsive" width="378px" height="236px"/>
                            <?php } ?>
                              <figcaption>
                                <h4><?php echo wp_trim_words(get_the_title(),4,'...'); ?></h4>
                              </figcaption>
                            </figure>
                          </a>
                          </div>
                        </div>
                        <!-- <div class="news-short-detail">
                          <div class="short-text">
                            
                            <?php
                            echo wp_trim_words(get_field('about'),20,'...');
                            ?>
                            
                            <a href="<?php echo get_permalink(); ?>">Detail <i class="wd wd-pointer45"></i></a>
                          </div>
                        </div> -->
                    </div>
                  </div>
                <?php
                  }
                }
                ?>
                </div>
                <div class="bip-pagination">
                    <div class="circle-page">
                      <span class="circle-iconic"><i class="wd wd-rocket72"></i></span>
                      <ul class="pagination">
                      <li>
                        <?php
                        the_posts_pagination( array(
                                    'mid_size' => 2,
                                    'prev_text' => __( '<<', 'textdomain' ),
                                    'next_text' => __( '>>', 'textdomain' ),
                          ));
                        ?>
                      </li>
                      </ul>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div> <!-- end inner page -->
      </div><!-- end main page -->
      <div class="push"></div>
    </div><!-- end wrap page -->
<?php add_action('wp_footer', 'JSforNews'); ?>
<?php get_footer(); ?>