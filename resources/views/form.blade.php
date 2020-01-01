<!DOCTYPE html>
<html>
<head>
	<title>laravel模板</title>
</head>
<body>
	{{$hello}}
	<form action="one" method="post">
		{{ csrf_field() }}
		<input type="submit" value="提交">
	</form>
	<form action="mkl" method="post">
		{{ csrf_field() }}
		<input type="submit" name="提交">
	</form>
</body>
</html>