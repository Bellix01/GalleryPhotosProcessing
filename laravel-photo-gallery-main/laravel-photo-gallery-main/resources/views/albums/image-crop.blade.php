<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include your CSS and JS dependencies here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
</head>

<style type="text/css">
    img {
        display: block;
        max-width: 100%;
    }

    .preview {
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }

    .modal-lg {
        max-width: 1000px !important;
    }
 

    .floating-message {
        position: fixed;
        top: 50px; /* Adjust the top position */
        left: 50%;
        transform: translateX(-50%);
        background-color: #4CAF50;
        color: white;
        padding: 15px;
        border-radius: 5px;
        display: none; /* Initially hide the message */
        z-index: 1001; /* Higher z-index than the overlay */
    }
</style>

<x-app-layout>
    <x-slot name="header">{{ $album->title }}</x-slot>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-body">
        
                <div id="floatingMessage" class="floating-message"></div>
                    <div id="croppieContainer" style="width: 100%;"></div>

                    <!-- Hidden input field for cropped image data -->
                    <!-- <input type="hidden" id="croppedImageData" name="croppedImageData"> -->

                    <x-button type="button" class="btn btn-primary " id="crop" data-album-id="{{ $album->id }}" data-image-id="{{ $image->id }}">Crop</x-button>
                    <x-button type="button" class="btn btn-primary "><a  href="{{ route('album.show', $album->id) }}" style="text-decoration: none; color: white;">Back</a></x-button>
                </div>
            </div>
            
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="imageInput" src="{{ $image->getUrl() }}" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>

<script>
    const image = document.getElementById('imageInput');
    const cropper = new Cropper(image, {
        aspectRatio: 0,
        viewMode: 0,
    });

    document.getElementById('crop').addEventListener('click', function () {
        const croppedImageBlob = cropper.getCroppedCanvas().toBlob((blob) => {
            const formData = new FormData();
            formData.append('croppedImage', blob, `cropped-image${this.getAttribute('data-image-id')}.jpg`);

            const albumId = this.getAttribute('data-album-id');
            const imageId = this.getAttribute('data-image-id');

            fetch(`/albums/${albumId}/image/${imageId}/crop`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
            })
            .then(response => response.json())
            .then(data => {
               // Truncate the message if it's too long
               const truncatedMessage = data.success ? 'Cropping successful!' : 'Cropping failed.';

                // Display the truncated message in the floating message
                const floatingMessage = document.getElementById('floatingMessage');
                floatingMessage.textContent = truncatedMessage;
                floatingMessage.style.backgroundColor = data.success ? '#4CAF50' : '#f44336';

                // Show the floating message
                floatingMessage.style.display = 'block';

                // Wait for 2 seconds (2000 milliseconds) and hide the message and overlay
                setTimeout(() => {
                    // Hide the floating message and overlay
                    floatingMessage.style.display = 'none';
                    overlay.style.display = 'none';
                }, 1000);

                    // Log the response data to the console
                    console.log(data);

            })
            .catch(error => {
                alert('Error: There was a problem with the fetch operation.');
                console.error('There was a problem with the fetch operation:', error);
            });
        }, 'image/jpeg');
    });
</script>

</body>
</html>
