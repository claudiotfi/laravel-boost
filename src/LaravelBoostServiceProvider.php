<?php

namespace claudiotfi\laravelboost;

use Illuminate\Support\ServiceProvider;

class LaravelBoostServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Registre os serviços do seu pacote aqui, se necessário.
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Defina as inicializações, rotas, publicações, visualizações, etc., do seu pacote aqui, se necessário.
    }
}

/*
Publicação de arquivos:
Use o método publishes() para publicar arquivos do seu pacote para a aplicação do Laravel. Por exemplo, você pode publicar as migrações para que os usuários do pacote possam executá-las em suas próprias bases de dados.

Carregamento de rotas:
Use o método loadRoutesFrom() para carregar as rotas definidas pelo seu pacote. Isso permite que os usuários do pacote acessem as rotas fornecidas por ele.

Carregamento de visualizações:
Use o método loadViewsFrom() para carregar as visualizações do seu pacote. Isso permite que os usuários do pacote usem as visualizações fornecidas por ele.

Registro de comandos:
Use o método commands() para registrar os comandos do pacote, permitindo que os usuários os executem a partir da linha de comando.
*/
