<!DOCTYPE html>
<html class="no-js">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Desafio PHP Estruturado</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
      integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
        <?php
            if ( ! session_id() ) @ session_start(); 
            if ( ! isset($_SESSION["itens"]) ) @ $_SESSION["itens"] = array();

            class Produto {
                public $nome;
                public $cat;
                public $desc;
                public $qtd;
                public $prc;
                public $img;
            }
        ?>
    </head>
    <body>
        <div id="todo">
        <div id="lista_de_itens">
        <?php
            if(!(
                empty($_POST["nome"])||
                empty($_POST["cat"]) ||
                empty($_POST["desc"])||
                empty($_POST["qtd"]) ||
                empty($_POST["prc"]) ||
                empty($_FILES["img"])
                )) {
                $new_prod = new Produto();
    
                $new_prod->nome = $_POST["nome"];
                $new_prod->cat = $_POST["cat"];
                $new_prod->desc = $_POST["desc"];
                $new_prod->qtd = $_POST["qtd"];
                $new_prod->prc = $_POST["prc"];
                print_r($_FILES["img"]);
                $new_prod->img = $_FILES["img"]['tmp_name'];
                $new_prod->name = $_FILES["img"]["name"];
                $new_prod->local= "assets/img/".$new_prod->name;
                move_uploaded_file($new_prod->img, $new_prod->local);
                array_push($_SESSION['itens'], $new_prod);
                session_commit();
                
            }
            foreach ($_SESSION['itens'] as $prod) {
                echo '<a href="visualiza.php?prod_id=';
                echo array_search($prod, $_SESSION['itens']);
                echo '">';
                echo $prod->nome;
                echo"</a>";
                
                echo "<br>";
                echo $prod->cat;
                echo "<br>";
                echo $prod->desc;
                echo "<br>";
                echo $prod->qtd;
                echo "<br>";
                echo $prod->prc;
                echo "<br>";
                echo "<img src='".$prod->local."'></img>";
                echo "<br>";
            }
        ?>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-10">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title">Cadastrar Produto</h6>
          </div>
          <div class="modal-body">
            <form action="index.php" method="post" enctype="multipart/form-data">
              <div class="input-group col-md-10">
                <label for="nome">Nome Produto</label>
                <input name="nome" type="text" class="form-control"
                  placeholder="nome do produto cadastrado">
              </div>
              <div class="input-group col-md-10">
                <label for="categoria">Categoria</label>
                <select class="form-control" name="cat">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
              <div class="input-group col-md-10">
                <label for="desc">Descrição</label>
                <input name="desc" type="text" class="form-control"
                  placeholder="descrição do produto">
              </div>
              <div class="input-group col-md-10">
                <label for="qtd">Quantidade</label>
                <input name="qtd" type="number" class="form-control"
                  placeholder="quantidade em estoque">
              </div>
              <div class="input-group col-md-10">
                <label for="prc">Preço</label>
                <input name="prc" type="text" class="form-control" placeholder="valor do produto">
              </div>
              <div class="input-group col-md-10">
                <label for="img">Imagem do Produto</label>
                <input name="img" type="file" class="form-control-file">
              </div>
              <button class="btn btn-primary" onclick="submit()">Enviar</button>
            </form>
            <div class="row">
              <div class="col-md-10">
      </form>
        </div>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
