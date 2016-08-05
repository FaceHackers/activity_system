<?php
class Tools {
    static function getPasswordHash($activity_idd){
        $salt = substr($activity_idd, 0, 2);
		return hash("MD5", $activity_idd . $salt); //使用md5加密
	}
}