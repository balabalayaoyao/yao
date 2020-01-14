let start = document.querySelector('.start');
let next = document.querySelector('.next');
let one = document.querySelector('#one');
let score = 0;
let c = 0;
let status = 1;
let questions = [['img/q0q.png','img/q1-a.png','img/q1-b.png','img/q1-c.png','img/q1-d.png','img/q1-c.png'],['img/q1q.png','img/q2-a.png','img/q2-b.png','img/q2-c.png','img/q2-d.png','img/q2-c.png'],['img/q2q.png','img/q3-a.png','img/q3-b.png','img/q3-c.png','img/q3-d.png','img/q3-b.png'],['img/q3q.png','img/q4-a.png','img/q4-b.png','img/q4-c.png','img/q4-d.png','img/q4-c.png']];
let partObj = {
	part1:0,
	part2:0,
	part3:0
}
next.addEventListener('click',next1);
function Question(question,a,b,c,d,correct){
	this.question = question;
	this.a = a;
	this.b = b;
	this.c = c;
	this.d = d;
	this.correct = correct;
}
function next1() {
	// body...
	start.style.backgroundImage = 'url(img/q-bg1.png)';
	
	one.style.display = 'none';
	next.style.display = 'none';
	status = 0;
	create();
}
function create(){

	let gxy = new Question(questions[c][0],questions[c][1],questions[c][2],questions[c][3],questions[c][4],questions[c][5]);
	let img0 = document.createElement('img');
	let img1 = document.createElement('img');
	let img2 = document.createElement('img');
	let img3 = document.createElement('img');
	let img4 = document.createElement('img');
	let top = document.createElement('div');
	let bottom = document.createElement('div');
	img0.setAttribute('class','question');
	top.setAttribute('class','top');
	bottom.setAttribute('class','bottom');
	img0.src = gxy.question;
	img1.src = gxy.a;
	img2.src = gxy.b;
	img3.src = gxy.c;
	img4.src = gxy.d;
	img1.data = gxy.a;
	img2.data = gxy.b;
	img3.data = gxy.c;
	img4.data = gxy.d;
	start.appendChild(top);
	start.appendChild(bottom);
	top.appendChild(img0);
	bottom.appendChild(img1);
	bottom.appendChild(img2);
	bottom.appendChild(img3);
	bottom.appendChild(img4);
	let imgList = [img1,img2,img3,img4]
	for(let i = 0;i<imgList.length;i++){
		let current = imgList[i]
		current.addEventListener('click',function(e){
			if (e.target.data == gxy.correct) {
				score += 1;
				let partKey = c%2 === 0?c/2+1:(c+1)/2
				partObj['part'+partKey]++
			}
			c += 1;	
			this.parentNode.parentNode.removeChild(top);
			this.parentNode.parentNode.removeChild(bottom);
			if (c < 4) {
				create();
			} else {
				localStorage.setItem('partObj',JSON.stringify(partObj))
				localStorage.setItem('score', score)
				localStorage.setItem('hasOver','true')
			}
		})
	}
}

//滑动
 let startx, starty;  
    //获得角度  
  
    	function getAngle(angx, angy) {  
        return Math.atan2(angy, angx) * 180 / Math.PI;  
    };  
   
    //根据起点终点返回方向 1向上 2向下 3向左 4向右 0未滑动  
    function getDirection(startx, starty, endx, endy) {  
        let angx = endx - startx;  
        let angy = endy - starty;  
        let result = 0;  
   
        //如果滑动距离太短  
        if (Math.abs(angx) < 2 && Math.abs(angy) < 2) {  
            return result;  
        }  
   
        let angle = getAngle(angx, angy);  
        if (angle >= -135 && angle <= -45) {  
            result = 1;  
        } else if (angle > 45 && angle < 135) {  
            result = 2;  
        } else if ((angle >= 135 && angle <= 180) || (angle >= -180 && angle < -135)) {  
            result = 3;  
        } else if (angle >= -45 && angle <= 45) {  
            result = 4;  
        }  
   
        return result;  
    }  
    //手指接触屏幕  
    document.addEventListener("touchstart", function(e) {  
        startx = e.touches[0].pageX;  
        starty = e.touches[0].pageY;  
    }, false);  
    //手指离开屏幕  
    document.addEventListener("touchend", function(e) {  
        let endx, endy;  
        endx = e.changedTouches[0].pageX;  
        endy = e.changedTouches[0].pageY;  
        let direction = getDirection(startx, starty, endx, endy);  
        if (direction == 1) {
        	if (status == 1) {
        		next1();
        	}
        }
    }, false);  
