<?php include "assets/head.php" ?>
<link rel="stylesheet" href="css/create.css">
<link rel="stylesheet" href="css/rotative.css">
<style>
@keyframes crazyAnimation {
    0% {
        transform: translateX(-50%);
        font-family: 'Courier New', monospace;
    }
    10% {
        transform: translateX(-50%);
        font-family: 'Comic Sans MS', cursive;
    }
    20% {
        transform:   translateX(-50%);
        font-family: 'Impact', sans-serif;
    }
    30% {
        transform:  translateX(-50%);
        font-family: 'Papyrus', fantasy;
    }
    40% {
        transform:  translateX(-50%);
        font-family: 'Courier New', monospace;
    }
    50% {
        transform: translateX(-50%);
        font-family: 'Times New Roman', serif;
    }
    60% {
        transform:  translateX(-50%);
        font-family: 'Arial Black', sans-serif;
    }
    70% {
        transform:  translateX(-50%);
        font-family: 'Verdana', sans-serif;
    }
    80% {
        transform:   translateX(-50%);
        font-family: 'Courier New', monospace;
    }
    90% {
        transform:translateX(-50%);
        font-family: 'Georgia', serif;
    }
    100% {
        transform:translateX(-50%);
        font-family: 'Courier New', monospace;
    }
}

@keyframes typingEffect {
    from {
        width: 0;
    }
    to {
        width: 100%;
    }
}

.disk-text-engraving {
    position: absolute;
    top: 5%;
    left: 50%;
    transform: translateX(-100%);
    z-index: 1000;
    text-align: center;

    display: inline-block;
    font-size: 1rem;
    font-family: 'Courier New', monospace;
    overflow: hidden;

    animation: typingEffect 3s steps(10, end), crazyAnimation 10s infinite;
}

</style>
</head>

<body class="d-flex flex-column min-vh-100 design-station-page">
    <?php include "assets/nav.php" ?>
    <h1 class="text-center font-pacifico text-4xl md:text-5xl text-indigo-600 mt-4">
        Design Station
    </h1>

    <div class="create-container container d-flex align-items-center justify-content-around flex-column flex-md-row">

        <!-- Rotative vinyl -->
        <a href="select-engraving.php" style="display: inline-block;">
            <div class="rotative-container-design" style="width:20vw;height:20vw">
                <div class="main-container">
                    <p class="disk-text-engraving disk-text fs-5 fs-sm-6" style=" top:10%;">Engraving</p>
                     <div class="vinyl-container-create">
                          <div alt="Current Vinyl Design" id="vinylImage" class="circle-black black plain"></div>
                          <div id="circle" class="circle" style="background:url(./images/college.jpg);"></div>
                     </div>
                </div>
            </div>
        </a>

        <!-- Rotative vinyl -->
        <a href="select-color.php" style="display: inline-block;">
            <div class="rotative-container-design" style="width:30vw;height:30vw">
                <div class="main-container">
                    <p class="disk-text fs-sm-6 fs-4" style="font-family: 'Georgia', serif;  top:13%;">Color and design</p>
                     <div class="vinyl-container-create">
                          <div alt="Current Vinyl Design" id="vinylImage" class="circle-black bg-blue marble"></div>
                          <div id="circle" class="circle" style="background:url(.<?= $img ?>);"></div>
                     </div>
                </div>
            </div>
        </a>

        <!-- Rotative vinyl -->
        <a href="select-artist.php" style="display: inline-block;">
            <div class="rotative-container-design" style="width:20vw;height:20vw">
                <div class="main-container">
                    <p class="disk-text fs-5 fs-sm-6" style="font-family: 'Georgia', serif;">Artist and album</p>
                     <div class="vinyl-container-create">
                          <div alt="Current Vinyl Design" id="vinylImage" class="circle-black black plain"></div>
                          <div id="circle" class="circle" style="background:url(./images/abbey-road.jpg);"></div>
                     </div>
                </div>
            </div>
        </a>

    </div>

    <?php include "assets/footer.php" ?>
</body>
