<?php include "assets/head.php" ?>
<link rel="stylesheet" href="css/create.css">
</head>

<body class="d-flex flex-column min-vh-100">
     <?php include "assets/nav.php" ?>
     
     <div class="container mx-auto mt-4 flex">
         <!-- Left Side: Navigation and Color Selection -->
         <div class="w-1/2 p-4">
             <!-- Navigation Column -->
             <div class="mb-6">
                 <p class="text-gray-500">Stations:</p>
                 <ul class="list-disc pl-4">
                     <li><a href="select-artist.php" class="text-indigo-600">Select Artist</a></li>
                     <li><a href="select-engraving.php" class="text-indigo-600">Select Engraving</a></li>
                     <li class="font-bold text-indigo-800">Select Color</li>
                 </ul>
             </div>
             
             <!-- Color Selection Title -->
             <h2 class="text-2xl font-semibold mb-2">Choose your color</h2>
             <div class="color-buttons mb-4">
                 <button class="color-btn bg-red-500" data-color="red">Red</button>
                 <button class="color-btn bg-blue-500" data-color="blue">Blue</button>
                 <button class="color-btn bg-green-500" data-color="green">Green</button>
                 <!-- Add more color buttons as needed -->
             </div>

             <!-- Marble Finish Selection -->
             <h2 class="text-2xl font-semibold mb-2">Want a marble finish?</h2>
             <div class="finish-buttons">
                 <button class="finish-btn" id="marble">Marble</button>
                 <button class="finish-btn active" id="plain">Plain</button>
             </div>
         </div>
         
         <!-- Right Side: Vinyl and Album Cover Display -->
         <div class="w-1/2 p-4 flex items-center justify-center">
             <div class="relative">
                 <!-- Big Circle (Vinyl) -->
                 <img id="vinyl-display" src="images/default-vinyl.jpg" alt="Vinyl" class="w-64 h-64 rounded-full object-cover">
                 <!-- Small Circle (Album Cover) Positioned on Top -->
                 <img src="images/default-album.jpg" alt="Album Cover" class="w-16 h-16 rounded-full object-cover absolute top-4 right-4">
             </div>
         </div>
     </div>

     <?php include "assets/footer.php" ?>
     
     <script src="js/color-selection.js"></script>
</body>
