const formAuth = document.getElementById('form-fetch');
const output = document.querySelector('.profile');

async function auth(event){
    event.preventDefault();//отменяем отправку формы
    let data = new FormData(formAuth);//собираем данные

    const response = await fetch("api/auth.php",{
        method: 'POST',
        'Content-Type':'application/json',
        body: data
    }).
    then(
        (response)=>{
        return response.text();
    })

    then(
        (text) => {
            cpnsole.log(text);
            if(text){
            output.innerHTML = "Вы авторизованы как" + json.name;
            formAuth.style.display = "none";
            }

        else{
            let p = document.createElement("p");
            p.innerHTML = "Ошибка авторизации";
            output.prepend(p);
        }
    }
    )
}
