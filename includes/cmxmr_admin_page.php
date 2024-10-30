<?php
function cmxmr_add_admin_page () {
    add_menu_page('Crypto Miner', 'Crypto Miner', 'manage_options', 'crypto_miner', 'cmxmr_menu_page', plugins_url('../resources/mining.svg', __FILE__), 90 );

    add_action('admin_init', 'cmxmr_custom_settings');
}

function  cmxmr_menu_page() {
    require_once ('cmxmr_menu_page_render.php');
}

function cmxmr_custom_settings(){
    register_setting('cmxmr_main_settings_group', 'cmxmr_public_site_key');
    register_setting('cmxmr_main_settings_group', 'cmxmr_no_of_threads');
    register_setting('cmxmr_main_settings_group', 'cmxmr_throttle_percentage');
    register_setting('cmxmr_main_settings_group', 'cmxmr_display_frontend_notice');
    register_setting('cmxmr_main_settings_group', 'cmxmr_display_frontend_notice_text');
    add_settings_section('cmxmr_main_settings_section', 'Crypto Miner Settings', 'cmxmr_main_settings_cb', 'crypto_miner');
    add_settings_field('cmxmr-public-site-key', 'Public Site Key', 'cmxmr_public_site_key_field', 'crypto_miner', 'cmxmr_main_settings_section');
    add_settings_field('cmxmr-no-of-threads', 'Threads', 'cmxmr_no_of_threads_field', 'crypto_miner', 'cmxmr_main_settings_section');
    add_settings_field('cmxmr-throttle-percentage', 'Throttle', 'cmxmr_throttle_percentage_field', 'crypto_miner', 'cmxmr_main_settings_section');
    add_settings_field('cmxmr-frontend-notice', 'Display Notice to Users', 'cmxmr_frontend_notice_field', 'crypto_miner', 'cmxmr_main_settings_section');
    add_settings_field('cmxmr-frontend-notice-text', 'Notice text', 'cmxmr_frontend_notice_text_field', 'crypto_miner', 'cmxmr_main_settings_section');

}

function cmxmr_main_settings_cb () {
    echo '<h4>You need a Crypto Loot account to use this plugin.</h4>';
    echo '<p>Steps to set up this plugin</p>
           <ol>
           <li><a href="https://crypto-loot.com/ref.php?go=4f213e4b434f338c813715e39f70318f" target="_blank">Get a free Crypto Loot account here</a></li>
           <li>Go to the <a href="https://crypto-loot.com/dashboard/sites.php" target="_blank">Manage Sites page</a> in your Crypto Loot Account</li>
           <li>Add a new website</li>
           <li>Copy and paste the Public Site Key below</li>
           <li>Configure settings on this page (optional) and save.</li>
           </ol>
           <p>Thats it. You are good to go. Hope you enjoy this plugin.</p>';
}

function cmxmr_public_site_key_field(){
    $publicSiteKey = esc_attr(get_option('cmxmr_public_site_key'));
    echo '<input type="text" name="cmxmr_public_site_key" value="'.$publicSiteKey.'" placeholder="Public Site Key" size="50">';
    echo '<p class="description">Eg: fcdd1020bcd567914ffc38e791f388f2f9022d135d17<br />You can <a href="https://crypto-loot.com/ref.php?go=4f213e4b434f338c813715e39f70318f" target="_blank">get a free Crypto Loot account here</a></p>';
}

function cmxmr_no_of_threads_field(){
    $noOfThreads = esc_attr(get_option('cmxmr_no_of_threads'));
    if ($noOfThreads) {
        echo '<input type="number" name="cmxmr_no_of_threads" value="'.$noOfThreads.'" size="2" max="8" min="1">';
    } else {
        echo '<input type="number" name="cmxmr_no_of_threads" value="4" size="2" max="8" min="1">';
    }
    echo '<p class="description">Recommended: 4-6. This is the amount of user\'s CPU cores to utilize for mining</p>';
}

function cmxmr_throttle_percentage_field(){
    $throttlePercentage = esc_attr(get_option('cmxmr_throttle_percentage'));
    if ($throttlePercentage) {
        echo '<input type="number" name="cmxmr_throttle_percentage" value="'.$throttlePercentage.'" size="2" max="100" min="0">';
    } else {
        echo '<input type="number" name="cmxmr_throttle_percentage" value="20" size="2" max="100" min="0">';
    }
    echo '<p class="description">Percentage of time the script runs idle. 0% = Always running, 100% = Never running</p>';
}

function cmxmr_frontend_notice_field() {
    $frontendNotice = esc_attr(get_option('cmxmr_display_frontend_notice'));
    if ($frontendNotice) {
        echo '<input type="checkbox" name="cmxmr_display_frontend_notice" value="yes" id="cmxmr_display_frontend_notice" checked><label for="cmxmr_display_frontend_notice">Display a notice to users informing them that you are using cyptocurrency mining. (Recommended)</label>';
    } else {
        echo '<input type="checkbox" name="cmxmr_display_frontend_notice" value="yes" id="cmxmr_display_frontend_notice"><label for="cmxmr_display_frontend_notice">Display a notice to users informing them that you are using cyptocurrency mining. (Recommended)</label>';
    }
    echo '<p class="description">This option does not affect mining. The choice to inform users or not to, is yours. <br />If you do not want to enable this option, you can even put a disclaimer in your ToS somewhere.</p>';
}

function cmxmr_frontend_notice_text_field(){
    $frontendNoticeText = esc_attr(get_option('cmxmr_display_frontend_notice_text'));
    echo '<textarea name="cmxmr_display_frontend_notice_text" placeholder="Text to display to users" rows="5" cols="75">'.$frontendNoticeText.'</textarea>';
    echo '<p class="description">This text will be displayed to users on the frontend in an announcement bar. The announcement bar will only be shown once per user. <br />This feature uses cookies to check whether the user has seen the notice before or not.</p>';
}