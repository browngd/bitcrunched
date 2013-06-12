<?php

//if uninstall not called from WordPress exit

if (!defined('WP_UNINSTALL_PLUGIN')) exit();
delete_option('cff_options');
delete_option('cff_version');

