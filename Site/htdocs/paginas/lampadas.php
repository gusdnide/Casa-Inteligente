
<div class="panel panel-default">
                  <div class="panel-heading">
                     <center>
                        <h3>Lampadas</h3>
                     </center>
                  </div>                  
                  <div class="panel-body">
                     <div class="row">
                     <div class="panel panel-default col-xs-3">
                        <div class="panel-body preto">
                           <form action="#" method="POST" id="fquarto1">
                              <input type="hidden" name="flampadas" value="1">
                              <center>
                                 <h4><img src="imgs/cama.png" width="20px" height="20px"/> Quarto</h4>
                              </center>
                              <p class="text-center"><b id="lquarto1"><?php if($Arduino->InfoPorta(pQuarto))echo "Ligado."; else echo "Desligado."; ?></b></p>
                              <input type="hidden" name="iquarto1" value="1">
                              <center>
                                 <label class="switch">
                                 <input onclick='document.getElementById("fquarto1").submit();' name="cquarto1" id="cquarto1" type="checkbox" <?php if($Arduino->InfoPorta(2))echo "checked"; ?> >
                                 <span class="slider"></span>                     
                                 </label><br>
                                 <p class="text-info">Pressione o botao para ligar\desligar.</p>
                              </center>
                           </form>
                        </div>
                     </div>                     
                     <div class="panel panel-default col-xs-3  col-xs-offset-1">
                        <div class="panel-body preto">
                           <form action="#" method="POST" id="fcozinha">
                              <input type="hidden" name="flampadas" value="1">
                              <center>
                                  <h4><img src="imgs/sala.png" width="25px" height="25px"/> Sala</h4>
                                 
                              </center>
                              <p class="text-center"><b id="lcozinha"><?php if($Arduino->InfoPorta(pCozinha))echo "Ligado."; else echo "Desligado."; ?></b></p>
                              <input type="hidden" name="icozinha"  value="3">
                              <center>
                                 <label class="switch">
                                 <input onclick='document.getElementById("fcozinha").submit();' name="ccozinha" id="ccozinha" type="checkbox" <?php if($Arduino->InfoPorta(4))echo "checked"; ?> >
                                 <span class="slider"></span>                     
                                 </label><br>
                                 <p class="text-info">Pressione o botao para ligar\desligar.</p>
                              </center>
                           </form>
                        </div>
                     </div>
                        <div class="panel panel-default col-xs-3 col-xs-offset-1">
                        <div class="panel-body preto">
                           <form action="#" method="POST" id="fsala">
                              <input type="hidden" name="flampadas" value="1">
                              <center>
                                <h4><img src="imgs/cozinha.png" width="25px" height="25px"/> Cozinha</h4>
                              </center>
                              <p class="text-center"><b id="lsala"><?php if($Arduino->InfoPorta(pSala))echo "Ligado."; else echo "Desligado."; ?></b></p>
                              <input type="hidden" name="isala"  value="4">
                              <center>
                                 <label class="switch">
                                 <input onclick='document.getElementById("fsala").submit();' name="csala" id="csala" type="checkbox" <?php if($Arduino->InfoPorta(5))echo "checked"; ?> >
                                 <span class="slider"></span>                     
                                 </label><br>
                                 <p class="text-info">Pressione o botao para ligar\desligar.</p>
                              </center>
                           </form>
                        </div>
                     </div>
                     </div>
                     <div class="row">

                     <div class="panel panel-default col-xs-3">
                        <div class="panel-body preto">
                           <form action="#" method="POST" id="fpiscina">
                              <input type="hidden" name="flampadas" value="1">
                              <center>
                                 <h4><img src="imgs/piscina.png" width="25px" height="25px"/> Piscina</h4>
                              </center>
                              <p class="text-center "><b ><?php if($Arduino->InfoPorta(pPiscina))echo "Ligado."; else echo "Desligado."; ?></b></p>
                              <input type="hidden" name="ipiscina"  value="5">
                              <center>
                                 <label class="switch">
                                 <input onclick='document.getElementById("fpiscina").submit();' name="cpiscina" id="cpiscina" type="checkbox" <?php if($Arduino->InfoPorta(6))echo "checked"; ?> >
                                 <span class="slider"></span>                     
                                 </label><br>
                                 <p class="text-info">Pressione o botao para ligar\desligar.</p>
                              </center>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               </div>
