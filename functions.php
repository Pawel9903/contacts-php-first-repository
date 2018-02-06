<?php
session_start();

	function emptyFields($array,$string){
		foreach($array as $field){
			$array[$field]=$string;
		}
		return $array;
	}