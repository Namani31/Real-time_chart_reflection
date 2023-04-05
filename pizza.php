<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/minty/bootstrap.min.css" integrity="sha384-H4X+4tKc7b8s4GoMrylmy2ssQYpDHoqzPa9aKXbDwPoPUA3Ra8PA5dGzijN+ePnH" crossorigin="anonymous">
	<title>피자 주문 페이지</title>
	<style>
		.text_center {
			text-align: center;
			padding: 100px 0;
		}
		div {
			background-color: #FFF8EA;
		}
		footer {
			background-color: #9E7676;
			color:white;
		}
	</style>
</head>
<body>
	<div class="text_center">
	<h2>Making Your Own Pizza</h2>
	<form action="pie.php" method="post">
        
		<label for="ingredient1">좋아하는 재료 1:</label>
		<input type="text" name="ingredient1" id="ingredient1"><br>

		<label for="percent1">좋아하는 정도 1:</label>
		<input type="number" name="percent1" id="percent1">%<br><br>

		<label for="ingredient2">좋아하는 재료 2:</label>
		<input type="text" name="ingredient2" id="ingredient2"><br>

		<label for="percent2">좋아하는 정도 2:</label>
		<input type="number" name="percent2" id="percent2">%<br><br>

		<label for="ingredient3">좋아하는 재료 3:</label>
		<input type="text" name="ingredient3" id="ingredient3"><br>

		<label for="percent3">좋아하는 정도 3:</label>
		<input type="number" name="percent3" id="percent3">%<br><br>

		<label for="ingredient4">좋아하는 재료 4:</label>
		<input type="text" name="ingredient4" id="ingredient4"><br>

		<label for="percent4">좋아하는 정도 4:</label>
		<input type="number" name="percent4" id="percent4">%<br><br>

		<label for="ingredient5">좋아하는 재료 5:</label>
		<input type="text" name="ingredient5" id="ingredient5"><br>

		<label for="percent5">좋아하는 정도 5:</label>
		<input type="number" name="percent5" id="percent5">%<br>

		<div class="btn-group-vertical">
  		<button type="submit" class="btn btn-primary">
			제출하기
		</button>
	</div>
	</form>
	<footer class="footer">
    <p>Copyright © 2023 Kim Yun Ji. All rights reserved.</p>
	</footer>
</body>
</html>