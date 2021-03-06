#To do List - Laravel with React - With tree component


## Link testável da aplicação
Link testável gerado em uma aplicação AWS EC2 <br>
<a href="http://todolistvibbra-env.62ibvmp7mz.us-east-2.elasticbeanstalk.com/">http://todolistvibbra-env.62ibvmp7mz.us-east-2.elasticbeanstalk.com/</a>
<br><br>
Informações de login:
<ul>
  <li>Email: vibbraneo@vibbra.com.br</li>
  <li>Senha: 123456</li>
</ul>

<h2>Escopo</h2>

O projeto tem como objetivo desenvolver um To Do List (Lista de Tarefas) de forma com que qualquer funcionário da empresa possa editá-lo
em um endereço público.
<br>
As atividades a serem desenvolvidas estão descritas em itens abaixo, algumas funções foram incrementadas no escopo inicial do projeto a
fim de dar maior escalabilidade ao mesmo. As atividades que foram adicionadas serão justificadas nos itens.

<h3>1. Autenticação</h3>
Ao acessar a URL base do site o usuário será redirecionado para a tela de login ou registro.
Justificativa: Essa é uma função importante no sistema, com isto cada usuário poderá ter diversas listas cadastradas em seu login, ou seja,
o usuário não irá ficar dependente de salvar o link público. Esse link pode ser acessado a qualquer momento, basta o usuário efetuar o login
e poderá visualizar todas as listas criadas por ele. O usuário, dessa forma, não precisa se preocupar se eventualmente perder o link editável da lista.

<h3>2. Tela inicial </h3>
Ao efetuar o login o usuário será direcionado para a tela inicial do aplicativo. Nessa tela, o usuário terá acesso a todas as listas cadastradas por ele, podendo visualizá-las, excluí-las ou
editá-las. Além disto, no menu superior, poderá acessar a aba "Sobre", tela onde haverá um breve texto explicativo da
ferramenta.

<h3>3. Criar To Do </h3>
Ao acessar uma URL qualquer a mesma será referenciada para adicionar um novo To Do List. Obs: URL qualquer, desde que a URL digitada não seja uma URL padrão do sistema.
Após digitar o nome da lista e acionar o botão "Adicionar", o usuário será direcionado para a tela de edição da lista recém-criada.

<h3>4. Editar To Do</h3>
Nessa Tela o usuário poderá realizar as seguintes operações:
<ul>
  <li>Criar um novo item</li>
  <li>Editar um item existente</li>
  <li>Apagar um item existente </li>
  <li>Organizar o item como sub-item de um item existente</li>
  <li>Mover um sub-item para fora do item pai, transformando-o em um outro item pai ou um sub-item de outro item</li>
  <li>Selecionar um item/sub item e marcá-lo como "realizado"</li>
</ul>

<h3>5. Excluir To Do</h3>
Ao acessar a URL base do site, o usuário poderá deletar alguma das listas criadas por ele na exibição de listas cadastradas. 

<h3>6. Compartilhar To Do </h3>
Na tela de edição da lista, o usuário pode compartilhar o endereço público dessa lista por E-mail. Lembrando que, qualquer pessoa que tenha acesso a esse link pode editar/excluir itens dessa lista, porém, o usuário convidado que acessar o link não pode excluir o To Do, apenas os itens.

<h2>Estimativa em horas do desenvolvimento do projeto/atividades descritas no escopo</h2>
<ul>
    <li>1. Autenticação - 3 horas</li>
    <li>2. Tela inicial - 4 horas</li>
    <li>3. Criar To Do - 1 hora</li>
    <li>4. Editar To Do - 12 horas</li>
    <li>5. Excluir To Do - 1 hora</li>
    <li>6. Compartilhar To Do - 1 hora</li>
</ul>

<h2>Estimativa em dias</h2>
3 dias úteis

<h2>Planilha com as atividades e horas detalhadas</h2>
<a href="https://docs.google.com/spreadsheets/d/1sWPU1SSoXNnolQshartq8J_np_13CtYRR9Ux803yAzs/edit?usp=sharing">Link da Planilha</a>

## Instalação

- `clonar repositório para sua máquina`
- Editar `.env` e colocar as suas informações de conexão com o banco de dados (mySQL)
- `composer install`
-  Rodar o comando `php artisan key:generate`
- `php artisan migrate`
- `php artisan db:seed`
- `npm install`
- `npm run production`
