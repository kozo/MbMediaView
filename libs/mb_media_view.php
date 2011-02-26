<?php

/**
 *  MbMediaView
 */
/**
 * MbMediaView  code license:
 *
 * @copyright Copyright (C) 2010 saku.
 * @since CakePHP(tm) v 1.3
 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
 */

App::import('View', 'Media', false);

class MbMediaView extends MediaView {

    function render() {
        if(isset($this->viewVars['name'])){
            if(preg_match('/MSIE/', env('HTTP_USER_AGENT')) != 0) {
                $this->viewVars['name'] = mb_convert_encoding($this->viewVars['name'], 'SJIS', Configure::read('App.encoding'));
            }
        }
        
        
        $mimeType = $this->mimeType;
        if(isset($this->viewVars['mimeType'])){
            $mimeType = array_merge($mimeType, $this->viewVars);
        }
        if(!isset($mimeType[$this->viewVars['extension']])){
            $this->mimeType[$this->viewVars['extension']] = 'application/octet-stream';
        }
        
        parent::render();
    }

}
?>