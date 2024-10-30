<div id="cmxmr-admin-menu-aside">
    <p>Brought to you by:</p>
    <h3><a href="https://1stopwp.com">1StopWP.com</a></h3>
    <p>A one stop shop for all your WordPress needs.</p>
    <hr>
    <p>Please contact us for managed wordpress hosting, <br>
        custom themes and plugins, website maintainance <br>
        and any other WordPress related requirements <br>
        you may have.</p>
    <p class="text-center"><a class="button button-hero" href="https://1stopwp.com" target="_blank">Contact Us</a></p>
</div>

<?php settings_errors(); ?>
<form method="post" action="options.php">
    <?php
    settings_fields('cmxmr_main_settings_group');
    do_settings_sections('crypto_miner');
    submit_button();
    ?>
</form>

