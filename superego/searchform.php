<?
// The template for displaying search form 
?>

<form role="search" method="get" class="search-form" action="<? echo home_url('/'); ?>">
	<label>
		<span class="screen-reader-text"><? echo _x('Søg efter:', 'label', 'superegowp') ?></span>
		<input type="search" class="search-field" placeholder="<? echo esc_attr_x('Search...', 'superegowp') ?>" value="<? echo get_search_query() ?>" name="s" title="<? echo esc_attr_x('Search for:', 'superegowp') ?>" />
	</label>
	<input type="submit" class="search-submit button" value="<? echo esc_attr_x('Search', 'superegowp') ?>" />
</form>