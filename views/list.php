<html>
  <head>
    <title><?php echo $_ENV['TITLE']; ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=0" />

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="/assets/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/list.css" rel="stylesheet" />

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/assets/list.js"></script>
  </head>
  <body>
    <div class="container vertical-center">
      <h2><?php echo $_ENV['TITLE']; ?></h2>
      <div class="form-group">
        <input type="text" name="todoField" class="form-control" id="todoInput" placeholder="Insira aqui um novo item">
      </div>
      <table class="table">
        <?php 
          foreach ($list as $id => $var) { 
            $var = unserialize($var);
        ?>
        <tr class="jsHover" data-id="<?php echo $id; ?>">
          <td>
            <a href="javascript:void(0);" class="jsDone" data-id="<?php echo $id; ?>">
              <?php if (!$var->getStatus()) { ?>
                <i class="far fa-circle"></i>
              <?php } else { ?>
                <i class="fa fa-check-circle"></i>
              <?php } ?>
            </a>
          </td>
          <td width="99%">
            <a href="javascript:void(0);" class="jsDone link" data-id="<?php echo $id; ?>">
              <?php
                if (!$var->getStatus()) {
                  echo $var->getValue();
                } else {
                  echo '<s>' . $var->getValue() . '</s>';
                }
              ?>
            </a>
          </td>
          <td>
            <a href="javascript:void(0);" class="jsRemove trash" id="jsRemove_<?php echo $id; ?>" data-id="<?php echo $id; ?>">
              <i class="fas fa-trash-alt"></i>
            </a>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </body>
</html>
