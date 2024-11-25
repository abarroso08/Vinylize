<?php include "assets/head.php";
$color = htmlspecialchars($_GET['color']);
$texture = htmlspecialchars($_GET['texture']);


define('DB_SERVER', '127.0.0.1:3306');
define('DB_USERNAME', 'u803318305_vinylize');
define('DB_PASSWORD', 'Vinylize141');
define('DB_NAME', 'u803318305_vinylize');
try {
     $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
     // Set the PDO error mode to exception
     
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $GLOBALS['conexion'] = $pdo;
} catch (PDOException $error) {
     $GLOBALS['error'] = $error;
     die("ERROR: No se pudo conectar. " . $error->getMessage());
}
$stmt = $conexion->prepare("SELECT * FROM `artists`");
$stmt->execute();
$artists = $stmt->fetchAll();

?>
<link rel="stylesheet" href="css/rotative.css">
</head>

<body class="d-flex flex-column" style=" background-color: #86878f; ">
     <?php include "assets/nav.php" ?>
     <!-- Aqui va el código de la página.
     include: añade los archivos nav.php y footer.php a este código literalmente como si hiciera un copy/paste.-->
     <div class="container-fluid d-flex flex-column flex-grow-1 w-100 m-0 p-0 responsive-height">
          <div class="row flex-grow-1 w-100 m-0">
               <!-- Left Sidebar -->
               <div class="col-2 d-md-flex d-none bg-white text-dark text-center flex-column justify-content-around p-0">
                    <div class="d-flex w-100 justify-content-center align-items-center flex-grow-1 bg-secondary">
                         <div class="nav-link text-dark h5">Color and Style</div>
                    </div>
                    <div class="d-flex w-100 justify-content-center align-items-center flex-grow-1 border-top border-bottom ">
                         <div class="nav-link text-dark h5" onclick="nextStep()" style="font-weight: bold;">Artist and Album</div>

                    </div>
                    <div class="d-flex w-100 justify-content-center align-items-center flex-grow-1 bg-secondary">
                         <div class="nav-link text-dark h5">Engraving</div>
                    </div>
               </div>

               <!-- Main Section -->
               <div class="col-md-3 col-12 order-3 order-md-2 bg-white text-dark text-center p-0 border-start">
                    <form class="d-flex flex-column justify-content-around align-items-center w-100" style="height:80%;">
                         <!-- Color Selection -->
                         <div style=" width:80%;">
                              <label><b>Choose Artist:</b></label>
                              <select id="artistSelect" class="form-select" size="6" aria-label="size 3 select example">
                                   <?php
                                   foreach ($artists as $artist) { ?>
                                        <option value="<?= htmlspecialchars($artist['ArtistID']); ?>"><?= htmlspecialchars($artist['ArtistName']); ?></option>
                                   <?php
                                   }
                                   ?>

                              </select>
                         </div>
                         <!-- <ul class="list-group d-flex flex-column justify-content-around" style="width: 80%;">
                              <li class="list-group-item">
                                   <input type="radio" name="color" id="pink" value="pink" class="color-option"> Sabrina Carpenter
                              </li>
                         </ul> -->

                         <!-- Style Selection -->
                         <div id="albumDiv" style="width:80%;">
                              <label><b>Choose Album:</b></label>
                              <select id="albumSelect" class="form-select" size="5 " aria-label="size 3 select example">
                              </select>
                         </div>
                         <!-- <ul class="list-group d-flex flex-column justify-content-around" style="width: 80%;">
                              <li class="list-group-item">
                                   <input type="radio" name="style" id="marble" value="marble"> Marble
                              </li>
                              <li class="list-group-item">
                                   <input type="radio" name="style" id="plain" value="plain" checked> Plain
                              </li>
                         </ul> -->
                    </form>
                    <div class="btn btn-primary" onclick="nextStep()">next</div>

               </div>
               <div class="col-md-7 col-12 order-2 order-md-3 d-flex align-items-center justify-items-center">
                    <div class="rotative-container" style="width:600px;height:300px">
                         <div class="main-container">
                              <!-- Cover image -->
                              <div id="square" class="square" style="background:url(./images/imgIcon.jpg);"></div>
                              <div class="vinyl-container">
                                   <p class="disk-text">Engraving</p>
                                   <div alt="Current Vinyl Design" id="vinylImage" class="circle-black <?= "bg-" . $color ?> <?= $texture ?>"></div>
                                   <div id="circle" class="circle" style="background:url(./images/imgIcon.jpg);"></div>
                              </div>

                         </div>
                    </div>
               </div>
          </div>
     </div>
     <?php include "assets/footer.php" ?>

     <script>
          var albumImg;
          var color;
          var marble;
          document.addEventListener("DOMContentLoaded", () => {
               const vinylImage = document.getElementById("vinylImage");

               // Get the class names from the vinylImage element
               const classNames = vinylImage.className.split(" "); // Split the class attribute into an array

               // Store the first and second class names in variables
               console.log(classNames);
               color = classNames[1]; // First class
               marble = classNames[2];
               // JavaScript to dynamically handle artist and album selection
               console.log("ready");
               document.getElementById('artistSelect').addEventListener('change', function() {
                    const artistID = this.value;
                    console.log(artistID);
                    // Fetch albums for the selected artist using AJAX
                    fetch(`get_albums.php?artist_id=${artistID}`)
                         .then(response => response.json())
                         .then(data => {
                              // Populate the album dropdown
                              const albumSelect = document.getElementById('albumSelect');
                              albumSelect.innerHTML="";
                              data.forEach(album => {
                                   albumSelect.innerHTML += `<option value="${album.AlbumID}" data-image="${album.CoverImage}">${album.AlbumName}</option>`;
                              });

                              // Show the album selection div
                              document.getElementById('albumDiv').style.display = 'block';
                         });
               });

               document.getElementById('albumSelect').addEventListener('change', function() {
                    const albumImage = this.options[this.selectedIndex].getAttribute('data-image');

                    // Set the album image
                    const square = document.getElementById('square');
                    const circle = document.getElementById('circle');
                    square.style.background = `url(.${albumImage})`;
                    circle.style.backgroundImage = `url(.${albumImage})`;
                    albumImg = albumImage;

               });
               
          });
          function nextStep() {
               window.location.href = `select-engraving.php?color=${color}&texture=${marble}&img=${albumImg}`;
          }
          
     </script>