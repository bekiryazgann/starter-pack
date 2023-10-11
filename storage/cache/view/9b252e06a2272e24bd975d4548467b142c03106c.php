<?php if($message = json_decode(session()->get('system-message'))): ?>
    <div class="max-w-[350px] border border-[#ddd] absolute top-[20px] right-[20px] p-4 rounded-lg transition duration-500 shadow-lg" id="system-message">
        <h3 class="text-2xl mb-1"><?php echo $message->title; ?></h3>
        <p><?php echo $message->message; ?></p>
    </div>
<?php endif; ?><?php /**PATH /Users/bekir/Desktop/projects/starter-pack/public/view/layout/alert.blade.php ENDPATH**/ ?>