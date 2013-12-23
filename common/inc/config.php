<?php
// CONTACT INFO FOR IMPRINT
// if you want to use this tool you must complete all contact fields
// ----------------------------------------------------------------------------
    $contact = array( 
        'name' => '',       // Max Mustermann
        'street' => '',     // Musterstraße 55
        'city' => '',       // 55555 Musterstadt
        'mail' => ''        // max.mustermann@domain.com
    );
    
// Group Moderator
// ----------------------------------------------------------------------------
    $mod = array(
        // Moderator 1               
        'GID_1' => '',      // e.g. +MaxMustermann or GoogleID
        
        // Moderator 2               
        'GID_2' => '',      // e.g. +MaxMustermann or GoogleID
        
        // Moderator 3               
        'GID_3' => '',      // e.g. +MaxMustermann or GoogleID
        
        // Moderator 4               
        'GID_4' => '',      // e.g. +MaxMustermann or GoogleID
        
        // Moderator 5               
        'GID_5' => '',      // e.g. +MaxMustermann or GoogleID
        
        // If you have more Moderators, add them here in the same schema. 
        // You have to fit the colorbox dimensions in /common/js/custom.js if you add more than 5 Mods
    );

// Localize some things
// ----------------------------------------------------------------------------
    $local = array(
        // Resistance Name               
        'ResName' => 'Resistance XYZ',          // e.g. Resistance München
        'ResArea' => '46.607941,-27.745972'     // e.g. Your Resistance Area 48.136409,11.575685 
    ); 
    
// Google Things 
// ----------------------------------------------------------------------------

    // Obligatory config values
    // please complete all - otherwise the tool won't work properly
    $config = array( 
    // Google API key for G+ API - how to get one: http://goo.gl/g7zFq
        'GPlusApiKey' => '',
    
    // GooglePlus ID from your Ingress Group
        'GPlusGroupID' => '',
     
    );

// Database
// ----------------------------------------------------------------------------

    // Database-Settings
    
    $database = array(        
        // Database Host
        'host' => '',                       // e.g. localhost or your host
        
        // Database User
        'user' => '',                       // You know what you type here :)
        
        // Database Password
        'pass' => '',                       // A very secret passwort e.g. 123456 ;)
        
        // Database 
        'name' => '',                       // Name of used Database
        
        // Database table 
        'table' => 'data'                   // Name of used Database table
        
    );

// Mail / Formular
// -----------------------------------------------------------------------------
    
    // Mail Settings 
    $mail_config = array(
        
        // Hostname for SMTP-Server for sending the Form
        'mail_host' => '',                  // e.g. smtp.domain.com
        
        // User who has rights to send
        'mail_user' => '',                  // e.g. JohnDoe or john.doe@domain.com
        
        // Password for this User
        'mail_pass' => '',                  // A very secret passwort e.g. 123456 ;) 
        
        // Adress for mailfrom
        'mail_from' => '',                  // e.g. resistance.xyz@domain.com
     
        // mail address of moderator / mailing list - for notifications about new users		
        'mail_mods' => '',                  // e.g. max.mustermann@domain.com
    
        // from mail adress of info mail to user - to avoid SPAM rating 
        'mail_noreply' => ''                // e.g. noreply@domain.com
    
    );

?>