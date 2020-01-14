$(document).ready(function(){
	var v1 = $('#zhiyuanyi').val();
	var v2 = $('#zhiyuaner').val();
	var v3 = $('#zhiyuansan').val();
	$('#zhiyuanyi').change(function(){
		v1 = $('#zhiyuanyi').val();
		console.log(v1);
		if (v1 == '校团委') {
			$('#zhiyuanyi2').empty();
			$('#zhiyuanyi2').append("<option value='组织部'>组织部</option>");
			$('#zhiyuanyi2').append("<option value='宣传部'>宣传与媒体运营部</option>");
			$('#zhiyuanyi2').append("<option value='办公室'>办公室</option>");
			$('#zhiyuanyi2').append("<option value='实践部'>实践部</option>");
			$('#zhiyuanyi2').append("<option value='文化事业部'>文化事业部</option>");
			
		}
		else if(v1 == '校学生会'){
			$("#zhiyuanyi2").empty();
			$('#zhiyuanyi2').append("<option value='行政部'>行政部</option>");
			$('#zhiyuanyi2').append("<option value='媒体部'>媒体部</option>");
			$('#zhiyuanyi2').append("<option value='宣传部'>宣传部</option>");
			
			$('#zhiyuanyi2').append("<option value='学习实践部'>学习实践部</option>");
			$('#zhiyuanyi2').append("<option value='文艺部'>文艺部</option>");
			$('#zhiyuanyi2').append("<option value='体育部'>体育部</option>");
			$('#zhiyuanyi2').append("<option value='外联部'>外联部</option>");
			$('#zhiyuanyi2').append("<option value='生活权益部'>生活权益部</option>");
			$('#zhiyuanyi2').append("<option value='民族部'>民族部</option>");
			$('#zhiyuanyi2').append("<option value='技术部'>技术部</option>");
			$('#zhiyuanyi2').append("<option value='网络推广部'>网络推广部</option>");
			
		}
		else if(v1 == '社团联合会'){
			$("#zhiyuanyi2").empty();
			$('#zhiyuanyi2').append("<option value='行政部'>行政部</option>");
			$('#zhiyuanyi2').append("<option value='宣传部'>宣传部</option>");
			$('#zhiyuanyi2').append("<option value='组织部'>组织部</option>");
			$('#zhiyuanyi2').append("<option value='公益学术部'>公益学术部</option>");
			$('#zhiyuanyi2').append("<option value='艺术体育部'>艺术体育部</option>");
			$('#zhiyuanyi2').append("<option value='网络新媒体部'>网络新媒体部</option>");
			$('#zhiyuanyi2').append("<option value='信息出版部'>信息出版部</option>");
			$('#zhiyuanyi2').append("<option value='外联部'>外联部</option>");
		}
		else if(v1 == '青年志愿者协会'){
			$("#zhiyuanyi2").empty();
			$('#zhiyuanyi2').append("<option value='牵手计划团'>牵手计划团</option>");
			$('#zhiyuanyi2').append("<option value='心语团'>心语团</option>");
			$('#zhiyuanyi2').append("<option value='阳光公益团'>阳光公益团</option>");
			$('#zhiyuanyi2').append("<option value='秘书企划部'>秘书企划部</option>");
			$('#zhiyuanyi2').append("<option value='校园行动团'>校园行动团</option>");
			$('#zhiyuanyi2').append("<option value='关爱之家团'>关爱之家团</option>");
		}
		else if (v1 == '传媒红会') {
			$("#zhiyuanyi2").empty();
			$('#zhiyuanyi2').append("<option value='爱心部'>爱心部</option>");
			$('#zhiyuanyi2').append("<option value='新媒体部'>新媒体部</option>");
			$('#zhiyuanyi2').append("<option value='同伴教育部'>同伴教育部</option>");
			$('#zhiyuanyi2').append("<option value='外联部'>外联部</option>");
			$('#zhiyuanyi2').append("<option value='宣传部'>宣传部</option>");
			$('#zhiyuanyi2').append("<option value='应急救援部'>应急救援部</option>");
		}
		else if (v1 == '校研究生会') {
			$("#zhiyuanyi2").empty();
			$('#zhiyuanyi2').append("<option value='办公室'>办公室</option>");
		
			$('#zhiyuanyi2').append("<option value='外联部'>外联部</option>");
			$('#zhiyuanyi2').append("<option value='推广部'>推广部</option>");
			
			$('#zhiyuanyi2').append("<option value='期刊部'>期刊部</option>");
			$('#zhiyuanyi2').append("<option value='生活权益部'>生活权益部</option>");
			$('#zhiyuanyi2').append("<option value='宣传部'>宣传部</option>");
			$('#zhiyuanyi2').append("<option value='文体部'>文体部</option>");
			$('#zhiyuanyi2').append("<option value='新媒体部'>新媒体部</option>");
		}
		else if (v1 == '《传媒青年》杂志社') {
			$("#zhiyuanyi2").empty();
			$('#zhiyuanyi2').append("<option value='行政部'>行政部</option>");
			$('#zhiyuanyi2').append("<option value='宣传部'>宣传部</option>");
			$('#zhiyuanyi2').append("<option value='美编部'>美编部</option>");
		}
		else if (v1 == '广播台') {
			$("#zhiyuanyi2").empty();
			$('#zhiyuanyi2').append("<option value='非常点播'>非常点播节目组</option>");
			$('#zhiyuanyi2').append("<option value='音乐即时听'>音乐即时听节目组</option>");
			$('#zhiyuanyi2').append("<option value='阳光不休假'>阳光不休假节目组</option>");
			$('#zhiyuanyi2').append("<option value='体育大看台'>体育大看台节目组</option>");
			$('#zhiyuanyi2').append("<option value='有事大家谈'>有事大家谈节目组</option>");
			$('#zhiyuanyi2').append("<option value='魅力第六天'>魅力第六天节目组</option>");
			$('#zhiyuanyi2').append("<option value='ICQ Station'>ICQ Station节目组</option>");
			$('#zhiyuanyi2').append("<option value='生活Mix'>生活Mix节目组</option>");

			$('#zhiyuanyi2').append("<option value='专题组'>专题组</option>");
		
			$('#zhiyuanyi2').append("<option value='新闻组'>新闻组</option>");
			$('#zhiyuanyi2').append("<option value='行政部'>行政部</option>");
			$('#zhiyuanyi2').append("<option value='外联部'>外联部</option>");
			$('#zhiyuanyi2').append("<option value='活动部'>活动部</option>");
			$('#zhiyuanyi2').append("<option value='设计部'>设计部</option>");
			$('#zhiyuanyi2').append("<option value='企划部'>企划部</option>");
			
			
		}
		else if (v1 == '礼仪协会') {
			$("#zhiyuanyi2").empty();
			$('#zhiyuanyi2').append("<option value='培训部'>培训部</option>");
			$('#zhiyuanyi2').append("<option value='宣传部'>宣传部</option>");
			$('#zhiyuanyi2').append("<option value='公关部'>公关部</option>");
			$('#zhiyuanyi2').append("<option value='行政部'>行政部</option>");
			$('#zhiyuanyi2').append("<option value='礼仪分队'>礼仪分队</option>");

		}
	});
$('#zhiyuaner').change(function(){
		v2 = $('#zhiyuaner').val();
		console.log(v2);
		if (v2 == '校团委') {
					$('#zhiyuaner2').empty();
					$('#zhiyuaner2').append("<option value='组织部'>组织部</option>");
					$('#zhiyuaner2').append("<option value='宣传部'>宣传与媒体运营部</option>");
					$('#zhiyuaner2').append("<option value='办公室'>办公室</option>");
					$('#zhiyuaner2').append("<option value='实践部'>实践部</option>");
					$('#zhiyuaner2').append("<option value='文化事业部'>文化事业部</option>");
					
				}
				else if(v2 == '校学生会'){
					$("#zhiyuaner2").empty();
					$('#zhiyuaner2').append("<option value='行政部'>行政部</option>");
					$('#zhiyuaner2').append("<option value='媒体部'>媒体部</option>");
					$('#zhiyuaner2').append("<option value='宣传部'>宣传部</option>");
					
					$('#zhiyuaner2').append("<option value='学习实践部'>学习实践部</option>");
					$('#zhiyuaner2').append("<option value='文艺部'>文艺部</option>");
					$('#zhiyuaner2').append("<option value='体育部'>体育部</option>");
					$('#zhiyuaner2').append("<option value='外联部'>外联部</option>");
					$('#zhiyuaner2').append("<option value='生活权益部'>生活权益部</option>");
					$('#zhiyuaner2').append("<option value='民族部'>民族部</option>");
					$('#zhiyuaner2').append("<option value='技术部'>技术部</option>");
					$('#zhiyuaner2').append("<option value='网络推广部'>网络推广部</option>");
					
				}
				else if(v2 == '社团联合会'){
					$("#zhiyuaner2").empty();
					$('#zhiyuaner2').append("<option value='行政部'>行政部</option>");
					$('#zhiyuaner2').append("<option value='宣传部'>宣传部</option>");
					$('#zhiyuaner2').append("<option value='组织部'>组织部</option>");
					$('#zhiyuaner2').append("<option value='公益学术部'>公益学术部</option>");
					$('#zhiyuaner2').append("<option value='艺术体育部'>艺术体育部</option>");
					$('#zhiyuaner2').append("<option value='网络新媒体部'>网络新媒体部</option>");
					$('#zhiyuaner2').append("<option value='信息出版部'>信息出版部</option>");
					$('#zhiyuaner2').append("<option value='外联部'>外联部</option>");
				}
				else if(v2 == '青年志愿者协会'){
					$("#zhiyuaner2").empty();
					$('#zhiyuaner2').append("<option value='牵手计划团'>牵手计划团</option>");
					$('#zhiyuaner2').append("<option value='心语团'>心语团</option>");
					$('#zhiyuaner2').append("<option value='阳光公益团'>阳光公益团</option>");
					$('#zhiyuaner2').append("<option value='秘书企划部'>秘书企划部</option>");
					$('#zhiyuaner2').append("<option value='校园行动团'>校园行动团</option>");
					$('#zhiyuaner2').append("<option value='关爱之家团'>关爱之家团</option>");
				}
				else if (v2 == '传媒红会') {
					$("#zhiyuaner2").empty();
					$('#zhiyuaner2').append("<option value='爱心部'>爱心部</option>");
					$('#zhiyuaner2').append("<option value='新媒体部'>新媒体部</option>");
					$('#zhiyuaner2').append("<option value='同伴教育部'>同伴教育部</option>");
					$('#zhiyuaner2').append("<option value='外联部'>外联部</option>");
					$('#zhiyuaner2').append("<option value='宣传部'>宣传部</option>");
					$('#zhiyuaner2').append("<option value='应急救援部'>应急救援部</option>");
				}
				else if (v2 == '校研究生会') {
					$("#zhiyuaner2").empty();
					$('#zhiyuaner2').append("<option value='办公室'>办公室</option>");
				
					$('#zhiyuaner2').append("<option value='外联部'>外联部</option>");
					$('#zhiyuaner2').append("<option value='推广部'>推广部</option>");
					
					$('#zhiyuaner2').append("<option value='期刊部'>期刊部</option>");
					$('#zhiyuaner2').append("<option value='生活权益部'>生活权益部</option>");
					$('#zhiyuaner2').append("<option value='宣传部'>宣传部</option>");
					$('#zhiyuaner2').append("<option value='文体部'>文体部</option>");
					$('#zhiyuaner2').append("<option value='新媒体部'>新媒体部</option>");
				}
				else if (v2 == '《传媒青年》杂志社') {
					$("#zhiyuaner2").empty();
					$('#zhiyuaner2').append("<option value='行政部'>行政部</option>");
					$('#zhiyuaner2').append("<option value='宣传部'>宣传部</option>");
					$('#zhiyuaner2').append("<option value='美编部'>美编部</option>");
				}
				else if (v2 == '广播台') {
					$("#zhiyuaner2").empty();
					$('#zhiyuaner2').append("<option value='非常点播'>非常点播节目组</option>");
					$('#zhiyuaner2').append("<option value='音乐即时听'>音乐即时听节目组</option>");
					$('#zhiyuaner2').append("<option value='阳光不休假'>阳光不休假节目组</option>");
					$('#zhiyuaner2').append("<option value='体育大看台'>体育大看台节目组</option>");
					$('#zhiyuaner2').append("<option value='有事大家谈'>有事大家谈节目组</option>");
					$('#zhiyuaner2').append("<option value='魅力第六天'>魅力第六天节目组</option>");
					$('#zhiyuaner2').append("<option value='ICQ Station'>ICQ Station节目组</option>");
					$('#zhiyuaner2').append("<option value='生活Mix'>生活Mix节目组</option>");
		
					$('#zhiyuaner2').append("<option value='专题组'>专题组</option>");
				
					$('#zhiyuaner2').append("<option value='新闻组'>新闻组</option>");
					$('#zhiyuaner2').append("<option value='行政部'>行政部</option>");
					$('#zhiyuaner2').append("<option value='外联部'>外联部</option>");
					$('#zhiyuaner2').append("<option value='活动部'>活动部</option>");
					$('#zhiyuaner2').append("<option value='设计部'>设计部</option>");
					$('#zhiyuaner2').append("<option value='企划部'>企划部</option>");
					
					
				}
				else if (v2 == '礼仪协会') {
					$("#zhiyuaner2").empty();
					$('#zhiyuaner2').append("<option value='培训部'>培训部</option>");
					$('#zhiyuaner2').append("<option value='宣传部'>宣传部</option>");
					$('#zhiyuaner2').append("<option value='公关部'>公关部</option>");
					$('#zhiyuaner2').append("<option value='行政部'>行政部</option>");
					$('#zhiyuaner2').append("<option value='礼仪分队'>礼仪分队</option>");
		
				}
	});
$('#zhiyuansan').change(function(){
		v3 = $('#zhiyuansan').val();
		console.log(v3);
		if (v3 == '校团委') {
					$('#zhiyuansan2').empty();
					$('#zhiyuansan2').append("<option value='组织部'>组织部</option>");
					$('#zhiyuansan2').append("<option value='宣传部'>宣传与媒体运营部</option>");
					$('#zhiyuansan2').append("<option value='办公室'>办公室</option>");
					$('#zhiyuansan2').append("<option value='实践部'>实践部</option>");
					$('#zhiyuansan2').append("<option value='文化事业部'>文化事业部</option>");
					
				}
				else if(v3 == '校学生会'){
					$("#zhiyuansan2").empty();
					$('#zhiyuansan2').append("<option value='行政部'>行政部</option>");
					$('#zhiyuansan2').append("<option value='媒体部'>媒体部</option>");
					$('#zhiyuansan2').append("<option value='宣传部'>宣传部</option>");
					
					$('#zhiyuansan2').append("<option value='学习实践部'>学习实践部</option>");
					$('#zhiyuansan2').append("<option value='文艺部'>文艺部</option>");
					$('#zhiyuansan2').append("<option value='体育部'>体育部</option>");
					$('#zhiyuansan2').append("<option value='外联部'>外联部</option>");
					$('#zhiyuansan2').append("<option value='生活权益部'>生活权益部</option>");
					$('#zhiyuansan2').append("<option value='民族部'>民族部</option>");
					$('#zhiyuansan2').append("<option value='技术部'>技术部</option>");
					$('#zhiyuansan2').append("<option value='网络推广部'>网络推广部</option>");
					
				}
				else if(v3 == '社团联合会'){
					$("#zhiyuansan2").empty();
					$('#zhiyuansan2').append("<option value='行政部'>行政部</option>");
					$('#zhiyuansan2').append("<option value='宣传部'>宣传部</option>");
					$('#zhiyuansan2').append("<option value='组织部'>组织部</option>");
					$('#zhiyuansan2').append("<option value='公益学术部'>公益学术部</option>");
					$('#zhiyuansan2').append("<option value='艺术体育部'>艺术体育部</option>");
					$('#zhiyuansan2').append("<option value='网络新媒体部'>网络新媒体部</option>");
					$('#zhiyuansan2').append("<option value='信息出版部'>信息出版部</option>");
					$('#zhiyuansan2').append("<option value='外联部'>外联部</option>");
				}
				else if(v3 == '青年志愿者协会'){
					$("#zhiyuansan2").empty();
					$('#zhiyuansan2').append("<option value='牵手计划团'>牵手计划团</option>");
					$('#zhiyuansan2').append("<option value='心语团'>心语团</option>");
					$('#zhiyuansan2').append("<option value='阳光公益团'>阳光公益团</option>");
					$('#zhiyuansan2').append("<option value='秘书企划部'>秘书企划部</option>");
					$('#zhiyuansan2').append("<option value='校园行动团'>校园行动团</option>");
					$('#zhiyuansan2').append("<option value='关爱之家团'>关爱之家团</option>");
				}
				else if (v3 == '传媒红会') {
					$("#zhiyuansan2").empty();
					$('#zhiyuansan2').append("<option value='爱心部'>爱心部</option>");
					$('#zhiyuansan2').append("<option value='新媒体部'>新媒体部</option>");
					$('#zhiyuansan2').append("<option value='同伴教育部'>同伴教育部</option>");
					$('#zhiyuansan2').append("<option value='外联部'>外联部</option>");
					$('#zhiyuansan2').append("<option value='宣传部'>宣传部</option>");
					$('#zhiyuansan2').append("<option value='应急救援部'>应急救援部</option>");
				}
				else if (v3 == '校研究生会') {
					$("#zhiyuansan2").empty();
					$('#zhiyuansan2').append("<option value='办公室'>办公室</option>");
				
					$('#zhiyuansan2').append("<option value='外联部'>外联部</option>");
					$('#zhiyuansan2').append("<option value='推广部'>推广部</option>");
					
					$('#zhiyuansan2').append("<option value='期刊部'>期刊部</option>");
					$('#zhiyuansan2').append("<option value='生活权益部'>生活权益部</option>");
					$('#zhiyuansan2').append("<option value='宣传部'>宣传部</option>");
					$('#zhiyuansan2').append("<option value='文体部'>文体部</option>");
					$('#zhiyuansan2').append("<option value='新媒体部'>新媒体部</option>");
				}
				else if (v3 == '《传媒青年》杂志社') {
					$("#zhiyuansan2").empty();
					$('#zhiyuansan2').append("<option value='行政部'>行政部</option>");
					$('#zhiyuansan2').append("<option value='宣传部'>宣传部</option>");
					$('#zhiyuansan2').append("<option value='美编部'>美编部</option>");
				}
				else if (v3 == '广播台') {
					$("#zhiyuansan2").empty();
					$('#zhiyuansan2').append("<option value='非常点播'>非常点播节目组</option>");
					$('#zhiyuansan2').append("<option value='音乐即时听'>音乐即时听节目组</option>");
					$('#zhiyuansan2').append("<option value='阳光不休假'>阳光不休假节目组</option>");
					$('#zhiyuansan2').append("<option value='体育大看台'>体育大看台节目组</option>");
					$('#zhiyuansan2').append("<option value='有事大家谈'>有事大家谈节目组</option>");
					$('#zhiyuansan2').append("<option value='魅力第六天'>魅力第六天节目组</option>");
					$('#zhiyuansan2').append("<option value='ICQ Station'>ICQ Station节目组</option>");
					$('#zhiyuansan2').append("<option value='生活Mix'>生活Mix节目组</option>");
		
					$('#zhiyuansan2').append("<option value='专题组'>专题组</option>");
				
					$('#zhiyuansan2').append("<option value='新闻组'>新闻组</option>");
					$('#zhiyuansan2').append("<option value='行政部'>行政部</option>");
					$('#zhiyuansan2').append("<option value='外联部'>外联部</option>");
					$('#zhiyuansan2').append("<option value='活动部'>活动部</option>");
					$('#zhiyuansan2').append("<option value='设计部'>设计部</option>");
					$('#zhiyuansan2').append("<option value='企划部'>企划部</option>");
					
					
				}
				else if (v3 == '礼仪协会') {
					$("#zhiyuansan2").empty();
					$('#zhiyuansan2').append("<option value='培训部'>培训部</option>");
					$('#zhiyuansan2').append("<option value='宣传部'>宣传部</option>");
					$('#zhiyuansan2').append("<option value='公关部'>公关部</option>");
					$('#zhiyuansan2').append("<option value='行政部'>行政部</option>");
					$('#zhiyuansan2').append("<option value='礼仪分队'>礼仪分队</option>");
		
				}
	});
})