<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php echo $__env->yieldContent('title'); ?> </title>
    <link rel="stylesheet" href="<?php echo e(assets('css/style.css')); ?>">
</head>
<body class="h-screen">
<?php if ($__env->exists('admin.layout.alert')) echo $__env->make('admin.layout.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<main class="flex items-start">
    <?php if ($__env->exists('admin.layout.aside')) echo $__env->make('admin.layout.aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="w-[calc(100vw-300px)] ml-[300px]">
        <?php if ($__env->exists('admin.layout.header')) echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="fixed top-[90px] left-[300px] right-0 bottom-0 max-h-[calc(100vh-90px)] z-10">
            <div class="overflow-y-auto max-h-[calc(100vh-90px)] p-8">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo e(assets('js/admin/app.js')); ?>"></script>
</body>
</html><?php /**PATH /Users/bekir/Desktop/projects/starter-pack/public/view/admin/layout/index.blade.php ENDPATH**/ ?>