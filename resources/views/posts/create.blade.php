<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>レビュー掲示板　作成画面</title>
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
                    <h1 class="mb-10 text-xl font-bold text-black capitalize ">レビュー投稿作成</h1>
                    <form action="/posts" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-1">
                            <!--店の名前-->
                            <div>
                                <label class="text-gray-900 dark:text-gray-200" for="shopname">店舗名:</label>
                                <input id="username" type="text" name="post[name]" required placeholder="例：中華蕎麦　とみ田" value="{{ old('post.name') }}" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none ">
                          
                            </div>
                            
                            <!--ラーメンの味-->
                            <div class="mb-4">
                                <label class="text-gray-900 dark:text-gray-200" for="taste">味:</label>
                                    <select name="post[taste]" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none ">
                                        <option value="" disabled selected></option>
                                    @foreach(config('post.taste') as $taste)
                                        <option value="{{ $taste }}" @if(old('post.taste') == $taste) selected @endif>{{ $taste }}</option>
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
                                    <option value="" disabled selected></option>
                                    @foreach(config('post.kind') as $kind)
                                        <option value="{{ $kind }}" @if(old('post.kind') == $kind) selected @endif>{{ $kind }}</option>
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
                                    <option value="" disabled selected></option>
                                    @foreach(config('post.pref') as $pref)
                                        <option value="{{ $pref }}" @if(old('post.pref') == $pref) selected @endif>{{ $pref }}</option>
                                    @endforeach
                                 </select>
                                 @error('post.pref')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!--ラーメンの美味しさ-->
                            <div class="mb-4">
                             <label class="text-gray-900 dark:text-gray-200" for="username">おいしさ:</label>
                                <div class="rate-form block w-full px-4   bg-white border border-gray-300 rounded-md dark:bg-gray-800  dark:border-gray-600 " >
                                  <input id="star5" type="radio" name="post[rating]" value="5"  @if(old('post.rating') == '5') checked @endif>
                                  <label for="star5">★</label>
                                  <input id="star4" type="radio" name="post[rating]" value="4"  @if(old('post.rating') == '4') checked @endif>
                                  <label for="star4">★</label>
                                  <input id="star3" type="radio" name="post[rating]" value="3"  @if(old('post.rating') == '3') checked @endif>
                                  <label for="star3">★</label>
                                  <input id="star2" type="radio" name="post[rating]" value="2"  @if(old('post.rating') == '2') checked @endif>
                                  <label for="star2">★</label>
                                  <input id="star1" type="radio" name="post[rating]" value="1"  @if(old('post.rating') == '1') checked @endif>
                                  <label for="star1">★</label>
                                </div>
                                @error('post.rating')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!--コメント欄-->
                            <div class="mb-4">
                                <label class="text-gray-900 dark:text-gray-200" for="review">コメント:</label>
                                <textarea id="textarea" type="textarea" rows="6" name="post[comment]" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none">{{ old('post.comment') }}</textarea>
                                @error('post.comment')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!--店やラーメンの画像-->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-900">
                                    Image
                                </label>
                              <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                  <svg class="mx-auto h-12 w-12 text-white" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                  </svg>
                                  <div class="flex text-sm text-gray-600">
                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                      <span class="">Upload a file</span>
                                      <input id="file-upload" name="image_url" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1 text-gray-900">or drag and drop</p>
                                  </div>
                                  <p class="text-xs text-gray-900">
                                    PNG, JPG, GIF up to 10MB
                                  </p>
                                </div>
                              </div>
                            </div>
                        </div>
                        
                       <div class="flex flex-row-reverse rounded-md shadow-sm mt-10"role="group">
                          <button type="submit" class="px-7 py-2 text-sm font-medium text-blue-500 bg-white border border-gray-200 rounded-r-md hover:bg-blue-500  hover:text-white focus:z-10 focus:ring-2  dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            投稿
                          </button>
                          <a href="{{ route('posts') }}"> 
                            <button type="button" class="px-7 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100  focus:z-10 focus:ring-2  dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                一覧へ戻る
                            </button>
                          </a>
                          <button type="reset" class="px-7 py-2 text-sm font-medium text-red-500 bg-white border border-gray-200 rounded-l-lg hover:bg-red-500 hover:text-white focus:z-10 focus:ring-2  dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            リセット
                          </button>
                        </div>
                    </form>
                </section>
            </div>
        </main>
    </body>

</html>
