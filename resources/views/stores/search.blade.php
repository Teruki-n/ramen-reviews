<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Ramen_Review_Hub - 店舗検索</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
         @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <!--header-->
        <x-header />
        <!--content-->
         <main class="h-screen px-6 sm:py-32 lg:px-12" style="background-image: url('{{ asset('images/store.png') }}'); background-size: cover;background-size: cover; background-position: center;">
        　  <div class="max-w-screen-lg mx-auto">
                <h1 class="italic text-center  text-5xl font-bold tracking-tight text-gray-900 mb-10">Ramen Review Hub</h1>
                　<form action="{{route('search.results')}}" method="get">
                      @csrf
                    <div class="rounded-md shadow-sm -space-y-px  md:w-1/2 mx-auto">
                        <div class="flex">
                            <input type="text" name="query" required placeholder="店舗名、味、種類" class="appearance-none rounded-l-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"/>
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