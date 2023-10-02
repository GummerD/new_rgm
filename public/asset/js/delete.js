{/* <script type="text/javascript"> */}

document.addEventListener('DOMContentLoaded', function() {
    let elements = document.querySelectorAll(".delete");
    elements.forEach( function (element, key) {
        element.addEventListener('click', function(){
            const id = this.getAttribute("rel");
            const url = this.getAttribute("value");
            console.log(id);
            if(confirm(`Вы действительно хотите удалить записи с ID: ${id}???`)){
                send(`/${url}/${id}`).then(()=>{                            
                    location.reload();
                });                
            } else {
                alert ("Удаление отменено!");
            }
        })  
    });
});

async function send(url){
    console.log(url);
    let response =  await fetch(url, {
        method: "DELETE",
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute("content")
    }                
    });
    let result = await response.json();
    return result.OK;
}

// </script>