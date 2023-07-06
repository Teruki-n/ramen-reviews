<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>レビュー掲示板　編集画面</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
         @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100　dark:bg-gray-800">
        <!--header-->
        <x-header />
        <!--content-->
        <main>
            <div>
                <section class="max-w-3xl p-6 mx-auto bg-slate-100 rounded-md shadow-md mt-20">
                    <h1 class="mb-10 text-xl font-bold text-black capitalize ">レビュー投稿編集</h1>
                    <form action="/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-1">
                            <!--店の名前-->
                            <div>
                                <label class="text-gray-900 dark:text-gray-200" for="shopname">店舗名:</label>
                                <input id="username" type="text" name="post[name]" required placeholder="例：中華蕎麦　とみ田" value="{{ old('post.name', $post->name) }}" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none ">
                        
                            </div>
                        
                            <!--ラーメンの味-->
                            <div class="mb-4">
                                <label class="text-gray-900 dark:text-gray-200" for="taste">味:</label>
                                <select name="post[taste]" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none ">
                                    <option disabled></option>
                                    @foreach(config('post.taste') as $taste)
                                        <option value="{{ $taste }}" @if(old('post.taste', $post->taste) == $taste) selected @endif>{{ $taste }}</option>
                                    @endforeach
                                </select>
                                @error('post.taste')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <!--ラーメンの種類-->
                            <div class="mb-4">
                                <label class="text-gray-900 dark:text-gray-200" for="kind">種類:</label>
                                <select name="post[kind]" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none " >
                                    <option disabled selected></option>
                                    @foreach(config('post.kind') as $kind)
                                        <option value="{{ $kind }}" @if(old('post.kind',$post->kind) == $kind) selected @endif>{{ $kind }}</option>
                                    @endforeach
                                 </select>
                                @error('post.kind')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!--店の所在地-->
                            <div class="mb-4">
                                <label class="text-gray-900 dark:text-gray-200" for="prefecture">都道府県:</label>
                                <select name="post[pref]" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none " >
                                    <option  disabled selected></option>
                                    @foreach(config('post.pref') as $pref)
                                        <option value="{{ $pref }}" @if(old('post.pref',$post->pref) == $pref) selected @endif>{{ $pref }}</option>
                                    @endforeach
                                 </select>
                                 @error('post.pref')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <!--ラーメンの美味しさ-->
                            <div class="mb-4">
                                <label class="text-gray-900 dark:text-gray-200" for="username">おいしさ:</label>
                                <div class="rate-form block w-full px-4 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600">
                                    @for ($i = 5; $i >= 1; $i--)
                                        <input id="star{{ $i }}" type="radio" name="post[rating]" value="{{ $i }}" @if(old('post.rating', $post->rating) == $i) checked @endif>
                                        <label for="star{{ $i }}">★</label>
                                    @endfor
                                </div>
                                @error('post.rating')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <!--コメント欄-->
                            <div class="mb-4">
                                <label class="text-gray-900 dark:text-gray-200" for="review">コメント:</label>
                                <textarea id="textarea" type="textarea" rows="6" name="post[comment]" class="block w-full px-4 py-2 mt-22 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none">{{ old('post.comment', $post->comment) }}</textarea>
                                @error('post.comment')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <!-- 画像アップロード -->
                            <div class="mb-4">
                                <label class="text-gray-900 dark:text-gray-200" for="image">画像:</label>
                                <input type="file" id="file" name="post[image]" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none" accept="image/*">
                                <img id="preview" src="{{ old('post.image', $post->image) }}" alt="Image preview" class="mt-2" style="max-width: 200px;"/>
                            </div>
                        
                            <!-- 更新ボタン -->
                            <div class="flex flex-row-reverse rounded-md shadow-sm mt-10"role="group">
                              <button type="submit" class="px-7 py-2 text-sm font-medium text-blue-500 bg-white border border-gray-200 rounded-r-md hover:bg-blue-500  hover:text-white focus:z-10 focus:ring-2  dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                更新
                              </button>
                              <button type="reset" class="px-7 py-2 text-sm font-medium text-red-500 bg-white border border-gray-200 rounded-l-lg hover:bg-red-500 hover:text-white focus:z-10 focus:ring-2  dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                リセット
                              </button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </main>
    </body>
</html>
