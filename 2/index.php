<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body>
<div class="container">
<div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                ระบุคำค้นหา
                <div class="input-group">
                    <input type="text" placeholder="Fever" class="form-control"
                        aria-label="Dollar amount (with dot and two decimal places)">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary" value="submit" name="submit" id="submit">ค้นหา</button>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
<div class="row">
  

<?php 

    $url = "https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json";    
    $response = file_get_contents($url);
    $result = json_decode($response);
    
    for($x =0; $x <= 19; $x++){
      $ava = sizeof($result->tracks->items[$x]->available_markets);
      $name =  $result->tracks->items[$x]->album->name;
      $artist =  $result->tracks->items[$x]->album->artists[0]->name;
      $release_date =  $result->tracks->items[$x]->album->release_date;
      $image = $result->tracks->items[$x]->album->images[0]->url;
      $imageData = base64_encode(file_get_contents($image));




      echo  '<div class="col-md-4">';
      echo '<div class="card">';
      echo '<img class="card-img-top" src="data:image/jpeg;base64,'.$imageData.'" alt="Card image">';
      echo"<div class='card-body'>";
      echo"<h4 class='card-title'>$name</h4>";
      echo "<p class='card-text'>Artist:$artist</p>";
      echo "<p class='card-text'>Release date:$release_date</p>";
      echo "<p class='card-text'>Available:$ava</p>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
    }
    ?>
<?php 
if(isset($_POST['submit'])){
    $url = "https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json";    
    $response = file_get_contents($url);
    $result = json_decode($response);
    for($x =0; $x <= 19; $x++){
    $name =  $result->tracks->items[$x]->album->name;
    
if($_POST['select'] == $name){
      $ava = sizeof($result->tracks->items[$x]->available_markets);
      $name =  $result->tracks->items[$x]->album->name;
      $artist =  $result->tracks->items[$x]->album->artists[0]->name;
      $release_date =  $result->tracks->items[$x]->album->release_date;
      $image = $result->tracks->items[$x]->album->images[0]->url;
      $imageData = base64_encode(file_get_contents($image));

      echo  '<div class="col-md-4">';
      echo '<div class="card">';
      echo '<img class="card-img-top" src="data:image/jpeg;base64,'.$imageData.'" alt="Card image">';
      echo"<div class='card-body'>";
      echo"<h4 class='card-title'>$name</h4>";
      echo "<p class='card-text'>Artist:$artist</p>";
      echo "<p class='card-text'>Release date:$release_date</p>";
      echo "<p class='card-text'>Available:$ava</p>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
    }else{
        echo "Not found";
    }
    }
  }
    ?>          
       </div>     
       </div>    
    
</body>
</html>