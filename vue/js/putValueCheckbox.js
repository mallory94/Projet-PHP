var btns = document.querySelectorAll('.quiz>.btn');
 
console.log(btns.item(1));


for(var i=0;i<btns.length;i++) {
        btns.item(i).onclick = putValue;
}

function putValue(){
    var $this = $(this)
    var value = $this.find("input")[0].value;
    console.log($this.find("input"));
    console.log(value);
    console.log("rentre dans la fonction");
    if (this.classList.contains('active')) {
        console.log("rentre dans la partie if");
        
        $this.find("input")[0].value = "";
    }
    else {
        console.log("rentre dans la partie else");
        $input = $this.children("input")[0];
        $input.value = $input.id;          
        console.log($this.find("input").value);
    }
}