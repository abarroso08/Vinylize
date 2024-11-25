<?php include "assets/head.php";
$color = htmlspecialchars($_GET['color']);
$texture = htmlspecialchars($_GET['texture']);
$img = htmlspecialchars($_GET['img']);


define('DB_SERVER', 'localhost:3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'AlBaBu208?');
define('DB_NAME', 'vinylize');
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
                    <div class="d-flex w-100 justify-content-center align-items-center flex-grow-1 border-top border-bottom bg-secondary">
                         <div class="nav-link text-dark h5" >Artist and Album</div>

                    </div>
                    <div class="d-flex w-100 justify-content-center align-items-center flex-grow-1 ">
                         <div class="nav-link text-dark h5" style="font-weight: bold;">Engraving</div>
                    </div>
               </div>

               <!-- Main Section -->
               <div class="col-md-3 col-12 order-3 order-md-2 bg-white text-dark text-center p-0 border-start">
                    <div class="d-flex flex-column justify-content-around align-items-center h-50">
                    <h3>Type engraving:</h3>
                    <input style="width: 80%;" type="text" id="textInput" class="form-control" maxlength="12" placeholder="Enter up to 12 characters">
                    <div class="btn btn-success" onclick="nextStep()">Finish and Save</div>
                    </div>
                    

               </div>
               <div class="col-md-7 col-12 order-2 order-md-3 d-flex align-items-center justify-items-center">
                    <div class="rotative-container" style="width:600px;height:300px">
                         <div class="main-container">
                              <!-- Cover image -->
                              <div id="square" class="square" style="background:url(.<?= $img ?>);"></div>
                              <div class="vinyl-container">
                                   <p class="disk-text" id="engraving">Engraving</p>
                                   <div alt="Current Vinyl Design" id="vinylImage" class="circle-black <?= $color ?> <?= $texture ?>"></div>
                                   <div id="circle" class="circle" style="background:url(.<?= $img ?>);"></div>
                              </div>

                         </div>
                    </div>
               </div>
          </div>
     </div>
     <?php include "assets/footer.php" ?>
     <script>
          document.addEventListener("DOMContentLoaded", () => {
               const textInput = document.getElementById("textInput");
               const displayText = document.getElementById("engraving");

               // Add an event listener to update the div as the user types
               textInput.addEventListener("input", () => {
                    displayText.textContent = textInput.value; // Update the div with input value
               });
          });
     </script>