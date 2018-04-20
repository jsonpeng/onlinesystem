<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/21
 * Time: 15:06
 */
//根据选项ABCD来加权重
function  varifySelectTOSetNum($select){
	$num=0;
	switch ($select) {

		case 'A':
			$num=1;
			break;
		case 'B':
			$num=2;
			break;
		case 'C':
			$num=3;
			break;
		case 'D':
			$num=4;
			break;
		case 'E':
			$num=5;
			break;
		case 'F':
			$num=6;
			break;
		
		default:
			break;
	}

	return $num;
}