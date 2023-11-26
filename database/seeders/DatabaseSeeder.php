<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Companies;
use App\Models\Products;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Companies::create([
            'id' => '1',
            'name' => 'Kompānija 1',
            'description' => 'Kompānija 1 piedāvā plašu klāstu IT pakalpojumu, kas pielāgoti katram klientam individuāli. Mūsu pakalpojumu klāsts ietver IT konsultācijas, programmatūras izstrādi, tīkla infrastruktūras pārvaldību, mākoņu skaitļošanas risinājumus, kiberdrošību un IT atbalstu. Mēs cieši sadarbojamies ar mūsu klientiem, lai saprastu viņu konkrētos vajadzības un izstrādātu pielāgotus risinājumus, kas atbilst viņu biznesa mērķiem. Klientu apmierinātība ir mūsu darbības pamatā. Mēs ticam ilgtermiņa partnerattiecību veidošanai ar mūsu klientiem, un mūsu atbalsta komanda ir pieejama visu diennakti, lai risinātu jebkādas problēmas vai jautājumus, kas var rasties. Mēs lepojamies ar izcilu klientu apkalpošanu un nodrošinām, ka mūsu klienti saņem augstāko līmeni atbalsta un palīdzības visā ceļā kopā ar mums.',
            'website_link' => 'www.kompanija.lv',
            'adress' => '123 Main St',
            'gallery' => '',
            'phone' => '20000000',
            'email' => 'test@gmail.com',
        ]);

        Companies::create([
            'name' => 'Kompānija 2',
            'description' => 'Kompānija 2 ir vadošais IT risinājumu sniedzējs, kas specializējas jaunākās tehnoloģijas risinājumu nodrošināšanā uzņēmumiem visās nozarēs. Ar augsti kvalificētu profesionāļu komandu mēs esam apņēmušies palīdzēt mūsu klientiem izmantot tehnoloģiju priekšrocības, veicināt inovācijas, uzlabot darbības efektivitāti un sasniegt savus biznesa mērķus. Ar mūsu ekspertīzi jaunākajās nozaru tendencēs un tehnoloģijās, mēs cenšamies piedāvāt inovatīvus un efektīvus risinājumus, kas dotu mūsu klientiem konkurētspēju digitālajā vidē. Mūsu pieredzējušo profesionāļu komanda apvieno tehnisko ekspertīzi ar dziļu uzņēmējdarbības procesu izpratni, lai sniegtu holistiskus risinājumus, kas veicina izaugsmi un panākumus.',
            'website_link' => 'www.kompanija2.lv',
            'adress' => '123 Main St',
            'gallery' => '',
            'phone' => '20000000',
            'email' => 'test2@gmail.com',
        ]);


        Companies::create([
            'name' => 'Kompānija 3',
            'description' => 'Kompānija 3 piedāvā plašu klāstu IT pakalpojumu, kas pielāgoti katram klientam individuāli. Mūsu pakalpojumu klāsts ietver IT konsultācijas, programmatūras izstrādi, tīkla infrastruktūras pārvaldību, mākoņu skaitļošanas risinājumus, kiberdrošību un IT atbalstu. Mēs cieši sadarbojamies ar mūsu klientiem, lai saprastu viņu konkrētos vajadzības un izstrādātu pielāgotus risinājumus, kas atbilst viņu biznesa mērķiem. Klientu apmierinātība ir mūsu darbības pamatā. Mēs ticam ilgtermiņa partnerattiecību veidošanai ar mūsu klientiem, un mūsu atbalsta komanda ir pieejama visu diennakti, lai risinātu jebkādas problēmas vai jautājumus, kas var rasties. Mēs lepojamies ar izcilu klientu apkalpošanu un nodrošinām, ka mūsu klienti saņem augstāko līmeni atbalsta un palīdzības visā ceļā kopā ar mums.',
            'website_link' => 'kompanija3.lv',
            'adress' => '123 Main St',
            'gallery' => '',
            'phone' => '20000000',
            'email' => 'test3@gmail.com',
        ]);

        Companies::create([
            'name' => 'Kompānija 4',
            'description' => 'Kompānija 4 piedāvā plašu klāstu IT pakalpojumu, kas pielāgoti katram klientam individuāli. Mūsu pakalpojumu klāsts ietver IT konsultācijas, programmatūras izstrādi, tīkla infrastruktūras pārvaldību, mākoņu skaitļošanas risinājumus, kiberdrošību un IT atbalstu. Mēs cieši sadarbojamies ar mūsu klientiem, lai saprastu viņu konkrētos vajadzības un izstrādātu pielāgotus risinājumus, kas atbilst viņu biznesa mērķiem. Klientu apmierinātība ir mūsu darbības pamatā. Mēs ticam ilgtermiņa partnerattiecību veidošanai ar mūsu klientiem, un mūsu atbalsta komanda ir pieejama visu diennakti, lai risinātu jebkādas problēmas vai jautājumus, kas var rasties. Mēs lepojamies ar izcilu klientu apkalpošanu un nodrošinām, ka mūsu klienti saņem augstāko līmeni atbalsta un palīdzības visā ceļā kopā ar mums.',
            'website_link' => 'kompanija4.lv',
            'adress' => '123 Main St',
            'gallery' => '',
            'phone' => '20000000',
            'email' => 'test4@gmail.com',
        ]);

        Companies::create([
            'name' => 'Kompānija 5',
            'description' => 'Kompānija 5 piedāvā plašu klāstu IT pakalpojumu, kas pielāgoti katram klientam individuāli. Mūsu pakalpojumu klāsts ietver IT konsultācijas, programmatūras izstrādi, tīkla infrastruktūras pārvaldību, mākoņu skaitļošanas risinājumus, kiberdrošību un IT atbalstu. Mēs cieši sadarbojamies ar mūsu klientiem, lai saprastu viņu konkrētos vajadzības un izstrādātu pielāgotus risinājumus, kas atbilst viņu biznesa mērķiem. Klientu apmierinātība ir mūsu darbības pamatā. Mēs ticam ilgtermiņa partnerattiecību veidošanai ar mūsu klientiem, un mūsu atbalsta komanda ir pieejama visu diennakti, lai risinātu jebkādas problēmas vai jautājumus, kas var rasties. Mēs lepojamies ar izcilu klientu apkalpošanu un nodrošinām, ka mūsu klienti saņem augstāko līmeni atbalsta un palīdzības visā ceļā kopā ar mums.',
            'website_link' => 'kompanija5.lv',
            'adress' => '123 Main St',
            'gallery' => '',
            'phone' => '20000000',
            'email' => 'test5@gmail.com',
        ]);

        Companies::create([
            'name' => 'Kompānija 6',
            'description' => 'Kompānija 6 piedāvā plašu klāstu IT pakalpojumu, kas pielāgoti katram klientam individuāli. Mūsu pakalpojumu klāsts ietver IT konsultācijas, programmatūras izstrādi, tīkla infrastruktūras pārvaldību, mākoņu skaitļošanas risinājumus, kiberdrošību un IT atbalstu. Mēs cieši sadarbojamies ar mūsu klientiem, lai saprastu viņu konkrētos vajadzības un izstrādātu pielāgotus risinājumus, kas atbilst viņu biznesa mērķiem. Klientu apmierinātība ir mūsu darbības pamatā. Mēs ticam ilgtermiņa partnerattiecību veidošanai ar mūsu klientiem, un mūsu atbalsta komanda ir pieejama visu diennakti, lai risinātu jebkādas problēmas vai jautājumus, kas var rasties. Mēs lepojamies ar izcilu klientu apkalpošanu un nodrošinām, ka mūsu klienti saņem augstāko līmeni atbalsta un palīdzības visā ceļā kopā ar mums.',
            'website_link' => 'kompanija6.lv',
            'adress' => '123 Main St',
            'gallery' => '',
            'phone' => '20000000',
            'email' => 'test6@gmail.com',
        ]);

        User::create([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@zenvue.lv',
            'password' => bcrypt('password'),
        ]);

        Products::create([
            'name' => 'Produkts 1',
            'description' => 'Mēs varam palīdzēt jums atrisināt jebkādas problēmas jūsu programmatūras testēšanas un kvalitātes nodrošināšanas procesos. Neatkarīgi no tā, vai jums trūkst pieredzējušu kvalitātes nodrošināšanas inženieru, trūkst zināšanu konkrētās tehnoloģijās vai vispār nav kvalitātes nodrošināšanas komandas, mēs varam palīdzēt.',
            'company_id' => 1,
            'user_id' => 1,
        ]);
        Products::create([
            'name' => 'Produkts 2',
            'description' => 'Neatkarīgi no tā, vai esat ieplānojis liela mēroga produkta laišanu tirgū vai tikai vēlaties izprast produkta ierobežojumus, mūsu inženieru komanda strādās kopā ar jums, lai noteiktu produkta veiktspējas galvenos darbības rādītājus un identificētu veiktspējas problēmas, ko papildinās visaptverošs pastāvīgas testēšanas plāns.',
            'company_id' => 1,
            'user_id' => 1,
        ]);
        Products::create([
            'name' => 'Produkts 3',
            'description' => 'Varam palīdzēt izveidot testēšanas automatizāciju no nulles un pat pievienoties jūsu esošajām programmatūras kvalitātes nodrošināšanas komandām. Jau vairāk nekā desmit gadus darbojamies programmatūras kvalitātes nodrošināšanas jomā – testēšanas automatizācija ir mūsu stiprā puse.',
            'company_id' => 1,
            'user_id' => 1,
        ]);
        Products::create([
            'name' => 'Produkts 4',
            'description' => 'Mēs veicam manuālo testēšanu ar vairāk nekā 3500 reālām ierīcēm un aptveram dažādas platformas, operētājsistēmas, versijas, ražotājus un konfigurācijas. Mūsu ISTQB sertificēto QA inženieru komandai ir plaša pieredze, izmantojot nozares vadošos programmatūras testēšanas rīkus un struktūras, lai nodrošinātu, ka jūsu produkts atbilst visām prasībām.',
            'company_id' => 1,
            'user_id' => 1,
        ]);
        Products::create([
            'name' => 'Produkts 5',
            'description' => 'Pieejamība ir viena no galvenajām sastāvdaļām, lai nodrošinātu augstas kvalitātes lietojumprogrammu, kas atbilst visām jaunākajām izstrādes vadlīnijām un noteikumiem. Digitālā pieejamība nodrošina tīmekļa satura, programmatūras, dokumentu un citu digitālo produktu un satura pieejamību ikvienam, tostarp cilvēkiem ar dažādiem traucējumiem.',
            'company_id' => 1,
            'user_id' => 1,
        ]);
        Products::create([
            'name' => 'Produkts 6',
            'description' => 'Mūsu ISO konsultāciju pakalpojumi ir izstrādāti, lai palīdzētu jums paaugstināt vispārējo uzņēmējdarbības kvalitāti un uzlabot uzticamību, standartizējot procedūras. Lai gan tas ir efektīvs, tas ir ļoti sarežģīts un laikietilpīgs process. Izvēloties profesionālu konsultantu, saņemsiet kvalitatīvus pakalpojumus un garantētus rezultātus.',
            'company_id' => 1,
            'user_id' => 1,
        ]);
    }
}
