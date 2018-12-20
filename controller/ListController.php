<?php

require_once "model/item.php";

// controler responsavel pela lista e pelos itens contidos nela
class ListController {

  // funcao para listar itens
  public function list() {
    // verifica se $list eh array para gerar notice/warning
    $list = (isset($_SESSION['data']) && is_array($_SESSION['data'])) ? $_SESSION['data'] : [];
    
    // print da view
    require 'views/list.php';

    // retorno vazio
    return '';
  }

  // adiciona item na lista
  public function add($post) {
    // verifica se $post eh array e possui campo 'value' e contem valor no mesmo
    if (is_array($post) && $post['value']) {
      $val = trim($post['value']);
      // limpa string e verifica se ainda possui texto para ser incluido
      if (strlen($val) > 0) {
        if (!is_array($_SESSION['data'])){
          $_SESSION['data'] = [];
        }

        $_SESSION['data'][] = serialize(new Item($val));

        // retorno positivo
        return 'ok';
      }
    }

    // retorno vazio
    return '';
  }

  // conclui item da lista
  public function done($post) {
    // verifica se $post eh array e possui campo 'value'
    if (is_array($post) && isset($post['value'])) {
      $id = $post['value'];
      $var = unserialize($_SESSION['data'][$id]);

      // para alteracao do valor do campo status
      $var->changeStatus();

      $_SESSION['data'][$id] = serialize($var);

      // retorno positivo
      return 'ok';
    }

    // retorno vazio
    return '';
  }

  // deleta item do array gerando novos indices para o mesmo
  public function del($post) {
    // verifica se $post eh array e possui campo 'value'
    if (is_array($post) && isset($post['value'])) {
      $id = $post['value'];

      array_splice($_SESSION['data'], $id, 1);

      // retorno positivo
      return 'ok';
    }

    // retorno vazio
    return '';
  }

}
