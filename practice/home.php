<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>home</title>
</head>
<body>
	<?php
		$x = 12;
		$y = 3;
		$sum = $x + $y;
		echo "$x + $y = $sum";

	?>
	<br>
	<?php
		$x1 = 2;
		$y1 = 3;
		$sums = $x1-=$y1;
		echo $sums;
		var_dump($x == $y);
		var_dump($x===$y);
		var_dump($x!=$y);
		var_dump($x<>$y);
		var_dump($x!==$y);
		var_dump($x>$y);
		var_dump($x<$y);
		var_dump($x<=$y);
		var_dump($x>=$y);
		var_dump($x<=>$y);


	?>
	<br>
	<?php
		$x = 6;
		echo ++$x;
		$y = 7;
		echo $y++;
		$x1 = 6;
		echo --$x1;
		$y1 = 6;
		echo $y1--;
		var_dump($x&&$y);
	?>
	<br>
	<?php
		$q  = "hi";
		$p = "hi";
		if($q && $p){
			echo "welcome";
		}
		else{
			echo "not welcome";
		}

	?>
	<br>
	<?php
		$a = "apple";
		$b = "  mango";
		echo $a.$b;
		$a.=$b;
		echo $a;


	?>
	<br>
	<?php
		$x = 3;
		if($x > 2)$b = "hello";
		echo $b;

	?>
	<br>
	<?php

		$h = 10;
		$y = $h > 12 ? "hi":"hello";
		echo $y;
	?>
	<br>
	<?php
		$t = 5;
		if($t>2){
			echo "greater than 2";
			if($t>10){
				echo "it is above 10 too";
			}
				else{
					echo " and it is below 20";
				}
			}
		

	?>
	<br>
	<?php
		$pw = "sam";
		if($pw == "sam"){
			echo "correct password";
			if($pw != "sam"){
				echo "incorrect password";
			}
			else{
				echo "also correct";
			}
		}
		

	?>
	<br>
	<?php
		$favcolor = "black";
		switch ($favcolor) {
			case 'red':
				echo "favcolor is red";
				break;
			case 'black':
				echo "fav color is black";
				break;
			default:
				echo "no fav color";
				break;
		}

	?>
	<br>
	<?php
		$x = 1;
		while ($x<5) {
			$x++;
			if($x==3)continue;
			echo $x;
			
		}

	?>
	<br>
	<?php
		$i = 1;
		while($i<5):
			echo "$i";
			$i++;
		endwhile;
	?>
	<br>
	<?php
		$i = 0;
		while($i<100){
			$i+=10;
			echo "$i<br>";

		}

	?>
	<br>
	<?php

		$i = 3;
		do {
			echo "$i<br>";
			$i++;
		} while ($i<5);

		$j = 1;
		do{
			if($j == 3) break;
			echo "$j<br>";
			$j++;
		}while($j<5);

		$k = 0;
		do{
			$k++;
			if($k==2)continue;
			echo "$k<br>";
		}while($k<4);

		$f = 0;
		while ($f<4) {
			$f++;
			if($f==3)continue;
			echo $f;
		}
	?>
	<br>
	<?php

		for($i=0;$i<=10;$i++){
			echo "number is $i<br>";
		}

		for($j = 0;$j<=10;$j++){
			if($j==5)break;
			echo "$j<br>";
		}

		for($k = 0;$k<10;$k++){
			if($k==3)continue;
			echo "$k<br>";
		}

		for($a=0;$a<=100;$a+=20){
			echo"$a<br>";
		}
	?>
	<br>
	<?php
		$colors = array("john"=>"blue","sam"=>"red","peter"=>"green");
		foreach($colors as $x=>$y){
			echo "$x:$y<br>";
		}

		$fruits = array("apple","mango","banana");
		foreach($fruits as &$x){
			if($x == "mango")$x = "grapes";

		}
		var_dump($fruits);

	?>
	<br>
	<h1>function</h1>
	<?php
		function person($name,$year){
			echo "$name born in $year<br>";
		}
		person("ying","2002");
		person("sam","2004");
		person("peter","2001");

		function sum($x,$y){
			$z = $x + $y;
			return $z;
		}
		echo "5 + 3 =" .sum(5,3)."<br>" ;
		echo "5 + 5 =" .sum(5,5)."<br>" ;
		echo "5 + 6 =" .sum(5,6)."<br>";

		function mul($x1,$y1){
			$z1 = $x1 * $y1;
			return $z1;
		}
		echo "2 * 2 = ".mul(2,2)."<br>";
		echo "3 * 3 = ".mul(3,3)."<br>";


	?>
	<br>
	<?php
		function name($last,...$first){
			$txt = " ";
			$len = count($first);
			for($i=0;$i<$len;$i++){

				$txt = $txt."Hi,$first[$i]$last.<br>";
			}
			return $txt;
		}
		$a = name("kikon","george  ","kun  ");
		echo $a;


	?>


</body>
</html>