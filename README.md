#### Bakery Joaquim

#### Usuário padeiro e o Usuário cliente.

#### Cadastro de produtos padaria.

### Software WEB - PHP POO - MVC - MariaDB

#### Padrão de Projeto MVC

-   Desenvolve em Camadas

-   M: Model (Modelo)
    
    -   Representa a entidade da Classe e interage com o Banco de Dados

-   C: Controller (Controlador)

    -   Organiza o fluxo entre o Model e o View

-   V: View (Visual)

    -   Apresenta as informações para o usuário

##### Estrutura dos arquivos

-   Projeto (bakery-joaquim)
    -   App
        -   Controller
        -   DAO
        -   Model
        -   Template
        -   Tools
            -   css
            -   imgs
        -   View
    *   index
    *   README.MD

#### Cadastro de Pessoas (cliente ou padeiro)

-   pessoa
    -   Nome VARCHAR(100)
    -   Email VARCHAR (100)
    -   telefone VARCHAR(15)
