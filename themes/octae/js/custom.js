jQuery(document).ready(function () {
  jQuery('#sidebarCollapse').on('click', function () {
    jQuery('.sidebar').toggleClass('active');
  });

  jQuery('#views_slideshow_controls_text_first_success_story-block_1 a').click(function() {
    jQuery('div#views_slideshow_cycle_teaser_section_success_story-block_1.views_slideshow_cycle_teaser_section').cycle(0);
    return false;
  });
  jQuery(document.body).on('click', '#views_slideshow_controls_text_first_success_story-block_2 a', function(event) {
    jQuery('div#views_slideshow_cycle_teaser_section_success_story-block_2.views_slideshow_cycle_teaser_section').cycle(0);
    return false;
  });
  jQuery('#views_slideshow_controls_text_last_success_story-block_1 a').click(function() {
    var numItems = jQuery('div#views_slideshow_cycle_teaser_section_success_story-block_1 .views_slideshow_cycle_slide').length;
    jQuery('div#views_slideshow_cycle_teaser_section_success_story-block_1.views_slideshow_cycle_teaser_section').cycle(numItems - 1);
    return false;
  });
  jQuery(document.body).on('click', '#views_slideshow_controls_text_last_success_story-block_2 a', function(event) {
    var numItems = jQuery('div#views_slideshow_cycle_teaser_section_success_story-block_2 .views_slideshow_cycle_slide').length;
    jQuery('div#views_slideshow_cycle_teaser_section_success_story-block_2.views_slideshow_cycle_teaser_section').cycle(numItems - 1);
    return false;
  });
});