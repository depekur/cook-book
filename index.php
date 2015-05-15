<?php  require('src/core/db.php'); ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Cook Book</title>

	<link rel="stylesheet" href="css/main.css" />

	<script src="src/bower_components/jquery/dist/jquery.js"></script>
	<script src="src/bower_components/angular/angular.js"></script>
	<script src="src/bower_components/angular-animate/angular-animate.js"></script>
	<script src="src/bower_components/angular-route/angular-route.js"></script>
	<script src="src/bower_components/angular-resource/angular-resource.js"></script>
</head>

<body>
	<header>

	<div class="">
		<h1>Cook Book</h1>

		<form class="chat-form" method="post" action="index.php">
	    	<!--<p>Имя <input name="name" placeholder="anon"></p>-->
	  		<textarea name="massage" cols="25" rows="6" required autofocus>
	     		</textarea>
	  		<input type="submit">
		</form>
<br><br>
		<button>Добавить свой рецепт</button>
		<button>Книга Рецептов</button>


		</div>
	</header>



<div class="wrapp">


	<aside class="sidebar">
		<form>
		Чего желаете откушать?<input type="text"><br>
			<input type="radio" name="№" value="ie"> завтраки<Br>
		   <input type="radio" name="№" value="opera"> обеды<Br>
		   <input type="radio" name="№" value="firefox"> ужины<Br>
		   <input type="text"><br>
		   <input type="checkbox">filter1<br>
		   <input type="checkbox">filter2<br>
		   <input type="text"><br>
		   <input type="checkbox">filter3<br>
		   <input type="checkbox">filter4<br>
		   <input type="checkbox"><br>
		   <input type="checkbox"><br>

		</form>
	</aside>

	<aside class="content">

<?php  require('src/views/loop.php'); ?>

	</aside>
</div>




<script type="text/javascript">
  var chat = document.getElementById("chat");
  chat.scrollTop = chat.scrollHeight;
</script>

</body>
</html>