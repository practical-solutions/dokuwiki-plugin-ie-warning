<?php
/**
 * IE-Warning
 * 
  *
 * @license    MIT
 * @author     Gero Gothe <practical@medizin-lernen.de>
 * 
 */


// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

/**
 * Class action_plugin_approvemod
 */
class action_plugin_iewarning extends DokuWiki_Action_Plugin {

    /**
     * Register callbacks
     */
    public function register(Doku_Event_Handler $controller) {
		$controller->register_hook('TPL_CONTENT_DISPLAY', 'BEFORE', $this, 'show_warning');		
    }
    
        
	public function show_warning(Doku_Event $event, $param){
		
		#if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE || strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) {
			echo "<div class='iewarning'><b>Achtung!</b> Sie benutzen den <i>veralteten</i> und <i>fehlerhaften</i> Internet Explorer. Nutzen Sie bitte einen anderen Browser (z.B. Firefox, Chrome), um diese Website sicher nutzen zu können.</div>";
		#}
		
	}
	
}

//Setup VIM: ex: et ts=4 enc=utf-8 :
