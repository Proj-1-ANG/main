<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projekt - Fiszki</title>
    <link rel="stylesheet" type="text/css" href="../styles/stylemain.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- sekcja 1 -->
    <section>
        <p>technik informatyk/technik programista - Web design and programming languages</p>
        
            <button class="mainmenu"><a href="#">
            <i class="fa-solid fa-graduation-cap" style="color: blue"></i>
            Ucz się</a>
            </button>
        
       
            <button class="mainmenu"><a href="#">
                <i class="fa-solid fa-file-lines" style="color: blue"></i>
                Test</a></button>
       
        
        <div id="undermaindiv">
            <button id="volume">
            <i class="fa-solid fa-volume-high" style="color: darkgray"></i>
        </button>
        <button id="favorite">
                    <i class="fa-solid fa-star" style="color: darkgray"></i>
                </button>
            <div id="maindiv" onclick="rotate();">
                <!-- TODO: dwa przyciski (jeden glosnik do odczytania glosowego, drugi gwiazdka do favorite)-->
                
                
                polski
            </div>
        </div>
    </section>

    <script src="../scripts/script.js"></script>
</body>
</html>