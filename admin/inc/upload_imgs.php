<?
function upload_file($uploadfile,$savepath,$file_name){
	$upload_file=$_FILES[$uploadfile]['tmp_name'];
	$upload_file_name=$_FILES[$uploadfile]['name'];
	$upload_file_size=$_FILES[$uploadfile]['size'];
	if($upload_file_name==null) return null;
	$name=$file_name;
	$typeA=explode(".",basename($upload_file_name));
	$type=".".$typeA[count($typeA)-1];
	if($upload_file_size>3000000){
		print("<script> alert('�ϴ����ļ���С����3M');</script>");
		print("<script> window.history.back();</script>");
		exit;
	}
	if(strtoupper($type)!=".JPEG"&&strtoupper($type)!=".JPG"&&strtoupper($type)!=".GIF"){
		print("<script> alert('�ϴ��ļ����Ͳ���ȷ');</script>");
		print("<script> window.history.go(-1);</script>");
		exit;
	}
	if(!move_uploaded_file($upload_file,$savepath.$name.$type)){
		print("<script> alert('�ļ��ϴ�ʧ��');</script>");
		print("<script> window.history.back();</script>");
		exit;
	}
	return $name.$type;
}
?>