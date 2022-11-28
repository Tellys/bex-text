## Simples Sistema de Compras | Laravel

- Conferir a versão do php, o teste esta na Versão "^7.4|^8.0".
- Fazer o clone do repositório.
- Rodar os comandos abaixo:
  ```bash
    cd bex-teste
    composer install && npm i  
   
  ```
- Configure o .env e depois rode as migrations.
   ```bash
        php artisan migrate
         npm run watch
    ```
Se deu tudo certo até aqui, agora é com você, vai encontrar mais detalhes no projeto, faz rodar e divirta-se 😁.



Opções para instalação
```bash
composer update --no-scripts
```
Crie o arquivo .env (pode copiar o exemplo e mudar as vars)

```bash
php artisan key:generate
php artisan migrate
php artisan serve
```
