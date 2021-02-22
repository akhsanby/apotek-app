# Sistem Informasi Apotek

Membuat sistem informasi apotek sederhana menggunakan codeigniter v4.1.1 untuk Tugas UAS

## Instalasi
```bash
git clone https://github.com/AkhsanBy/apotek-app.git
```

## Cara menjalankan

1. ```composer update```
2. ```cp env .env``` atau copy file env dan rename menjadi .env
3. ```php spark key:generate```
4. setting database pada .env
5. ```php spark migrate```
6. ```php spark db:seed DatabaseSeeder```
7. ```php spark serve```
9. username : admin - password : admin
