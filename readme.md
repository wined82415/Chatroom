步驟
=

1.      composer install
2.      php artisan key:generate （產生 .env 檔）
3.      將 storage, bootsrap/cache 這兩個目錄開啟 web 讀取權限
4.      php artisan chatserver:open 開啟 websocket server
5.      連至該專案index頁 即可進行對談