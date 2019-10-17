<?php
class Upload{
	function __construct(){

	}

	function up( $formName ){
		if( isset($_FILES[ $formName ]) && $_FILES[ $formName ]['error'] <> 4 ){

			$file = $_FILES[ $formName ];

			//判断上传是否成功
			if( $file['error']>0 ){
				die('文件上传失败');
			}

			//判断文件后缀
			$ext = pathinfo( $file['name'], PATHINFO_EXTENSION );
			if( $ext != 'jpg' ){
				die('不被允许的文件后缀');
			}

			if( $file['size'] > 1024*1024*200 ){
				die('只能上传2M以下的文件');
			}

			//保存临时文件到指定目录，并且随机生成文件名
			$filename = uniqid() . '.jpg';
			move_uploaded_file( $file['tmp_name'] , "uploads/{$filename}");

			return $filename;
		}else{
			return '';
		}
	}
}