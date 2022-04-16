
![alt text](https://raw.githubusercontent.com/MateuszKalwinski/newspaper/main/public/img/logo.png)
##### Możesz obejrzeć aplikację pod linkiem
# [Newspaper](http://newspaper.kalwinscy.pl/)


[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

## Funkcje

- Lista dodanych postów
- Dodawanie postów z kategoriami
- Dodawanie kategorii
- Panel Logowania
- API
- REDIS


## Technologie

Dillinger uses a number of open source projects to work properly:

- LARAVEL
- NPM
- NODE
- REDIS
- Material Design for Bootstrap
- jQuery


## Instalacja

Projekt wymaga node w wersji 15.2.1 oraz NPM w wersji 7.0.13


```sh
git clone https://github.com/MateuszKalwinski/newspaper.git
composer install
cp .env.example .env
php artisan key:generate
npm install
```

Stwórz bazę danych MySql i uzupełnij plik .env 
Jeśli jest to wymagane zainstaluj redis apt-get install redis-server i uzupełnij plik app/config/database.php

```sh
php artisan migrate:fresh --seed
php artisan serve
```

wejdź na adres

```sh
127.0.0.1:8000
```

## API
Pobranie postów nie wymaga logowania
api/posts - zwróci wszytskie posty - METODA GET

```sh
http://newspaper.kalwinscy.pl/api/posts
http://127.0.0.1:8000/api/posts
```

api/posts/id - zwróci posty z przypisanym id kategorii - METODA GET

poniższy przykład zwróci wszystkie posty z kategorii motoryzacja
```sh
http://newspaper.kalwinscy.pl/api/posts/1
http://127.0.0.1:8000/api/posts/1
```




## License

MIT

**Free Software, Hell Yeah!**

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)

   [dill]: <https://github.com/joemccann/dillinger>
   [git-repo-url]: <https://github.com/joemccann/dillinger.git>
   [john gruber]: <http://daringfireball.net>
   [df1]: <http://daringfireball.net/projects/markdown/>
   [markdown-it]: <https://github.com/markdown-it/markdown-it>
   [Ace Editor]: <http://ace.ajax.org>
   [node.js]: <http://nodejs.org>
   [Twitter Bootstrap]: <http://twitter.github.com/bootstrap/>
   [jQuery]: <http://jquery.com>
   [@tjholowaychuk]: <http://twitter.com/tjholowaychuk>
   [express]: <http://expressjs.com>
   [AngularJS]: <http://angularjs.org>
   [Gulp]: <http://gulpjs.com>

   [PlDb]: <https://github.com/joemccann/dillinger/tree/master/plugins/dropbox/README.md>
   [PlGh]: <https://github.com/joemccann/dillinger/tree/master/plugins/github/README.md>
   [PlGd]: <https://github.com/joemccann/dillinger/tree/master/plugins/googledrive/README.md>
   [PlOd]: <https://github.com/joemccann/dillinger/tree/master/plugins/onedrive/README.md>
   [PlMe]: <https://github.com/joemccann/dillinger/tree/master/plugins/medium/README.md>
   [PlGa]: <https://github.com/RahulHP/dillinger/blob/master/plugins/googleanalytics/README.md>
