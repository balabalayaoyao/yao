$(document).ready(function(){
$.ajaxSetup({ cache: false });

	
	//btn.click(submitData);

$('#btn').click(function(){
	var btn = $("#btn");
	var name = $('#name').val();
	var xuebu = $('#xuebu').val();
	var xueyuan = $('#xueyuan').val();
	var zhuanye = $('#zhuanye').val();
	var phone = String($('#phone').val());
	var zhiyuanyi = $('#zhiyuanyi').val();
	var zhiyuanyi2 = $('#zhiyuanyi2').val();
	var zhiyuaner = $('#zhiyuaner').val();
	var zhiyuaner2 = $('#zhiyuaner2').val();
	var zhiyuansan = $('#zhiyuansan').val();
	var zhiyuansan2 = $('#zhiyuansan2').val();
	var techang = $('#techang').val();
	var xingbie = $("input[name='xingbie']:checked").val();
	console.log(xingbie);
	var xuewei = $("input[name='xuewei']:checked").val();
	console.log(xuewei);

		if (name !=""&&xuebu !=""&&xueyuan !="" &&zhuanye !="" &&phone !="" &&zhiyuanyi !="" &&zhiyuaner !="" &&
		techang !="" ){
		var data={"key":"sdjkfghdskhjfrtwaior32478asuriokasef","name":name,"xuebu":xuebu,"xueyuan":xueyuan,"zhuanye":zhuanye,"phone":phone,"zhiyuanyi":zhiyuanyi,"zhiyuanyi2":zhiyuanyi2,"zhiyuaner":zhiyuaner,"zhiyuaner2":zhiyuaner2,"zhiyuansan":zhiyuansan,"zhiyuansan2":zhiyuansan2,"techang":techang,"xingbie":xingbie,"xuewei":xuewei};
		var url="submit.php";
		var callback=regCallback;
		console.log(data);
		console.log(url);
		$.post(url,data,callback);
	}
		else{
			$('#gtext').html('请填写完整');
			$('#g').css('display','block');
		$('#x').click(function(){
			$('#g').css('display','none');
			$('#gtext').html('报名成功');
		});
		};
	

})

function regCallback(data)
{

	switch(parseInt(data))
		{
			
			case 0:
			console.log('添加成功');
		// alert('报名成功');
		$('#g').css('display','block');
		$('#x').click(function(){
			window.location.reload();
		});	
			break;


			case -1:
			console.log('重复');
		$('#gtext').html('请勿重复报名，如需修改信息请按修改按钮');
			$('#g').css('display','block');
		$('#x').click(function(){
			$('#g').css('display','none');
			$('#gtext').html('报名成功');
		});
		break;

			case -5:
			console.log('添加失败');
		 alert('服务器打了个瞌睡，请重试～');	
			break;		
		}

	
}

function dataCheck()
{
if (name !=""&&xueyuan !="" &&zhuanye !="" &&phone !="" &&zhiyuanyi !="" &&zhiyuaner !="" &&
		techang !="" ) {
	return true;
}else{
	return true;
	}
}

})