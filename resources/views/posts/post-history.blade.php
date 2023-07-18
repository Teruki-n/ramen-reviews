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
        <section class="bg-gray-100">
            <div class="mx-auto px-4 py-16 lg:max-w-3xl xl:max-w-5xl 2xl:max-w-7xl sm:px-6 lg:px-8">
                    <h2 class="p-3 text-center text-white text-2xl font-bold tracking-tight bg-slate-950">
                      レビュー投稿履歴
                    </h2>
                    
                    @forelse ($posts as $post)
                        <div class="mt-14 grid grid-cols-1 gap-4 mx-auto" x-data="{ isOpen: false, showFullTextButton: '{{ substr_count(nl2br(e($post->comment)), '<br />') > 1 || $post->image_url || strlen($post->comment) > 225 }}'  }">
                            <div class="relative bg-white pb-8 pl-8 pr-8 lg:max-w-3xl xl:max-w-5xl 2xl:max-w-7xl">
                                {{--accordion menu--}}
                                <div class="absolute top-0 right-0 p-4" x-data="{ isOpen: false }">
                                    <div @click="isOpen = !isOpen" class="cursor-pointer font-bold text-xl mb-2">・・・</div>
                                    <div x-show="isOpen" id="options_{{ $post->id }}" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" 
                                    x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" id="options_{{ $post->id }}" class="absolute top-0 right-0 mt-10 bg-white rounded-lg shadow-lg z-0 p-3 w-28 border border-gray-200">
                                        <div class="text-indigo-500 mb-1 hover:text-indigo-200"><a href="/posts/{{ $post->id }}/edit">編集する<i class="fas fa-pencil-alt"></i></a></div>
                                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" clas="mt-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick = "deletePost({{ $post->id }})" class="mt-2 text-red-500 hover:text-red-300">削除する<i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                                
                                <div class="mr-6 mt-2">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 self-start mr-6">
                                            <div class="mt-4">
                                                <img src="{{ asset('images/user_icon.svg') }}" alt="ユーザーアイコン" class="w-14 h-14">
                                                <p class="text-center -base text-bold mb-3">{{ $post->user->name }}</p>
                                            </div>
                                        </div>
                                        <div class="p-4 bg-rose-700 w-full">
                                            <div class="flex mx-auto underline underline-offset-8 decoration-white">
                                                <div class="text-white font-bold  mr-4">店舗名: {{ $post->name }}</div>
                                                <div class="text-white font-bold  mr-4">味 : {{ $post->taste }}</div>
                                                <div class="text-white font-bold  mr-4">都道府県 : {{ $post->pref }}</div>
                                                <div class="text-white font-bold  mr-4">種類 : {{ $post->kind }}</div>
                                                <div>
                                                    <span class="text-white font-bold">おいしさ :
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $post->rating)
                                                                <i class="fas fa-star" style="color:#ffcc00;"></i>
                                                            @endif
                                                        @endfor
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="bg-gray-100 p-4 rounded-md" style="margin-left: 5rem;">
                                        <p class="text-base font-bold">レビュー: </p>
                                        <div x-ref="comment" :class="{ 'overflow-hidden h-12': !isOpen }" class="leading-snug">
                                             {!! nl2br(e($post->comment)) !!}
                                        </div>
                                    </div>
                                    <div x-show="isOpen" class="flex flex-wrap">
                                        @if(!empty($post->image_url))
                                            @foreach($post->image_url as $image)
                                            <div class="mt-10 ml-14 w-40 h-40 overflow-hidden relative">
                                                <a href="{{ $image }}" target="_blank">
                                                    <img src="{{ $image }}" alt="画像が読み込めません。">
                                                </a>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="flex justify-between items-center mt-6" x-show="showFullTextButton">
                                        <p class="text-base font-semibold">{{ \Carbon\Carbon::parse($post->updated_at)->format('Y-m-d') }}</p>
                                        <div class="text-indigo-500 ml-auto cursor-pointer hover:text-indigo-600" @click="isOpen = !isOpen">
                                             <span x-text="isOpen ? '閉じる' : '全文表示'"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    <p class="pt-20 text-center text-boldv text-xl text-red-500 ">まだ投稿履歴がありません</p>
                    @endforelse
                    
                <!--pagination-->
                <div class="flex justify-center mt-12">
                    {{ $posts->links("pagination::bootstrap-5") }}
                </div>
            </div>
         </section>
        <script src="{{ asset('/js/function.js') }}"></script>
    </body>
</html>