var t; 
var speed = 2;//ͼƬ�л��ٶ� 
var nowlan=0;//ͼƬ��ʼʱ�� 
function changepic() { 
var imglen = $("div[name='pic']").find("div").length; 
$("div[name='pic']").find("div").hide(); 
$("div[name='pic']").find("div").eq(nowlan).fadeIn(600); 
nowlan = nowlan+1 ==imglen ?0:nowlan + 1; 
t = setTimeout("changepic()", speed * 3000); 
} 
onload = function () { changepic(); } 
$(document).ready(function () { 
//�����ͼƬ����ͣ���л���ͣ 
$("div[name='pic']").hover(function () { clearInterval(t); }); 
//����뿪ͼƬ�л����� 
$("div[name='pic']").mouseleave(function () { changepic(); }); 
}); 