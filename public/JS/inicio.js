
var carroatual = 0;

function backcar(){
    carroatual ++;
    if(carroatual>3){
        carroatual=0
    }
    passbar()
    setcar()
    document.getElementById("car").innerHTML = carroatual;
}
function passcar(){
    carroatual--;
    if(carroatual<0){
        carroatual=3
    }
    
    backbar()
    setcar()
    document.getElementById("car").innerHTML = carroatual;
}

function sleep(milliseconds) {
  const date = Date.now();
  let currentDate = null;
  do {
    currentDate = Date.now();
  } while (currentDate - date < milliseconds);
}


var id = null;
function backbar() {
    
var e1 = document.getElementById("img1");
  var e2 = document.getElementById("img2");
  
  var e3 = document.getElementById("img3");
  
  var pos = -700;
  var scl1 = 0.5;
  var scl2 = 1.55;
  clearInterval(id);
  id = setInterval(frame, 2);
  function frame() {
    if (pos == 0){
    clearInterval(id);
    } else {
      pos=pos+4;
      scl1 += 0.0032;
      scl2 -= 0.0032;
    e1.style.left = pos + 'px';
    e2.style.left = pos + 'px';
    e2.style.scale = scl1;
    e3.style.left = pos + 'px';
    e3.style.scale = scl2;
    }

  }
}
  
  
function passbar() {
    
  var e1 = document.getElementById("img1");
  var e2 = document.getElementById("img2");
  
  var e3 = document.getElementById("img3");
  
  var pos = 700;
  var scl1 = 1.55;
  var scl2 = 0.5;
  clearInterval(id);
  id = setInterval(frame, 2);
  function frame() {
    if (pos == 0){
    clearInterval(id);
    } else {
      pos=pos-4;
      scl1 -= 0.0032;
      scl2 += 0.0032;
    e1.style.left = pos + 'px';
    e2.style.left = pos + 'px';
    e1.style.scale = scl1;
    e3.style.left = pos + 'px';
    e2.style.scale = scl2;
    }
  
 
}}



function setcar(){
    var car1;
    var car2;
    var car3;
    if(carroatual == 0){
        car1 = "url(carro1.png)"
        car2 = "url(carro2.png)"
        car3 = "url(carro3.png)"
    }
     if(carroatual == 1){
        car1 = "url(carro2.png)"
        car2 = "url(carro3.png)"
        car3 = "url(carro4.webp)"
    }
     if(carroatual == 2){
        car1 = "url(carro3.png)"
        car2 = "url(carro4.webp)"
        car3 = "url(carro1.png)"
    }
    if(carroatual == 3){
        car1 = "url(carro4.webp)"
        car2 = "url(carro1.png)"
        car3 = "url(carro2.png)"
    }

    
    document.getElementById("img1").style.backgroundImage = car1;
    document.getElementById("img2").style.backgroundImage = car2;
    document.getElementById("img3").style.backgroundImage = car3;

    
    document.getElementById("barpass").style.backgroundImage = car1
    document.getElementById("barback").style.backgroundImage = car3
}

function changecar(carro){
  var carroimg = document.getElementById("carroshow")
  carroimg.style.backgroundImage =  carro
}

function pesquisa(){
  var nameshow = document.getElementById("name")
  var carrostring =  document.getElementById("carpesquisa").value
  var carropesquisado = carrostring.toLowerCase()

  nameshow.innerHTML = carropesquisado
  if (carropesquisado == "lamborgini"){
    changecar("url(carro1.png)")
  }
}
function found(){
  var lupa = document.getElementById("lupa")
  var carrostring =  document.getElementById("carpesquisa").value
  var carropesquisado = carrostring.toLowerCase()
  if (carropesquisado == "lamborgini"){
    lupa.classList.toggle("giralupa")
  }
}
var linguagem = 0
function changelg(){
  const lg = document.getElementById("linguagemslct")
  const l1 = document.querySelector(".lnk1")
  const l2 = document.querySelector(".lnk2")
  const l3 = document.querySelector(".lnk3")
  if(linguagem == 0){
    lg.style.backgroundImage = "url(Flag_of_the_United_States.svg.png)"
    linguagem = 1;
  }else if (linguagem == 1){
    lg.style.backgroundImage = "url(Flag_of_Brazil.svg.webp)"
    linguagem = 0;
  }

  if(linguagem==0){
    l1.innerHTML = "estoque"
    l2.innerHTML = "catálogo"
    l3.innerHTML = "reserva"
  }
  else{
    l1.innerHTML = "stock"
    l2.innerHTML = "catalog"
    l3.innerHTML = "reservation"
  }

}


  var darkmd = 0
function darkmode(){
  const balldm = document.getElementById("balldm")
  const darkspan = document.getElementById("darkmd")
  
  balldm.classList.toggle("balldark")
  if (darkmd == 0){
  balldm.style.backgroundColor = "rgb(255, 232, 206)"
  darkspan.style.backgroundColor = "rgba(0, 0, 0, 1)"
  darkmd = 1
  } else {
  balldm.style.backgroundColor = "rgba(0, 0, 0, 1)"
  darkspan.style.backgroundColor = "rgb(255, 232, 206)"
  darkmd = 0
  }
  
}

