
function Insert(a){
	var current = document.cal.console.value;
	if(isOperation(a)){
	var lastChar = current.substr(current.length-1,current.length);
	
	if(isOperation(lastChar))//avoid to add operation two times
	return ;
	
	}
	
	current += a;
	document.cal.console.value = current;
}
function Delete(){
	var current = document.cal.console.value;
	current = current.substr(0, current.length - 1);
	document.cal.console.value = current;
}
function clearAll(){

	document.cal.console.value = "";
}


function isOperation(inputChar){
return (inputChar == "*" || inputChar =="/" || inputChar == "+" || inputChar == "-");
}