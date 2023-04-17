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