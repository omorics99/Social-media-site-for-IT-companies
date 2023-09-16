# Instalācija
## Vajadzīgās programmas:
    php 8
        https://www.geeksforgeeks.org/how-to-install-php-in-windows-10/
	Node.js
	Composer
	Git
	7-zip
	Sourcetree
	Windows terminal, no Microsoft Store

Ar git cmd (Te varbūt vajadzēs katram ģenerēt savu token.): 
```
git clone https://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@github.com/omorics99/laravel-vue.git
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
