# Instalācija
## Vajadzīgās programmas:
    php 8
        https://www.geeksforgeeks.org/how-to-install-php-in-windows-10/
	Node.js
	Composer
	Git
	7-zip
	GitHub Desktop, nav obligāts
	Windows terminal, no Microsoft Store

php.ini failā vajag atkomentēt attiecīgo DB 

```
extension=curl
extension=php_fileinfo.dll
extension=php_pdo_sqlite.dll
```

Atver Windows terminal CMD konsoli un atver projekta mapi ar cd komandu un palaid šīs komandas.
```
npm install
composer update --ignore-platform-reqs
composer install
php artisan serve
```
Atver otru Windows terminal CMD konsoli un projekta mapē palaid
```
npm run dev
```
Atver pirmās konsolē norādīto localhost linku. Visam vajadzētu darboties, ja parādās 500 server errors tad nav pievienoti .env faili.
