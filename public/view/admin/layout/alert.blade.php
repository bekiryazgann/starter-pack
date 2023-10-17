@if($message = json_decode(session()->get('system-message')))
    <div class="max-w-sm p-4 bg-white rounded-xl shadow-xl border border-gray-300 justify-start items-start gap-4 inline-flex fixed top-[1.5rem] left-2/4 -translate-x-2/4 transition duration-200 z-[99999]">
        <div class="grow shrink basis-0 pr-8 justify-start items-start gap-4 flex p-">
            <div class="w-5 h-5 relative rounded-full">
                <div class="w-5 h-5 left-0 top-0 absolute text-gray-500">
                    <i class="icon-info-circle text-[20px]"></i>
                </div>
            </div>
            <div class="grow shrink basis-0 pt-0.5 flex-col justify-start items-start gap-3 inline-flex">
                <div class="self-stretch flex-col justify-start items-start gap-1 flex">
                    <div class="self-stretch text-gray-900 text-sm font-semibold leading-tight">{!! $message->title !!}</div>
                    <div class="self-stretch text-slate-700 text-sm font-normal leading-tight">{!! $message->message !!}</div>
                </div>
            </div>
        </div>
        <div class="rounded-lg justify-center items-center flex">
            <button class="relative hover:bg-gray-100 p-1 rounded-lg flex items-center justify-center w-6 h-6" id="alert-close">
                <i class="icon-x-close text-[20px]"></i>
            </button>
        </div>
    </div>
@endif