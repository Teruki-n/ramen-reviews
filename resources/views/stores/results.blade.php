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
        <main class="mx-auto max-w-screen-xl">
            <section class="m-20">
                <div class="max-w-screen-2xl">
                    <div class="flex items-center justify-between space-x-8 mb-10">
                        <h2 class="text-4xl tracking-tight"> 店舗情報</h2>
                        <a href="{{ route('search') }}"> 
                            <button type="button" class="px-7 py-2 text-sm font-medium bg-blue-500 hover:bg-blue-950 text-white font-bold py-2 px-4 rounded-full focus:z-10 focus:ring-2  dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                検索画面へ戻る
                            </button>
                        </a>
                    </div>
                    @forelse ($details as $detail)
                        <div class="flex flex-wrap mt-10 bg-neutral-100">
                            <div class="w-1/2 p-6">
                                <div>
                                    @php
                                        $store = App\Models\Store::where('place_id', isset($detail['place_id']) ? $detail['place_id'] : null)->first();
                                    @endphp
                                    @if(Auth::check() && isset($store) && Auth::user()->stores->contains($store->id))
                                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded remove-favorite" data-store-id="{{ $store->id }}">お気に入り解除</button>
                                    @elseif(Auth::check())
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded add-favorite" data-store-id="{{ isset($store) ? $store->id : '' }}">お気に入り登録</button>
                                    @else
                                        <a href="{{ route('login') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">ログインしてお気に入りに追加</a>
                                    @endif
                                </div>
                                
                                <p class="text-xl my-8">
                                    <span class="font-bold ">店舗名:</span>
                                    <span>{{ isset($detail["name"]) ? $detail["name"] : '不明' }}</span>
                                </p>
                                <p class="text-xl my-8">
                                    <span class="font-bold">住所:</span>
                                    <span>{{ isset($detail["formatted_address"]) ? $detail["formatted_address"] : '不明' }}</span>
                                </p>
                                <p class="text-xl my-8">
                                    <p class="font-bold">営業時間:</p>
                                    @if(isset($detail['opening_hours']['weekday_text']))
                                        @foreach ($detail['opening_hours']['weekday_text'] as $day_hours)
                                            <span>{{ $day_hours }}</span><br>
                                        @endforeach
                                    @endif
                                </p>
                            </div>
                            @if(isset($detail['latitude']) && isset($detail['longitude']))
                                <div id="map-{{ $loop->index }}" class="w-1/2 map p-4"  data-lat="{{ $detail['latitude'] }}" data-lng="{{ $detail['longitude'] }}" style="height: 400px;"></div>
                            @endif
                            <div class="w-full p-4 flex flex-wrap">
                                <p class="text-xl font-bold">Googleの口コミ抜粋:</p>
                                @if(isset($detail['reviews']))
                                    @foreach ($detail['reviews'] as $review)
                                        <div>
                                            <p>●{{ isset($review['text']) ? $review['text'] : '' }}</p><br>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="container mx-auto px-4 py-5">
                            <div class="bg-white max-w-lg mx-auto rounded shadow-lg p-6">
                                <div class="mb-4">
                                    <h1 class="text-2xl font-bold text-center">検索結果</h1>
                                </div>
                                <div class="flex flex-col justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-12 w-12 text-red-500 mb-4">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <p class="text-red-500 text-center">申し訳ありませんが、該当する結果が見つかりませんでした。</p>
                                    <p class="text-red-500 text-center">絞り込む項目を変えて、再度検索してください。</p><br>
                                    <p class="text-red-500 text-center">※もし店舗検索の画面からログインをした場合、このメッセージが出てしまうことがあります。その場合は、"お手数ですが、検索画面へ戻る"ボタンを押して、再度検索していただければ、正常に表示されます。</p>
                                </div>
                            </div>
                        </div>
                    @endforelse
                    <div class="flex justify-center mt-12">
                         {{ $details->links("pagination::bootstrap-5") }}
                    </div>
                </div>
            </section>
        </main>
        <script src="{{ asset('/js/api.js') }}"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_PLACES_API_KEY') }}&callback=initMap"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(function() {
                $('.add-favorite').click(function() {
                    var storeId = $(this).data('store-id');
                    $.post('{{ route('add_favorite') }}', {store_id: storeId, _token: '{{ csrf_token() }}'}, function(data) {
                        if (data.status == 'success') {
                            location.reload();
                        }
                    });
                });
            
                $('.remove-favorite').click(function() {
                    var storeId = $(this).data('store-id');
                    $.post('{{ route('remove_favorite') }}', {store_id: storeId, _token: '{{ csrf_token() }}'}, function(data) {
                        if (data.status == 'success') {
                            location.reload();
                        }
                    });
                });
            });
        </script>
    </body>
</html>