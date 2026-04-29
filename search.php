<?php

get_header();
?>

<script type="text/javascript">
	 //Listens for DOM changes
var observer = new MutationObserver(function (mutations, observer) {
    // fired when a mutation occurs
	makePrevious()
    makeNext();
});

// define what element should be observed by the observer
// and what types of mutations trigger the callback
observer.observe(document, {
    subtree: true,
    attributes: true
});

function makePrevious() {
    //Make a Next element
    var el = jQuery("<div></div>", {
        "id": "previous",
        "class": "gsc-cursor-page", // need google class so is same look and works with them
        "text": "<< Previous Results",
        "on": { // on click, find what is the current page, and trigger click on the one after
            "click": function () {
                jQuery(".gsc-cursor-current-page").prev(".gsc-cursor-page").click();
            }
        }
    });
    //When results load, lots of changes are made, but we only wont 1 Next button
    if (jQuery("#previous").length == 0) {
        jQuery(".gsc-cursor").prepend(el);
    }
}

function makeNext() {
    //Make a Next element
    var el = jQuery("<div></div>", {
        "id": "next",
        "class": "gsc-cursor-page", // need google class so is same look and works with them
        "text": ">> More Results",
        "on": { // on click, find what is the current page, and trigger click on the one after
            "click": function () {
                jQuery(".gsc-cursor-current-page").next(".gsc-cursor-page").click();
            }
        }
    });
    //When results load, lots of changes are made, but we only wont 1 Next button
    if (jQuery("#next").length == 0) {
        jQuery(".gsc-cursor").append(el);
    }
}
</script>

<div class="row">
	<div class="small-12 columns">
		<h1><?php printf( esc_html__( 'Search Results for: %s', 'lorainccc' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	</div>
</div>
<div class="row">
	<div class="small-12 columns">
<?php	

	echo '<script async src="https://cse.google.com/cse.js?cx=011095404916554965875:iu7ynsv9gqe">';
	echo '</script>';
	echo '<div class="gcse-search" data-queryParameterName="s" enableAutoComplete="true" data-defaultToRefinement="campus_website"></div>';

?>

		<div style="float:left;"><?php previous_posts_link( '&laquo; Previous Results' ) ?></div>
		<div style="float:right;"><?php next_posts_link( '&raquo; More Results' ) ?></div>
		<div style="clear:both;"></div>
	</div>
</div>
	<?php
get_footer();

?>