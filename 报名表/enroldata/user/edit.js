$(document).ready(function(){
$.ajaxSetup({ cache: false });

	
	//btn.click(submitData);

$('#change').click(function(){
	var btn = $('#change');
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
	var xingbie = $('#xingbie').val();
	console.log(xingbie);
	var xuewei = $('#xuewei').val();
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
			$('#errmsg').html('请填写完整！');
		};
	

})

function regCallback(data)
{

	switch(parseInt(data))
		{
			
			case 0:
			console.log('添加成功');
		// alert('报名成功');
		$('#errmsg').html('保存成功！');
		window.location.reload();	
			break;


			case -1:
			$('#errmsg').html('失败');
			break;

			case -5:
			$('#errmsg').html('服务器打了个瞌睡，再试一次吧！');
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