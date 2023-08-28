<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Audio Converter</title>
</head>
<body>
	<h1>Audio Converter</h1>
	<form action="/convert" method="POST" enctype="multipart/form-data">
		@csrf
		<input type="file" name="audio_file">
		<button type="submit">Convert to MP3</button>
	</form>	
</body>
</html>