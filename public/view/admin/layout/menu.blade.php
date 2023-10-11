<div class=" pb-3 overflow-y-scroll h-[calc(100vh-200px)] max-h-[calc(100vh-200px)]">
    {{--<h6 class="mb-2 truncate px-6 text-[11px] uppercase tracking-widest text-gray-500 2xl:px-8">Home</h6>--}}
    <a class="group relative mx-3 my-0.5 flex items-center rounded-md px-3 py-2 capitalize lg:my-1 2xl:mx-5 2xl:my-2 text-gray-700 transition-colors duration-200 hover:bg-gray-100 hover:text-gray-900"
       href="{{site('admin')}}">
        <span class="me-2 inline-flex h-5 w-5 items-center justify-center rounded-md [&amp;>svg]:h-[19px] [&amp;>svg]:w-[19px] text-gray-800">
           <i class="icon-home-03"></i>
        </span>
        Anasayfa
    </a>
    <a class="group relative mx-3 my-0.5 flex items-center rounded-md px-3 py-2 capitalize lg:my-1 2xl:mx-5 2xl:my-2 text-gray-700 transition-colors duration-200 hover:bg-gray-100 hover:text-gray-900"
       href="{{site('admin')}}">
        <span class="me-2 inline-flex h-5 w-5 items-center justify-center rounded-md [&amp;>svg]:h-[19px] [&amp;>svg]:w-[19px] text-gray-800">
           <i class="icon-settings-02"></i>
        </span>
        Seo Ayarları
    </a>
    <a class="group relative mx-3 my-0.5 flex items-center rounded-md px-3 py-2 capitalize lg:my-1 2xl:mx-5 2xl:my-2 text-gray-700 transition-colors duration-200 hover:bg-gray-100 hover:text-gray-900"
       href="{{site('admin')}}">
        <span class="me-2 inline-flex h-5 w-5 items-center justify-center rounded-md [&amp;>svg]:h-[19px] [&amp;>svg]:w-[19px] text-gray-800">
           <i class="icon-user-01"></i>
        </span>
        Kullanıcılar
    </a>
    <a class="group relative mx-3 my-0.5 flex items-center rounded-md px-3 py-2 capitalize lg:my-1 2xl:mx-5 2xl:my-2 text-gray-700 transition-colors duration-200 hover:bg-gray-100 hover:text-gray-900"
       href="{{site('admin')}}">
        <span class="me-2 inline-flex h-5 w-5 items-center justify-center rounded-md [&amp;>svg]:h-[19px] [&amp;>svg]:w-[19px] text-gray-800">
           <i class="icon-translate-01"></i>
        </span>
        Dil Ayarları
    </a>
    <div id="collapse">
        <div class="group relative mx-3 flex cursor-pointer items-center justify-between rounded-md px-3 py-2 lg:my-1 2xl:mx-5 2xl:my-2 text-gray-700 transition-colors duration-200 hover:bg-gray-100"
             id="trigger">
            <span class="flex items-center">
                <span class="me-2 inline-flex h-5 w-5 items-center justify-center rounded-md text-gray-800">
                    <i class="icon-box"></i>
                </span>
                Kargo
            </span>
            <i class="icon-chevron-down text-lg -rotate-90 text-gray-500 transition-transform duration-200 flex items-center justify-center"></i>
        </div>
        <div id="content" class="transition-all duration-200 overflow-hidden" data-state="false" style="height: 0;">
            <div>
                <a class="mx-3.5 mb-0.5 flex items-center rounded-md px-3.5 py-2 capitalize last-of-type:mb-1 lg:last-of-type:mb-2 2xl:mx-5 text-gray-500 transition-colors duration-200 hover:bg-gray-100 hover:text-gray-900" href="/logistics/shipments">
                    <span class="me-[18px] ms-1 inline-flex h-1 w-1 rounded-full bg-current transition-all duration-200 opacity-40"></span>
                    Teslim Listesi
                </a>
                <a class="mx-3.5 mb-0.5 flex items-center rounded-md px-3.5 py-2 capitalize last-of-type:mb-1 lg:last-of-type:mb-2 2xl:mx-5 text-gray-500 transition-colors duration-200 hover:bg-gray-100 hover:text-gray-900" href="/logistics/shipments/FC6723757651DB74">
                    <span class="me-[18px] ms-1 inline-flex h-1 w-1 rounded-full bg-current transition-all duration-200 opacity-40"></span>
                    Teslim Detayları
                </a>
                <a class="mx-3.5 mb-0.5 flex items-center rounded-md px-3.5 py-2 capitalize last-of-type:mb-1 lg:last-of-type:mb-2 2xl:mx-5 text-gray-500 transition-colors duration-200 hover:bg-gray-100 hover:text-gray-900" href="/logistics/shipments/create">
                    <span class="me-[18px] ms-1 inline-flex h-1 w-1 rounded-full bg-current transition-all duration-200 opacity-40"></span>
                    Teslimat Oluştur
                </a>
                <a class="mx-3.5 mb-0.5 flex items-center rounded-md px-3.5 py-2 capitalize last-of-type:mb-1 lg:last-of-type:mb-2 2xl:mx-5 text-gray-500 transition-colors duration-200 hover:bg-gray-100 hover:text-gray-900" href="/logistics/shipments/FC6723757651DB74/edit">
                    <span class="me-[18px] ms-1 inline-flex h-1 w-1 rounded-full bg-current transition-all duration-200 opacity-40"></span>
                    Teslimat Düzenle
                </a>
                <a class="mx-3.5 mb-0.5 flex items-center rounded-md px-3.5 py-2 capitalize last-of-type:mb-1 lg:last-of-type:mb-2 2xl:mx-5 text-gray-500 transition-colors duration-200 hover:bg-gray-100 hover:text-gray-900" href="/logistics/customer-profile">
                    <span class="me-[18px] ms-1 inline-flex h-1 w-1 rounded-full bg-current transition-all duration-200 opacity-40"></span>
                    Müşteri Profilleri
                </a>
                <a class="mx-3.5 mb-0.5 flex items-center rounded-md px-3.5 py-2 capitalize last-of-type:mb-1 lg:last-of-type:mb-2 2xl:mx-5 text-gray-500 transition-colors duration-200 hover:bg-gray-100 hover:text-gray-900" href="/logistics/tracking/FC6723757651DB74">
                    <span class="me-[18px] ms-1 inline-flex h-1 w-1 rounded-full bg-current transition-all duration-200 opacity-40"></span>
                    Takip
                </a>
            </div>
        </div>
    </div>
</div>