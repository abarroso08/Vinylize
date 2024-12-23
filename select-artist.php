<?php include "assets/head.php";

session_start(); // Start or resume the session

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: login.php?url=select-artist.php");
    exit;
}

// Initialize an array of expected variables with default values
$expectedVars = [
    'color' => 'black',
    'texture' => 'plain',
    'img' => '/images/imgIcon.jpg',
    'engraving' => 'Engraving',
    'fontFamily' => 'Arial', // Default font family
    'fontSize' => '16', // Default font size
    'editId' => null // Default editId
];

// Loop through the expected variables
foreach ($expectedVars as $key => $defaultValue) {
    $$key = isset($_GET[$key]) ? htmlspecialchars($_GET[$key]) : $defaultValue;
}

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
        var color = "<?= $color ?>";
        var texture = "<?= $texture ?>";
        var img = "<?= $img ?>";
        var engraving = "<?= $engraving ?>";
        var fontFamily = "<?= $fontFamily ?>";
        var fontSize = "<?= $fontSize ?>";
        var editId = "<?= $editId ?>";

        document.addEventListener("DOMContentLoaded", () => {
            const artistSelect = document.getElementById('artistSelect');
            const albumSelect = document.getElementById('albumSelect');

            // Fetch albums for the selected artist
            artistSelect.addEventListener('change', function() {
                const artistID = this.value;

                fetch(`get_albums.php?artist_id=${artistID}`)
                    .then(response => response.json())
                    .then(data => {
                        albumSelect.innerHTML = "";
                        data.forEach(album => {
                            albumSelect.innerHTML += `<option value="${album.AlbumID}" data-image="${album.CoverImage}">${album.AlbumName}</option>`;
                        });
                        document.getElementById('albumDiv').style.display = 'block';
                    });
            });

            albumSelect.addEventListener('change', function() {
                const albumImage = this.options[this.selectedIndex].getAttribute('data-image');
                document.getElementById('square').style.background = `url(${albumImage})`;
                document.getElementById('circle').style.backgroundImage = `url(${albumImage})`;
                img = albumImage;
            });
        });

        function nextStep() {
            const nextUrl = `select-engraving.php?color=${encodeURIComponent(color)}&texture=${encodeURIComponent(texture)}&img=${encodeURIComponent(img)}&engraving=${encodeURIComponent(engraving)}&fontFamily=${encodeURIComponent(fontFamily)}&fontSize=${encodeURIComponent(fontSize)}&editId=${encodeURIComponent(editId)}`;
            window.location.href = nextUrl;
        }

        function goBack() {
            const backUrl = `select-color.php?color=${encodeURIComponent(color)}&texture=${encodeURIComponent(texture)}&img=${encodeURIComponent(img)}&engraving=${encodeURIComponent(engraving)}&fontFamily=${encodeURIComponent(fontFamily)}&fontSize=${encodeURIComponent(fontSize)}&editId=${encodeURIComponent(editId)}`;
            window.location.href = backUrl;
        }
    </script>
</body>
