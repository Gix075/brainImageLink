<?php

/**
*   @package BrainImageLink
*   @subpackage Modules
*   @link http://www.brainleaf.eu
*   @license GNU/GPL
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
 
class brainImageLink {
		
	public function makeImageLink($modparams) {
		$moduleData = array();
		
		$moduleData['image'] = $modparams['image'];
		$moduleData['alt'] = $modparams['alt'];
		$moduleData['title'] = $modparams['title'];
		//$moduleData['url'] = $modparams['url'];
		
        // Link Kind Switch and URL generation
        switch($modparams['kind']) {
            case 1 :
				//$link = str_replace("http://", "", $modparams['extLink']);
                //$moduleData['url'] = "http://".$link;
                $moduleData['url'] = $modparams['extLink'];
				break;
            case 2 :
                $item = JFactory::getApplication()->getMenu()->getItem( $modparams['intLink'] );
				$link = JRoute::_($item->link . '&Itemid=' . $item->id);
                $moduleData['url'] = $link;
				break;
        }
        
        // Rel NoFollow
        if ($modparams['nofollow'] == 1) {
            $moduleData['noFollow'] = ' rel="nofollow"';
        }else{
            $moduleData['noFollow'] = '';
        }
        
        // Open Link
        if ($modparams['open'] == 1) {
            $moduleData['target'] = ' target="_blank"';
        }else{
            $moduleData['target'] = '';
        }
        
        // Size settings
		switch($modparams['size']) {
			case 0 :
				$moduleData['imgStyle'] = ' style="width:100%; height:auto;"';
				break;
			case 1 :
                
                if ($modparams['width'] != "auto") {
                    $stuffs = array("%","px","em","rem","pt");
                    $width= str_replace($stuffs, "", $modparams['width'])."px";
                }else{
                    $width = $modparams['width'];
                }
            
                if ($modparams['height'] != "auto") {
                    $stuffs = array("%","px","em","rem","pt");
                    $height= str_replace($stuffs, "", $modparams['height'])."px";
                }else{
                    $height = $modparams['height'];
                }
                
				$moduleData['imgStyle'] = ' style="width:'.$width.'; height:'.$height.';"';
				break;
			default :
				$moduleData['imgStyle'] = "";
				break;
		}
		
        // Tooltip activation
		if ($modparams['tooltip'] == 1) {
			$moduleData['tooltipClass'] = ' hasTooltip';
			$moduleData['tooltipData'] = ' data-original-title="'.$modparams['title'].'"';
		}else{
			$moduleData['tooltipClass'] = '';
			$moduleData['tooltipData'] = '';
		}
        
        // Overlay Icon - update 1.5.5
        if($modparams['style']['icon']['active'] == 1) {
            
            $moduleData['iconActive'] = TRUE;
            
            if($modparams['style']['icon']['custom'] == 1) {
                $framework = $modparams['style']['icon']['vendor'];
                switch ($framework) {
                    case "3":
                        $icontag = "i";
                        break;
                    default:
                        $icontag = "span";
                }
                $tagclass = $modparams['style']['icon']['tagclass'];
                $iconMarkup = "<".$icontag." class=\"".$tagclass."\"></".$icontag.">";
                
                $moduleData['iconCSS'] = $modparams['cssIcons'][$framework];
                $moduleData['iconMarkup'] = $iconMarkup;
                
            }else{
                $moduleData['iconCSS'] = $modparams['cssIcons'][0];
                $moduleData['iconMarkup'] = "<span class=\"icon-plus\"></span>";
            }
            
        }else{
            $moduleData['iconActive'] = FALSE;
        }
        
        
        // Custom Colors
        $hoverbg = implode(",",brainImageLink::hex2rgb($modparams['style']['hoverbgcolor']));
        $hoverOpacity = $modparams['style']['hoveropacity'] / 10;
        $hoverbg = "rgba(".$hoverbg.",".$hoverOpacity.")";
        
        $iconbg = implode(",",brainImageLink::hex2rgb($modparams['style']['iconbgcolor']));
        $iconOpacity = $modparams['style']['iconbgopacity'] / 10;
        $iconbg = "rgba(".$iconbg.",".$iconOpacity.")";
        
        $iconcolor = $modparams['style']['iconcolor'];
        $textcolor = $modparams['style']['hovertextcolor'];
        $bordercolor = $modparams['style']['bordercolor'];
		$moduleData['customStyle'] = ".brainImageLink-link.overlay.custom .brainImageLink-link-hover{background-color:".$hoverbg.";border-color:".$bordercolor.";}";
        $moduleData['customStyle'] .= ".brainImageLink-link.overlay.custom .brainImageLink-link-hover-icon{background-color:".$iconbg."; color:".$iconcolor.";}";
        $moduleData['customStyle'] .= ".brainImageLink-link.overlay.custom .brainImageLink-link-hover-text{color:".$textcolor.";}";
		return $moduleData;
	}
    
    
    private function hex2rgb($hex) {
        $hex = str_replace("#", "", $hex);

        if(strlen($hex) == 3) {
          $r = hexdec(substr($hex,0,1).substr($hex,0,1));
          $g = hexdec(substr($hex,1,1).substr($hex,1,1));
          $b = hexdec(substr($hex,2,1).substr($hex,2,1));
        } else {
          $r = hexdec(substr($hex,0,2));
          $g = hexdec(substr($hex,2,2));
          $b = hexdec(substr($hex,4,2));
        }
        $rgb = array($r, $g, $b);
        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    }
    
}

?>