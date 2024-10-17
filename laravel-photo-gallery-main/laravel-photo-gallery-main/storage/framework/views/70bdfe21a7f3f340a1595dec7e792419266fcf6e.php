<style>
    .image-container {
        max-width: 100%;
        overflow: hidden;
    }

    .main-image {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Adjust the minimum width as needed */
        gap: 50px 15px; /* Adjust the gap between grid items both horizontally and vertically */
        margin: 20px auto; /* Adjust margin as needed */
    }

    .grid-item {
        overflow: hidden;
        margin: 0 10px 20px 0; /* Adjust margins to create space both horizontally and vertically between grid items */
        position: relative;
    }

    .grid-item img {
        width: 100%; /* Set the width to 100% to match the width of the header image */
        height: auto;
        object-fit: cover;
    }

    .buttons-container {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        display: flex;
        justify-content: space-between;
        padding: 10px;
        background-color: rgba(255, 255, 255, 0.8);
        opacity: 0;
        transition: opacity 0.3s ease; /* Add a transition for a smooth effect */
    }

    .grid-item:hover .buttons-container {
        opacity: 1; /* Show buttons when the grid item is hovered */
    }

    .button {
        padding: 5px;
        border: none;
        cursor: pointer;
    }

    .button.red {
        background-color: #e53e3e; /* Red color */
        color: #ffffff;
    }

    .button.green {
        background-color: #48bb78; /* Green color */
        color: #ffffff;
    }
</style>
<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, ['style' => 'margin-bottom: 20px;']); ?> 
        <a class="text-indigo-500 hover:text-indigo-700 font-semibold" href="<?php echo e(route('album.show', $album->id)); ?>">
            <?php echo e($album->title); ?>

        </a>
     <?php $__env->endSlot(); ?>
    <div class="container mx-auto m-2 p-2 bg-white shadow-md rounded-lg flex">
    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
        <div class="sm:col-span-6">
            <label for="title" class="block text-sm font-medium text-gray-700">Album Image</label>
            <div class="mt-1">
            <input type="file" id="image" name="image" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
            </div>
        </div>
        <div class="sm:col-span-6 pt-5">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => ['class' => 'bg-green-500','onclick' => 'handleUpload()']]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'bg-green-500','onclick' => 'handleUpload()']); ?>Upload <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
    </div>

    <!-- the div of the uploaded image and the retrive button -->
    <div class="flex flex-col items-center justify-center">
        <!-- image uploaded -->
        <div class="container mx-auto m-2 p-2 bg-white flex" id="containerId"></div>
            
       <!-- retrieve images button -->
        <div class="sm:col-span-6 pt-5" id="RF_id" style="display: none;">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => ['class' => 'bg-red-500']]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'bg-red-500']); ?><a href="<?php echo e(route('album.retrieve', $album->id)); ?>">Retrieve</a> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
    </div>
    
</div>
</div>


    <!-- Add this script tag before your custom script that uses jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        function handleUpload() {
            var input = document.getElementById("image");
            var file = input.files[0];

            if (file) {
             
                var formData = new FormData();
                formData.append("image", file);

                // Get the full path of the uploaded image
                var fullPath = URL.createObjectURL(file);

                // Pass the fullPath to the server
                formData.append("fullPath", fullPath);
                // Create a new img element for the original image
                var originalImg = document.createElement("img");
                originalImg.src = fullPath;
                originalImg.alt ="fullPath";
               // Append the original img element to the container (replace 'containerId' with the actual ID of the container)
               document.getElementById("containerId").appendChild(originalImg);

               // Show the Retrieve button
               document.getElementById("RF_id").style.display = "block";
               var RFbutton=document.createElement("x-button");
               RFbutton.classList.add('bg-red-500');
               document.getElementById("RF_id").appendChild(RFbutton);

               //process of the query image
                $.ajax({
                    type: "POST",
                    url: "http://127.0.0.1:5000/queryImage",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        var imgData = response.input_features;
                        // Process and display the image data as needed
                        console.log(imgData);
                    },
                    error: function (error) {
                        console.log('Error:', error);
                    }
                });
            }
        }
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH C:\Users\DELL\Downloads\laravel-photo-gallery-main\laravel-photo-gallery-main\resources\views/albums/showToQuery.blade.php ENDPATH**/ ?>