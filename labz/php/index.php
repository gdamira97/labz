<html>
<head>
  <title>Home</title>
<style>
body{
  margin:0;
}
#wrapper{
  max-width: 1000;
  height: 1100;
  background: white;
  display: inline;
  float: right;
  margin-top: 100;
  margin-right: 250;
  box-shadow: 0 0 10px rgba(0,0,0,0.5);
  z-index: -1000;
  padding: 30;
}
.im{ 
/*max-width: 200px;*/
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
.phone{
  margin-top: 10;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: black;
}
li {
    float: left;
}
li a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
li a:hover {
    background-color: #AAA;
}
</style>
</head>
<body>
  <?php
  $transport = [["type"=>"car","title"=>"Volvo","price"=>300000,"phone"=>"7004266736"],
               ["type"=>"bus","title"=>"Lifan","price"=>700000,"phone"=>"7004266736"],
               ["type"=>"car","title"=>"Volvo","price"=>200000,"phone"=>"7004266736"],
               ["type"=>"car","title"=>"Volvo","price"=>500000,"phone"=>"7004266736"],
               ["type"=>"bus","title"=>"Lifan","price"=>900000,"phone"=>"7004266736"]];
    ?>
    <ul>
      <li><?php echo '<a href="?page=">Home</a></br>'; ?></li>
      <li><?php echo '<a href="?page=cars">Cars</a></br>'; ?></li>
      <li><?php echo '<a href="?page=buses">Buses</a>'; ?></li>
    </ul>
    <?php
    $page=$_REQUEST["page"];
    
  if($page==""){
    foreach ($transport as $item) {
    ?>
        <div class="im"> 
          <img src="http://media.caranddriver.com/images/media/51/dissected-lotus-based-infiniti-emerg-e-sports-car-concept-top-image-photo-451994-s-original.jpg" class="image"> 
          <div class="inf">
            <div class="title"><?= $item["title"] ?></div>
            <div class="price"><?= $item["price"] ?></div>
            <div class="phone"><?= $item["phone"] ?></div>
          </div>        
        </div> 
    <?php
  }
}
  if($page=="cars"){
    foreach ($transport as $item) {
      if($item["type"]=="car"){
    ?>
        <div class="im"> 
          <img src="http://media.caranddriver.com/images/media/51/dissected-lotus-based-infiniti-emerg-e-sports-car-concept-top-image-photo-451994-s-original.jpg" class="image"> 
          <div class="inf">
            <div class="title"><?= $item["title"] ?></div>
            <div class="price"><?= $item["price"] ?></div>
            <div class="phone"><?= $item["phone"] ?></div>
          </div>        
        </div> 
    <?php
  }
  }
}
?>
<?php
  if($page=="buses"){
    foreach ($transport as $item) {
      if($item["type"]=="bus"){
    ?>
        <div class="im"> 
          <img src="http://carrrsmag.com/data_images/makes/lifan/lifan-01.jpg" class="image"> 
          <div class="inf">
            <div class="title"><?= $item["title"] ?></div>
            <div class="price"><?= $item["price"] ?></div>
            <div class="phone"><?= $item["phone"] ?></div>
          </div>
        </div>
    <?php
  }
}
}
?>
</body>
</html>