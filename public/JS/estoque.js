const container = document.querySelector(".container");
const imgcar = document.querySelector(".carimg");
const busca = document.querySelector(".buscainput");
const buscascarmodelo = document.querySelector(".buscarmodelo");

const estoque=[
    {car:"amarok", i: 31},
    {car:"x4", i: 31},
    {car:"mercedesa180", i: 32},
    {car:"civic", i: 31},
    {car:"fiat500", i: 29},
    {car:"honda-hr-v", i: 32},
    {car:"polo", i: 31},


    {car: "fim"}
];

let max = 31;
let currentImage = 1;
var currentcar = "amarok"
function changecar(){
    var existe = false;
    var search = buscascarmodelo.value.toLowerCase()
    estoque.forEach(car => {
        if(car.car == search){
            console.log("O carro existe");
            currentcar = search;
            imgcar.src = `./${currentcar}/${currentImage}.webp`;
            existe=true;
            max = car.i
        }
        if(car.car == "fim" && existe==false){
            console.log("O carro não existe")
        }
    });
}

function changecar2(){
    var existe = false;
    var search = item.innerText.toLowerCase()
    estoque.forEach(car => {
        if(car.car == search){
            console.log("O carro existe");
            currentcar = search;
            imgcar.src = `./${currentcar}/${currentImage}.webp`;
            existe=true;
            max = car.i
        }
        if(car.car == "fim" && existe==false){
            console.log("O carro não existe")
        }
    });
}


const cursor = {
    isDragging: false,
    initialPosition: 0,
};

const updateimg = (direction) =>{
    

    if(direction >0){
        if(currentImage==max){
            currentImage=1
        }else{
            currentImage++
        }
    }else{
       if(currentImage==1){
            currentImage=max
        }else{
            currentImage--
        }
    }

    imgcar.src = `./${currentcar}/${currentImage}.webp`
}


container.addEventListener("mousedown", (event) => {
    cursor.isDragging = true;
    cursor.initialPosition = event.clientX;
});

container.addEventListener("mouseup", () => {
    cursor.isDragging = false;
});

container.addEventListener("mousemove", ({clientX}) => {
    if(!cursor.isDragging) return;

    const offset = cursor.initialPosition-clientX



    if(Math.abs(offset) >= 20 ){
        updateimg(offset)
        cursor.initialPosition = clientX;
    };
});


let contador = 1;

    function addc() {
      let grid = document.getElementById("bottondiv");
        
      let num = Math.floor(Math.random() * (6 - 1 + 1)) + 1;
      // cria um elemento novo
      let img = document.createElement("img");
      let item = document.createElement("section");
      item.innerText = estoque[num].car;

      // joga na grid
      grid.appendChild(item);
      item.appendChild(img);
      img.src = `./${estoque[num].car}/1.webp`;
      item.classList.add("item");
      img.classList.add("imgitem");
      item.addEventListener("click", function( ){
        var existe = false;
    var search = item.innerText.toLowerCase()
    estoque.forEach(car => {
        if(car.car == search){
            console.log("O carro existe");
            currentcar = search;
            imgcar.src = `./${currentcar}/${currentImage}.webp`;
            existe=true;
            max = car.i
        }
        if(car.car == "fim" && existe==false){
            console.log("O carro não existe")
        }
    });
      })

    }
