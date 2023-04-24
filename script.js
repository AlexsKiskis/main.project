const formInsert = document.getElementById("form-insert-student");
const msg = document.querySelector(".message");
const content = document.querySelector(".content");
formInsert.addEventListener("submit", (event)=>{
event.preventDefault();
let formData = new FormData(formInsert);// сбор данных о пользователе из формы

let xhr = new XMLHttpRequest();
xhr.open("POST", "insertStudent.php");
xhr.send(formData);

xhr.onload = () =>{
    if(xhr.response == "Ok"){
    msg.innerHTML="Студент добавлен!";
    msg.classList.add("success");
    msg.classList.add("show-message");
    
    //отправка данных через форму
    
    
    
    let div = document.createElement("div");
   
    


    let fname = formData.get("fname");
    let lname = formData.get("lname");   
    let gender = formData.get("gender");
    let age = formData.get("age");

    div.innerHTML = `${fname}, ${lname}, ${gender}, ${age}`;
    
    content.append(div);
    }



    else {  
    msg.innerHTML="Ошибка";
    msg.classList.add("reject");
    msg.classList.add("show-message");
    }
    }
});

//отправка данных без формы метод - get
//лайки у студентов
//http://callbackhell.ru/



const btnLike = document.querySelectorAll(".like");
for(btn of btnLike){
    btn.addEventListener('click', setLike)
    }

    function setLike(str1,str2){
    return function (event){
        let idStudent = event.target.closest(".student").dataset.id
        console.log(idStudent);

        let xhr = new XMLHttpRequest();
        xhr.open("GET", "api/setLike.php?id=" +idStudent);
        xhr.onload = function(){
            if(xhr.response=="Ok"){
            let num = +event.target.closest(".student").querySelector(".num-like").textContent;
            event.target.closest(".student").querySelector(".num-like").innerHTML = num +1;
            console.log(str1);
        }
        else console,log(str2);
      
    }
    xhr.send();
}
}

for(btn of btnLike){
    btn.addEventListener("click", setLike("Успех", "Ошибка"));
}


//пример промисов
function getrandomInt(max){ //генерация случайного числа
    return Math.floor(Math.random()*max);
}

const myPromise = new Promise((resolve,reject)=>{
    
    console.log("obeshay");
    let num;

    setTimeout(()=>{
        num = getrandomInt(10);
        console.log(num);
        if(num >4 ){
            resolve(num);
        }
        else{
            reject("Bad < 5")
        }
    }, 1000);

}); 

myPromise.then(
    (result)=>{
        console.log(result);
        result++;
        console.log(result);
        return result;
    }
)
.then((result)=> {console.log(result*2)})
.catch(
    (result)=>{
        console.log(result)
    }
    ).finally(
        ()=>{
            console.log("end promisa")}
    )