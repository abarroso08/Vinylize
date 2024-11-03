<?php include "assets/head.php" ?>
<link rel="stylesheet" href="css/create.css">
<link rel="stylesheet" href="css/rotative.css">
<link rel="stylesheet" href="css/main.css">

</head>

<body class="d-flex flex-column min-vh-100">
     <?php include "assets/nav.php" ?>
     <div class="flex-grow-1 container-fit">
          <!-- Web header -->
          <header class="header container-fluid">
               <!-- Background Video -->

               <video autoplay muted loop class="video-background w-100" style="height:80vh;object-fit:cover;">
                    <source src="images/video_portada.mp4" type="video/mp4">
                    Your browser does not support the video tag.
               </video>

               <!-- Content Overlay -->
               <div class="header-content text-center text-white w-100 h-100 d-flex flex-column justify-content-center align-items-center" style="position:absolute; right:0; left:0; top:0; bottom:0;">
                    <h1 style="font-size:100px;font-family:'Abril Fatface', cursive;">Vinylize</h1>
                    <p>Your personalized vinyl in minutes</p>
               </div>
          </header>

          <!-- Examples -->
          <div class="row w-100">

               <!-- Example 1 -->
               <div class="col-12 col-sm-6 d-flex flex-column align-items-center justify-content-center">
                    <!-- Rotative vinyl -->
                    <div class="rotative-container" style="width:300px;height:150px">
                         <div class="main-container">
                              <!-- Cover image -->
                              <img src="images/sabrina.jpg" class="square"></img>
                              <div class="vinyl-container">
                                   <p class="disk-text">Your name</p>
                                   <img src="images/vinyl-black.png" alt="Current Vinyl Design" class="vinyl-left purple">
                                   <img src="images/sabrina.jpg" alt="" class="circle">
                              </div>

                         </div>
                    </div>
                    <!-- Example title -->
                    <h2 style="text-align: center;">Custom vinyl record</h2>
                    <!-- Example price -->
                    <p class="price" style="text-align: center;">$50</p>
                    <!-- Example description -->
                    <p style="text-align: center;">Custom made 12 inch Vinyl Record<br>
                         Available in black, white and transparent<br>
                         30 minutes of music (15 min per side)<br>
                         Design your own cover &amp; labels<br>
                         <strong><i class="fa fa-fw"></i> Free &amp; insured worldwide shipping</strong>
                    </p>
                    <!-- Example button -->
                    <p style="text-align: center;">
                         <a class="btn btn-primary" href="design-station.php">Create Record</a>
                    </p>
               </div>

               <!-- Example 2 -->
               <div class="col-12 col-sm-6 d-flex flex-column align-items-center justify-content-center">
                    <!-- Rotative vinyl -->
                    <div class="rotative-container" style="width:300px;height:150px">
                         <div class="main-container">
                              <!-- Cover image -->
                              <img src="images/kanye-cover.jpg" class="square"></img>
                              <div class="vinyl-container">
                                   <!-- vinyl name -->
                                   <p class="disk-text">Your Name</p>
                                   <img src="images/half-vinyl.png" alt="Current Vinyl Design" class="vinyl-left gold-pink w-50">
                                   <!-- Circle picture in disk -->
                                   <img src="images/kanye-circle.jpg" alt="" class="circle">
                                   <img src="images/half-vinyl.png" alt="Current Vinyl Design" class="vinyl-right gold-pink w-50">
                              </div>

                         </div>
                    </div>
                    <!-- Example title -->
                    <h2 style="text-align: center;">Custom vinyl record</h2>
                    <!-- Example price -->
                    <p class="price" style="text-align: center;">$100</p>
                    <!-- Example description -->
                    <p style="text-align: center;">Custom made 14 inch Vinyl Record<br>
                         Available in black, white, grey and transparent<br>
                         60 minutes of music (30 min per side)<br>
                         Design your own cover &amp; labels<br>
                         <strong><i class="fa fa-fw"></i> Free &amp; insured worldwide shipping</strong>
                    </p>
                    <!-- Example button -->
                    <p style="text-align: center;">
                         <a class="btn btn-primary" href="design-station.php">Create Record</a>
                    </p>
               </div>
          </div>
          <div>
               <h3>Links to all pages: (Temporal)</h3>
               <ul>

                    
                    <li><a href="buy.php">buy.php</a></li>
                    <li><a href="design-station.php">design-station.php</a></li>
                    <li><a href="saved-vinyls.php">saved-vinyls.php</a></li>
                    <li><a href="select-artist.php">select-artist.php</a></li>
                    <li><a href="select-color.php">select-color.php</a></li>
                    <li><a href="select-engraving.php">select-engraving.php</a></li>
                    <li><a href="README.md">README.md</a></li>
                    <li><a href="Report.pdf">Report.pdf</a></li>
               </ul>

          </div>
     </div>

     <?php include "assets/footer.php" ?>