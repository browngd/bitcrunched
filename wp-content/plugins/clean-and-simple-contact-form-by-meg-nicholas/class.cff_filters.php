<?php

/*
 * Add and remove filters as we need in order to play nicely
  */

class cff_Filters {
    
    var $fromEmail;
    var $fromName;
    
    function wp_mail_from () {
        return $this->fromEmail;
    }
    
    function wp_mail_from_name () {
        return $this->fromName;
    }
    
    function add($filter, $priority = 10, $args = 1) {
        add_filter ($filter, array($this,$filter),$priority,$args);
    }
    
    function remove($filter, $priority = 10, $args = 1) {
        remove_filter ($filter, array($this,$filter),$priority,$args);
    }
    
}