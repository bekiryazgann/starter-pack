<aside class="w-[300px] border-r border-r-zinc-200 h-screen fixed top-0 left-0 flex flex-col justify-between">
    <div class="sticky top-0 z-40 bg-gray-0/10 px-6 pb-5 pt-5 dark:bg-gray-100/5 2xl:px-8 2xl:pt-6 h-[90px] border-b border-b-zinc-200">
        <a href="{{site('admin')}}" class="flex items-center justify-start h-full">
            <svg width="142" height="32" viewBox="0 0 142 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_2849_301573)">
                    <path d="M61.7327 1.61053L59.0781 8.45387H48.2325L46.6569 12.4718H56.5655L53.925 19.1874H44.1016L42.4834 23.4041H53.5276L50.9014 30.2759H32.4896L43.5197 1.61053H61.7327Z" fill="black"/>
                    <path d="M63.5781 1.61053H85.0703L82.3164 8.69523H75.2754L66.9424 30.2759H59.6175L67.9362 8.69523H60.8526L63.564 1.61053H63.5781Z" fill="black"/>
                    <path d="M76.7936 30.3473L87.8378 1.68182H95.1627L84.1185 30.333H76.7936V30.3473Z" fill="black"/>
                    <path d="M98.5421 30.8864C95.5467 30.8864 93.2188 30.2616 91.5721 28.998C89.9253 27.7486 89.0311 26.0023 88.9031 23.7591L96.1147 20.4084C96.3844 22.7794 97.8748 23.972 100.615 23.972C102.858 23.972 104.235 23.3189 104.746 22.0127C105.1 21.1183 104.632 20.3658 103.34 19.7553C103.284 19.7269 102.375 19.372 100.572 18.6905C98.2156 17.8102 96.5548 16.6744 95.6035 15.2546C94.624 13.778 94.624 11.8045 95.5751 9.31991C96.5548 6.70752 98.2297 4.66302 100.572 3.21485C102.929 1.73828 105.498 1 108.28 1C110.679 1 112.624 1.56791 114.129 2.70373C115.62 3.83957 116.556 5.45811 116.94 7.55939L109.97 10.9101C109.487 8.92236 108.252 7.91432 106.265 7.91432C104.547 7.91432 103.44 8.52484 102.929 9.76005C102.63 10.4131 102.744 10.9668 103.284 11.4212C103.823 11.8755 104.944 12.4292 106.662 13.0823C107.925 13.5508 108.905 13.9768 109.586 14.3743C110.268 14.7719 110.935 15.3114 111.574 15.9929C113.007 17.3842 113.149 19.5991 112.028 22.6232C110.977 25.2925 109.274 27.3511 106.918 28.7709C104.561 30.1907 101.779 30.9005 98.5562 30.9005L98.5421 30.8864Z" fill="black"/>
                    <path d="M120.347 1.61053H141.839L139.085 8.69523H132.044L123.725 30.2759H116.4L124.733 8.69523H117.649L120.361 1.61053H120.347Z" fill="black"/>
                    <path d="M8.40211 30.29H0.197014L11.1135 1.68152H19.3186L8.40211 30.29Z" fill="black"/>
                    <path d="M18.3391 3.1013L28.1767 28.8702H23.0095L13.1719 3.1013H18.3391ZM19.3186 1.68152H11.1135L22.0299 30.29H30.2351L19.3186 1.68152Z" fill="black"/>
                    <path d="M30.2351 30.29H22.03L32.9465 1.68152H41.1516L30.2351 30.29Z" fill="black"/>
                </g>
                <defs>
                    <clipPath id="clip0_2849_301573">
                        <rect width="142" height="30" fill="white" transform="translate(0 1)"/>
                    </clipPath>
                </defs>
            </svg>
        </a>
    </div>
    <div class="flex-1 overflow-hidden">
        @includeIf('admin.layout.menu')
    </div>
    <div class="px-4 py-6 border-t border-t-zinc-200 flex items-start justify-between max-h-[90px] h-[90px]">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full overflow-hidden bg-gray-300 flex items-center justify-center">
                <i class="icon-user-01 text-[24px] text-gray-600"></i>
            </div>
            <div>
                <h3 class="text-slate-700 text-sm font-medium leading-tight">Mert Uçar</h3>
                <span class="text-gray-500 text-sm leading-tight">mert@ucar.com</span>
            </div>
        </div>
        <div>
            <a class="block" href="{{ site('admin/auth/login') }}">
                <i class="icon-log-out-01 text-gray-700 text-[20px]"></i>
            </a>
        </div>
    </div>
</aside>