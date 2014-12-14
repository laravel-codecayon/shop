<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Hello Admin , </h2>
		<p> You have new contact mail from  </p>
		<p>
			Email : {{ $email }} <br />
			Name : {{ $name }}<br />
			Password : {{ $subject }}<br />
		</p>
		<p> Message : </p>
		<div>
			{{ $content }}
		</div>
		
		<p> Thank You </p><br /><br />
		
		{{ CNF_APPNAME }} 
	</body>
</html>