<?php

class CFF_View
{
    /**
     * Path of the view to render
     */
    var $view = "";
    /**
     * Variables for the view
     */
    var $vars = array();
    /**
     * Construct a view from a file in the
     */
    public 
    function __construct($view) 
    {
        
        if (file_exists(CFF_PLUGIN_DIR . "/views/" . $view . ".view.php")) 
        {
            $this->view = CFF_PLUGIN_DIR . "/views/" . $view . ".view.php";
        }
        else
        {
            wp_die(__("View " . CFF_PLUGIN_URL . "/views/" . $view . ".view.php" . " not found"));
        }
    }
    /**
     * set a variable which gets rendered in the view
     */
    public 
    function Set($name, $value) 
    {
        $this->vars[$name] = $value;
    }
    /**
     * render the view
     */
    public 
    function Render() 
    {
        extract($this->vars, EXTR_SKIP);
        ob_start();
        include $this->view;
        
        return ob_get_clean();
    }
}

