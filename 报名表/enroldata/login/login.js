$.ajaxSetup({ cache: false });
var password=$("#password");
var reg_form=$("#reg_form");
reg_form.hide();
var submit=$("#submit_button");
submit.click(submitData);
var reg_enter=$("#reg_enter");
reg_enter.click(toggleRegForm);
var reg_tishi=$("#reg_tishi");
var username=$("#username");
var errmsg=$("#errmsg");
var is_reg_form=false;

function toggleRegForm()
{
	errmsg.html("");
	if(is_reg_form)
		hideRegForm();
	else
		showRegForm();
}
function submitData()
{
	errmsg.html("");
	if(dataCheck()){
			$("input").attr("disabled","disabled");
			$("#submit_button").addClass("disabled");
			$("#submit_button").text("登录中...");
			$("#submit_button").unbind("click");
			var data={"username":username.val(),"password":password.val()};
			var url="login.php";
		var callback=regCallback;
		$.post(url,data,callback);}
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
				showMessage("","用户名或密码错误，请重试");
				username.focus();
				break;
				case -2:
				showMessage("","服务器打瞌睡了噢...重新试试呗")
				break;
			}
		
	
}
function dataCheck()
{
	reg=/\s/;
	if(reg.test(username.val()) || username.val()=="")
	{
		showMessage("错误","不允许空用户名或用户名含有空格");
		return false;
	}
	if (password.val()==""||password.val()==password.attr("placeholder")) {
		showMessage("错误","密码不可以为空");
		password.focus();
		return false;
	};
	
return true;
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