<div id="BottomNav" class="relative flex w-full h-[138px] shrink-0">
    <nav class="fixed bottom-5 w-full max-w-[640px] px-5 z-10">
        <div class="grid grid-cols-4 h-fit rounded-[40px] justify-between py-4 px-5 bg-ngekos-black">
            <a href="{{ route('home') }}" class="flex flex-col items-center text-center gap-2">
                <img src="{{ Illuminate\Support\Str::endsWith(Route::currentRouteName(), 'home') ? asset('assets/images/icons/global-green.svg') : asset('assets/images/icons/global.svg') }}"
                    class="w-8 h-8 flex shrink-0" alt="icon">
                <span class="font-semibold text-sm text-white">Discover</span>
            </a>
            <a href="{{ route('orders') }}" class="flex flex-col items-center text-center gap-2">
                <img src="{{ Illuminate\Support\Str::endsWith(Route::currentRouteName(), 'orders') ? asset('assets/images/icons/note-favorite-green.svg') : asset('assets/images/icons/note-favorite.svg') }}"
                    class="w-8 h-8 flex shrink-0" alt="icon">
                <span class="font-semibold text-sm text-white">Orders</span>
            </a>
            <a href="{{ route('find') }}" class="flex flex-col items-center text-center gap-2">
                <img src="{{ Illuminate\Support\Str::endsWith(Route::currentRouteName(), 'find') ? asset('assets/images/icons/search-status-green.svg') : asset('assets/images/icons/search-status.svg') }}"
                    class="w-8 h-8 flex shrink-0" alt="icon">
                <span class="font-semibold text-sm text-white">Find</span>
            </a>
            <a href="#" class="flex flex-col items-center text-center gap-2">
                <img src="{{ asset('assets/images/icons/24-support.svg') }}" class="w-8 h-8 flex shrink-0"
                    alt="icon">
                <span class="font-semibold text-sm text-white">Help</span>
            </a>
        </div>
    </nav>
</div>
