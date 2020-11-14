let play1=document.getElementById("playAgain");
let play2=document.getElementById("playAgain2");
var c = document.getElementById("Canvas");
let winCheck=false;
play2.style.display='none';
play1.style.display='none';
play1.addEventListener("mouseover", myFun);
play2.addEventListener("mouseout", myFun2);
function myFun2(){
  play2.style.display='none';
  play1.style.display='block';
}
function myFun(){
  play2.style.display='flex';
  play1.style.display='none';
}
let sign = "X";
let disp = document.getElementById("player");
let bloc;
function printx(number){
  let bloc = document.getElementById("r"+number);
  if(bloc.innerText=="" && winCheck==false){
    bloc.innerText=sign;
    let res=winner();
    checksign();
    if(res==false){
      if (sign == "O") {
        disp.innerHTML = "<center>[Computer's_Turn]</center>";
        disp.setAttribute("data-text", "[Computer's_Turn]");
        var delayInMilliseconds = 1000; 
        setTimeout(function () {
          computerturn();
        }, delayInMilliseconds);
      } 
      else {
        disp.innerHTML = "<center>[Your_Turn]</center>";
        disp.setAttribute("data-text", "[Your_Turn]");
      }
    }
  }
}
function chechwincomputer(){
  if(checkmove(1,2,3,sign)==true){
    return true;
  }
  else if(checkmove(4,5,6,sign)==true){
    return true;
  }
  else if(checkmove(7,8,9,sign)==true){
    return true;
  }
  else if(checkmove(1,4,7,sign)==true){
    return true;
  }
  else if(checkmove(2,5,8,sign)==true){
    return true;
  }
  else if(checkmove(3,6,9,sign)==true){
    return true;
  }
  else if(checkmove(1,5,9,sign)==true){
    return true;
  }
  else if(checkmove(3,5,7,sign)==true){
    return true;
  }
  return false;
}
function computerturn() {
  let win = false;
  for (var i = 1; i <= 9; i++) {
    let box = document.getElementById("r" + i);
    if (box.innerText == "" && winCheck == false) {
      box.innerText = sign;
      var res = chechwincomputer();
      if (res == true) {
        win = true;
        break;
      } 
      else {
        box.innerText = "";
      }
    }
  }
  if (win == false) {
    let A = [];
    for (var i = 1; i <= 9; i++) {
      let box = document.getElementById("r" + i);
      if (box.innerText == "") {
        A.push(i);
      }
    }
    var check= checkOpponent();
    if(check==false){
      var randomInteger = A.sample();
      var box2 = document.getElementById("r" + randomInteger);
      box2.innerText = sign;
    }
    else{
      var box3 =document.getElementById("r"+opponentTurn);
      box3.innerHTML=`O`;
    }
    disp.innerHTML = "<center>[Your_Turn]</center>";
    disp.setAttribute("data-text", "[Your_Turn]");
  }
  else {
    var result = winner();
  }
  checksign();
}

Array.prototype.sample = function () {
  return this[Math.floor(Math.random() * this.length)];
}
function checkOpponent(){
  if(checkmoveOpponent(1, 2, 3) || checkmoveOpponent(4, 5, 6) || checkmoveOpponent(7, 8, 9) || checkmoveOpponent(1, 4, 7) || checkmoveOpponent(2, 5, 8) || checkmoveOpponent(3, 6, 9) || checkmoveOpponent(1, 5, 9) || checkmoveOpponent(7, 5, 3)){
    return true;
  }
  return false;
}
let opponentTurn=0;
function checkmoveOpponent(a,b,c){
  if (getbox(a) == "X" && getbox(b) == "X" && getbox(c) == ""){
    opponentTurn= c; 
    return true;
  }
  if (getbox(a) == "X" && getbox(b) == "" && getbox(c) == "X"){
    opponentTurn= b;
    return true;
  }
  if (getbox(a) == "" && getbox(b) == "X" && getbox(c) == "X"){
    opponentTurn= a;
    return true;
  }
  return false;
}
function checksign(){
    if(sign=="X")
        sign ="O";
    else 
        sign = "X";   
}
function getbox(no){
    return document.getElementById("r"+no).innerHTML;
}
function checkmove(a,b,c,m){
    if(getbox(a)==m && getbox(b)==m && getbox(c)==m)
       return true;
    else 
        return false;   
}
function eraseValues(){
    for(let i=1;i<=9;i++){
      let inn=document.getElementById("r"+i);
      inn.style.background="#009688";
      inn.innerHTML="";
      inn.className="";
    }
    play1.style.display='none';
    play2.style.display='none';
    c.style.display='none';
    disp.innerHTML="[Lets Play]";
    disp.setAttribute("data-text", "[Lets_Play]");
    winCheck=false;
    play1.removeEventListener("mousemove", myFun);
    play2.removeEventListener("mouseout", myFun2);
    sign="X";
}
function dect(a1,a2,a3){
  let one=document.getElementById("r"+a1);
  let two=document.getElementById("r"+a2);
  let three=document.getElementById("r"+a3);
  one.classList.add("winner");
  two.classList.add("winner");
  three.classList.add("winner");
  for(let i=1;i<=9;i++){
    document.getElementById("r"+i).style.background="transparent";
  }
}
function winner(){
  if(checkmove(1,2,3,sign)==true){
    dect(1,2,3);
    winCheck=true;
  }
  else if(checkmove(4,5,6,sign)==true){
    dect(4,5,6);
    winCheck=true;
  }
  else if(checkmove(7,8,9,sign)==true){
    dect(7,8,9);
    winCheck=true;
  }
  else if(checkmove(1,4,7,sign)==true){
    dect(1,4,7);
    winCheck=true;
  }
  else if(checkmove(2,5,8,sign)==true){
    dect(2,5,8);
    winCheck=true;
  }
  else if(checkmove(3,6,9,sign)==true){
    dect(3,6,9);
    winCheck=true;
  }
  else if(checkmove(1,5,9,sign)==true){
    dect(1,5,9);
    winCheck=true;
  }
  else if(checkmove(3,5,7,sign)==true){
    dect(3,5,7);
    winCheck=true;
  }
  if(winCheck==true){
    c.style.display='block';
    play1.style.display='block';
    play1.addEventListener("mouseover", myFun);
    play2.addEventListener("mouseout", myFun2);
    if(sign=="O"){
      c.style.display='none';
      disp.innerHTML = `<center>[Computer_Won]</center>`;
      disp.setAttribute("data-text", "[Computer_WON]");
      var httpr = new XMLHttpRequest();
      httpr.open("GET","record.php?result=loss",true);
      httpr.send();
    }
    else{
      c.style.display = 'block';
      disp.innerHTML = `<center>[You_Won]</center>`;
      disp.setAttribute("data-text", "[You_WON]"); 
      var httpr = new XMLHttpRequest();
      httpr.open("GET","record.php?result=win",true);
      httpr.send();
      winCellebration();     
    }
    return true;
  }
  else{
    if(getbox(1)!=""&& getbox(2)!=""&& getbox(3)!=""&&
    getbox(4)!=""&& getbox(5)!=""&& getbox(6)!=""&&
    getbox(7)!=""&& getbox(8)!=""&& getbox(9)!=""){
      for(let i=1;i<=9;i++){
        document.getElementById("r"+i).style.background="transparent";
      }
      winCheck=true;
      c.style.display='block';
      document.getElementById("playAgain").style.display='block';
      disp.innerHTML = "<center> [Game_DRAW] </center>";
      disp.setAttribute("data-text", "[Game_DRAW]");
      play1.addEventListener("mouseover", myFun);
      play2.addEventListener("mouseout", myFun2);
      var httpr = new XMLHttpRequest();
      httpr.open("GET","record.php?result=draw",true);
      httpr.send();
      winCellebration();
      return true;
    }
    return false;
  }
}
function winCellebration(){
var ctx = c.getContext("2d");

var cwidth, cheight;
var shells = [];
var pass= [];

var colors = ['#FF5252', '#FF4081', '#E040FB', '#7C4DFF', '#536DFE', '#448AFF', '#40C4FF', '#18FFFF', '#64FFDA', '#69F0AE', '#B2FF59', '#EEFF41', '#FFFF00', '#FFD740', '#FFAB40', '#FF6E40'];

window.onresize = function() { reset(); }
reset();
function reset() {

  cwidth = window.innerWidth;
  cheight = window.innerHeight;
  c.width = cwidth;
  c.height = cheight;
}

function newShell() {

  var left = (Math.random() > 0.5);
  var shell = {};
  shell.x = (1*left);
  shell.y = 1;
  shell.xoff = (0.01 + Math.random() * 0.007) * (left ? 1 : -1);
  shell.yoff = 0.01 + Math.random() * 0.007;
  shell.size = Math.random() * 6 + 3;
  shell.color = colors[Math.floor(Math.random() * colors.length)];

  shells.push(shell);
}

function newPass(shell) {

  var pasCount = Math.ceil(Math.pow(shell.size, 2) * Math.PI);

  for (i = 0; i < pasCount; i++) {

    var pas = {};
    pas.x = shell.x * cwidth;
    pas.y = shell.y * cheight;

    var a = Math.random() * 4;
    var s = Math.random() * 10;

    pas.xoff = s *  Math.sin((5 - a) * (Math.PI / 2));
    pas.yoff = s *  Math.sin(a * (Math.PI / 2));

    pas.color = shell.color;
    pas.size = Math.sqrt(shell.size);

    if (pass.length < 1000) { pass.push(pas); }
  }
}

var lastRun = 0;
Run();
function Run() {
    if(winCheck==false)
        return;
  var dt = 1;
  if (lastRun != 0) { dt = Math.min(50, (performance.now() - lastRun)); }
  lastRun = performance.now();

  ctx.fillStyle = "rgba(0,0,0,0.25)";
  ctx.fillRect(0, 0, cwidth, cheight);

  if ((shells.length < 10) && (Math.random() > 0.96)) { newShell(); }

  for (let ix in shells) {

    var shell = shells[ix];

    ctx.beginPath();
    ctx.arc(shell.x * cwidth, shell.y * cheight, shell.size, 0, 2 * Math.PI);
    ctx.fillStyle = shell.color;
    ctx.fill();

    shell.x -= shell.xoff;
    shell.y -= shell.yoff;
    shell.xoff -= (shell.xoff * dt * 0.001);
    shell.yoff -= ((shell.yoff + 0.2) * dt * 0.00005);

    if (shell.yoff < -0.005) {
      newPass(shell);
      shells.splice(ix, 1);
    }
  }

  for (let ix in pass) {

    var pas = pass[ix];

    ctx.beginPath();
    ctx.arc(pas.x, pas.y, pas.size, 0, 2 * Math.PI);
    ctx.fillStyle = pas.color;
    ctx.fill();

    pas.x -= pas.xoff;
    pas.y -= pas.yoff;
    pas.xoff -= (pas.xoff * dt * 0.001);
    pas.yoff -= ((pas.yoff + 5) * dt * 0.0005);
    pas.size -= (dt * 0.002 * Math.random())

    if ((pas.y > cheight)  || (pas.y < -50) || (pas.size <= 0)) {
        pass.splice(ix, 1);
    }
  }
  requestAnimationFrame(Run);
}
}