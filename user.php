<?php
/**
* 
*/
class User
{
	function __construct(){}
	public $r_name;
	public $r_surname;
	public $r_phone;
	public $r_email;
	public $r_pass1;
	public $r_pass2;

	function addValues($array){
		foreach ($array as $field){
			$this->$field = htmlspecialchars($_POST[$field]);
		}
	}

	function ifEmptyFields(){
		if($this->r_name=='' || $this->r_surname=='' || $this->r_email=='' || $this->r_pass1==''|| $this->r_pass2==''){
			return false;
		}else return true;
	}
}
$register_user = new User();