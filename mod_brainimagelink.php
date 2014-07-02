<?php
/**
*   @package BrainImageLink
*   @subpackage Modules
*   @link http://www.brainleaf.eu
*   @license GNU/GPL, see LICENSE.php
*
*   BRAIN IMAGE LINK
*   ==================================================================
*   Simple Joomla Module useful to show a linked image on your site.
*   ==================================================================
*   Author: BRAINLEAF Communication | http://brainleaf.eu | (C) 2014
*   License: GNU/GPL 3
*   Version: 1.5.x
*   Compatibility: Joomla 3.2.x or superior
*   ===================================================================
*/ 
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Include the syndicate functions only once
require_once( dirname(__FILE__).DIRECTORY_SEPARATOR.'helper.php' );

// Get Parameters from Configuration
/* ========================================== */

$modparams = array();
$modparams['css'] = "modules/mod_brainimagelink/assets/css/mod.brainimagelink.css";
$modparams['cssIcons'] = "media/jui/css/icomoon.css";
$modparams['image'] = $params->get('mod_brainimagelink_image');
$modparams['alt'] = $params->get('mod_brainimagelink_image-alt');
$modparams['size'] = $params->get('mod_brainimagelink_image-size');
$modparams['width'] = $params->get('mod_brainimagelink_image-width');
$modparams['height'] = $params->get('mod_brainimagelink_image-height');
$modparams['kind'] = $params->get('mod_brainimagelink_link-kind');
$modparams['intLink'] = $params->get('mod_brainimagelink_link-int');
$modparams['extLink'] = $params->get('mod_brainimagelink_link-ext');
$modparams['title'] = $params->get('mod_brainimagelink_link-title');
$modparams['tooltip'] = $params->get('mod_brainimagelink_link-tooltip');
$modparams['before'] = $params->get('mod_brainimagelink_link-before');
$modparams['after'] = $params->get('mod_brainimagelink_link-after');
$modparams['open'] = $params->get('mod_brainimagelink_link-open');
$modparams['nofollow'] = $params->get('mod_brainimagelink_link-relfollow');


$modparams['style']['name'] = $params->get('mod_brainimagelink_link-style'); 
$modparams['style']['preset'] = $params->get('mod_brainimagelink_style-1-colorpreset');
$modparams['style']['hoverbgcolor'] = $params->get('mod_brainimagelink_style-1-hover-bgcolor');
$modparams['style']['hoveropacity'] = $params->get('mod_brainimagelink_style-1-hover-opacity');
$modparams['style']['iconbgcolor'] = $params->get('mod_brainimagelink_style-1-icon-bgcolor');
$modparams['style']['iconbgopacity'] = $params->get('mod_brainimagelink_style-1-icon-opacity');
$modparams['style']['iconcolor'] = $params->get('mod_brainimagelink_style-1-icon-color');
$modparams['style']['hovertextcolor'] = $params->get('mod_brainimagelink_style-1-text-color');
$modparams['style']['bordercolor'] = $params->get('mod_brainimagelink_style-1-bordercolor');
$modparams['style']['hovertext'] = $params->get('mod_brainimagelink_style-1-text'); 
    

    
    

// get the items to display from the helper
$modData = brainImageLink::makeImageLink($modparams);

require( JModuleHelper::getLayoutPath( 'mod_brainimagelink', $params->get('layout', 'default' )));


?>