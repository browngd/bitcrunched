<?php

class cff
{
    public 
    function __construct() 
    {
        $this->Upgrade();

        //add settings link to plugins page
        add_filter("plugin_action_links", array(
            $this,
            'SettingsLink'
        ) , 10, 2);

        //allow short codes to be added in the widget area
        add_filter('widget_text', 'do_shortcode');

        //add action for loading js files
        add_action('wp_enqueue_scripts', array(
            $this,
            'RegisterScripts'
        ));

        //create the settings page
        $settings = new cff_settings();
    }
    
    function RegisterScripts() 
    {
        wp_register_script('jquery-validate', CFF_PLUGIN_URL . '/js/jquery.validate.min.js', array(
            'jquery'
        ) , '1.10.0', true);
        wp_register_script('jquery-meta', CFF_PLUGIN_URL . '/js/jquery.metadata.js', array(
            'jquery'
        ) , '4187', true);
        wp_register_script('jquery-validate-contact-form', CFF_PLUGIN_URL . '/js/jquery.validate.contact.form.js', array(
            'jquery'
        ) , '1.00', true);
        wp_register_style('bootstrap', CFF_PLUGIN_URL . '/css/bootstrap-forms.min.css', null, '2.3.1');
    }
    
    function Upgrade() 
    {
        $options = get_option('cff_options');
        $updated = false;
        
        if (trim(get_option('recaptcha_public_key')) <> '') 
        {
            $options['recaptcha_public_key'] = get_option('recaptcha_public_key');
            delete_option('recaptcha_public_key');
            $updated = true;
        }
        
        if (trim(get_option('recaptcha_private_key')) <> '') 
        {
            $options['recaptcha_private_key'] = get_option('recaptcha_private_key');
            delete_option('recaptcha_private_key');
            $updated = true;
        }
        
        if ($updated) update_option('cff_options', $option);
    }

    /*
     * Add the settings link to the plugin page
    */
    
    function SettingsLink($links, $file) 
    {
        
        if ($file == CFF_PLUGIN_NAME . '/' . CFF_PLUGIN_NAME . '.php') 
        {

            /*
             * Insert the link at the beginning
            */
            $in = '<a href="options-general.php?page=contact-form-settings">' . __('Settings', 'contact-form') . '</a>';
            array_unshift($links, $in);

            /*
             * Insert at the end
            */

            // $links[] = '<a href="options-general.php?page=contact-form-settings">'.__('Settings','contact-form').'</a>';
            
        }
        
        return $links;
    }
    static 
    function Log($message) 
    {
        
        if (WP_DEBUG === true) 
        {
            
            if (is_array($message) || is_object($message)) 
            {
                error_log(print_r($message, true));
            }
            else
            {
                error_log($message);
            }
        }
    }
}

