<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Burası </title>
    <link rel="stylesheet" href="<?php echo e(assets('css/app.css')); ?>">
</head>
<body>
<?php if($message = json_decode(session()->get('system-message'))): ?>
    <div style="max-width: 350px;border: 1px solid #ddd; position: absolute; top: 20px; right: 20px; padding: 15px; border-radius: 8px; transition: 500ms all;" id="system-message">
        <h3 style="font-size: 20px; font-family: Arial, sans-serif; margin-bottom: 4px;"><?php echo $message->title; ?></h3>
        <p style="font-size: 15px; font-family: Arial, sans-serif;"><?php echo $message->message; ?></p>
    </div>
<?php endif; ?>
2213123
<script src="<?php echo e(assets('js/app.js')); ?>" type="module"></script>
</body>
</html><?php /**PATH /Users/bekir/Desktop/projects/framework/public/view/home.blade.php ENDPATH**/ ?>