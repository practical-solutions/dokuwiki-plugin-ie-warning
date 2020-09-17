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
		
		if ($this->getConf("logged_only") && !$this->logged()) return;
		
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE || strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) {
			echo "<div class='iewarning'>".($this->getLang("warning"))."<br>".$this->getConf("message")."</div>";
		}
		
	}

	# User logged in
	function logged(){
		global $INFO;

		return isset($INFO['userinfo']);
	}
	
}

//Setup VIM: ex: et ts=4 enc=utf-8 :
