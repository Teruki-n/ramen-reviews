<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Ramen_Review_Hub</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/background.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
         @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
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
         <main class="h-screen place-items-center bg-white px-6 sm:py-32 lg:px-12" style="background-image: url('{{ asset('images/store.png') }}');　background-size: cover; background-position: center;">
        　  <div class="max-w-screen-lg mx-auto">
                <h1 class="text-center  text-5xl font-bold tracking-tight text-gray-900 mb-10">Ramen Review Hub</h1>
                　<form action="{{route('search.results')}}" method="get">
                      @csrf
                    <div class="rounded-md shadow-sm -space-y-px  md:w-1/2 mx-auto">
                        <div class="flex">
                            <input type="text" name="query" required placeholder="店舗名、味、種類" class="appearance-none rounded-l-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"/>
                            <button type="submit" class="flex items-center justify-center w-10 h-10 border border-transparent bg-indigo-600 text-white rounded-r-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                 <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                  </form>
            </div>
            
            <div class="w-full max-w-xs mx-auto mt-6" x-data="{ open: false }">
                 <button @click="open = !open" class="w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">絞り込み</button>
    
                    <div x-show="open" class="w-full mt-2">
                         <div class="flex items-center justify-between p-2 bg-white border rounded shadow-sm">
                            <div class="flex items-center">
                                 <span class="text-sm text-gray-700">レビュー数</span>
                                 <input type="checkbox" class="ml-2 form-checkbox h-5 w-5 text-blue-600">
                             </div>
                         </div>
        <!-- 更に多くの絞り込み項目を追加することができます。 -->
                    </div>
            </div>
        </main>
    </body>
</html>