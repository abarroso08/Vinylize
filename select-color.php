<?php include "assets/head.php" ?>
<link rel="stylesheet" href="css/rotative.css">
</head>

<body class="d-flex flex-column" style=" background-color: #86878f; ">
     <?php include "assets/nav.php" ?>
     <!-- Aqui va el código de la página.
     include: añade los archivos nav.php y footer.php a este código literalmente como si hiciera un copy/paste.-->
     <div class="container-fluid d-flex flex-column flex-grow-1 w-100 m-0 p-0 responsive-height" >
          <div class="row flex-grow-1 w-100 m-0">
               <!-- Left Sidebar -->
               <div class="col-2 bg-white text-dark text-center flex-column justify-content-around p-0 d-none d-md-flex">
                    <div class="d-flex w-100 justify-content-center align-items-center flex-grow-1">
                         <div class="nav-link text-dark h5" style="font-weight: bold;">Color and Style</div>
                    </div>
                    <div class="d-flex w-100 justify-content-center align-items-center flex-grow-1 border-top border-bottom bg-secondary">
                    <div onclick="nextStep()" class="nav-link text-dark h5">Artist and Album</div>

                    </div>
                    <div class="d-flex w-100 justify-content-center align-items-center flex-grow-1 bg-secondary">
                         <div class="nav-link text-dark h5">Engraving</div>
                    </div>
               </div>

               <!-- Main Section -->
               <div class="col-md-3 col-12 order-3 order-md-2 bg-white text-dark text-center p-0 border-start">
                    <form class="d-flex flex-column justify-content-around align-items-center w-100" style="height: 90%;">
                         <!-- Color Selection -->
                         <label><b>Choose Colors:</b></label>
                         <ul class="list-group d-flex flex-column justify-content-around" style="width: 80%;">
                              <li class="list-group-item">
                                   <input type="radio" name="color" id="pink" value="pink" class="color-option"> Gold pink
                              </li>
                              <li class="list-group-item">
                                   <input type="radio" name="color" id="green" value="green" class="color-option"> Neon green
                              </li>
                              <li class="list-group-item">
                                   <input type="radio" name="color" id="purple" value="purple" class="color-option"> Purple
                              </li>
                              <li class="list-group-item">
                                   <input type="radio" name="color" id="orange" value="orange" class="color-option"> Orange
                              </li>
                              <li class="list-group-item">
                                   <input type="radio" name="color" id="black" value="black" class="color-option" checked> Black
                              </li>
                         </ul>

                         <!-- Style Selection -->
                         <label><b>Choose Styles:</b></label>
                         <ul class="list-group d-flex flex-column justify-content-around" style="width: 80%;">
                              <li class="list-group-item">
                                   <input type="radio" name="style" id="marble" value="marble"> Marble
                              </li>
                              <li class="list-group-item">
                                   <input type="radio" name="style" id="plain" value="plain" checked> Plain
                              </li>
                         </ul>
                    </form>
                    <div class="btn btn-primary" onclick="nextStep()">next</div>
               </div>
               <div class="col-md-7 col-12 order-2 order-md-3 d-flex align-items-center justify-items-center">
                    <div class="rotative-container" style="width:400px;height:400px">
                         <div class="main-container">
                              <!-- Cover image -->
                              <div class="vinyl-container-create">
                                   <p class="disk-text">Engraving</p>
                                   <div alt="Current Vinyl Design" id="vinylImage" class="circle-black"></div>
                                   <div class="circle bg-secondary"></div>
                              </div>

                         </div>
                    </div>
               </div>
          </div>
     </div>
     <?php include "assets/footer.php" ?>

     <script>
          // JavaScript to handle dynamic class changes based on selected color
          
          var color = "";
          var marble= "plain";
          document.addEventListener("DOMContentLoaded", () => {
               // Get all color radio buttons and the vinyl image
               const colorOptions = document.querySelectorAll(".color-option");
               const vinylImage = document.getElementById("vinylImage");
               const marbleRadio = document.getElementById('marble');
               const plainRadio = document.getElementById('plain');

               // Add event listeners to all color options
               colorOptions.forEach(option => {
                    option.addEventListener("change", () => {
                         // Get the selected color
                         const selectedColor = option.value;

                         // Clear existing classes on the image
                         vinylImage.classList.remove(`bg-${color}`);
                         vinylImage.classList.add(`bg-${selectedColor}`);
                         color = selectedColor;
                    });
               });

               function updateClass() {
                    // Remove both specific classes
                    if (marbleRadio.checked) {
                         vinylImage.classList.add('marble'); // Add 'marble' class
                         marble = "marble";
                    } else if (plainRadio.checked) {
                         vinylImage.classList.remove('marble'); // Add 'plain' class
                         marble="plain";
                    }
               }

               // Add event listeners to the radio buttons
               marbleRadio.addEventListener('change', updateClass);
               plainRadio.addEventListener('change', updateClass);

               
          });
          function nextStep(){
                    window.location.href = `select-artist.php?color=${color}&texture=${marble}`;
               }
     </script>