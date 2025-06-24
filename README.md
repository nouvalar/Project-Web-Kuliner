## Halo disini terdapat project yang menggunakan laravel-blade, dengan konfigurasi 2 Multi-User yang terdapat Page Admin dan Users. 

Install terlebih dahulu composernya

Buat Terlebih dahulu databasenya, disini saya menggunakan phpmyadmin (mysql)

Jika sudah lakukan migration
```
php artisan migrate
```
Konfigurasi pada file .env dan tambahkan nama database yang tadi sudah dibuat

Jika sudah, Jalankan web dengan perintah 
```
php artisan serve
```


### JIKA GAMBAR pada menu dashboard dan favorit tidak Muncul lakukan perintah!!!!!
```
php artisan storage:link
```
