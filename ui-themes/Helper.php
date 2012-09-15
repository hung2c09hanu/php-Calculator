
<?php

class Helper{
public function test(){

echo $this->add(2,3);
echo "<br/>";

echo $this->multiply(2,3);
echo "<br/>";

echo $this->subtract(2,3);
echo "<br/>";
echo $this->divide(2,0);
echo "<br/>";
echo $this->divide(4,1);
echo "<br/>";


}

public function add($a,$b){

return ($a+$b)
;
}

public function subtract($a, $b){

return ($a-$b);

}

public function multiply($a,$b){

return ($a*$b);

}
public function divide($a, $b){

if($b==0)
return "Can not divide by 0";
else
return ($a/$b);

}


}
?>