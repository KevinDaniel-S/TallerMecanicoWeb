<?php
session_start();

class Logout extends Controller_{

  function __construct(){
    parent::__construct();
  }

  function render(){
    session_unset();
    session_destroy();
    parent::redirect('/login');
  }
}

?>
