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
         <!--content-->
        <main>
            <section class="m-20">
                <div class="max-w-screen-2xl">
                    <div class="flex items-center justify-between space-x-8 mb-10">
                        <h2 class="text-4xl tracking-tight"> 店舗情報</h2>
                        <a href="{{ route('search') }}"> 
                            <button type="button" class="px-7 py-2 text-sm font-medium bg-blue-500 hover:bg-blue-950 text-white font-bold py-2 px-4 rounded-full hover:bg-gray-100  focus:z-10 focus:ring-2  dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                検索画面へ戻る
                            </button>
                        </a>
                    </div>
                    @foreach ($details as $detail)
                        <div class="flex flex-wrap mt-10 bg-neutral-100">
                            <div class="w-1/2 p-6">
                                <p class="text-xl my-8">
                                    <span class="font-bold">店舗名:</span>
                                    <span>{{ $detail["name"] }}</span>
                                </p>
                                <p class="text-xl my-8">
                                    <span class="font-bold">住所:</span>
                                    <span>{{ $detail["formatted_address"] }}</span>
                                </p>
                                <p class="text-xl my-8">
                                    <span class="font-bold">営業時間:</span>
                                    @foreach ($detail['opening_hours']['weekday_text'] as $day_hours)
                                        <span>{{ $day_hours }}</span><br>
                                    @endforeach
                                </p>
                            </div>
                            <div id="map-{{ $loop->index }}" class="w-1/2 map p-4"  data-lat="{{ $detail['latitude'] }}" data-lng="{{ $detail['longitude'] }}" style="height: 400px;"></div>
                            <div class="w-full p-4 flex flex-wrap">
                                 <p class="text-xl font-bold">Googleの口コミ抜粋:</p>
                                @foreach ($detail['reviews'] as $review)
                                    <div>
                                        <p>{{ $review['text'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </main>
         
        <script src="{{ asset('/js/function.js') }}"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_PLACES_API_KEY') }}&callback=initMap"></script>
    </body>
</html>