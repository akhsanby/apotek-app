# Sistem Informasi Apotek

Membuat sistem informasi apotek sederhana menggunakan codeigniter v4.1.1 untuk Tugas UAS

## Instalasi
```bash
git clone https://github.com/AkhsanBy/apotek-app.git
```

## Cara menjalankan
Jalankan perintah dibawah dengan terminal didalam folder apotek

1. ```composer update```
2. copy file env menjadi .env
3. ```php spark key:generate```
4. setting database pada .env
5. ```php spark migrate```
6. ```php spark db:seed DatabaseSeeder```
7. ```php spark serve```
9. username : admin - password : admin