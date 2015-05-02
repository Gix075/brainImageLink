<?php

/**
*   @package BrainImageLink
*   @subpackage Modules
*   @link http://www.brainleaf.eu
*   @license GNU/GPL
*
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

defined('_JEXEC') or die('Restricted access');

if ($modData['iconActive'] == TRUE) {
    JFactory::getDocument()->addStyleSheet($modData['iconCSS']);
}

JFactory::getDocument()->addStyleSheet($modparams['css']);

$styleClass = $modparams['style']['name']." ".$modparams['style']['preset'];

?>

<?php if($modparams['style']['preset'] == "custom"): ?>
<style>
    <?php echo $modData['customStyle']; ?>
</style>
<?php endif; ?>

<?php if($modparams['style']['name'] == "overlay"): ?>
<script>
    jQuery(document).ready(function(){
        jQuery('.brainImageLink-link').removeAttr('title');
    });
</script>
<?php endif; ?>


<div class="brainImageLink-wrapper">
    
    <?php if($modparams['before'] != ""): ?>
    <div class="brainImageLink-html-before">
        <?php echo $modparams['before']; ?>
    </div>
    <?php endif; ?>
    
	<a href="<?php echo $modData['url']; ?>" class="brainImageLink-link<?php echo $modData['tooltipClass']; ?> <?php echo $styleClass; ?>" title="<?php echo $modData['title']; ?>"<?php echo $modData['tooltipData']; ?><?php echo $modData['noFollow']; ?><?php echo $modData['target']; ?>>
        <img class="brainImageLink-image" src="<?php echo $modData['image']; ?>" alt="<?php echo $modData['alt']; ?>"<?php echo $modData['imgStyle']; ?>>
        
        <?php if($modparams['style']['name'] == "overlay"): ?>
        <div class="brainImageLink-link-hover">
            
            <div class="brainImageLink-link-hover-icon">
                
                <?php if ($modData['iconActive'] == TRUE): ?>
                <!-- load icon if is active -->
                <?php echo $modData['iconMarkup']; ?>
                <?php endif; ?>
                
                <div class="brainImageLink-link-hover-text">
                    <?php echo $modparams['style']['hovertext']; ?>
                </div>
            </div>
            
        </div>
        <?php endif; ?>
        
    </a>
    
    <?php if($modparams['after'] != ""): ?>
    <div class="brainImageLink-html-after">
        <?php echo $modparams['after']; ?>
    </div>
    <?php endif; ?>
    
</div>