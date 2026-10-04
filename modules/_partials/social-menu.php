<?php
$siteName = get_bloginfo( 'name' );

//Social Menu Component
$facebook = get_field('facebook_url', 'options');
$instagram = get_field('instagram_url', 'options');
$twitter = get_field('twitter_url', 'options');
$tiktok = get_field('tiktok_url', 'options');
$goodreads = get_field('goodreads_url', 'options');
$bookbub = get_field('bookbub_url', 'options');
$youtube = get_field('youtube_url', 'options');
?>


<div class="social-menu">
    <ul>
        <?php if($tiktok){?>
            <li><a href="<?php echo $tiktok;?>" target="_blank" rel="noopener" class="tiktok"  alt="Follow <?php echo $siteName; ?> on TikTok">
                <?php get_template_part('/src/images/tiktok.svg'); ?>
            </a></li>
        <?php } ?>
        <?php if($instagram){?>
            <li><a href="<?php echo $instagram;?>" target="_blank" rel="noopener" class="instagram" alt="Follow <?php echo $siteName; ?> on Instagram">
                <?php get_template_part('/src/images/instagram.svg'); ?>
            </a></li>
        <?php } ?>
        <?php if($twitter){?>
            <li><a href="<?php echo $twitter;?>" target="_blank" rel="noopener" class="twitter" alt="Follow <?php echo $siteName; ?> on Twitter">
                <?php get_template_part('/src/images/twitter.svg'); ?>
            </a></li>
        <?php } ?>
        <?php if($facebook){?>
            <li><a href="<?php echo $facebook;?>" target="_blank" rel="noopener" class="facebook" alt="Follow <?php echo $siteName; ?> on Facebook">
                <?php get_template_part('/src/images/facebook.svg'); ?>
            </a></li>
        <?php } ?>
        <?php if($goodreads){?>
            <li><a href="<?php echo $goodreads;?>" target="_blank" rel="noopener" class="goodreads"  alt="Follow <?php echo $siteName; ?> on Goodreads">
                <?php get_template_part('/src/images/goodreads-bold.svg'); ?>
            </a></li>
        <?php } ?>
        <?php if($bookbub){?>
            <li><a href="<?php echo $bookbub;?>" target="_blank" rel="noopener" class="bookbub" alt="Follow <?php echo $siteName; ?> on BookBub">
                <?php get_template_part('/src/images/bookbub.svg'); ?>
            </a></li>
        <?php } ?>
        <?php if($youtube){?>
            <li><a href="<?php echo $youtube;?>" target="_blank" rel="noopener" class="youtube" alt="Follow <?php echo $siteName; ?> on YouTube">
                <?php get_template_part('/src/images/youtube.svg'); ?>
            </a></li>
        <?php } ?>
    </ul>
</div>