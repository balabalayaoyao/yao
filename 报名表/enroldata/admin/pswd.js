$.ajaxSetup({ cache: false });
var password=$("#o_password");
var npassword=$("#n_password");
var rpassword=$("#r_password");
var submit=$("#submit_button");
var errmsg=$("#errmsg");
submit.click(submitData);



function submitData()
{
	errmsg.html("");
			$("input").attr("disabled","disabled");
			$("#submit_button").addClass("disabled");
			$("#submit_button").text("查询中...");
			$("#submit_button").unbind("click");
			var data={"password":password.val(),"pswd":npassword.val(),"rpswd":rpassword.val()};
			var url="pswd_reset.php";
		var callback=regCallback;
		$.post(url,data,callback);
}

function regCallback(data)
{
	$("input").removeAttr("disabled");
			$("#submit_button").removeClass("disabled");
			$("#submit_button").text("登录");
			$("#submit_button").click(submitData);
			switch(parseInt(data))
			{
				
				case 0:
				window.location.href=jump;
				break;
				case -1:
				showMessage("","原密码错误，请重试");
				break;
				case -2:
				showMessage("","服务器打瞌睡了噢...重新试试呗")
				break;
				case -3:
				showMessage("","两次新密码不一致，请重试")
				break;
			}
		
	
}

function showMessage(useless,content)
{
	errmsg.html(content);
}
$("input").keydown(
	function(e){
		if(e.keyCode==13)
			submitData();
	});