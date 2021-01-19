<?php

class loginModel extends Model_{
    
    public function __construct(){
        parent::__construct();
    }

    public function verify($user, $pass){
      return $user.' '.$pass;
    }
}
?>
