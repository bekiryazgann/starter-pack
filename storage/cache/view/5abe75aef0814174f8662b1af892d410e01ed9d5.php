<header class="fixed top-0 left-[300px] h-[90px] border-b border-b-zinc-200 w-[calc(100vw-300px)] flex items-center justify-between px-4 py-4 md:px-5 lg:px-6 2xl:py-5 3xl:px-8 4xl:px-10 bg-white z-50">
    <div class="flex items-center">
        <h1 class="text-gray-900 text-3xl font-semibold leading-[38px] pr-3 mr-3 border-r border-b-zinc-200"><?php echo $__env->yieldContent('title'); ?></h1>
        <div class="inline-flex items-center gap-2.5 flex-wrap">
            <a role="button" class="inline-flex items-center gap-2 text-sm text-gray-700 last:text-gray-500 font-medium last:pointer-events-none" href="/ecommerce">E-ticaret</a>
            <span class="h-1 w-1 rounded-full bg-gray-300 last:hidden"></span>
            <a role="button" class="inline-flex items-center gap-2 text-sm text-gray-700 last:text-gray-500 font-medium last:pointer-events-none" href="/ecommerce/products">Ürünler</a>
            <span class="h-1 w-1 rounded-full bg-gray-300 last:hidden"></span>
            <a role="button" class="inline-flex items-center gap-2 text-sm text-gray-700 last:text-gray-500 font-medium last:pointer-events-none" href="/ecommerce/products">Ürün Ekle</a>
            <span class="h-1 w-1 rounded-full bg-gray-300 last:hidden"></span>
            <a role="button" class="inline-flex items-center gap-2 text-sm text-gray-700 last:text-gray-500 font-medium last:pointer-events-none" href="#">Varyant Seçenekleri</a>
            <span class="h-1 w-1 rounded-full bg-gray-300 last:hidden"></span>
        </div>
    </div>
    <div class="max-w-2xl w-full flex items-center justify-end">
        <button class="group inline-flex items-center focus:outline-none xl:h-10 xl:w-full xl:max-w-sm xl:rounded-xl xl:border xl:border-gray-200 xl:py-2 xl:pe-2 xl:ps-3.5 xl:shadow-sm xl:backdrop-blur-md xl:transition-colors xl:duration-200 xl:hover:border-gray-400 group" id="search">
            <i class="icon-search-lg text-[15px] me-1"></i>
            <span class="select-none text-sm text-gray-600 group-hover:text-gray-900 xl:inline-flex">Aradığınız sayfayı kolayca bulun...</span>
            <span class="select-none ms-auto hidden items-center text-sm text-gray-600 lg:flex lg:rounded-md lg:bg-gray-200/70 lg:px-1.5 lg:py-1 lg:text-xs lg:font-semibold xl:justify-normal group-hover:bg-gray-400/40 group-hover:text-gray-700 transition-colors duration-200">
                <i class="icon-command text-[12px] me-0.5"></i>
                K
            </span>
        </button>
    </div>
</header>

<div class="fixed inset-0 z-[999] overflow-y-auto overflow-x-hidden opacity-0 hidden transition-all duration-200 " id="commands">
    <div class="flex min-h-screen flex-col items-center justify-center p-4 sm:p-5">
        <div class="fixed inset-0 cursor-pointer bg-black bg-opacity-60 dark:bg-opacity-20 opacity-100" id="close"></div>
        <button type="button" class="sr-only">Sr Only</button>
        <div class="pointer-events-none relative w-full transform overflow-hidden transition-all opacity-100 scale-100">
            <div class="pointer-events-auto m-auto w-full break-words bg-white shadow-xl rounded-xl max-w-lg overflow-hidden">
                <div class="flex items-center -px-5 -py-4">
                    <div class="flex flex-col flex-1">
                        <label class="block">
                            <span class="flex items-center peer w-full transition duration-200 px-4 py-2 text-sm leading-[40px] rounded-t-md [&amp;.is-focus]:ring-2 [&amp;.is-focus]:bg-transparent border-0 [&amp;_input::placeholder]:opacity-80 [&amp;.is-focus]:ring-gray-900/20 text-gray-1000 [&amp;_input::placeholder]:text-gray-600">
                                <span class="whitespace-nowrap leading-normal flex items-center justify-center">
                                    <i class="icon-search-lg text-[20px] text-gray-500"></i>
                                </span>
                                <input id="search-input" placeholder="Ne aradınız?" class="w-full border-0 bg-transparent p-0 placeholder-gray-500 focus:outline-none focus:ring-0 pl-2.5 rtl:pr-2.5" type="text" value="">
                            </span>
                        </label>
                    </div>
                </div>
                <div class="custom-scrollbar max-h-[60vh] overflow-y-auto border-t border-gray-200 px-2 py-4">
                    <h6 class="mb-5 px-3 font-semibold dark:text-gray-700">Hızlı Linkler</h6>
                    <h6 class="mb-1 px-3 text-xs font-semibold uppercase tracking-widest text-gray-500 dark:text-gray-500">Home</h6>
                    <a class="relative my-0.5 flex items-center rounded-lg px-3 py-2 text-sm hover:bg-gray-100 focus:outline-none focus-visible:bg-gray-100 dark:hover:bg-gray-50/50 dark:hover:backdrop-blur-lg" href="/ecommerce">
                        <span class="inline-flex items-center justify-center rounded-md border border-gray-300 p-2 text-gray-500">
                            <i class="icon-file-06 text-[20px]"></i>
                        </span>
                        <span class="ms-3 grid gap-0.5">
                            <span class="font-medium capitalize text-gray-900 dark:text-gray-700">E-Commerce</span>
                            <span class="text-gray-500">/ecommerce</span>
                        </span>
                    </a>
                    <a class="relative my-0.5 flex items-center rounded-lg px-3 py-2 text-sm hover:bg-gray-100 focus:outline-none focus-visible:bg-gray-100 dark:hover:bg-gray-50/50 dark:hover:backdrop-blur-lg" href="/support">
                        <span class="inline-flex items-center justify-center rounded-md border border-gray-300 p-2 text-gray-500">
                            <i class="icon-file-06 text-[20px]"></i>
                        </span>
                        <span class="ms-3 grid gap-0.5">
                            <span class="font-medium capitalize text-gray-900 dark:text-gray-700">Support</span>
                            <span class="text-gray-500">/support</span>
                        </span>
                    </a>
                    <a class="relative my-0.5 flex items-center rounded-lg px-3 py-2 text-sm hover:bg-gray-100 focus:outline-none focus-visible:bg-gray-100 dark:hover:bg-gray-50/50 dark:hover:backdrop-blur-lg" href="/logistics">
                        <span class="inline-flex items-center justify-center rounded-md border border-gray-300 p-2 text-gray-500">
                            <i class="icon-file-06 text-[20px]"></i>
                        </span>
                        <span class="ms-3 grid gap-0.5">
                            <span class="font-medium capitalize text-gray-900 dark:text-gray-700">Logistics</span>
                            <span class="text-gray-500">/logistics</span>
                        </span>
                    </a>
                    <a class="relative my-0.5 flex items-center rounded-lg px-3 py-2 text-sm hover:bg-gray-100 focus:outline-none focus-visible:bg-gray-100 dark:hover:bg-gray-50/50 dark:hover:backdrop-blur-lg" href="/analytics">
                        <span class="inline-flex items-center justify-center rounded-md border border-gray-300 p-2 text-gray-500">
                            <i class="icon-file-06 text-[20px]"></i>
                        </span>
                        <span class="ms-3 grid gap-0.5">
                            <span class="font-medium capitalize text-gray-900 dark:text-gray-700">Analytics</span>
                            <span class="text-gray-500">/analytics</span>
                        </span>
                    </a>
                    <a class="relative my-0.5 flex items-center rounded-lg px-3 py-2 text-sm hover:bg-gray-100 focus:outline-none focus-visible:bg-gray-100 dark:hover:bg-gray-50/50 dark:hover:backdrop-blur-lg" href="/file">
                        <span class="inline-flex items-center justify-center rounded-md border border-gray-300 p-2 text-gray-500">
                            <i class="icon-file-06 text-[20px]"></i>
                        </span>
                        <span class="ms-3 grid gap-0.5">
                            <span class="font-medium capitalize text-gray-900 dark:text-gray-700">File</span>
                            <span class="text-gray-500">/file</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /Users/bekir/Desktop/projects/starter-pack/public/view/admin/layout/header.blade.php ENDPATH**/ ?>