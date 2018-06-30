<html>
   <?php
      require "tools.php";
      $Arduino = new ArduinoApi(vPORTA);
      $Arduino2 = new ArduinoApi(vPORTA2); //Segundo Arduino

      if(!isset($_COOKIE['logado']))
        header("Location: index.php");
     
      $local = 1;
      if(isset($_POST['flampadas']))
        $local = 2;

      if(isset($_POST['foutros']))
        $local = 3;
      if(isset($_POST['fcontas']))
        $local = 4;

 if(isset($_POST['iquarto1'])){
          if(isset($_POST['cquarto1'])){
            $Arduino->LigarPorta(pQuarto);
          }else{
            $Arduino->DesligarPorta(pQuarto);
          }
      }
      if(isset($_POST['icozinha'])){
          if(isset($_POST['ccozinha'])){
            $Arduino->LigarPorta(pCozinha);
          }else{
            $Arduino->DesligarPorta(pCozinha);
          }
      }
 
      if(isset($_POST['isala'])){
          if(isset($_POST['csala'])){
            $Arduino->LigarPorta(pSala);
          }else{
            $Arduino->DesligarPorta(pSala);
          }
      }
      if(isset($_POST['ipiscina'])){
          if(isset($_POST['cpiscina'])){
            $Arduino->LigarPorta(pPiscina);
          }else{
            $Arduino->DesligarPorta(pPiscina);
          }
      }
        if(isset($_POST['abrirp']))
          $Arduino2->AbrirPortao();
       else if(isset($_POST['desligarp']))
          $Arduino2->FecharPortao();
       else if(isset($_POST['abrirl']))
          $Arduino->EnviarDado("ligtudo");
       else if(isset($_POST['desligarl']))
          $Arduino->EnviarDado("destudo");
        else{

        }
       $Arduino->Status();
      
      ?>
   <head>
      <title>Painel moderativo</title>
        <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/bootstrap-theme.css" />
      <link rel="stylesheet" href="css/style.css">
      <link rel="icon" href="imgs/icon.ico" type="image/x-icon" />
      <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/scripts.js"></script>
   </head>
   <body>
      <div class="container-fluid">
      <div class="row">
         <div class="col-sm-3 contEsquerdo2  ">
            <div class="panel panel-default contEsquerdo contMenu">
               <div class="panel-heading ">
                  <h4>Painel de controle</h4>
               </div>
               <div class="panel-body ">
                  <p>
                  <center><img src="imgs/logo.png" width="200px" height="100px" alt="Logo"><br>
                     <b id="inome"><?php echo $_COOKIE['nome']; ?></b>
                  </center>
                  </p>
                  <p class="text-right"><a href="deslogar.php">Sair</a><i class="glyphicon glyphicon-log-out"> </i></p>
                  <hr>
                  <ul class="nav nav-pills nav-stacked">
                     <li <?php if($local == 1)echo 'class="active" '; ?> ><a data-toggle="tab" href="#home"><img src="imgs/home.png" width="20px" height="20px"/>Inicio</a></li>
                     <li <?php if($local == 2)echo 'class="active" '; ?>><a data-toggle="tab" href="#menu1"><img src="imgs/lampada.png" width="20px" height="20px"/>Iluminaçao</a></li>
                     <li <?php if($local == 3)echo 'class="active" '; ?>><a data-toggle="tab" href="#menu2"><img src="imgs/freezer.png" width="20px" height="20px"/>Outros</a></li>
                     <?php if ($_COOKIE['isadmin'] == true){?>
                     <li <?php if($local == 4)echo 'class="active" '; ?>><a data-toggle="tab" href="#menu4"><img src="imgs/user.png" width="20px" height="20px"/>Contas</a></li>
                      <?php }?>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-sm-9 conteudo tab-content">
         
            <div id="home" <?php if($local == 1)echo 'class="tab-pane fade in active"'; else echo 'class="tab-pane fade "'; ?> >
               <?php require "paginas/home.php"; ?>
            </div>
            <div id="menu1" <?php if($local == 2)echo 'class="tab-pane fade in active" '; else echo 'class="tab-pane fade "'; ?>>
               <?php require "paginas/lampadas.php";?>
            </div>
            <div id="menu2" <?php if($local == 3)echo 'class="tab-pane fade in active" '; else echo 'class="tab-pane fade "';?>>
               <?php require "paginas/eletro.php"; ?>
            </div>
           <?php if ($_COOKIE['isadmin'] == true){?>
            <div id="menu4" <?php if($local == 4)echo 'class="tab-pane fade in active" '; else echo 'class="tab-pane fade "';?>>
                <?php require "paginas/contas.php"; ?>
            </div>
              <?php }?>
           
         </div>

      </div>
   </body>
</html>