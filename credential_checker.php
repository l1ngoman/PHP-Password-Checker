<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Checker
{
  public $errors = array();
  public $login_success = false;
  public $success_count;
  private $error_msgs = array
    (
      ' Success!',
      ' Username and password must be more than 6 characters.<br>',
      ' Username and password cannot be equal.<br>',
      ' Username cannont contain $,@, or #.',
      ' Password must contain $,@, or #.'
    );
  
  public function evaluate($username,$password)
  {
    $this->length($username);
    $this->length($password);
    $this->sameCheck($username,$password);
    $this->special_check($username,'user');
    $this->special_check($password,'pass');
    if($this->success_count === 5) //number of passes
    {
      $this->login_success = true;
    }
  }
  
  //user & pass must be more than 6 chars
  private function length($string)
  {
    if(strlen($string) < 6)
    {
      array_unshift($this->errors,$this->error_msgs[1]);
    }else 
    {
      $this->success_count++;
    }
  }
  
  //user & pass cannot be the same
  private function sameCheck($user,$pass)
  {
    if(strcmp(strtolower($user),strtolower($pass)) == 0)
    {
      array_unshift($this->errors,$this->error_msgs[2]);
    }else 
    {
      $this->success_count++;
    }
  }
  
  private function special_check($string,$type)
  {
    if($type === 'user') //user cannot contain $,@, or #
    {
      if(preg_match("/[$@#]/",$string))
      {
        array_unshift($this->errors,$this->error_msgs[3]);
      } else
      {
        $this->success_count++;
      }
    } elseif($type === 'pass') //pass must contain $,@, or #
    {
      if(preg_match("/[$@#]/",$string))
      {
        $this->success_count++;
      } else
      {
        array_unshift($this->errors,$this->error_msgs[4]);
      }
    }
  }
}
?>
