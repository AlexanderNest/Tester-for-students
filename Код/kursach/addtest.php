<!DOCTYPE html>
<html>
  <head>
    <link href="main.css" rel="stylesheet">
    <link rel="icon"type="image/png" href="icon.png">
    <title>Введите данные теста</title>
    <meta charset="utf-8">
	
	<style>
			a, textarea, input {
  text-decoration: none;
  outline: none;
  display: inline-block;
  padding: 20px 30px;
  margin: 10px 20px;
  position: relative;
  color: white;
  border: 1px solid rgba(255,255,255,.4);
  background: none;
  font-weight: 300;
  font-family: 'Montserrat', sans-serif;
  text-transform: uppercase;
  letter-spacing: 2px;
}
a:before,
a:after {
  content: "";
  position: absolute;
  width: 0;
  height: 0;
  opacity: 0;
  box-sizing: border-box;
}
a:before {
  bottom: 0;
  left: 0;
  border-left: 1px solid white;
  border-top: 1px solid white;
  transition: 0s ease opacity .8s, .2s ease width .4s, .2s ease height .6s;
}
a:after {
  top: 0;
  right: 0;
  border-right: 1px solid white;
  border-bottom: 1px solid white;
  transition: 0s ease opacity .4s, .2s ease width , .2s ease height .2s;
}
a:hover:before,
a:hover:after{
  height: 100%;
  width: 100%;
  opacity: 1;
}
a:hover:before {transition: 0s ease opacity 0s, .2s ease height, .2s ease width .2s;}
a:hover:after {transition: 0s ease opacity .4s, .2s ease height .4s , .2s ease width .6s;}
a:hover {background: rgba(255,255,255,.2);}

 body{
	 font-weight: 300;
  font-family: 'Montserrat', sans-serif;
  color: white;
 }
	</style>
  </head>
  <body  style="background: linear-gradient(to right, #000000, #434343); ">
    <h2>Введите вопросы:</h2>
    <p> 
    	Вводите вопросы в следующем формате <br>
    	Тут необходмо ввести вопрос? первый ответ, второй ответ, третий ответ, четвертый ответ <br>
    	Вариант правильного ответа записывается после всех вариантов ответа <br>
    	Каждый вопрос отделяется друг от друга ;
    	
    	Пример правильного добавления вопросов:<br>
    	----------------------------------------------- <br>
    	Какое расстояние от Юпитера до Марса? 343млн.км 486млн.км 6км 1234км 486млн.км; <br>
    	Какой государственный язык в Российской Федерации? португальский русский японский азербайджанский русский <br>
    	-----------------------------------------------
    </p>
    <form action="uploadtest.php" method="POST">
      <p> <input type="text" placeholder="Название блока вопросов" name="name" style="width: 600px; text-align: center;"></p>
      <p><textarea name="test" placeholder="Форма для ввода вопроса" style= "width: 600px; height: 700px" ></textarea></p>
      <input type="submit"  value="Добавить">
      <a href="admin.php">Назад</a>
    </form>
    62-48? 12 37 37 14 14;
97*92? -89 8924 -44 -84 8924;
1-37? -36 21 59 69 -36;
58/32? 37 1.8 -36 -23 1.8;
45-23? 22 -97 76 -65 22;
68+87? 22 -29 155 -3 155;
98+35? 96 74 -45 133 133;
33+12? -27 -91 45 41 45;
40/58? 28 0.7 -22 -17 0.7;
4-71? -18 32 -67 68 -67;
36-45? -57 -25 -30 -9 -9;
66+13? 79 37 -78 44 79;
9*45? 38 405 18 92 405;
9*73? -98 2 83 657 657;
90*20? -51 -61 -78 1800 1800;
64-50? -90 14 -99 -32 14;
7*85? 58 595 46 -81 595;
47+70? 117 -13 15 -84 117;
23/65? 5 13 0.4 -57 0.4;
62+91? -45 57 -48 153 153;
  </body>
</html>