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
            {{--
           @foreach ($details as $detail)
                <div class="flex flex-wrap mt-10 bg-neutral-100">
                    <div class="w-1/2 p-6">
                            <p class="text-xl my-8">
                                <span class="font-bold ">店舗名:</span>
                                <span>{{ $detail["name"] }}</span>
                            </p>
                            <p class="text-xl my-8">
                                <span class="font-bold">住所:</span>
                                <span>{{ $detail["formatted_address"] }}</span>
                            </p>
                        </div>
                        <div id="map-{{ $loop->index }}" class="w-1/2 map p-4"  data-lat="{{ $detail['latitude'] }}" data-lng="{{ $detail['longitude'] }}" style="height: 400px;"></div>
                    </div>
                </div>
            @endforeach
            --}}
        </main>
    </body>