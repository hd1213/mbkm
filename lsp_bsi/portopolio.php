<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wahyu";

// Create connection
$conn = mysqli_connect("localhost", "root", "", $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM artikels";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
        </div>
      </nav>
      <div class="collapse show" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
          <div class="container">
            <div class="d-flex justify-content-center">
              <a class="nav-link active" aria-current="page" href="beranda.php">Beranda</a>
              <a class="nav-link" href="gallery.php">Gallery</a>
              <a class="nav-link" href="portopolio.php">Portfolio</a>
            </div>
          </div>
        </div>
      </div>
          

      <main class="container">
        

        <section id="content" class="row">
            <div class="col-md-8 col-12">
                <div class="row">



                  <?php 
                    if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                  ?>
                  <div class="col-md-4 col-12">
                        <div class="card">
                            <img src="<?= $row["image"] ?>" height="200" width="200" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title"><?= $row["title"] ?></h5>
                              <p class="card-text"><?= $row["description"] ?></p>
                              <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                  <?php 
                    }
                  } else {
                    echo "0 results";
                  }
                  ?>
                </div>
            </div>
            <aside class="col-md-4 col-12">
                <img src="https://picsum.photos/200/200" class="card-img-top img-thumbnail rounded-circle" alt="...">
                <h5 class="text-center">Wahyu Lyoko</h5>
            </aside>
        </section>
      </main>

      <footer class="text-center bg-primary text-white p-3">
        Copyright 2023
      </footer>
  </body>
</html>