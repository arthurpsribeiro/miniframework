<?php

namespace App;

class Route
{
  // função para verificar qual URL o usuário está tentando acessar 
  public function getUrl()
  {
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    // parse_url() recebe uma URL, interpreta e retorna um array detalhando os componentes da URL. O parâmetro PHP_URL_PATH faz com que a função retorne apenas o path de fato.
  }

  //função que define e configura as rotas da aplicação
  public function initRoutes()
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
    // no método apenas defini duas rotas, será melhor densevolvido nas próximas etapas
  }
}
