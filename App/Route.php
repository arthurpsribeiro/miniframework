<?php
// os métodos que representam a lógica do framework ficarão em vendor/MF/Init/Bootstrap.php
namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap
{

  //função que define e configura as rotas da aplicação
  protected function initRoutes()
  {
    $routes['home'] = array(
      'route' => '/',
      'controller' => 'IndexController',
      'action' => 'index'
    );

    $routes['sobre_nos'] = array(
      'route' => '/sobre_nos',
      'controller' => 'IndexController',
      'action' => 'sobreNos'
    );

    // as rotas são responsáveis por definir qual controlador será utilizado e qual será a ação dentro do controlador que será utilizada em função do path. 
    // /sobre_nos = rota genérica apenas a nível de testes

    $this->setRoutes($routes);
    // atribuindo o array de rotas ao atributo $routes

  }
}
