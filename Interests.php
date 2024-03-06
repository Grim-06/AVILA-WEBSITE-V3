<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Interest in life</title>
    <link rel="stylesheet" href="Inter.css">
    <style>
        .gallery {
            position: relative;
        }

        .photo-box {
            display: none;
            text-align: center;
        }

        .photo-box img {
            max-width: 100%;
            height: auto;
        }

        .slideshow-buttons {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }
    </style>
</head>

<body>

    <header>
        <h1>My Interest in life</h1>
    </header>

    <main class="gallery">
        <!-- Gallery Photos -->
        <div class="photo-box">
            <img src="Music.jpg" alt="Photo 1">
            <h2>Listening to music and Singing.</h2>
        </div>

        <div class="photo-box">
            <img src="Drive.jpg" alt="Photo 2">
            <h2>Driving.</h2>
        </div>

        <div class="photo-box">
            <img src="Time.jpg" alt="Photo 3">
            <h2>Spending time with my partner.</h2>
        </div>

        <!-- Add three more photo boxes -->
        <div class="photo-box">
            <img src="Photog.jpg" alt="Photo 4">
            <h2>Photography.</h2>
        </div>

        <div class="photo-box">
            <img src="Outside.jpg" alt="Photo 5">
            <h2>Going out.</h2>
        </div>

        <div class="photo-box">
            <img src="Play.jpg" alt="Photo 6">
            <h2>Playing games.</h2>
        </div>

        <!-- Slideshow buttons -->
        <div class="slideshow-buttons">
            <button onclick="prevSlide()">Previous</button>
            <button onclick="nextSlide()">Next</button>
        </div>
    </main>

    <footer>
        &copy; 2024 My Website. All rights reserved.
    </footer>

    <script>
        let currentSlide = 0;
        showSlide(currentSlide);

        function showSlide(index) {
            const slides = document.querySelectorAll('.photo-box');
            if (index >= slides.length) {
                currentSlide = 0;
            } else if (index < 0) {
                currentSlide = slides.length - 1;
            } else {
                currentSlide = index;
            }

            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = 'none';
            }

            slides[currentSlide].style.display = 'block';
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        function prevSlide() {
            showSlide(currentSlide - 1);
        }
    </script>

</body>

</html>
