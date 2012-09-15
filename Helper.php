<?php 
/*
	*@Author: hung2c09hanu
	*Version 1.0: 20120915
	*Description : This is basic calculator, use postfix to calculate the expression
	*/
class Helper{

public $stack = array();
public $rpn = array();
public $resultStack = array();
public $result = 0;

function getResult(){
$count = count($this->rpn);
for($i=0;$i<$count;$i++){
$val = $this->rpn[$i];
if(!$this->isOperation($val)){
array_push($this->resultStack,$val);
}
else{
$a = array_pop($this->resultStack);
$b = array_pop($this->resultStack);
switch($val){
case '+':
$this->result = $this->add($a,$b);
array_push($this->resultStack,$this->result);
break;

case '/':
$this->result = $this->divide($a,$b);
array_push($this->resultStack,$this->result);
break;

case '*':
$this->result = $this->multiply($a,$b);
array_push($this->resultStack,$this->result);
break;

case '-':
$this->result = $this->subtract($a,$b);
array_push($this->resultStack,$this->result);
break;

default:
break;

}
}
}
return $this->result;
}
function isOperation($inputChar){
		return ($inputChar == '*' || $inputChar =='/' || $inputChar == '+' || $inputChar == '-');
	}

function priority($ch){

switch($ch){

case '*':
case '/': return 2;

case '+': 
case '-': return 1;

case '(': return 0;
}

}
function getTop(){
return $this->stack[count($this->stack)-1];
}
function process($ch){

switch($ch){

case '(':
array_push($this->stack,$ch);
break;

case ')':
while(($x = array_pop($this->stack)) != '(' ){
if($x != ')')
array_push($rpn,$x);
}
break;

case '+':
case '-':
case '*':
case '/':

while( count($this->stack) && $this->priority($ch) < $this->priority($this->getTop()) )
array_push($this->rpn,array_pop($this->stack));

array_push($this->stack,$ch);

break;

default:
array_push($this->rpn,$ch);

break;

}
}


public function add($a,$b){

return ($a+$b)
;
}

public function subtract($a, $b){

return ($b-$a);

}

public function multiply($a,$b){

return ($a*$b);

}
public function divide($a, $b){

if($a==0)
return 0;
else
return ($b/$a);

}
}
?>