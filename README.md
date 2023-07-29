## Ramen Review Hub
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/Teruki-n/ramen-reviews/assets/104558220/d555dbaa-c90a-4bd5-bc80-0d17cd4f95a6" width="800" alt="Laravel Logo"></a></p>

GoogleのAPIを用いて、現在地の周辺にあるラーメン屋を表示するwebアプリです。

店舗の検索に加え、レビューの掲示板ページを設けることで、店の評価や感想をユーザー同士で共有できるようにしました。
    
一つのアプリで店舗検索とレビュー掲示板の二つを体験できるようにしたのがポイントです。

## 💭作成背景
自分はラーメンが好きでよくラーメン屋に行くのだが、googleで店舗を検索する際にレビュー数やレビュー評価で絞り込めたら、

もっと自分の望むお店を表示してくれるのではないかと思ったのが、制作するきっかけです。

それに加え、レビュー投稿ページを追加することで、ユーザーが様々な店舗の情報を参照することができるようにしました。

レビューの絞り込みも行えるので、効率的に情報収集を行えます。

## 📘使用技術
- **PHP** 8.0.28
- **Laravel** 9.52.8
- **JavaScript**
    - Alpine.js
- **MariaDB** 10.2
- **AWS**
    - EC2
    - VPC
- **Google API**
    - Places API
    - Geolocation API
    - Maps JavaScript API

## 🌐 App URL
https://ramenreviewhub-b2d566a189a6.herokuapp.com/

## 💬 Usage
`$ git clone https://github.com/Teruki-n/ramen-reviews.git`

## 📋 機能一覧
- ユーザー登録、ログイン機能
- 検索機能
  - 絞り込み機能
- お気に入り機能
- 投稿機能
  - 画像投稿
  - 編集機能
  - 削除機能
 
## 各機能のポイント
#### ・検索機能
店舗検索の方は、Places APIを用いて、レビュー数と評価ランクで絞り込みを行い、効率的に検索ができるようにしました。

また、レビュー数と評価ランク単体だけではなく、組み合わせられることで、絞り込みに柔軟性を持たせました。

レビュー掲示板の方は、チェックを入れるとその値に該当する投稿のみを表示できるようになっています。

JavaScriptを用い、動的にページ上の投稿をフィルタリングさせることで、シームレスに絞り込めるようにしたのが特徴です。

#### ・お気に入り機能
ユーザーにお気に入りの店舗を見つけさせ、一覧ページでいつでも確認できるようにしてもらうために実装しました。

Ajaxを用いて、非同期通信させることでユーザーエクスペリエンスが向上させている点と多対多のリレーションを使い、情報を一元管理しているところがポイントです。

#### ・投稿機能
ユーザーは自分が食べた店舗の評価を行うことができます。

写真も投稿でき、その店舗のメニューや様子が一目で分かるようになっています。

また、投稿した内容を後から、編集＆削除することができます。


## 🔏 ライセンス

This Web Appication is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
