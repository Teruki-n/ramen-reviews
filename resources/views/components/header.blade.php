<div>
    <header class="text-gray-600 body-font border-b bg-gray-700">
        <nav>
            <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
                <img src="{{ asset('images/logo.svg') }}" alt="サイトのロゴ" class="w-10 h-10">
                <div class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0 md:mr-auto">
                    <span class="text-white rounded-md px-3 py-2 text-lg font-medium">RRH |</span>
                    <a href="{{ route('search') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">店舗検索</a>
                    <a href="{{ route('posts') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">レビュー掲示板</a>
                </div>
                <div class="flex">
                    @if(Auth::guest())
                        <a href="{{ route('login') }}" class="text-white hover:bg-gray-700 hover:text-white rounded-md px-4 py-2 text-sm font-medium">ログイン</a>
                        <a href="{{ route('register') }}" class="text-white hover:bg-gray-700 hover:text-white rounded-md px-6 py-2 text-sm font-medium">会員登録</a>
                    @else
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>
                                        <div class="ml-1">
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 12a1 1 0 01-.707-.293l-3-3a1 1 0 111.414-1.414L10 9.586l2.293-2.293a1 1 0 111.414 1.414l-3 3A1 1 0 0110 12z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content" class="text-gray-500 text-blod">
                                    <x-dropdown-link :href="'#'">
                                        {{ __('お気に入り一覧') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('history')">
                                        {{ __('投稿履歴') }}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                            {{ __('ログアウト') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @endif
                </div>
            </div>
        </nav>
    </header>
</div>