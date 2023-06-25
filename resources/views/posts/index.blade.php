<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Ramen_Review_Hub - レビュー掲示板</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
         @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    </head>
    <body>
         <!--header-->
           <x-header />
         <!--content-->
         <main>
          
            <h1 class="text-center text-3xl font-bold tracking-tight text-gray-900 mt-10">レビュー掲示板</h1>
     
            <a href="{{route('posts.create')}}" class="text-red-500">作る</a>
            
            <p>{{ $post->name }}</p>   
            <p>{{ $post->taste }}</p>   
            <p>{{ $post->kind }}</p>   
            <p>{{ $post->pref }}</p>   
            
            @if($post->image_url)
             <div>
                <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
            </div>
            @endif
         </main>
    </body>
</html>