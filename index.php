<?php include "assets/head.php" ?>
<link rel="stylesheet" href="css/create.css">
<link rel="stylesheet" href="css/rotative.css">

</head>

<body class="d-flex flex-column min-vh-100">
     <?php include "assets/nav.php" ?>
     <div class="flex-grow-1 container-fit">
          <!-- Web header -->
          <header class="header container-fluid">
               <!-- Background Video -->

               <video autoplay muted loop class="video-background w-100" style="height:80vh;object-fit:cover;margin-bottom: 20px">
                    <source src="images/video_portada.mp4" type="video/mp4">
                    Your browser does not support the video tag.
               </video>

               <!-- Content Overlay -->
               <div class="header-content text-center text-white w-100 h-100 d-flex flex-column justify-content-center align-items-center" style="position:absolute; right:0; left:0; top:0; bottom:0;">
                    <h1 style="font-size:100px;font-family:'Roboto', cursive;">Vinylize</h1>
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
                                  <div id="square" class="square shadow-effect" style="background:url(images/sabrina.jpg);"></div>
                                  <div class="vinyl-container">
                                       <p class="disk-text" style="font-family:Verdana; font-size: 12px;">
                                           Engraving
                                       </p>
                                       <div alt="Current Vinyl Design" id="vinylImage" class="circle-black black plain"></div>
                                       <div id="circle" class="circle" style="background:url(images/sabrina.jpg);"></div>
                                  </div>
                             </div>
                    </div>
                    <!-- Example title -->
                    <h2 style="text-align: center;">Custom vinyl record</h2>
                    <!-- Example price -->
                    <p class="price" style="text-align: center;">$50</p>
                    <!-- Example description -->
                    <p style="text-align: center;">Custom made 12 inch Vinyl Record<br>
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
                                  <div id="square" class="square shadow-effect" style="background:url(images/ASTROWORLD.jpeg);"></div>
                                  <div class="vinyl-container">
                                       <p class="disk-text" style="font-family:impact; font-size: 12px;">
                                           Engraving
                                       </p>
                                       <div alt="Current Vinyl Design" id="vinylImage" class="circle-black bg-brown marble"></div>
                                       <div id="circle" class="circle" style="background:url(images/ASTROWORLD.jpeg);"></div>
                                  </div>
                             </div>
                    </div>
                    <!-- Example title -->
                    <h2 style="text-align: center;">Marble vinyl record</h2>
                    <!-- Example price -->
                    <p class="price" style="text-align: center;">$100</p>
                    <!-- Example description -->
                    <p style="text-align: center;">Custom made 14 inch Vinyl Record<br>
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
               <!-- Who are we? -->
               <div class="section who-we-are">
                    <h2>Who Are We?</h2>
                    <p>
                         We are a small business devoted to crafting high-quality custom vinyl records,
                         driven by our passion for music on physical mediums. Each piece is created from scratch,
                         using premium materials sourced from trusted providers to deliver an exceptional listening experience.
                    </p>
               </div>

               <!-- Our Mission -->
               <div class="section our-mission">
                    <h2>Our Mission</h2>
                    <p>
                         Our initiative was inspired during a home gathering,
                         where we realized that the warmth of classic vinyl music had quietly faded into the background.
                         Since then, our mission has been to revive this almost-forgotten craft, bringing that nostalgic,
                         timeless experience to those who crave what modern music formats simply can’t replicate.
                    </p>
               </div>

               <!-- Creation Process -->
               <div class="section creation-process" style= "margin-bottom: 50px;">
                    <h2>Creation Process</h2>
                    <p>
                         Our process begins by partnering with trusted suppliers who provide us with all the essential materials
                         to craft high-quality vinyl records. These include high-grade vinyl discs, precision-cut lacquer masters,
                         durable protective sleeves, and eco-friendly packaging materials. Once we have everything,
                         we meticulously create each vinyl, ensuring every detail meets our standards of quality and authenticity.
                    </p>
               </div>
          </div>
     </div>
     </div>
     <script src="script.js"></script>
</body>
<?php include "assets/footer.php" ?>