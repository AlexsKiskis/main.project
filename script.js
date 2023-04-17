const formInsert = document.getElementById("form-insert-student");
formInsert.addEventListener("submit", (event)=>{
event.preventDefault();
let fornData = new FormData(formInsert);// сбор данных о пользователе из формы

let xhr = new XMLHttpRequest();
xhr.open("POST", "insertStudent.php");
xhr.send(fornData);

xhr.onload= () =>{
    console.log(xhr.response)
}
});