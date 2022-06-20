<?
// The sidebar containing the main widget area 
?>

<div id="sidebar1" class="sidebar" role="complementary">

	<? if (is_active_sidebar('sidebar1')) : ?>

		<? dynamic_sidebar('sidebar1'); ?>

	<? endif; ?>

</div>