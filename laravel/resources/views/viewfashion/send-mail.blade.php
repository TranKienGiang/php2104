<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Shop</title>
</head>
<body>
    <style type="text/css">
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
          height: 100px;
        }

        h2:first-letter {
            text-transform: capitalize;
        }

        td, th {
          border: 1px solid green;
          text-align: left;
          padding: 8px;
          text-align: center;
        }

        body {
            countercounter-reset: number;
        }
        td.stt:before {
            countercounter-increment: number;
            content: "counter(number) ";
        }
        tr:nth-child(even) {
            background-color: #dddddd;
        }
        span#text-info{
            display: none;
        }
</style>
<h2>Xin Chào {{$order->name}} !</h2>
<h4>Bạn Đã Đặt Hàng Thành Công 1 Đơn Từ Rosé Shop !</h4>
<table table border="1" cellpadding="0" cellspacing="0">
    <tr>
        <th> STT </th>
        <th> Tên Sản Phẩm </th>
        <th> Số Lượng </th>
        <th> Đơn Giá </th>
        <th> Giảm Giá </th>
        <th> Thành Tiền </th>
    </tr>

    @foreach ($order->products as $product)
    <tr>
         <td class="stt">1</td>
         <td>{{ $product->product_name }}</td>
         <td>{{ $productData[$product->id] }}</td>
         <td>{{ $product->price }} $</td>
         <td>{{ $product->sale_off }} %</td>
         <td>{{ $product->price * $productData[$product->id] * ((100 - $product->sale_off) / 100) }}</td>
    <tr>
    @endforeach

</table>
@foreach ($order->products as $product)
<p style= "display:none">
    {{$total += $product->price * $productData[$product->id] * ((100 - $product->sale_off) / 100) }}
</p>
@endforeach
<h2>Tổng Tiền : {{$total}} $</h2>
<p>----------------------------------------------------</p>
<span>Chúng Tôi Sẽ Sớm Giao Hàng Cho Bạn !!!</span><br><br>
<span>Cảm Ơn Bạn Đã Tin Tưởng Rosé Shop !</span>
</body>
</html>