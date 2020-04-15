<?php
class upLoad{
	var $fileName;   //save name file
	var $fileSize;   //save size file
	var $fileTmp;     //save link save file Tmp
	var $uploadDir;  //save link save file to
	var $error;      //save errors
	var $fileExtension; //save extension
	
	//Khoi tao doi tuong
	public function __construct($file_name){
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
			$this->error = 'Phần mở rộng không phù hợp';
		}
	}
	
	//Kich thuoc toi da duoc phep upload
	public function setFileSize($value){
		$size = $value*1024000;
		if($this->fileSize>$size){
			$this->error = 'Kích thước không phù hợp';
		}
	}
	
	//Thiet lap thu muc tap tin chua file tren server
	public function setUploadDir($value){
		if(file_exists($value)){
			$this->uploadDir = $value;
		}else{
			$this->error = 'Thư mục không tồn tại';
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
	public function upload_file($rename=false,$prefix='file'){
		if($rename){
			$source = $this->fileTmp;
			$dest = $this->uploadDir . $prefix.'_'.time().'.'.$this->fileExtension;
			copy($source,$dest);
			return $prefix.'_'.time().'.'.$this->fileExtension;

		}else{
			$source = $this->fileTmp;
			$dest = $this->uploadDir.$this->fileName;
			copy($source,$dest);
			return $this->fileName;

           
		}
	}
	//Upload tap tin0937 345 957
	public function upload($rename=false,$prefix='slide'){
		if($rename){
			$source = $this->fileTmp;
			$dest = $this->uploadDir . $prefix.'_'.time().'.'.$this->fileExtension;
			copy($source,$dest);
			return $prefix.'_'.time().'.'.$this->fileExtension;

            /*$source = $this->fileTmp;
            $dest = $this->uploadDir . $prefix.'_'.time() . '.' . $this->fileExtension;
            imagejpeg(imagecreatefromjpeg($source), $dest, 60);
            return $prefix.'_'.time() . '.' . $this->fileExtension;*/
		}else{
			$source = $this->fileTmp;
			$dest = $this->uploadDir.$this->fileName;
			copy($source,$dest);
			return $this->fileName;

            /*$source = $this->fileTmp;
            $dest = $this->uploadDir . $this->fileName;
            imagejpeg(imagecreatefromjpeg($source), $dest, 60);
            return $this->fileName;*/
		}
	}
	
	//Upload and delete
	public function update($ImageName,$rename=false,$prefix='slide'){
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