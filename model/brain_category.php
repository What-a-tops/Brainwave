<?php 
		class brain_Category{
			private $cid;
			private $category;
			
			public function __construct(){
				$this->cid = 0;
				$this->category = "";
			}

			public function setCid($value){
				$this->cid = $value;
			}
			public function getcid(){
					return $this->cid;
			}
			public function setCategory($value){
				$this->category = $value;
			}
			public function getCategory(){
					return $this->category;
			}
		}


 ?>