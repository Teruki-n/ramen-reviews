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
            <h1 class="text-center font-bold text-2xl mt-4">お気に入り一覧</h1>
            @forelse ($favorites as $favorite)
                <div class="flex flex-wrap mt-10 mx-16 bg-neutral-100">
                    <div class="w-1/2 p-6">
                        <form method="POST" action="{{ route('remove_favorite') }}" onsubmit="return confirm('Are you sure you want to remove this favorite?');">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="store_id" value="{{ $favorite['id'] }}">
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded remove-favorite">お気に入り解除</button>
                        </form>
                        
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
                            @php
                                $opening_hours = json_decode($favorite->opening_hours, true);
                            @endphp
                            @if (isset($opening_hours))
                                @foreach ($opening_hours as $day_hours)
                                    <span>{{ $day_hours }}</span><br>
                                @endforeach
                            @endif
                        </p>
                    </div>
                    <div id="map-{{ $loop->index }}" class="w-1/2 map p-4"  data-lat="{{ $favorite['latitude'] }}" data-lng="{{ $favorite['longitude'] }}" style="height: 400px;"></div>
                    <div class="w-full p-4 flex flex-wrap">
                        <p class="text-xl font-bold">Googleの口コミ抜粋:</p>
                        @if($favorite['reviews'])
                            @foreach ($favorite['reviews'] as $review)
                                <div>
                                    <p>●{{ optional($review)['text'] }}</p><br>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @empty
            <div class="container mx-auto px-4 py-5 mt-20">
               <div class="bg-white max-w-lg mx-auto rounded shadow-lg p-6">
                   <div class="flex flex-col justify-center items-center">
                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-12 w-12 text-gray-500 mb-4">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                       </svg>
                       <p class="text-indigo-700 text-center">店舗検索で表示された店舗をお気に入り登録することで、</p>
                       <p class="text-indigo-700 text-center">いつでも、お店の情報を確認する事ができます。</p>
                   </div>
               </div>
           </div>
            @endforelse
            <div class="flex justify-center mt-12">
                 {{ $favorites->links("pagination::bootstrap-5") }}
            </div>
        <script src="{{ asset('/js/api.js') }}"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_PLACES_API_KEY') }}&callback=initMap"></script>
        </main>
    </body>