<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Ramen_Review_Hub - レビュー掲示板</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
         @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <!--header-->
        <x-header />
        <!--contents-->
        <main>
           <div class="container mx-auto px-4 py-5">
               <div class="bg-white max-w-lg mx-auto rounded shadow-lg p-6">
                   <div class="mb-4">
                       <h1 class="text-2xl font-bold text-center">お気に入り一覧</h1>
                   </div>
                   <div class="flex flex-col justify-center items-center">
                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-12 w-12 text-gray-500 mb-4">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                       </svg>
                       <p class="text-gray-700 text-center">申し訳ありません、現在お気に入り機能は作成途中です。</p>
                       <p class="text-gray-700 text-center">完成次第、お知らせします。</p>
                   </div>
               </div>
           </div>
           {{--
            @foreach ($favorites as $favorite)
                <div class="flex flex-wrap mt-10 bg-neutral-100">
                    <div class="w-1/2 p-6">
                        <p class="text-xl my-8">
                            <span class="font-bold ">店舗名:</span>
                            <span>{{ $favorite["name"] }}</span>
                        </p>
                        <p class="text-xl my-8">
                            <span class="font-bold">住所:</span>
                            <span>{{ $favorite["formatted_address"] }}</span>
                        </p>
                        <p class="text-xl my-8">
                            <p class="font-bold">営業時間:</p>
                            @foreach ($favorite['opening_hours']['weekday_text'] as $day_hours)
                                <span>{{ $day_hours }}</span><br>
                            @endforeach
                        </p>
                    </div>
                    <div id="map-{{ $loop->index }}" class="w-1/2 map p-4"  data-lat="{{ $favorite['latitude'] }}" data-lng="{{ $favorite['longitude'] }}" style="height: 400px;"></div>
                    <div class="w-full p-4 flex flex-wrap">
                         <p class="text-xl font-bold">Googleの口コミ抜粋:</p>
                        @foreach ($favorite['reviews'] as $review)
                            <div>
                                <p>●{{ optional($review)['text'] }}</p><br>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            --}}
        </main>
    </body>