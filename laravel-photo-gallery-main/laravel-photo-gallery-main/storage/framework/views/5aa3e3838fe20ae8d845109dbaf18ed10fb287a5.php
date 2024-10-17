<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> Albums <?php $__env->endSlot(); ?>
    <div class="container mx-auto mt-6 p-4">
        <div class="w-full m-2 p-2">
            <a href="<?php echo e(route('albums.create')); ?>" class="bg-green-600 text-white p-2 m-2 font-semibold rounded-lg">Create</a>
        </div>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
          <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Id</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Title</th>
            <th scope="col" class="relative px-6 py-3">Manage</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
            <td class="px-6 py-4 whitespace-nowrap"><?php echo e($album->id); ?></td>
            <td class="px-6 py-4 whitespace-nowrap">
              <a class="text-indigo-500 hover:text-indigo-700 font-semibold" href="<?php echo e(route('album.show', $album->id)); ?>">
              <?php echo e($album->title); ?>

              </a>
            </td>
            
            <td class="px-6 py-4 text-right text-sm">
              <div class="flex justify-center">
               <a href="<?php echo e(route('albums.edit', $album->id)); ?>" class="py-2 px-4 bg-green-500 hover:bg-green-700 rounded-lg mr-2">Edit</a>
               <form method="POST" action="<?php echo e(route('albums.destroy', $album->id)); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => ['class' => 'bg-red-500 hover:bg-red-700']]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'bg-red-500 hover:bg-red-700']); ?>Delete <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?> 
              </form>
              </div>
            </td>
          </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
      <div class="m-2 p-2">Pagination</div>
    </div>
  </div>
</div>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH C:\Users\DELL\Downloads\laravel-photo-gallery-main\laravel-photo-gallery-main\resources\views/albums/index.blade.php ENDPATH**/ ?>