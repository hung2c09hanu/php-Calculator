<!DOCTYPE html>
	<?php 
	/*
	*@Author: hung2c09hanu
	*Version 1.0: 20120915
	*Description : This is basic calculator, use postfix to calculate the expression
	*/
	include('Helper.php');
	?>
<html>
<head>

<link rel="stylesheet" href="ui-themes/smoothness/jquery-ui-1.8.11.custom.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />

<script src="jquery.js"></script>
<script src="js/script.js"></script>
<script src="jquery-ui-1.8.11.custom.min.js"></script>
	<?php 
	$input = array();
	$formContent = "";
	$number="";
	$helper = new Helper();
	if(isset($_POST['console'])){
	
		if((strlen($_POST['console']) <=2)){
		?>
		<script language="javascript">alert("You should enter at least two number and one operator");</script>
		<?
		}
		
		else if((strlen($_POST['console']) >= 3) ){
		
		$formContent = $_POST['console'];
		$lastChar = substr($formContent,-1);
	
		if(isOperation($lastChar)){
		
		$formContent = substr($formContent,0,strlen($formContent)-1);
	
		}
		
	
		for($i = 0; $i < strlen($formContent);$i++){
		
			if(!isOperation($formContent[$i])){
			
			$number.=$formContent[$i];
			
			if($i == (strlen($formContent)-1))
			array_push($input,$number);
			
			
			}
			else{
			
				if($i!=0){
				array_push($input,$formContent[$i]);
				}
				
				if($number != ""){
					array_push($input,$number);
					$number="";
				}
				
				
					
		
			}
		}
			
			
				for($i = 0; $i < count($input);$i++){
				
				if($input[$i]=="/" && $i < strlen($formContent)-1){
				
					if($input[$i+1]==0){
				?>
					<script language="javascript">alert("Can not devided by zero");</script>
				<?php
				
					}
				
				}
				$helper->process($input[$i]);
				
				}
				while(count($helper->stack)){
				array_push($helper->rpn,array_pop($helper->stack));
				}
				
	}
	}

	
	function isOperation($inputChar){
		return ($inputChar == '*' || $inputChar =='/' || $inputChar == '+' || $inputChar == '-');
	}
	
	?>

<h1 class="head">Calculator designed by Nguyen Van Hung</h1>

<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	</script>
	
</head>

<body>

<div class="container">

<div id="tabs" class="calculator">

<ul>
		<li><a href="#tabs-1">Tool</a></li>
		<li><a href="#tabs-2">Help</a></li>
		<li><a href="#tabs-3">Contact</a></li>
</ul>
	
<div  id="tabs-1">
<form name="cal" method="POST" action="index.php">
				<!-- Display screen -->
				<div id="screen">
					<textarea name="console"><?php 
					echo $helper->getResult();?></textarea>
				</div>
				<!-- Digital Keyboard -->
				<div id="keyboard">
					<table>
					
						<tr>
							<td><input type="button" name="btn1" value="1" onClick="Insert('1')" class="button"/></td>
							<td><input type="button" name="btn2" value="2" onClick="Insert('2')" class="button"/></td>
							<td><input type="button" name="btn3" value="3" onClick="Insert('3')" class="button"/></td>
							<td><input type="button" name="btnAdd" value="+" onClick="Insert('+')" class="button"/></td>
							<td rowspan="2">
								<input type="submit" name="submit" value="OK" id="submit" style="height:100%"/>
								<input type="hidden" name="flag"/>
							</td>
						</tr>
						<tr>
							<td><input type="button" name="btn4" value="4" onClick="Insert('4')" class="button"/></td>
							<td><input type="button" name="btn5" value="5" onClick="Insert('5')" class="button"/></td>
							<td><input type="button" name="btn6" value="6" onClick="Insert('6')" class="button"/></td>
							<td><input type="button" name="btnSub" value="-" onClick="Insert('-')" class="button"/></td>
						</tr>
						<tr>
							<td><input type="button" name="btn7" value="7" onClick="Insert('7')" class="button"/></td>
							<td><input type="button" name="btn8" value="8" onClick="Insert('8')" class="button"/></td>
							<td><input type="button" name="btn9" value="9" onClick="Insert('9')" class="button"/></td>
							<td><input type="button" name="btnSub" value="*" onClick="Insert('*')" class="button"/></td>
							<td><input type="button" name="btnClear" value="Clear" onClick="clearAll()" id="clear"/></td>
						</tr>
						<tr>
							<td colspan="2"><input type="button" name="btn0" value="0" onClick="Insert('0')" class="button" style="width: 100%"/></td>
							<td><input type="button" name="btnSub" value="." onClick="Insert('.')" class="button"/></td>
							<td><input type="button" name="btnSub" value="/" onClick="Insert('/')" class="button"/></td>
							<td><input type="button" name="btnDel" value="DEL" onClick="Delete()" id="del"/></td>
						</tr>
					</table>
				</div>
			</form>

</form>
</div>
<div id="tabs-2">
		<p>This tool is very basic calculator. It works well for follow criterias</p>
		<ul>
		<li>Positive number only.</li>
		<li>Valid set of numbers and operators.</li>
		</ul>
		<p>This tool is only for learning purpose. So any questions about this, please see Contact sections to help me improve this tools. Thanks</p>
	</div>
	<div id="tabs-3">
		<table>
		<thead>
		<th>Name: </th><th>Hung Nguyen (Mr)</th>
		</thead>
		<tbody>
		<tr><td>Phone:</td><td> +84 1676286400</td></tr>
		<tr><td>Email:</td><td> hung2c09hanu@gmail.com</td></tr>
		<tr><td>Y!M:</td><td> luckystar_x91</td></tr>
		<tr><td>GTalk:</td><td> hung2c09hanu</td></tr>
		<tr><td>Skype:</td><td> hung2c09hanu</td></tr>
		</tbody>
		</table>
	
	</div>

</div>


</div>

</body>
</html>