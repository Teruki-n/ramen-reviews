<div>
     <div class="w-52 border border-slate-300 flex flex-col p-4 space-y-4">
        <div>
            <form action="" method="get">
                <div>
                    <div class="flex justify-center w-full">
                        <button type="reset" class="px-5 py-2 text-sm font-medium text-red-500 bg-white border border-gray-400 rounded hover:bg-red-500 hover:text-white focus:z-10 focus:ring-2  dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            リセット
                       </button>
                    </div>
                    <dl>
                        <dt class="mb-4 mt-4 bg-amber-800 text-yellow-100 text-center">種類</dt>
                        <dd class="space-y-2">
                            <label class="flex items-center">
                                <input type="checkbox" class="category-checkbox" data-filter-type="kind" name="kind[]" value="ラーメン" >
                                <span class="ml-2">ラーメン</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="category-checkbox" data-filter-type="kind" name="kind[]" value="つけ麵" >
                                <span class="ml-2">つけ麺</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="category-checkbox" data-filter-type="kind" name="kind[]" value="汁なし" >
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
                                <input type="checkbox" class="category-checkbox2" name="taste[]" data-filter-type="taste" value="醤油" >
                                <span class="ml-2">醤油</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="category-checkbox2" name="taste[]" data-filter-type="taste" value="味噌" >
                                <span class="ml-2">味噌</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="category-checkbox2" name="taste[]" data-filter-type="taste" value="塩" >
                                <span class="ml-2">塩</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="category-checkbox2" name="taste[]" data-filter-type="taste" value="豚骨" >
                                <span class="ml-2">豚骨</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="category-checkbox2" name="taste[]" data-filter-type="taste" value="魚介系" >
                                <span class="ml-2">魚介系</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="category-checkbox2" name="taste[]" data-filter-type="taste" value="煮干し" >
                                <span class="ml-2">煮干し</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="category-checkbox2" name="taste[]" data-filter-type="taste" value="白湯" >
                                <span class="ml-2">白湯</span>
                            </label>
                                <label class="flex items-center">
                                <input type="checkbox" class="category-checkbox2" name="taste[]" data-filter-type="taste" value="担々麺" >
                                <span class="ml-2">担々麺</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="category-checkbox2" name="taste[]" data-filter-type="taste" value="家系" >
                                <span class="ml-2">家系</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="category-checkbox2" name="taste[]" data-filter-type="taste" value="二郎" >
                                <span class="ml-2">二郎</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="category-checkbox2" name="taste[]" data-filter-type="taste" value="その他" >
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
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="北海道" >
                                    <span class="ml-2">北海道</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="青森県" >
                                    <span class="ml-2">青森</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="岩手県" >
                                    <span class="ml-2">岩手</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="宮城県" >
                                    <span class="ml-2">宮城</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="秋田県" >
                                    <span class="ml-2">秋田</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="山形県" >
                                    <span class="ml-2">山形</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="福島県" >
                                    <span class="ml-2">福島</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="茨城県" >
                                    <span class="ml-2">茨城</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="栃木県" >
                                    <span class="ml-2">栃木</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="群馬県" >
                                    <span class="ml-2">群馬</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="埼玉県" >
                                    <span class="ml-2">埼玉</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="千葉県" >
                                    <span class="ml-2">千葉</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="東京県" >
                                    <span class="ml-2">東京</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="神奈川県" >
                                    <span class="ml-2">神奈川</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="新潟県" >
                                    <span class="ml-2">新潟</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="富山県" >
                                    <span class="ml-2">富山</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="石川県" >
                                    <span class="ml-2">石川</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="福井県" >
                                    <span class="ml-2">福井</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="山梨県" >
                                    <span class="ml-2">山梨</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="長野県" >
                                    <span class="ml-2">長野</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="岐阜県" >
                                    <span class="ml-2">岐阜</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="静岡県" >
                                    <span class="ml-2">静岡</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="愛知県" >
                                    <span class="ml-2">愛知</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="三重県" >
                                    <span class="ml-2">三重</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="滋賀県" >
                                    <span class="ml-2">滋賀</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="京都府" >
                                    <span class="ml-2">京都</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="大阪府" >
                                    <span class="ml-2">大阪</span>
                                </label>
                            </div>
                            <div class="space-y-2 w-1/2"> 
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="兵庫県" >
                                    <span class="ml-2">兵庫</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="奈良県" >
                                    <span class="ml-2">奈良</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="和歌山県" >
                                    <span class="ml-2">和歌山</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="鳥取県" >
                                    <span class="ml-2">鳥取</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="島根県" >
                                    <span class="ml-2">島根</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="岡山県" >
                                    <span class="ml-2">岡山</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="広島県" >
                                    <span class="ml-2">広島</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="山口県" >
                                    <span class="ml-2">山口</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="徳島県" >
                                    <span class="ml-2">徳島</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="香川県" >
                                    <span class="ml-2">香川</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="愛媛県" >
                                    <span class="ml-2">愛媛</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="高知県" >
                                    <span class="ml-2">高知</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="福岡県" >
                                    <span class="ml-2">福岡</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="佐賀県" >
                                    <span class="ml-2">佐賀</span>
                                </label>
                                <label class="flex items-center"> 
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="長崎県" >
                                    <span class="ml-2">長崎</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="熊本県" >
                                    <span class="ml-2">熊本</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="大分県" >
                                    <span class="ml-2">大分</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="宮崎県" >
                                    <span class="ml-2">宮崎</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="鹿児島県" >
                                    <span class="ml-2">鹿児島</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="pref[]" data-filter-type="pref" value="沖縄県" >
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
                                <input type="checkbox" data-filter-type="rating" name="rating[]" value="1" >
                                <span class="ml-2">★1</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" data-filter-type="rating" name="rating[]" value="2" >
                                <span class="ml-2">★2</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" data-filter-type="rating" name="rating[]" value="3" >
                                <span class="ml-2">★3</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" data-filter-type="rating" name="rating[]" value="4" >
                                <span class="ml-2">★4</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" data-filter-type="rating" name="rating[]" value="5" >
                                <span class="ml-2">★5</span>
                            </label>
                        </dd>
                    </dl>
                    <div class="flex justify-center w-full mt-4">
                        <button type="reset" class="px-5 py-2 text-sm font-medium text-red-500 bg-white border border-gray-400 rounded hover:bg-red-500 hover:text-white focus:z-10 focus:ring-2  dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            リセット
                       </button>
                   </div>
                </div>
            </form>
        </div>
        </div>
</div>