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
            <div class="flex ">
                 <!--narrowing menu-->
                 <!-- Mobile Menu Button -->
                <div class="lg:hidden block mt-4 px-10" x-data="{ open: false }">
                    <button @click="open = !open" class="text-gray-600 hover:text-gray-500 focus:outline-none focus:text-gray-500">
                        <svg viewBox="0 0 24 24" class="h-10 w-10 fill-current">
                            <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                        </svg>
                    </button>
                
                    <!-- Mobile Menu -->
                    <div class="absolute bg-white overflow-y-scroll z-10" x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-x-full" x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-300"  x-transition:leave-start="opacity-100 transform translate-x-0" x-transition:leave-end="opacity-0 transform -translate-x-full">
                        <x-narrowing-menu/>
                    </div>
                </div>
                <!-- Desktop Menu -->
                <div class="lg:block hidden ml-28">
                    <x-narrowing-menu />
                </div>
                
                 <!--review content-->
                <section class="bg-gray-100 mr-28 w-full">
                    <div class="mx-auto max-w-screen-2xl px-4 py-16 sm:px-6 lg:px-8">
                        <div class="flex items-center justify-between space-x-8">
                            <h2 class="text-4xl tracking-tight">
                              レビュー掲示板
                            </h2>
                            <!--検索窓-->
                            <div class="relative">
                                <form method="get" action="{{ route('posts') }}" >
                                @csrf
                                    <div class="-space-y-px">
                                        <div class="flex">
                                            <input type="text" name="search" required placeholder="店舗名" class="rounded-l-lg  block px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"/>
                                            <button type="submit" class="flex items-center justify-center w-10 h-10 border border-transparent bg-gray-800 text-white rounded-r-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                 <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                    <p class="absolute top-10 right-0 mt-4 mr-4 text-base font-semibold text-indigo-500 "><a href="{{ route('posts') }}">一覧へ戻る</a></p>
                            </div>
                        </div>
                        
                        
                        @forelse ($posts as $post)
                            <div class="mt-14 grid grid-cols-1 gap-4 post-content" data-kind ="{{$post->kind}}" data-taste="{{$post->taste}}" data-pref="{{ $post->pref }}" data-rating="{{$post->rating}}" x-data="{  isOpen: false, showFullTextButton: '{{ substr_count(nl2br(e($post->comment)), '<br />') > 1 || $post->image_url || strlen($post->comment) > 225 }}' }">
                                <div class="bg-white pb-8 pl-8 pr-8">
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
                                    <div class="bg-gray-100 p-4 ml-20 rounded-md">
                                        <p class="text-base font-bold">レビュー: </p>
                                        <div x-ref="comment" :class="{ 'overflow-hidden h-12': !isOpen }">
                                            {!! nl2br(e($post->comment)) !!}
                                        </div>
                                    </div>
                                    <div x-show="isOpen" class="flex flex-wrap">
                                        @if(!empty($post->image_url))
                                            @foreach($post->image_url as $image)
                                            <div class="mt-10 ml-10 w-36 h-36 overflow-hidden relative">
                                                <a href="{{ $image }}" target="_blank">
                                                    <img src="{{ $image }}" alt="画像が読み込めません。" class="w-full h-full object-cover">
                                                </a>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="flex justify-between items-center mt-6">
                                        <p class="text-base font-semibold">{{ \Carbon\Carbon::parse($post->updated_at)->format('Y-m-d') }}</p>
                                        <div x-show="showFullTextButton">
                                            <div class="text-indigo-500 cursor-pointer hover:text-indigo-600" @click="isOpen = !isOpen">
                                                 <span x-text="isOpen ? '閉じる' : '全文表示'"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           </div>
                        @empty
                          <p class="pt-20 text-center text-boldv text-xl text-red-500 ">レビューがまだ投稿されていません。</p> 
                        @endforelse
                        
                       <!--pagination-->
                        <div class="flex justify-center mt-12">
                            {{ $posts->links("pagination::bootstrap-5") }}
                        </div>
                    </div>
                </section>

                <!--To the create page-->
                <div class="fixed bottom-0 right-0 mb-4 mr-4">
                    @auth
                      <a href="{{ route('posts.create') }}" class="py-1 inline-block p-2 rounded-full border-2  hover:brightness-50">
                        <img src="{{ asset('images/create_icon.svg') }}" alt="Create Post" class="w-8 h-10">
                      </a>
                    @endauth
                    
                    @guest
                        <!-- Non-authenticated users will see a popup -->
                        <a href="#" onclick="askForLogin();" class="py-1 inline-block p-2 rounded-full border-2 hover:brightness-50">
                            <img src="{{ asset('images/create_icon.svg') }}" alt="Create Post" class="w-8 h-10">
                        </a>
                        <script>
                            function askForLogin() {
                                const userConfirmed = confirm("投稿するにはログインが必要です。ログインしますか?");
                                if (userConfirmed) {
                                    window.location.href = "{{ route('login') }}";
                                }
                            }
                        </script>
                    @endguest
                </div>
            </div>
        </main>
        <script src="/js/narrowdown.js"></script>
    </body>
</html>
                    
