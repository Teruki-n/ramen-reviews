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
                    <form action="/posts" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-1">
                            <!--name-->
                            <div>
                                <label class="text-gray-900 dark:text-gray-200" for="shopname">店舗名:</label>
                                <input id="username" type="text" name="post[name]" required placeholder="例：中華蕎麦　とみ田" value="{{ old('post.name') }}" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none ">
                          
                            </div>
                            
                            <!--taste-->
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
                            
                            <!--kind-->
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
                            
                            <!--prefecture-->
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
                            
                            <!--rating-->
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
                            
                            <!--comment-->
                            <div class="mb-4">
                                <label class="text-gray-900 dark:text-gray-200" for="review">コメント:</label>
                                <textarea id="textarea" type="textarea" rows="6" name="post[comment]" onclick="check()" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none">{{ old('post.comment') }}</textarea>
                                @error('post.comment')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!--image-->
                            <div x-data="{ 
                                previews: [],
                                previewFiles() {
                                    this.previews = [];
                                    const files = this.$refs.fileInput.files;
                                    if(files.length > 5) {
                                        alert('画像枚数の上限は5枚まで');
                                        this.$refs.fileInput.value = null;
                                    } else {
                                        for (const file of files) {
                                            if (file) {
                                                this.previews.push(URL.createObjectURL(file));
                                            }
                                        }
                                    }
                                } 
                            }">
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        </div>
                                        <div class="flex space-x-4" x-show="previews.length > 0">
                                            <template x-for="(preview, index) in previews" :key="index">
                                                <img :src="preview" alt="Image preview" class="w-28 h-28 object-cover">
                                            </template>
                                        </div>
                                        <input id="dropzone-file" type="file" name="image_url[]" class="hidden" x-ref="fileInput" x-on:change="previewFiles()" multiple/>
                                    </label>
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
        
       <script src="{{ asset('/js/function.js') }}"></script>
    </body>
</html>
