<?php include "assets/head.php" ?>
<link rel="stylesheet" href="css/create.css">
</head>

<body class="d-flex flex-column min-vh-100">
     <?php include "assets/nav.php" ?>
     
     <div class="create-container flex">
         <!-- Left Side: Fixed Navigation Column -->
         <div class="nav-column">
             <p class="text-gray-500">Stations:</p>
             <ul class="list-disc pl-4">
                 <li class="font-bold text-indigo-800">Select Color</li>
                 <li><a href="select-artist.php" class="text-indigo-600">Select Artist</a></li>
                 <li><a href="select-engraving.php" class="text-indigo-600">Select Engraving</a></li>
             </ul>
         </div>
         
         <!-- Right Side Content Area -->
         <div class="content-area-station">
             <h2 class="text-2xl font-semibold mb-2">Choose your color</h2>
             <div class="color-buttons mb-4">
                 <button class="color-btn bg-red-500" data-color="red">Red</button>
                 <button class="color-btn bg-blue-500" data-color="blue">Blue</button>
                 <button class="color-btn bg-green-500" data-color="green">Green</button>
             </div>

             <h2 class="text-2xl font-semibold mb-2">Want a marble finish?</h2>
             <div class="finish-buttons mb-6">
                 <button class="finish-btn" id="marble">Marble</button>
                 <button class="finish-btn active" id="plain">Plain</button>
             </div>
          </div>

          <div class="vinyl-view" style="width:15vw;height:15vw">
               <div class="main-container-design">
                    <div class="vinyl-container-design">
                         <img src="images/vinyl-black.png" alt="Current Vinyl Design" class="vinyl-left">
                         <img src="images/kanye-circle.jpg" alt="" class="circle">
                    </div>
               </div>
          </div>
     </div>

     <?php include "assets/footer.php" ?>
     
     <script src="js/color-selection.js"></script>
</body>
