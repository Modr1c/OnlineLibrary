<?php

class Page{
	public $maxPage;
	public $page;
	public $offset;

	function __construct( $dataTotal, $pageNum ){

		//获取当前页码，如果页码不存在，则默认等于1
		if( isset( $_GET['page'] ) ){
			$this->page = $_GET['page'];
		}else{
			$this->page = 1;
		}	
		//计算最大页码
		$this->maxPage = ceil($dataTotal / $pageNum);

		//计算数据偏移量
		$this->offset = ($this->page - 1) * $pageNum;
	}

	function show(){
		for( $i = 1; $i <= $this->maxPage; $i++ ){
			if( $i == $this->page ){
				echo "<a class='hover' href='gbook.php?page={$i}'>{$i}</a>";
			}else{
				echo "<a href='gbook.php?page={$i}'>{$i}</a>";
			}
		}		
	}
}