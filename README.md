# Timer-for-engineers

### 【概要】

このアプリケーションは、経験の浅いエンジニアとベテランエンジニア間のコミュニケーションをより円滑にするという目的で制作しております。

***

### 【ページ説明】

#### **〇タイマー**

15分と30分のタイマーを2つ用意しています。

それぞれのタイマーを実装・デバッグの際にスタートさせ、0秒になる前に実装完了を目指します。

実装完了ボタンを押す、もしくはタイムオーバーすると、フォームが出現するようになっています。その際にメンターにメールを送付することも可能です。

残り時間が5分、1分を切ると、UIが変更します。
※テスト時は5:10スタートで、5分、4分を切るとUIが変更するようになっています。

#### **〇プロフィール**

ヘッダー画像やアイコン画像、メンターを設定します。

ヘッダー画像はリサイズして、保存しています。

#### **〇成績**

今年、今月、今日の3期間でタイムアタックの成績を記録しています。

paginationも実装しており、指定した期間も引き継ぐようにしています。

#### **〇ランキング**

今年、今月、今日の3期間でのタイムアタックに係るランキングを表示しています。

名前からユーザーのプロフィールへと遷移することも可能です。


***

### 【導入方法】

git clone git@github.com:villageon/Timer-for-engineers.git

〇envの設定

.envを作成し、.env.exampleをコピー

MAIL_MAILER以降に、mailtrapの設定をコピー

〇その他の設定

composer install

npm install

WSLにて、docker compose up -d --build

docker compose exec app bash

php artisan key:generate

php artisan storage:link

php artisan vendor:publish --tag=laravel-pagination

php artisan migrate:refresh --seed

ID: test@test.com
PW: passwordでログイン

php artisan queue:work
※必要ないかも、dockerをbuidしたタイミングでワーカーが起動してる説

npm run watch

***