<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=mydb', 'root','root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $selectAll = $pdo->prepare('SELECT * from hikes ORDER BY name ASC');
// $selectAll->execute();
// $hikes = $selectAll->fetchAll(PDO::FETCH_ASSOC);
//add.php?title=&image=&location=&distance=&elevation=&description=

echo'<pre>';
var_dump($_POST);
echo '</pre>';

$title = $_POST["title"];
$image = '';                //$_POST["image"]
$duration = $_POST["duration"];
$location = $_POST["location"];
$distance = $_POST["distance"];
$elevation = $_POST["elevation"];
$description = $_POST["description"];

$input = $pdo->prepare("INSERT INTO hikes (name, distance, duration, elevetionGain, location, image, description)
                        VALUES(:title, :distance, :duration, :elevation, :location, :image, :description)
");

$input->bindValue(':title', $title);
$input->bindValue(':distance', $distance);
$input->bindValue(':duration', $duration);
$input->bindValue(':elevation', $elevation);
$input->bindValue(':location', $location);
$input->bindValue(':image', '');
$input->bindValue(':description', $description);

$input->execute();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="basic.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Add new Hike</title>
</head>
<body>
    <h1 class="title">Add new Hike</h1>

    <form action="" method="post">

    <div class="mb-3">
    <label  class="form-label">Title</label>
    <input type="text" name="title" class="form-control" >
    </div>
    <br>
    <div class="mb-3">
    <label  class="form-label">Image</label>
    <input type="file" name="image" >
    </div>

    <div class="mb-3">
    <label  class="form-label">Location</label>
    <input type="text" name="location" class="form-control" >
    </div>

    <div class="mb-3">
    <label  class="form-label">duration</label>
    <input type="time" name="duration"  class="form-control" >
    </div>

    <div class="mb-3">
    <label  class="form-label">distance</label>
    <input type="number" name="distance" step="0.1" class="form-control" >
    </div>

    <div class="mb-3">
    <label  class="form-label">Elevation gain</label>
    <input type="number" name="elevation"  class="form-control" >
    </div>

    <div class="mb-3">
    <label  class="form-label">Description</label>
    <textarea class="form-control" name="description" ></textarea>
    </div>

    <div class="mb-3 form-check">
    <input type="checkbox" name="easy"class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Easy</label>
    </div>

    <div class="mb-3 form-check">
    <input type="checkbox" name="middle"class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Middle</label>
    </div>

    <div class="mb-3 form-check">
    <input type="checkbox" name="hard"class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Hard</label>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

    <a class="btn btn-primary btn-sm" href="index.php">Home</a>

    </form>
</body>
</html>