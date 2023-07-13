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
            <div class="flex">
                 <!--narrowing menue-->
                <div class="w-52 ml-28 border border-slate-300 flex flex-col  p-4 space-y-4">
                    <div>
                        <form action="" method="get">
                            <div>
                                <div class="ml-4">
                                    <button type="reset" class="px-5 py-2 text-sm font-medium text-red-500 bg-white border border-gray-400 rounded hover:bg-red-500 hover:text-white focus:z-10 focus:ring-2  dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                        リセット
                                   </button>
                                </div>
                                <dl>
                                    <dt class="mb-4 mt-4 bg-amber-800 text-yellow-100 text-center">種類</dt>
                                    <dd class="space-y-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" data-filter-type="kind" name="kind[]" value="ラーメン" onchange="getFilteredPosts()">
                                            <span class="ml-2">ラーメン</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" data-filter-type="kind" name="kind[]" value="つけ麵" onchange="getFilteredPosts()">
                                            <span class="ml-2">つけ麺</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" data-filter-type="kind" name="kind[]" value="汁なし" onchange="getFilteredPosts()">
                                            <span class="ml-2">汁なし</span>
                                        </label>
                                    </dd>
                                </dl>
                            </div>
                            <div>
                                <dl>
                                    <dt class="mb-4 mt-4 bg-amber-800 text-yellow-100 text-center">味</dt>
                                    <dd class="space-y-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="taste[]" data-filter-type="taste" value="醬油" onchange="getFilteredPosts()">
                                            <span class="ml-2">醤油</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="taste[]" data-filter-type="taste" value="味噌" onchange="getFilteredPosts()">
                                            <span class="ml-2">味噌</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="taste[]" data-filter-type="taste" value="塩" onchange="getFilteredPosts()">
                                            <span class="ml-2">塩</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="taste[]" data-filter-type="taste" value="豚骨" onchange="getFilteredPosts()">
                                            <span class="ml-2">豚骨</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" vname="taste[]" data-filter-type="taste" value="魚介系" onchange="getFilteredPosts()">
                                            <span class="ml-2">魚介系</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="taste[]" data-filter-type="taste" value="煮干し" onchange="getFilteredPosts()">
                                            <span class="ml-2">煮干し</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="taste[]" data-filter-type="taste" value="白湯" onchange="getFilteredPosts()">
                                            <span class="ml-2">白湯</span>
                                        </label>
                                            <label class="flex items-center">
                                            <input type="checkbox" name="taste[]" data-filter-type="taste" value="担々麺" onchange="getFilteredPosts()">
                                            <span class="ml-2">担々麺</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="taste[]" data-filter-type="taste" value="家系" onchange="getFilteredPosts()">
                                            <span class="ml-2">家系</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="taste[]" data-filter-type="taste" value="二郎" onchange="getFilteredPosts()">
                                            <span class="ml-2">二郎</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="taste[]" data-filter-type="taste" value="その他" onchange="getFilteredPosts()">
                                            <span class="ml-2">その他</span>
                                        </label>
                                    </dd>
                                </dl>
                            </div>
                            <div>
                                <dl>
                                    <dt class="mb-4 mt-4 bg-amber-800 text-yellow-100 text-center">都道府県</dt>
                                    <dd class="flex space-y-2">
                                        <div class="space-y-2 w-1/2 mr-2">
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="北海道" onchange="getFilteredPosts()">
                                                <span class="ml-2">北海道</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="青森" onchange="getFilteredPosts()">
                                                <span class="ml-2">青森</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" vname="pref[]" data-filter-type="pref" value="岩手" onchange="getFilteredPosts()">
                                                <span class="ml-2">岩手</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="宮城" onchange="getFilteredPosts()">
                                                <span class="ml-2">宮城</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="秋田" onchange="getFilteredPosts()">
                                                <span class="ml-2">秋田</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="山形" onchange="getFilteredPosts()">
                                                <span class="ml-2">山形</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="福島" onchange="getFilteredPosts()">
                                                <span class="ml-2">福島</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="茨城" onchange="getFilteredPosts()">
                                                <span class="ml-2">茨城</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="栃木" onchange="getFilteredPosts()">
                                                <span class="ml-2">栃木</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="群馬" onchange="getFilteredPosts()">
                                                <span class="ml-2">群馬</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="埼玉" onchange="getFilteredPosts()">
                                                <span class="ml-2">埼玉</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="千葉" onchange="getFilteredPosts()">
                                                <span class="ml-2">千葉</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="東京" onchange="getFilteredPosts()">
                                                <span class="ml-2">東京</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="神奈川" onchange="getFilteredPosts()">
                                                <span class="ml-2">神奈川</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="新潟" onchange="getFilteredPosts()">
                                                <span class="ml-2">新潟</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="富山" onchange="getFilteredPosts()">
                                                <span class="ml-2">富山</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="石川" onchange="getFilteredPosts()">
                                                <span class="ml-2">石川</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="福井" onchange="getFilteredPosts()">
                                                <span class="ml-2">福井</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="山梨" onchange="getFilteredPosts()">
                                                <span class="ml-2">山梨</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="長野" onchange="getFilteredPosts()">
                                                <span class="ml-2">長野</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="岐阜" onchange="getFilteredPosts()">
                                                <span class="ml-2">岐阜</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="静岡" onchange="getFilteredPosts()">
                                                <span class="ml-2">静岡</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="愛知" onchange="getFilteredPosts()">
                                                <span class="ml-2">愛知</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="三重" onchange="getFilteredPosts()">
                                                <span class="ml-2">三重</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="滋賀" onchange="getFilteredPosts()">
                                                <span class="ml-2">滋賀</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="京都" onchange="getFilteredPosts()">
                                                <span class="ml-2">京都</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="大阪" onchange="getFilteredPosts()">
                                                <span class="ml-2">大阪</span>
                                            </label>
                                        </div>
                                        <div class="space-y-2 w-1/2"> 
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="兵庫" onchange="getFilteredPosts()">
                                                <span class="ml-2">兵庫</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="奈良" onchange="getFilteredPosts()">
                                                <span class="ml-2">奈良</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="和歌山" onchange="getFilteredPosts()">
                                                <span class="ml-2">和歌山</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="鳥取" onchange="getFilteredPosts()">
                                                <span class="ml-2">鳥取</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="島根" onchange="getFilteredPosts()">
                                                <span class="ml-2">島根</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="岡山" onchange="getFilteredPosts()">
                                                <span class="ml-2">岡山</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="広島" onchange="getFilteredPosts()">
                                                <span class="ml-2">広島</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="山口" onchange="getFilteredPosts()">
                                                <span class="ml-2">山口</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="徳島" onchange="getFilteredPosts()">
                                                <span class="ml-2">徳島</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="香川" onchange="getFilteredPosts()">
                                                <span class="ml-2">香川</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="愛媛" onchange="getFilteredPosts()">
                                                <span class="ml-2">愛媛</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="高知" onchange="getFilteredPosts()">
                                                <span class="ml-2">高知</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="福岡" onchange="getFilteredPosts()">
                                                <span class="ml-2">福岡</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="佐賀" onchange="getFilteredPosts()">
                                                <span class="ml-2">佐賀</span>
                                            </label>
                                            <label class="flex items-center"> 
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="長崎" onchange="getFilteredPosts()">
                                                <span class="ml-2">長崎</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="熊本" onchange="getFilteredPosts()">
                                                <span class="ml-2">熊本</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="大分" onchange="getFilteredPosts()">
                                                <span class="ml-2">大分</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="宮崎" onchange="getFilteredPosts()">
                                                <span class="ml-2">宮崎</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="鹿児島" onchange="getFilteredPosts()">
                                                <span class="ml-2">鹿児島</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="pref[]" data-filter-type="pref" value="沖縄" onchange="getFilteredPosts()">
                                                <span class="ml-2">沖縄</span>
                                            </label>
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                            <div>
                                <dl>
                                    <dt class="mb-4 mt-4 bg-amber-800 text-yellow-100 text-center">おいしさ</dt>
                                    <dd class="space-y-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" data-filter-type="rating" name="rating[]" value="1" onchange="getFilteredPosts()">
                                            <span class="ml-2">★1</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" data-filter-type="rating" name="rating[]" value="2" onchange="getFilteredPosts()">
                                            <span class="ml-2">★2</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" data-filter-type="rating" name="rating[]" value="3" onchange="getFilteredPosts()">
                                            <span class="ml-2">★3</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" data-filter-type="rating" name="rating[]" value="4" onchange="getFilteredPosts()">
                                            <span class="ml-2">★4</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" data-filter-type="rating" name="rating[]" value="5" onchange="getFilteredPosts()">
                                            <span class="ml-2">★5</span>
                                        </label>
                                    </dd>
                                </dl>
                                <div  class="ml-4 mt-4">
                                    <button type="reset" class="px-5 py-2 text-sm font-medium text-red-500 bg-white border border-gray-400 rounded hover:bg-red-500 hover:text-white focus:z-10 focus:ring-2  dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                        リセット
                                   </button>
                               </div>
                            </div>
                        </form>
                    </div>
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
                            <div class="mt-14 grid grid-cols-1 gap-4"  x-data="{  isOpen: false, showFullTextButton: '{{ substr_count(nl2br(e($post->comment)), '<br />') > 1 || $post->image_url || strlen($post->comment) > 225 }}' }">
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
                                            <div class="mt-10 ml-10 w-40 h-40 overflow-hidden relative">
                                                <a href="{{ $image }}" target="_blank">
                                                    <img src="{{ $image }}" alt="画像が読み込めません。">
                                                </a>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="flex justify-between items-center mt-6" x-show="showFullTextButton">
                                        <p class="text-base font-semibold">{{ \Carbon\Carbon::parse($post->updated_at)->format('Y-m-d') }}</p>
                                        <div class="text-indigo-500 cursor-pointer hover:text-indigo-600" @click="isOpen = !isOpen">
                                             <span x-text="isOpen ? '閉じる' : '全文表示'"></span>
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
                                    // Redirect to login page
                                    window.location.href = "{{ route('login') }}";
                                }
                            }
                        </script>
                    @endguest
                </div>
            </div>
        </main>

    </body>
</html>
                    