<?php include "assets/head.php" ?>
<?php
session_start(); // Start or resume the session

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: login.php?url=select-color.php");
    exit; // Ensure no further code is executed
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
    $$key = isset($_GET[$key]) ? filter_var($_GET[$key], FILTER_SANITIZE_STRING) : $defaultValue;
}
?>

<link rel="stylesheet" href="css/rotative.css">
</head>

<body class="d-flex flex-column" style="background-color: #A1A8B1;"> <!-- Soft grey background -->
     <?php include "assets/nav.php" ?>

     <!-- Main Container -->
     <div class="container-fluid d-flex flex-column flex-grow-1 w-100 m-0 p-0 responsive-height">
          <div class="row flex-grow-1 w-100 m-0">

               <!-- Left Sidebar -->
               <div class="col-2 text-dark text-center flex-column justify-content-around p-0 d-none d-md-flex" style="background-color: #a1a1c7;"> <!-- Soft blue-grey background -->
                    <div class="d-flex w-100 justify-content-center align-items-center flex-grow-1">
                         <div class="nav-link text-dark h5" style="font-weight: bold;">Color and Style</div>
                    </div>
                    <div class="d-flex w-100 justify-content-center align-items-center flex-grow-1 border-top border-bottom" style="background-color: #a1a1c7;"> <!-- Soft blue-grey background -->
                         <div onclick="nextStep()" class="nav-link text-dark h5">Artist and Album</div>
                    </div>
                    <div class="d-flex w-100 justify-content-center align-items-center flex-grow-1" style="background-color: #a1a1c7;"> <!-- Soft blue-grey background -->
                         <div onclick="moveToEngraving()" class="nav-link text-dark h5">Engraving</div>
                    </div>
               </div>

               <!-- Main Section -->
               <div class="col-md-3 col-12 order-3 order-md-2 bg-light text-dark text-center p-0 border-start" style="background-color: #c3c3e6; position: relative; z-index: 5;"> <!-- Light grey background -->
                    <form class="d-flex flex-column justify-content-around align-items-center w-100" style="height: 90%;">

                         <!-- Color Selection -->
                         <label><b>Choose Colors:</b></label>
                         <ul class="list-group d-flex flex-column justify-content-around" style="width: 80%;">
                              <li class="list-group-item" style="background-color: #D87C5B;"> <!-- Lavender background -->
                                   <input type="radio" name="color" id="pink" value="pink" class="color-option"> Gold pink
                              </li>
                              <li class="list-group-item" style="background-color: #34A304;"> <!-- Light green background -->
                                   <input type="radio" name="color" id="green" value="green" class="color-option"> Neon green
                              </li>
                              <li class="list-group-item" style="background-color: #A797F3;"> <!-- Soft purple background -->
                                   <input type="radio" name="color" id="purple" value="purple" class="color-option"> Lavender purple
                              </li>
                              <li class="list-group-item" style="background-color: #417AE1;"> <!-- Light blue background -->
                                   <input type="radio" name="color" id="blue" value="blue" class="color-option"> Cobalt blue
                              </li>
                              <li class="list-group-item" style="background-color: #818181;"> <!-- Darker grey background -->
                                   <input type="radio" name="color" id="black" value="black" class="color-option" checked> Black
                              </li>
                         </ul>

                         <!-- Style Selection -->
                         <label><b>Choose Styles:</b></label>
                         <ul class="list-group d-flex flex-column justify-content-around" style="width: 80%;">
                              <li class="list-group-item" style="background-color: #E0C7E3;"> <!-- Lavender background -->
                                   <input type="radio" name="style" id="marble" value="marble"> Marble
                              </li>
                              <li class="list-group-item" style="background-color: #D1CFE2;"> <!-- Soft purple background -->
                                   <input type="radio" name="style" id="plain" value="plain" checked> Plain
                              </li>
                         </ul>
                    </form>
                    <div class="btn btn-primary" onclick="nextStep()">Next</div>
               </div>

               <!-- Rotating Vinyl Display -->
               <div class="col-md-7 col-12 order-2 order-md-3 d-flex align-items-center justify-items-center">
                    <div class="rotative-container" style="width:400px;height:400px">
                         <div class="main-container">
                              <div class="vinyl-container-create">
                                   <p class="disk-text" style="font-family: <?= $fontFamily ?>; font-size: <?= $fontSize ?>px;">
                                        <?= $engraving ?>
                                   </p>
                                   <div alt="Current Vinyl Design" id="vinylImage" class="circle-black <?= $color ?> <?= $texture ?>"></div>
                                   <div id="circle" class="circle" style="background:url(<?= $img ?>);"></div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <!-- Footer -->
     <?php include "assets/footer.php" ?>

     <script>
     document.addEventListener("DOMContentLoaded", () => {
    const colorOptions = document.querySelectorAll(".color-option");
    const vinylImage = document.getElementById("vinylImage");
    const marbleRadio = document.getElementById('marble');
    const plainRadio = document.getElementById('plain');

    // Update color class when a color is selected
    colorOptions.forEach(option => {
        option.addEventListener("change", () => {
            const selectedColor = option.value;

            // Remove previous color class (if exists)
            vinylImage.classList.forEach(className => {
                if (className.startsWith('bg-')) {
                    vinylImage.classList.remove(className);
                }
            });

            // Add new color class
            vinylImage.classList.add(`bg-${selectedColor}`);
            color = selectedColor; // Update the global variable
        });
    });

    // Update texture based on radio selection
    function updateTexture() {
        if (marbleRadio.checked) {
            vinylImage.classList.add('marble');
            texture = "marble";
        } else if (plainRadio.checked) {
            vinylImage.classList.remove('marble');
            texture = "plain";
        }
    }

    marbleRadio.addEventListener('change', updateTexture);
    plainRadio.addEventListener('change', updateTexture);
});

function moveToEngraving() {
    const nextUrl = `select-engraving.php?color=${encodeURIComponent(color)}&texture=${encodeURIComponent(texture)}&img=${encodeURIComponent(img)}&engraving=${encodeURIComponent(engraving)}&fontFamily=${encodeURIComponent(fontFamily)}&fontSize=${encodeURIComponent(fontSize)}&editId=${encodeURIComponent(editId)}`;
    window.location.href = nextUrl;
}

function nextStep() {
    const nextUrl = `select-artist.php?color=${encodeURIComponent(color)}&texture=${encodeURIComponent(texture)}&img=${encodeURIComponent(img)}&engraving=${encodeURIComponent(engraving)}&fontFamily=${encodeURIComponent(fontFamily)}&fontSize=${encodeURIComponent(fontSize)}&editId=${encodeURIComponent(editId)}`;
    window.location.href = nextUrl;
}

     </script>

</body>
</html>
