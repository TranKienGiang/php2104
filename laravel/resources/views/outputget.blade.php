<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Input</title>
</head>
<body>
    <center><h1>Danh Sách Học Sinh</h1></center>
    <?php
        echo "<table><tr><th>Tên</th><th>Tuổi</th><th>Địa Chỉ</th></tr>";
        echo "<tr>
                <td>".$data['fname']."</td>
                <td>".$data['fage']."</td>
                <td>".$data['faddress']."</td>
            </tr>";
    ?>
    <style type="text/css">
        table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                height: 100px;
        }

        td, th {
                border: 1px solid green;
                text-align: left;
                padding: 8px;
                text-align: center;
        }

        tr:nth-child(even) {
                background-color: #dddddd;
        }
    </style>
</body>
</html>