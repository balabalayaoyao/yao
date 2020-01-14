	let box = document.getElementById('box');
	let item = document.querySelectorAll('.item');		
	let round = document.getElementById('round');
	let chance = document.getElementById('chance');
	let score = document.getElementById('score');
	let a = "";
	let b = "";
	let click = 1; 
	let roundNum = 1;
	let chanceNum = 12;
	let scoreNum = 0;
	let roundSuccess = 0; 
	let compNum = box.children.length / 2 - 1;
	let iframe = document.querySelector('iframe')
	let start = document.querySelector('.start')
	let resultImg = document.querySelector('.result-img')
	let startY = 0
	let moveY = 0
	let endY = 0
	resultImg.ontouchstart = function(e){
		startY = e.changedTouches[0].clientY
	}
	resultImg.ontouchmove = function(e){
		resultImg.style.marginBottom = (startY-e.changedTouches[0].clientY)+'px'
	}
	resultImg.ontouchend = function(e){		
		if(startY-e.changedTouches[0].clientY>300){
			location.href = './报名表/index.html'
		}else{
			resultImg.style.marginBottom = 0+'px'
		}
	}
	setInterval( function() {
		if(localStorage.getItem('hasOver')){
			iframe.style.display = 'none'
			start.style.display = 'block'
			localStorage.removeItem('hasOver')
			this.init()
		}
	},300)

	function result(){
		let partObj = JSON.parse(localStorage.getItem('partObj') || {})
		let prevScore = parseInt(localStorage.getItem('score') || '0')
		let currentScore = prevScore+(roundNum-1)
		partObj['part3'] = roundNum-1
		console.log('最终的得分是', currentScore)
		if (currentScore <= 3) {
			resultImg.src = './img/5.png'
		} else if( currentScore>=4 && currentScore<=5 ) {
			let part1 = partObj['part1']
			let part2 = partObj['part2']
			let part3 = partObj['part3']
			if(part1>part2&&part1>part3){
				resultImg.src = './img/1.png'
			}else if(part2>part1&&part2>part3){
				resultImg.src = './img/2.png'
			}else {
				resultImg.src = './img/3.png'
			}
		} else if(currentScore>=5 && currentScore<=6) {
			resultImg.src = './img/6.png'
		} else {
			resultImg.src = './img/4.png'
		}
		start.style.display = 'none'
		resultImg.style.display = 'block'
	}
	//初始化
	window.onload = function(){
		this.init()
	}
	function init(){
		//重载回合
		reloadItem();
		//记分菜单初始化
		round.textContent = roundNum;
		chance.textContent = chanceNum;
		score.textContent = scoreNum;
	}

	//开始游戏 开启事件监听
	box.addEventListener("click", function(){
		// 当剩余机会>0，执行游戏
		if((chanceNum > 0) && (event.target.className == "item transparent")){
			// 第一次点击
			if (click == 1){
				a = event.target;
				a.className = "item white";
				click = 2;
			}//第二次点击
			else if (click == 2){
				b = event.target;
				b.className = "item white";
				click = 1;
				//两次不同
				if(a.textContent != b.textContent){
					a.className = "item red";
					b.className = "item red";
					setTimeout(function(){
						a.className = "item transparent";
						b.className = "item transparent";
					},300);
					chanceNum -= 1;
				} //两次相同
				else{
					a.className = "item green";
					b.className = "item green";
					setTimeout(function(){
						a.className = "item white";
						b.className = "item white";
					},200);
					scoreNum += 10;
					roundSuccess += 1;
					// 判断是否完成回合，完成后重载回合
					if(roundSuccess > compNum && roundNum < 4){
						roundNum += 1;
						round.textContent = roundNum;
						setTimeout(function(){
							hideItem();
						},1000);
						setTimeout(function(){
							if(roundNum !== 4){
								reloadItem();
							}else{
								result()
							}
						},1500);
						
					}
				}
				// 更新分数
				round.textContent = roundNum;
				chance.textContent = chanceNum;
				score.textContent = scoreNum;
			}
		}//当剩余机会=0时，提示游戏结束
		else if(roundNum == 4||chanceNum == 0){
			result()
			//在闯关游戏里应该直接出结果页
		}
	});
		

	//重载回合（随机显示数字位置并隐藏，回合内变量初始化）
	function reloadItem(){
		//数字位置打乱
		var items = [];
		for (var i = 0; i < box.children.length; i++) {
			items.push(box.children[i]);
		}
		items.sort(function(){
			return Math.random() > 0.5? -1: 1;
		});
		items.forEach(function(a){
			box.appendChild(a);
		})
		//显示数字
			for(i = 0; i < box.children.length; i++) {
				item[i].className = "item white";
			}
		//数字隐藏
		setTimeout(function(){
			hideItem();
		},1000);
		// 回合内成功次数和点击次数初始化
		roundSuccess = 0;
		click = 1;
	}

	// 数字隐藏
	function hideItem(){
		for(i = 0; i < box.children.length; i++) {
			item[i].className = "item transparent";
		}
	}
