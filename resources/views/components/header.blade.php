<div x-data="{ open: false }" class="relative">
    <header class="text-gray-600 body-font border-b bg-gray-700">
        <nav>
            <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
                <!-- Hamburger Menu Icon -->
                <div class="absolute top-0 left-0 mt-4 ml-4 md:hidden z-50 md:hidden">
                    <button @click="open = !open" class="text-white">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 6a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm1 5a1 1 0 100 2h12a1 1 0 100-2H4z" clip-rule="evenodd"></path>
                            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <!-- Logo and Navigation Links -->
                <div class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0 md:mr-auto">
                    <img src="{{ asset('images/logo.svg') }}" alt="サイトのロゴ" class="w-10 h-10">
                    <span class="text-white rounded-md px-3 py-2 text-lg font-medium">RRH |</span>
                    <a href="{{ route('search') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">店舗検索</a>
                    <a href="{{ route('posts') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">レビュー掲示板</a>
                </div>

                <!-- Mobile Navigation Menu -->
               <div :class="{ 'block': open, 'hidden': !open }"class="fixed mt-10 left-0 duration-200 ease-in-out md:hidden w-48" x-show="open" @click="open = false" @click.away="open = false" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-x-full" x-transition:enter-end="opacity-100 translate-x-0" x-transition:leave="transition ease-in duration-300"  x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 -translate-x-full">
                    <div class="h-full w-50 bg-gray-800 overflow-auto">
                        <div class="px-4 py-2 flex flex-col">
                            @if(Auth::guest())
                                <a href="{{ route('login') }}" class="text-white hover:bg-gray-700 hover:text-white rounded-md px-4 py-2 text-sm font-medium">ログイン</a>
                                <a href="{{ route('register') }}" class="text-white hover:bg-gray-700 hover:text-white rounded-md px-4 py-2 text-sm font-medium">会員登録</a>
                            @else
                                <a href="{{ route('favorites') }}" class="text-white hover:bg-gray-700 hover:text-white rounded-md px-4 py-2 text-sm font-medium">お気に入り一覧</a>
                                <a href="{{ route('history') }}" class="text-white hover:bg-gray-700 hover:text-white rounded-md px-4 py-2 text-sm font-medium">投稿履歴</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-white hover:bg-gray-700 hover:text-white rounded-md px-4 py-2 text-sm font-medium">ログアウト</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Desktop Navigation Menu -->
                <div class="hidden md:flex items-center ml-6">
                    @if(Auth::guest())
                        <a href="{{ route('login') }}" class="text-white hover:bg-gray-700 hover:text-white rounded-md px-4 py-2 text-sm font-medium">ログイン</a>
                        <a href="{{ route('register') }}" class="text-white hover:bg-gray-700 hover:text-white rounded-md px-6 py-2 text-sm font-medium">会員登録</a>
                    @else
                        <a href="{{ route('favorites') }}" class="text-white hover:bg-gray-700 hover:text-white rounded-md px-4 py-2 text-sm font-medium">お気に入り一覧</a>
                        <a href="{{ route('history') }}" class="text-white hover:bg-gray-700 hover:text-white rounded-md px-4 py-2 text-sm font-medium">投稿履歴</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-white hover:bg-gray-700 hover:text-white rounded-md px-4 py-2 text-sm font-medium">ログアウト</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endif
                </div>
            </div>
        </nav>
    </header>
</div>