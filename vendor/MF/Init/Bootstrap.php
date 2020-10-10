<?php

// os métodos de Route.php que representam a lógica do framework ficarão aqui. 
namespace MF\Init;

abstract class Bootstrap
{

  private $routes;

  public function __construct()
  {
    $this->initRoutes(); //inciando array de rotas
    $this->run($this->getUrl());
    //chamando o método run() passando como parâmetro a URL que o usuário está tentando acessar através do método getUrl(). 
  }

  public function getRoutes()
  {
    return $this->routes;
  }

  public function setRoutes(array $routes)
  {
    $this->routes = $routes;
  }


  protected function getUrl() // função para verificar qual URL o usuário está tentando acessar
  {
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    // parse_url() recebe uma URL, interpreta e retorna um array detalhando os componentes da URL. O parâmetro PHP_URL_PATH faz com que a função retorne apenas o path de fato.
  }

  protected function run($url)
  {

    foreach ($this->getRoutes() as $path => $route) {
      // O método getRoutes() recupera o atributo $routes que no momento de sua execução é o array de rotas, portanto esse foreach irá percorrer cada path definido no método initRoutes() isolando suas respectivas configurações(paths, controllers e actions).

      if ($url == $route['route']) {
        // Este if() irá verificar se a URL digitada corresponde a alguma URL da aplicação.
        // Ao encontrar a URL correspondente, podemos criar dinamicamente uma classe com base no atributo $route['controller'].

        $class = "App\\Controllers\\" . ucfirst($route['controller']);
        // criando de forma dinâmica a instrução para a criação da classe.

        $action = $route['action'];
        // atribuindo dinamicamente na variável $action a ação(método) correspondente ao controlador.

        $controller = new $class;
        // instanciando a classe criada dinamicamente. 

        $controller->$action();
        // executando o método(action). 

      }
    }
  }

  abstract protected function initRoutes();
  // esse método abstrato será implementado na classe Route.php (classe 'filha')

}
