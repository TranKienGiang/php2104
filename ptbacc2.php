<!DOCTYPE html>
<html>
    <head>
        <title>Giải phương trình bậc hai</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>
    	input[type="text"] {
    		margin: 10px;
		}

		input[type="submit"]:hover {
		    cursor: pointer;
		}
		input[type="text"]:hover {
		    color: red;
		}
    </style>
    <body>
        <?php 
            $result = '';
			if (isset($_POST['calculate'])){
				// Bước 1: Lấy tham số
				$a = isset($_POST['a']) ? $_POST['a'] : '';
				$b = isset($_POST['b']) ? $_POST['b'] : '';
				$c = isset($_POST['c']) ? $_POST['c'] : '';
			 
				// Bước 2: Validate và tính toán
				$delta = ($b*$b) - (4*$a*$c);
			 	if ($a==0 && $b==0 && $c==0){
					$result = 'Phương trình có vô số nghiệm' ;
				}
				else if ($delta < 0){
					$result = 'Phương trình vô nghiệp';
				}
				else if ($delta == 0){
					$result = 'Phương trình nghiệp kép x1 = x2 = ' . (-$b/2*$a);
				}
				else {
					$result = 'Phương trình có hai nghiệp phân biệt, x1 = ' . ((-$b + sqrt($delta))/2*$a);
					$result .= ',x2 = ' . ((-$b - sqrt($delta))/2*$a);
				}
			}
        ?>
        <h1>Giải phương trình bậc hai</h1>
        <form method="post" action="">
        	<p>Phương Trình Có Dạng : ax^2 +bx +c = 0</p>
            Nhập a <input type="text" placeholder="nhập hệ số a" style="width: 100px" name="a" value=""/></input><br>
            Nhập b <input type="text" placeholder="nhập hệ số b" style="width: 100px" name="b" value=""/></input><br>
            Nhập c <input type="text" placeholder="nhập hệ số c" style="width: 100px" name="c" value=""/></input>
            <br/><br/>
            <input type="submit" name="calculate" value="Tính" />
        </form>
        <?php echo $result; ?>
    </body>
</html>
