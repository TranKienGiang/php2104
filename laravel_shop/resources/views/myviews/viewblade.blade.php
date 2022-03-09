<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	{{$name}};
	<h1>Laravel</h1>

	Hello, @{{ name }}.

	Hello, {!! $name !!}.

	@verbatim
    <div class="container">
        Hello, {{ name }}.
    </div>
@endverbatim
</body>
</html>