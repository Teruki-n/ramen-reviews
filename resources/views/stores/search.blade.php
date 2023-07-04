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
        <div class="h-screen overflow-hidden" style="background-image: url('{{ asset('images/store.png') }}'); background-size: cover; background-position: center;">
            <!--header-->
            <x-header />
             <!--content-->
            <main class="px-6 sm:py-32 lg:px-12">
                <div class="max-w-screen-lg mx-auto">
                    <h1 class="italic text-center text-5xl font-bold tracking-tight text-gray-900 mb-10">Ramen Review Hub</h1>
                    <form action="{{route('search.results')}}" method="get" class="md:w-1/2 mx-auto">
                        @csrf
                        <div class="rounded-md shadow-sm -space-y-px">
                            <div class="flex">
                                <input type="text" name="query" required placeholder="店舗名、味、種類" class="appearance-none rounded-l-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"/>
                                <button type="submit" class="flex items-center justify-center w-10 h-10 border border-transparent bg-indigo-600 text-white rounded-r-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            
                <div class="max-w-screen-lg mx-auto md:w-1/2 mt-6" x-data="{ open: false }">
                    <div class="flex justify-end">
                        <button @click="open = !open" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700 w-1/2 md:w-1/4">
                            <span x-show="!open" class="font-bold">＋</span>
                            <span x-show="open" class="font-bold">－</span>
                            絞り込み
                        </button>
                    </div>
            
                    <div x-show="open">
                        <div class="items-center justify-between p-2 bg-white border rounded shadow-sm">
                            <div class="flex items-center space-x-4 ">
                                <span class="text-bold text-gray-700">レビュー数:</span>
                                <label class="flex items-center">
                                    <input type="checkbox" value="Less_than_50">
                                    <span class="ml-2">～50</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" value="50～100">
                                    <span class="ml-2">50～100</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" value="100～200">
                                    <span class="ml-2">100～200</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" value="200～300">
                                    <span class="ml-2">200～300</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" value="more_than_300">
                                    <span class="ml-2">300～</span>
                                </label>
                            </div>
                            <div class="flex items-center space-x-4 ">
                                <span class="text-bold text-gray-700">評価ランク:</span>
                                <label class="flex items-center">
                                    <input type="checkbox" value="Less_than_50">
                                    <span class="ml-2">★1～2</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" value="50～100">
                                    <span class="ml-2">★2～3</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" value="100～200">
                                    <span class="ml-2">★3～4</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" value="200～300">
                                    <span class="ml-2">★4～5</span>
                                </label>
                            </div>
                            <p class="mt-2 text-center text-red-500">※Googleのレビュー数、評価を基にしてます。</p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>