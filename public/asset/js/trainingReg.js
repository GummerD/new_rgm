
const textInput = document.getElementById('sourceText');
const regexInput = document.getElementById('regexTraining');
const block = document.getElementById('inputResult');

btn_training_apply.onclick = function() {
   
    if (regexInput.value.length === 0){
        return
    }  
    let text = textInput.value;
    let reg = regexInput.value;
   
    applyRegex(text, reg);   
}


function applyRegex(text, reg){
    
    let result = text.match(reg)
    console.log(result);
    renderResult(result);
}


function renderResult(result){
    if(result!==null){
        block.innerHTML =       
            `<p class="result" >           
                ${result}
            </p>`
    } else {
        block.innerHTML = 
            `<p class="result">           
                Совпадений не найдено!
            </p>`
        }     
}
