document.addEventListener("DOMContentLoaded",async function(){
    await renderAllComments();
    const btn = document.querySelector(".btn-send");
    console.log(btn);
    btn.addEventListener("click",function(){
        let data ={};
        let result = true;
        let message="";
        data.name = document.querySelector("input[name='name']").value;
        data.email = document.querySelector("input[name='email']").value;
        data.comment = document.querySelector("textarea[name='comment']").value;
        
        if(!data.name)
        {
            result=false;
            message+="Не заполнено имя. ";
        }

        if(!data.email)
        {
            result=false;
            message+=" Не заполнено email.";
        }
        
        if(!data.email.match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/))
        {
            result =false;
            message+="  Некорректный  email.";
        }

        if(!data.comment)
        {
            result=false;
            message+=" Не заполнен комментарий.";
        }

        if(result === false)
        {
            alert(message);
            return;
        }
        
         fetch('/ajax.php', {
            method: 'POST', 
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
            .then((response) => {
                console.log(response);
                return response.json();
            }).then((json)=>{
                console.log(json);
                if(json.result==="success"){
                    renderOneComment(data);
                    alert(json.message);
                }
                else
                {
                    alert("Ошибка сохранения данных! " + json.message);
                }
            });
    });
});
async function renderAllComments(){
    let response = await fetch('/fetch.php', {
            method: 'GET', 
            headers: {
                'Content-Type': 'application/json'
            },
        });
    let data =await response.json();
    //console.log(data);
    if(data.result==="success")
    {
        for(let index=0;index<data.data.length;index++)
        {
            renderOneComment(data.data[index]);
        }
    }
    else
    {
        alert("Ошибка загрузки данных! "+data.message);
    }
}
function renderOneComment(data){
    let html = `<div class="name">`
                        +data.name+`
                        </div>
                        <div class="email">`
                            + data.email + `
                        </div>
                        <div class="comment">
                        `+ data.comment+
                         `</div>`;
    let div = document.createElement('div');
    div.className = "card";
    div.innerHTML = html;
    const content = document.querySelector(".content");
    content.append(div);
}