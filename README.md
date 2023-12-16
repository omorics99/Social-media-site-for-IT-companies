# Apraksts
Projekts izstrādāts priekš LBTU biznesa inkubatora "Nozares izaicinājumi 4.ciklā"
    Izaicinājums #3: "LocalTech Connect: vietējo inovāciju veicināšana"
## Izaicinājuma apraksts: 
"LocalTech Connect" izaicinājums aicina studentu komandas izveidot visaptverošu biznesa koncepciju un izstrādāt dinamisku tīmekļa lietojumprogrammu, kuras mērķis ir veicināt un veicināt vietējo IT risinājumu un produktu izaugsmi. Šī izaicinājuma mērķis ir stimulēt sadarbību starp vietējiem tehnoloģiju nodrošinātājiem, uzņēmējiem un patērētājiem, vienlaikus veicinot ekonomisko izaugsmi un kopienas attīstību.
## Izaicinājuma priekšvēsture: 
Globālās savienojamības laikmetā ir ļoti svarīgi atpazīt un atbalstīt vietējos uzņēmumus, jo īpaši tehnoloģiju nozarē. Vietējie IT risinājumi un produkti bieži paliek nepamanīti globālā piedāvājuma jūrā, neskatoties uz to potenciālu apmierināt unikālas vietējās vajadzības. Lietotnes "LocalTech Connect" mērķis ir pārvarēt šo plaisu, nodrošinot platformu, kas demonstrē, savieno un pastiprina vietējās tehnoloģiskās inovācijas.

## Programma sastāv no Vue3, TailWind v3 un Laravel 10

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
Priekš datubāzes jāpalaiž migrācijas un seedotie dati.
```
php artisan migrate
php artisan db:seed
```

Atver pirmās konsolē norādīto localhost linku. Visam vajadzētu darboties, ja parādās 500 server errors tad nav pievienoti .env faili.
