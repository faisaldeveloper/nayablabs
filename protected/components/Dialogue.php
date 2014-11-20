<?php
class Dialogue extends CWidget {
 	public $action = 'admin';
	public $options = array();
   	public function run() {
		
	   if($this->action == 'admin'){
        $this->render('dialogue');
	   }else if($this->action == 'position'){
        $this->render('dialogue_position');
	   }
    }
 }
?>