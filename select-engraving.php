<?php include "assets/head.php";
session_start(); // Start or resume the session

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?url=select-engraving.php");
    exit;
}

$color = htmlspecialchars($_GET['color']);
$texture = htmlspecialchars($_GET['texture']);
$img = htmlspecialchars($_GET['img']);
$fontFamily = htmlspecialchars($_GET['fontFamily'] ?? 'Arial'); // Default font family
$fontSize = htmlspecialchars($_GET['fontSize'] ?? '16'); // Default font size
$engraving = htmlspecialchars($_GET['engraving'] ?? 'Engraving'); // Default engraving
$edit = isset($_GET['editId']) ? intval($_GET['editId']) : null; // Check if `editId` is set
?>
<link rel="stylesheet" href="css/rotative.css">
</head>

<body class="d-flex flex-column" style="background-color: #86878f;">
     <?php include "assets/nav.php"; ?>
     <div class="container-fluid d-flex flex-column flex-grow-1 w-100 m-0 p-0 responsive-height">
          <div class="row flex-grow-1 w-100 m-0">
               <!-- Left Sidebar -->
               <div class="col-2 d-md-flex d-none text-dark text-center flex-column justify-content-around p-0" style="background-color:#a1a1c7;">
                    <div class="d-flex w-100 justify-content-center align-items-center flex-grow-1">
                         <div class="nav-link text-dark h5" onclick="goColor()">Color and Style</div>
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
                              <div id="square" class="square" style="background:url(<?= $img ?>);"></div>
                              <div class="vinyl-container">
                                   <p class="disk-text" id="engraving" style="font-family: <?= $fontFamily ?>; font-size: <?= $fontSize ?>px;"><?= $engraving ?></p>
                                   <div alt="Current Vinyl Design" id="vinylImage" class="circle-black <?= $color ?> <?= $texture ?>"></div>
                                   <div id="circle" class="circle" style="background:url(<?= $img ?>);"></div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <?php include "assets/footer.php"; ?>
     <script>
    var color = "<?= $color ?>";
    var texture = "<?= $texture ?>";
    var img = "<?= $img ?>";
    var engraving = "<?= $engraving ?>";
    var fontFamily = "<?= $fontFamily ?>";
    var fontSize = "<?= $fontSize ?>";
    var editId = <?= $edit ? $edit : 'null' ?>;

    document.addEventListener("DOMContentLoaded", () => {
        const textInput = document.getElementById("textInput");
        const displayText = document.getElementById("engraving");
        const fontFamilySelect = document.getElementById("fontFamily");
        const fontSizeInput = document.getElementById("fontSize");

               // Add an event listener to update the div as the user types
               textInput.addEventListener("input", () => {
                    displayText.textContent = textInput.value; // Update the div with input value
               });
          });
     </script>