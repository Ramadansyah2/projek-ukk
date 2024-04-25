# Galeri foto

## Tentang Website:

Website Ini dibuat untuk user bisa mengunggah foto yang ingin dikirim seperti kebanyakan website galeri web ini juga memiliki fitur yang cukup umum ditemukan pada website galeri yang lain.

## Fitur Yang Dimiliki:
- Login,
- Register,
- Logout,
- Multi Pengguna/User,
- Mengunggah foto,
- Membuat Album
- Komentar
- Like Foto
- dan sebagainya

## Tampilan Website

![Screenshot (22)](https://github.com/Ramadansyah2/projek-ukk/assets/160801704/4bebb739-bec6-43ec-a5fe-79ed0ad83817)

![Screenshot (25)](https://github.com/Ramadansyah2/projek-ukk/assets/160801704/ba6f98d2-fe08-48e0-be9f-315787abccda)

![Screenshot (29)](https://github.com/Ramadansyah2/projek-ukk/assets/160801704/1eed6f92-a25b-4301-b736-2f279ab22549)

![Screenshot (26)](https://github.com/Ramadansyah2/projek-ukk/assets/160801704/899f50d7-ea6d-4598-81f3-5469c4b5aa3f)

## ERD, Relasi dan UML Use Case

- ERD

![RAMA](https://github.com/Ramadansyah2/projek-ukk/assets/160801704/91d25667-e9db-407f-8ff4-6d51b0479eef)

- Relasi
![Capture](https://github.com/Ramadansyah2/projek-ukk/assets/160801704/75056de1-639f-4776-bc9b-0f607614342c)

- UML

![ZPBFJWCX4CRlFCMazxw2wHyJBpqOa-ePbt5BoZ8D3F5WV7SNQ0cZczYU-7xpAvryT1DP1qwJKmu_69WWsF74O6p0WIrv5S_MNtJG4rpqSDOZmfU2-RERqnWeURCdHm7UJfQnJYWO39NktAofRwNqm7DyIXWPT8HLEQsKoZ-Z_UZmXgxNfuY3rfsb2pvru9TLjQnuZXh9bFiWbC_bln-pSjsSsxz](https://github.com/Ramadansyah2/projek-ukk/assets/160801704/a651f65b-6e2d-4a08-89bb-51f54556b4b2)


## Prasyaratan

- PHP 8.2.X & Web Server (Apache, Lighttpd, atau Nginx)
- Database (PhpMyAdmin)
- Web Browser (Firefox, Opera, dll)
- Laragon

## Instalasi
1. Clone Repository
```
https://github.com/Ramadansyah2/projek-ukk.git
```

2. Install Composer
```
composer install
```
atau
```
composer update
```

3. Copy .Env
```
copy .env.example .env
```

4. Setting database di .env
```
DB_PORT=3306
DB_DATABASE=ukk-rama
DB_USERNAME=root
DB_PASSWORD=
```

5. Generate key
```
php artisan key:generate
```

6. Jalankan migrate dan seeder
```
php artisan migrate --seed
```

7. Buat Storage Link
```
php artisan storage:link
```

8. Jalankan Serve
```
php artisan serve
```

