<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	Hình Dạng 1 :
	<?php 
		for ($i=0; $i<=10; $i++) { 
			for ($j=0; $j<$i; $j++) { 
				echo '*'; 
			} echo '<br>'; 
		}
	?>
	Hình Dạng 2 :
	<br>
	<br>

	<?php 
		for ($i=0; $i<=10; $i++) { 
			for ($j=10; $j>$i; $j--) { 
				echo '*'; 
			} echo '<br>'; 
		}
	?>
	<br>
	<br>
	Hình Dạng 3 :
	 <br>
	 <br>

	<?php 
		for ($i = 0; $i <= 10; $i++) {
        	for ($j = 0; $j <=  10; $j++) {
            	if ($j <= 10 - $i) {
                	echo "&nbsp&nbsp";
            	}
            	else {
                	echo "*";
            	}
        	}
        	echo "<br>";
    	}
    
	?>
	<br>
	<br>
	Hình Dạng 4 :
	<br>
	<br>

	<?php 
		for ($i = 10; $i >= 0; $i--) {
	        for ($j = 0; $j <=  10; $j++) {
	            if ($j <= 10 - $i) {
	                echo "&nbsp&nbsp";
	            }
	            else {
	                echo "*";
	            }
	        }
        		echo "<br>";
    	}

	?>
	<br>
	<br>
	Hình Dạng 5 :
	<br>
	<br>
		
	<?php 
		for ($i = 1; $i <= 10; $i++) {
	        for ($j = $i; $j < 10; $j++) {
	            echo "&nbsp&nbsp";
	        }
	        for ($j = 1; $j <= (2 * $i - 1); $j++) {
	            echo "*";
	        }

        		echo "<br>";
    	}
	?>
	<br>
	<br>
	Hình Dạng 6 :
	<br>
	<br>
		
	<?php 
		$row = 10;
		    for ($i = 1; $i <= $row; $i++) {
		        for ($j = 1; $j < $i; $j++) {
		            echo "&nbsp&nbsp";
		        }
		        for ($j = 1; $j <= ($row * 2 - (2 * $i - 1)); $j++) {
		            echo "*";
		        }

		        echo "<br>";
		    }
	?>
</body>
</html>

	
