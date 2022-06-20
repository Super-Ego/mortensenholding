<?
// Create id attribute
$id = $blockName . '-' . $block['id'];

// Add custom "anchor" value
if (!empty($block['anchor'])) :
    $id = $block['anchor'];
endif;

// Add classname to block
if (!empty($block['className'])) :
    $className .= ' ' . $block['className'];
endif;

// Add custom background-color class
if (!empty($block['backgroundColor'])) :
    $className .= ' has-' . $block['backgroundColor'] . '-background-color';
endif;

// Add custom color class
if (!empty($block['textColor'])) :
    $className .= ' has-' . $block['textColor'] . '-color';
endif;

// Block padding control fields
$padding_top = get_field('block_padding_top');
$padding_bottom = get_field('block_padding_bottom');

// Add Padding top to classes
if (!$padding_top) :
    $className .= ' no-padding-top';
endif;

// Add Padding bottom to classes
if (!$padding_bottom) :
    $className .= ' no-padding-bottom';
endif;

// Gutenberg preview field
$wp_preview = get_field('is_example');
