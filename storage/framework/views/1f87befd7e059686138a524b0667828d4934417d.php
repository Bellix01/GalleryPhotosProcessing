<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> <?php echo e($album->title); ?> <?php $__env->endSlot(); ?>
    <div class="container mx-auto m-2 p-2 bg-white shadow-md rounded-lg">
        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
        <form method="POST" action="<?php echo e(route('albums.upload', $album->id)); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="sm:col-span-6">
              <label for="title" class="block text-sm font-medium text-gray-700"> Album Image </label>
              <div class="mt-1">
                <input type="file" id="image" name="image[]" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" multiple/>
              </div>
            </div>
            <div class="sm:col-span-6 pt-5">
              <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => ['class' => 'bg-green-500']]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'bg-green-500']); ?>Upload <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
          
        </form>
        <div class="sm:col-span-6 pt-5">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => ['class' => 'bg-green-500']]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'bg-green-500']); ?>
                <a  href="<?php echo e(route('album.image.showQuery', $album->id)); ?>">Relevance feedback process</a>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
       </div>
       <div class="mt-4">
         <div class="grid grid-cols-2 md:grid-cols-3 gap-2 md:gap-4">
           <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <div class="bg-gray-300 p-2"> 
              <a class="block relative h-56 rounded overflow-hidden">
                <img 
                alt="<?php echo e($photo->getUrl()); ?>" 
              
                src="<?php echo e($photo->getUrl()); ?>">
               </a>
               <div class="flex justify-between mt-4 p-4">
              <a class="m-2 p-2 bg-blue-500 hover:bg-blue-700 rounded-lg" href="<?php echo e(route('album.image.show', [$album->id, $photo->id])); ?>">Full image</a>
              <!-- <a class="m-2 p-2 bg-blue-500 hover:bg-blue-700 rounded-lg" href="<?php echo e(route('album.image.crop', [$album->id, $photo->id])); ?>">Crop</a> -->
              <a class="m-2 p-2 bg-blue-500 hover:bg-blue-700 rounded-lg" href="<?php echo e(route('album.image.showQueryImg', [$album->id, $photo->id])); ?>">RF</a>
              <a class="m-2 p-2 bg-blue-500 hover:bg-blue-700 rounded-lg" href="<?php echo e(route('album.image.crop', [$album->id, $photo->id])); ?>" id="cropImageLink">Crop</a>
              <a class="m-2 p-2 bg-blue-500 hover:bg-blue-700 rounded-lg" href="<?php echo e(route('album.image.download', [$album->id, $photo->id])); ?>">Download</a>
              <form method="POST" action="<?php echo e(route('album.image.destroy', [$album->id, $photo->id])); ?>">
              <div class="modal-body">
                <div id="croppieContainer" style="width: 100%;"></div>
              </div>
              
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button class="m-2 p-2 rounded-lg bg-red-500 hover:bg-red-700">Del</button>  
              </form> 
            </div>
            </div>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
       </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH C:\Users\DELL\Downloads\laravel-photo-gallery-main\laravel-photo-gallery-main\resources\views/albums/show.blade.php ENDPATH**/ ?>