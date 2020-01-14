$(document).ready(function(){
Bmob.initialize("aa35a73f1cd9a6935933a5afe62cffa9","c6dd3c5763a21d654fdf1272e500e321");

var Student = Bmob.Object.extend("Student");
var student = new Student();

$('#btn').click(function(){
	//
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
	var xuewei = $("input[name='xuewei']:checked").val();
	//
	if (name !=""&&xueyuan !="" &&zhuanye !="" &&phone !="" &&zhiyuanyi !="" &&zhiyuaner !="" &&
		techang !="" ) {
	student.set("name",name);
	student.set("xingbie",xingbie);
	student.set("xuebu",xuebu);
	student.set("xueyuan",xueyuan);
	student.set("xuewei",xuewei);
	student.set("zhuanye",zhuanye);
	student.set("phone",phone);
	student.set("zhiyuanyi",zhiyuanyi);
	student.set('zhiyuanyi2',zhiyuanyi2);
	student.set("zhiyuaner",zhiyuaner);
	student.set('zhiyuaner2',zhiyuaner2);
	student.set("zhiyuansan",zhiyuansan);
	student.set('zhiyuansan2',zhiyuansan2);
	student.set("techang",techang);
	student.save(null,{
	success:function(student){
		console.log('添加成功');
		// alert('报名成功');
		$('.g').css('display','block');
		$('.x').click(function(){
			window.location.reload();
		})
		// window.location.reload();
	},
	error:function(student,error){
		console.log("添加失败");
		alert('报名失败');
}
})
}
else{
	alert("请填写完整！");
}
})

})
