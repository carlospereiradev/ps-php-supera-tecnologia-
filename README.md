### Passo a passo
Clone Repositório
```sh
git clone https://github.com/carlospereiradev/ps-php-supera-tecnologia-.git teste
```

```sh
cd teste/
```

Crie o Arquivo .env
```sh
cp .env.example .env
```

Atualize as variáveis de ambiente do arquivo .env
```dosini

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=teste
DB_USERNAME=sail
DB_PASSWORD=password

```


Suba os containers do projeto
```sh
./vendor/bin/sail up -d
```


Acessar o container
```sh
./vendor/bin/sail bash
```


Instalar as dependências do projeto
```sh
composer install
```


Gerar a key do projeto Laravel
```sh
php artisan key:generate
```

Gerar as migrations e seed
```sh
php artisan migration
php artisan db:seed
```

Acesse o projeto
[http://localhost:80](http://localhost:80)
