<div>
   <header class="text-gray-600 body-font border-b bg-gray-800">
            <nav>
                <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="サイトのロゴ" class="w-10 h-10">
                    <div class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0 md:mr-auto">
                        <span class="text-white rounded-md px-3 py-2 text-lg font-medium">RRH |</span>
                        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">店舗検索</a>
                        <a class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">レビュー掲示板</a>
                    </div>
                    <div class="flex">
                        @if(Auth::guest())
                            <a href="{{ route('login') }}" class="text-white hover:bg-gray-700 hover:text-white rounded-md px-4 py-2 text-sm font-medium">ログイン</a>
                            <a href="{{ route('register') }}" class="text-white hover:bg-gray-700 hover:text-white rounded-md px-6 py-2 text-sm font-medium">会員登録</a>
                        @else
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                 Logout
                             </a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endif
                    </div>
            　 </div>
             </nav>
        </header>
</div>