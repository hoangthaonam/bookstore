<?php
class UploadModels{
	var $fileName;   //save name file
	var $fileSize;   //save size file
	var $fileTmp;     //save link save file Tmp
	var $uploadDir;  //save link save file to
	var $error;      //save errors
	var $fileExtension; //save extension
	
	//Khoi tao doi tuong
	public function __construct($file_name = "up_images"){
		$fileInfor = $_FILES[$file_name];
		$this->fileName = $fileInfor['name'];
		$this->fileSize = $fileInfor['size'];
		$this->fileExtension = $this->getFileExtension();
		$this->fileTmp = $fileInfor['tmp_name'];
	}
	
	//Lay thanh phan mo rong cua file upload
	public function getFileExtension(){
		$subject = $this->fileName;
		$pattern = '#\.([^\.]+)$#i';
		preg_match($pattern,$subject,$matches);
		return $matches[1];
	}
	
	//Thiet lap thanh phan mo rong duoc phep upload
	public function setFileExtension($value){
		$subject = $this->fileExtension;
		$pattern = '#('.$value.')#i';
		if(preg_match($pattern,$subject)!=1){
			$this->error = 'Phan mo rong anh khong phu hop';
		}
	}
	
	//Kich thuoc toi da duoc phep upload
	public function setFileSize($value){
		$size = $value*1024;
		if($this->fileSize>$size){
			$this->error = 'Kich thuoc anh khong phu hop';
		}
	}
	
	//Thiet lap thu muc tap tin chua file tren server
	public function setUploadDir($value){
		if(file_exists($value)){
			$this->uploadDir = $value;
		}else{
			$this->error = 'Thu muc anh khong ton tai';
		}
	}
	
	//Kiem tra dieu kien upload
	public function isVail(){
		$flag = false;
		if(strlen($this->error)>0){
			$flag = true;
		}
		return $flag;
	}
	
	//Upload tap tin0937 345 957
	public function upload($rename=false,$prefix='mau'){
		if($rename){
			$source = $this->fileTmp;
			$dest = $this->uploadDir . $prefix.'_'.time() . '.' . $this->fileExtension;
			copy($source,$dest);
			return $prefix.'_'.time() . '.' . $this->fileExtension;
		}else{
			$source = $this->fileTmp;
			$dest = $this->uploadDir . $this->fileName;
			copy($source,$dest);
			return $this->fileName;
		}
	}
	
	//Upload and delete
	public function update($ImageName,$rename=false,$prefix='mau'){
		unlink($this->uploadDir . $ImageName);
		if($rename){
			$source = $this->fileTmp;
			$dest = $this->uploadDir . $prefix.'_'.time() . '.' . $this->fileExtension;
			copy($source,$dest);
			return $prefix.'_'.time() . '.' . $this->fileExtension;
		}else{
			$source = $this->fileTmp;
			$dest = $this->uploadDir . $this->fileName;
			copy($source,$dest);
			return $this->fileName;
		}
	}
}
//cach goi
//$upload = new upload('upload'); // upload is name of input
//$upload->setFileExtension('gif|jpg|png');
//$upload->setFileSize(100);
//$upload->setUploadDir('images/');
//if($upload->isVail()==flase)
//{ $upload->upload(true)}
//else{print_r($upload->error)}