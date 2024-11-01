<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

/**
 * Fix Select2 dropdown
 *
 */
add_action('wp_head', 'wpmobile_fix_select2', 999);
function wpmobile_fix_select2() {

    if (!is_wpappninja()) {
        return;
    } ?>

    <script>
    jQuery(function() {
        jQuery("ul.tabs li[aria-controls] a").each(function(index) {
            jQuery(this).attr('href', '#abcxyz');
        });
        setTimeout(function() {
            jQuery("ul.tabs li[aria-controls] a").each(function(index) {
                jQuery(this).attr('href', '#' + jQuery(this).parent().attr('aria-controls'));
            });
        }, 1000);
    });
    jQuery(document).ajaxComplete(function(){
        jQuery('a[href*="#photo="]').each(function(){
            jQuery(this).attr('href', jQuery(this).attr('href') + '&fake=.png');
        });
    });
    jQuery(document).ready(function(){
        jQuery('a[href*="#photo="]').each(function(){
            jQuery(this).attr('href', jQuery(this).attr('href') + '&fake=.png');
        });
    });
    jQuery(document).ready(function(){
        setTimeout(function() {
                if (jQuery(".bp-messages-mobile,.datepicker,video,.bp-emojionearea,.geodir-loc-bar,#ui-datepicker-div,.gd-rating,twitter-widget,.select2-selection,.pac-container")[0]) {
                   if (typeof app !== "undefined") {app.off('touchstart');}
                }
                
                jQuery('a[href*="_wpnonce"]').each(function() {jQuery(this).attr('href', jQuery(this).attr('href').replace(/\&wpappninja_v=[0-9a-z]+/g, ''));});
            }, 800);
    });



    jQuery(function() {
        if (jQuery(".bp-messages-wrap-main")[0]) {
           if (typeof app !== "undefined") {
              app.off('touchstart');
              app.off('click');
              jQuery('.panel-backdrop').on('click', function(){setTimeout(app.panel.close, 10);});
              jQuery('.panel-open').on('click', function(){setTimeout(app.panel.open, 10);});
           }
        }
    });
    </script>
	<?php if (theme_is_changed()) {?>
    <style>
        label.item-checkbox input[type=checkbox], .checkbox input[type=checkbox], label.item-checkbox input[type=radio], .checkbox input[type=radio] {display:inline-block!important}
html body #root .reply .bp-emoji-enabled textarea {
    display: none!important;
}
    .pac-container {
        z-index: 99999!important;
    }span.select2-container {
    z-index: 999999;
}
    </style>

    <?php
}
}
