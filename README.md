
# Kantar užduotis - straipsniai iš Delfi ir 15min

Ši sistema sukurta naudojant PHP kalbos karkasą Laravel (8.83.6). Duomenų saugojimui naudojamas MySql DB variklis. Sistema leidžia vartotojui gauti naujausius straipsnius iš delfi.lt arba 15min.lt




## Reikalavimai
- PHP
- MySql DB
- Composer

## Projekto paleidimas

1. Nukopijuokite sistemos GitHub repozitoriją

```bash
  git clone https://github.com/RafalKLab/Kantar-u-duotis.git
```

2. Nueikite į projekto aplanką

```bash
  cd Kantar-u-duotis
```

3. Įdiekite Composer priklausomybes

```bash
  composer install
```

4. Įdiekite NPM priklausomybes

```bash
  npm install
```

5. Sukurkite .env failo kopiją

```bash
  cp .env.example .env
```

6. Sugeneruokite programos raktą (app encryption key)

```bash
  php artisan key:generate
```

7. Sukurkite sistemai naują duomenų bazę 
8. Į .env failą pridėkite naujai sukurtos duomenų bazės informaciją

`DB_DATABASE` = duomenų bazės pavadinimas

`DB_USERNAME` = duomenų bazės vartotojas

`DB_USERNAME` = duomenų bazės slaptažodis

Pavyzdys
```
DB_DATABASE=naujienos
DB_USERNAME=root
DB_PASSWORD=
```

9. Perkelkite migracijos lentelės į duomenų bazę

```bash
  php artisan migrate
```


    
## Programos diegimas

Projekto aplanko viduje naudokite komandą:

```bash
  php artisan serve
```


## Autoriai

- [@RafalKLab](https://github.com/RafalKLab)

