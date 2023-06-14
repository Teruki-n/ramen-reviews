<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Ramen_Review_Hub</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
         @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header class="text-gray-600 body-font border-b bg-gray-800">
            <nav>
                <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="サイトのロゴ" class="w-10 h-10">
                    <div class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0 md:mr-auto">
                        <span class="text-white rounded-md px-3 py-2 text-lg font-medium">RRH</span>
                        <a class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">店舗検索</a>
                        <a class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">レビュー掲示板</a>
                    </div>
                    <div class="flex">
                        <a class="text-white hover:bg-gray-700 hover:text-white rounded-md px-4 py-2 text-sm font-medium">ログイン</a>
                        <a class="text-white hover:bg-gray-700 hover:text-white rounded-md px-6 py-2 text-sm font-medium">会員登録</a>
                    </div>
            　 </div>
             </nav>
        </header>
    </body>
</html>