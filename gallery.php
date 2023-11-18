
<?php include('head.php'); ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <title>Gallery</title>
<link rel="stylesheet" href="styles/gallerystyle.css">

</head>


<body>
    
    <div class="photo-container" id="photo-container"></div>

    <div class="enlarged-photo" id="enlarged-photo">
        <span class="close-button" onclick="hideEnlarged()">&times;</span>
        <img id="enlarged-img" src="" alt="Enlarged Image">
    </div>

    <script>
        fetch('gallery.json')
            .then(response => response.json())
            .then(data => {
                const photoContainer = document.getElementById('photo-container');

                data.images.forEach(image => {
                    const photoDiv = document.createElement('div');
                    photoDiv.className = 'photo';

                    const img = document.createElement('img');
                    img.src = image;
                    img.alt = 'Img ' + (data.images.indexOf(image) + 1);

                    img.setAttribute('onclick', 'showEnlarged("' + image + '")');

                    photoDiv.appendChild(img);

                    photoContainer.appendChild(photoDiv);
                });
            })
            .catch(error => {
                console.error('Error loading gallery data:', error);
            });

        function showEnlarged(imageSrc) {
            const enlargedPhoto = document.getElementById("enlarged-photo");
            const enlargedImg = document.getElementById("enlarged-img");

            enlargedImg.src = imageSrc;
            enlargedPhoto.style.display = "flex";
        }

        function hideEnlarged() {
            const enlargedPhoto = document.getElementById("enlarged-photo");
            enlargedPhoto.style.display = "none";
        }
    </script>
</body>
</html>
