# VINCENZA


## Descrição
 VINCENZA é uma concessionária online, nosso objetivo é facilitar a vida de quem deseja comprar um carro sem precisar ir para uma loja física, fazemos todo o processo de forma remota, portanto será possível comprar e até mesmo vender seu carro usado para dar de entrada, fazemos parcelas justas além de oferecermos um rico catálogo eficiente.

✅ Requisitos
RF01
O sistema deve permitir o cadastro de usuários.

RF02
O usuário deve poder redefinir a senha.

RF03
Caso o usuário opte por fazer o pagamento do carro diretamente, sem parcelas, no débito descontado diretamente da conta, ele poderá obter um desconto de 15%.

RF04
O usuário deve conseguir guardar preferências.

RF05
O usuário poderá dar sugestões ou fazer reclamações sobre o site através de uma caixa de mensagem disponível na área do usuário.

RF06
O usuário deve poder alternar para  o modo escuro

RF07
Visualização da ficha técnica do veículo 

RF08
O sistema deve oferecer suporte a múltiplos idiomas.

RF09
Mostrar possíveis planos de financiamento para compra do carro

RF10
O sistema deve ter um filtro de busca detalhado por marca e modelo, além de filtrar se estas preferências vão ou não aparecer ou não na área de ofertas.

RF11
Informação sobre disponibilidade do veiculo no estoque da concessionária 

RF12
Relatório de inspeção pré-compra através da própria plataforma. 

RF13
Agendamento de Test-Drive

RF14 
Visualização 360° de todos os carros mais vendidos.

RF15
Página de oferta de veículos  

RF16
Reserva online de veículos

RF17
Envio automático de e-mails promocionais, os tipos de promoções recebidas será de escolha do usuário.

RF18
Catálogo online de veículos disponíveis

RF19
Possibilidade de usar um veículo como entrada para adquirir outro veículo, o usuário deve fazer um upload de informações sobre o veículo para que tenha uma análise do nosso sistema.

RF20
Mostrar os carros mais buscados.


## Integrantes
Samuel Macedo Cruz Alves - 20302042

Arthur Clark Francisco - 22301216

Rodrigo Gerçóssimo  - 22301617

Gabriel Carvalho  - 22301984

Raul Gonçalves  - 22301771



## Estrutura de Diretórios

Padrão MVC está da pasta app,  junto de outras pastas que implementam os padrões escolhidos por nós.
Na pasta Repositories há uso do padrão repository.
Na pasta Service há uma singleton "conector.php"
Dentro da pasta Service também há uma pasta Financiamento que implementa o padrão Strategy pra fazer a lógica desse setor do site.
Ainda dentro da pasta Service há outra pasta chamada Reserva que implementa o padrão Decorator na reserva de carros, e há uso do padrão Factory no "ReservaFactory.php".
(Pasta config com os dados de acesso do banco não foram inclusos por questões de segurança, mas foram inclusas no final deste ReadMe)


## Como Executar o Projeto


##1. Pré-requisitos
Git (para baixar o projeto).

PHP (v8.0 ou superior). Importante: O PHP deve estar adicionado ao PATH do seu sistema para que o comando php funcione no terminal.

MySQL (um servidor de banco de dados, como o fornecido pelo MySQL Workbench, XAMPP ou WAMP).

## INSTRUÇÕES
# Clone o repositório para a sua máquina
git clone https://github.com/VINCENZAGIT/NEWVINCENZA.git

...............................................................



## Acesso ao Banco
<!-- Informe como acessar a aplicação (por exemplo, URL local ou credenciais de teste) --> banco de dados do sistema.
- URL local: http://localhost:8000
- Usuário padrão: root  
- Senha padrão: mobilelegends@

--------------------------------------------------------------------

## Observações
Estamos cientes que falta terminar algumas páginas, e portanto não foram incluídas ainda, mas estão em desenvolvimento, e irão ser polidas assim como o resto do site.
A página financiamento por exemplo, já tem o back pronto, a lógica por trás dela, mas o seu visual ainda está em processo de criação e portanto não foi mostrada no vídeo.
Páginas que tiveram algum erro com banco de dados foram mostradas mas tal erro está em processo de resolução ainda.
