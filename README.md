# Curso GCP: Escalabilidade e Alta Disponibilidade na Nuvem da Google

Neste curso vamos trabalhar com escala horizontal de aplicações na nuvem da Google.

- :movie_camera: [Acesse o Curso](https://academy.especializati.com.br/curso/gcp-escalabilidade-e-alta-disponibilidade-de-uma-aplicacao-na-nuvem-da-google).


Links Úteis:

- :tada: [Saiba Mais](https://linktr.ee/especializati)

### Step by Step
Clone Repository
```sh
git clone https://github.com/especializati/gcp-escala.git app-laravel
```
```sh
cd app-laravel/
```

Remove Version Control
```sh
rm -rf .git
```


Create .env File
```sh
cp .env.example .env
```


Update the environment variables in the .env file
```dosini
APP_NAME="Especializa Ti"
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_aqui

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Start project containers
```sh
docker-compose up -d
```


Access the container
```sh
docker-compose exec app bash
```


Install project dependencies
```sh
composer install
```


Generate Laravel project key
```sh
php artisan key:generate
```


Access the project
[http://localhost](http://localhost)
