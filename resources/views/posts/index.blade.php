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
                    <form action="" method="post">
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
                                        <input type="checkbox" value="ramen">
                                        <span class="ml-2">ラーメン</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="dipping">
                                        <span class="ml-2">つけ麺</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="no_soup">
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
                                        <input type="checkbox" value="soy">
                                        <span class="ml-2">醤油</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="salt">
                                        <span class="ml-2">味噌</span>
                                    </label>
                                    <label class="flex items-center">
                                    <input type="checkbox" value="miso">
                                        <span class="ml-2">塩</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="tonkotsu">
                                        <span class="ml-2">豚骨</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="tonkotsu_soy">
                                        <span class="ml-2">魚介系</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="niboshi">
                                        <span class="ml-2">煮干し</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="chicken">
                                        <span class="ml-2">白湯</span>
                                    </label>
                                        <label class="flex items-center">
                                        <input type="checkbox" value="tantan">
                                        <span class="ml-2">担々麺</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="house">
                                        <span class="ml-2">家系</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="merchandise_sets">
                                        <span class="ml-2">二郎</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="merchandise_sets">
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
                                            <input type="checkbox" value="hokkaidou">
                                            <span class="ml-2">北海道</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="aomori">
                                            <span class="ml-2">青森</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="iwate">
                                            <span class="ml-2">岩手</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="miyagi">
                                            <span class="ml-2">宮城</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="akita">
                                            <span class="ml-2">秋田</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="yamagata">
                                            <span class="ml-2">山形</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="fukushima">
                                            <span class="ml-2">福島</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="ibaraki">
                                            <span class="ml-2">茨城</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="tochigi">
                                            <span class="ml-2">栃木</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="gunma">
                                            <span class="ml-2">群馬</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="saitama">
                                            <span class="ml-2">埼玉</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="chiba">
                                            <span class="ml-2">千葉</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="tokyo">
                                            <span class="ml-2">東京</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="kanagawa">
                                            <span class="ml-2">神奈川</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="niigata">
                                            <span class="ml-2">新潟</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="toyama">
                                            <span class="ml-2">富山</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="ishikawa">
                                            <span class="ml-2">石川</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="fukui">
                                            <span class="ml-2">福井</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="yamanashi">
                                            <span class="ml-2">山梨</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="nagano">
                                            <span class="ml-2">長野</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="gifu">
                                            <span class="ml-2">岐阜</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="shizuoka">
                                            <span class="ml-2">静岡</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="aichi">
                                            <span class="ml-2">愛知</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="mie">
                                            <span class="ml-2">三重</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="shiga">
                                            <span class="ml-2">滋賀</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="kyoto">
                                            <span class="ml-2">京都</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="osaka">
                                            <span class="ml-2">大阪</span>
                                        </label>
                                    </div>
                                    <div class="space-y-2 w-1/2"> 
                                        <label class="flex items-center">
                                            <input type="checkbox" value="hyogo">
                                            <span class="ml-2">兵庫</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="nara">
                                            <span class="ml-2">奈良</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="wakayama">
                                            <span class="ml-2">和歌山</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="tottori">
                                            <span class="ml-2">鳥取</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="shimane">
                                            <span class="ml-2">島根</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="okayama">
                                            <span class="ml-2">岡山</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="hiroshima">
                                            <span class="ml-2">広島</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="yamaguchi">
                                            <span class="ml-2">山口</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="tokushima">
                                            <span class="ml-2">徳島</span>
                                        </label>
                                    
                                        <label class="flex items-center">
                                            <input type="checkbox" value="kagawa">
                                            <span class="ml-2">香川</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="ehime">
                                            <span class="ml-2">愛媛</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="kochi">
                                            <span class="ml-2">高知</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="fukuoka">
                                            <span class="ml-2">福岡</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="saga">
                                            <span class="ml-2">佐賀</span>
                                        </label>
                                        <label class="flex items-center"> 
                                            <input type="checkbox" value="nagasaki">
                                            <span class="ml-2">長崎</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="kumamoto">
                                            <span class="ml-2">熊本</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="oita">
                                            <span class="ml-2">大分</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="miyazaki">
                                            <span class="ml-2">宮崎</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="kagoshima">
                                            <span class="ml-2">鹿児島</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" value="okinawa">
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
                                        <input type="checkbox" value="1">
                                        <span class="ml-2">★1</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="2">
                                        <span class="ml-2">★2</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="3">
                                        <span class="ml-2">★3</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="4">
                                        <span class="ml-2">★4</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="5">
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
                
                 <!--review content-->
                <section class="bg-gray-100 mr-28 w-full bg-gray-100">
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
                        
                        
                        @foreach ($posts as $post)
                            <div class="mt-14 grid grid-cols-1 gap-4" x-data="{ isOpen: false }">
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
                                    <div x-show="isOpen">
                                        @if($post->image_url)
                                            <div>
                                                <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div class="flex justify-between items-center mt-6">
                                        <p class="text-base font-semibold">{{ \Carbon\Carbon::parse($post->updated_at)->format('Y-m-d') }}</p>
                                        <div class="text-indigo-500 cursor-pointer hover:text-indigo-600" @click="isOpen = !isOpen">
                                             <span x-text="isOpen ? '閉じる' : '全文表示'"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
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
                    