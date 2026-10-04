<?php
//Module Setting Fields
$topMargin = get_sub_field('top_margin');
$bottomMargin = get_sub_field('bottom_margin');
$topPadding = get_sub_field('top_padding');
$bottomPadding = get_sub_field('bottom_padding');
$disableAnimation = get_sub_field('disable_animation');

//Module Background Settings
$backgroundType = get_sub_field('background');
$backgroundColor = get_sub_field('background_color');
$backgroundImage = get_sub_field('background_image');

if ($backgroundType == 'color'){
 $background = 'background:'. $backgroundColor .';';
} elseif ($backgroundType == 'image'){
 $background = 'background: url('. $backgroundImage . ');';
} else{
 $background = null;
};

$moduleSettings = $topMargin.' '.$bottomMargin.' '.$topPadding.' '.$bottomPadding.' '.$disableAnimation;

$moduleBackground = $background;

$moduleAnimation = ($disableAnimation == 1) ? '' : 'data-aos="fade-up" data-aos-duration="1000" data-aos-once="true"';

?>