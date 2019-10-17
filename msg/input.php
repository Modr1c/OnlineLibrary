<?php
class input{

	//定义函数，对数据进行检查
	function post( $content ){
		if( $content == '' ){
			return false;
		}

		//禁止使用的用户名
		$n = [ '习近平', '江泽民', '金正恩' ];

		foreach( $n as $name ){
			if( $content == $name ){
				return false;
			}
		}

		return true;
	}
}