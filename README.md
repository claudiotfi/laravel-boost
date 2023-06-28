# Laravel Boost
O pacote é um conjunto de recursos e funcionalidades baseadas no framework Laravel e no pacote Laravel Spatie. Ele oferece um painel de administração pronto para ser extendido a todo o sistema e inclui recursos avançados de ACL e edição de perfil.

## Recursos
- Integração com Laravel Spatie: O pacote utiliza as funcionalidades do pacote Laravel Spatie para controle de acesso e autorização, garantindo um sistema seguro e flexível de gerenciamento de permissões.

- CRUD de Usuários: O pacote fornece um sistema completo de CRUD (Create, Read, Update, Delete) para gerenciamento de usuários, permitindo a criação, edição, exclusão e exibição de detalhes dos usuários.

- CRUD de Funções e Permissões: Além do gerenciamento de usuários, o pacote também oferece recursos de CRUD para funções e permissões. Os administradores podem criar funções personalizadas e atribuir permissões específicas a cada função.

- Restrição de Acesso por IP: O pacote permite restringir o acesso ao sistema com base no endereço IP dos usuários. Os administradores podem definir uma lista de IPs permitidos, garantindo que apenas os usuários com endereços IP correspondentes possam acessar o sistema.

- Restrição de Acesso por Horário: Além da restrição por IP, o pacote também permite restringir o acesso com base no horário. Os administradores podem definir horários específicos em que o sistema estará disponível, limitando o acesso apenas aos usuários autorizados durante esses períodos.

## Instalação
composer require claudiotfi/laravel-boost:dev-main

## Migrations
Após a instalação, rode 'php artisan migrate' para criar/atualizar as tabelas

## Licença
[MIT license](https://opensource.org/licenses/MIT)
