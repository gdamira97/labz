<html>
<head>
	<style>
.im{ 
margin-left: auto;
margin-right: auto;
width: 700px;
height: 150px;
background-color: red;
margin-top: 30px;
box-shadow: 0 0 10px rgba(0,0,0,0.5);
} 
.im .image{ 
  width: 200px; 
  height: 100px;
  margin-top: 25;
  margin-left: 25;
} 
.im .image:hover{ 
  opacity: 0.9;
  cursor: pointer;
} 
.imstarred{ 
margin-left: auto;
margin-right: auto;
width: 700px;
height: 150px;
background-image: url("Starsinthesky.jpg");
margin-top: 30px;
box-shadow: 0 0 10px rgba(0,0,0,0.5);
color: white;
} 
.imstarred a{
  color: yellow;
}
.imstarred .image{ 
  width: 200px; 
  height: 100px;
  margin-top: 25;
  margin-left: 25;
} 
.imstarred .image:hover{ 
  opacity: 0.9;
  cursor: pointer;
} 
.inf{
  float: right;
  width: 450;
  margin-top: 10;
}
.title{
  font-size: 28;
  display: inline;
}
.price{
  display: inline;
  float: right;
  font-size: 20;
  margin-right: 10;
}
	</style>
</head>
<body>
<?php
mysql_connect("localhost","root","");
mysql_select_db("cook");
$query = "SELECT * FROM cars ORDER BY id";
$result = mysql_query($query);
$num = mysql_num_rows($result);
for ($i=0; $i<$num; $i++){
	$row = mysql_fetch_array($result);
?>
  <div class="im"> 
          <img src="http://media.caranddriver.com/images/media/51/dissected-lotus-based-infiniti-emerg-e-sports-car-concept-top-image-photo-451994-s-original.jpg" class="image"> 
          <div class="inf">
            <div class="title"><?= $row["name"] ?></div>
            <div class="price"><?= $row["price"] ?></div></br>
            <a href="star.php?id=<?= $row['id']?>" class="star">Star</a>
          </div>        
        </div>
        <?php
      if(isset($_COOKIE['star'])){
        ?>
  <div class="im"> 
          <img src="http://media.caranddriver.com/images/media/51/dissected-lotus-based-infiniti-emerg-e-sports-car-concept-top-image-photo-451994-s-original.jpg" class="image"> 
          <div class="inf">
            <div class="title"><?= $row["name"] ?></div>
            <div class="price"><?= $row["price"] ?></div></br>
            <a href="star.php?id=<?= $row['id']?>" class="star">Star</a>
          </div>        
        </div>
        <?php
      }
      else{
        ?>
  <div class="im"> 
          <img src="http://media.caranddriver.com/images/media/51/dissected-lotus-based-infiniti-emerg-e-sports-car-concept-top-image-photo-451994-s-original.jpg" class="image"> 
          <div class="inf">
            <div class="title"><?= $row["name"] ?></div>
            <div class="price"><?= $row["price"] ?></div></br>
            <a href="star.php?id=<?= $row['id']?>" class="star">Star</a>
          </div>        
        </div>
        <?php
      }
    }
?>
</body>
</html>