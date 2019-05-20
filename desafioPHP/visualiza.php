<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produto PHP Estruturado</title>
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
        <?php
            if(! empty($_GET["prod_id"])) {
                $index = $_GET["prod_id"];
                $lista = $_SESSION['itens'];
                $prod = $lista[$index];
    
                #$prod->nome = $lista[$index]->nome;
                #$prod->cat = $lista[$index]->cat;
                #$prod->desc = $lista[$index]->desc;
                #$prod->qtd = $lista[$index]->qtd;
                #$prod->prc = $_SESSION[$index]->prc;
                #$prod->img = $_SESSION[$index]->img;
    
                echo $prod->nome;
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
        <div id="todo">
        </div>
    </body>
</html>
