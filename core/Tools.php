<?php

class Tools {
    static function getPasswordHash($activity_idd){
        //$salt = substr($password, 0, 2); //salt 不可逆加密
		return hash("md5", $activity_idd); //使用md5加密
	}
}