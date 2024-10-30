<?php

function cmxmr_display_notice() {
    if (get_option('cmxmr_display_frontend_notice') && esc_attr(get_option('cmxmr_display_frontend_notice_text'))) {
        echo '<div id="cmxmr_announcement_popup" title="Mining Notice" style="display:none;">
                <p>'.esc_attr(get_option('cmxmr_display_frontend_notice_text')).'</p>
                 <a href="#" id="closeit" class="button button-cancel">Close</a>
               </div>';
    }
}