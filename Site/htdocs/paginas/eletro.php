<row>
<div class="panel panel-default">
	<div class="panel-heading">
		<center>
          <h3>Outros</h3>
    	</center>
    </div>
    <div class="panel-body">
    	<div class="panel panel-default">
    		<div class="panel-body">
          <form action="painel.php" method="POST">
    			<div class="panel panel-default col-sm-3  col-sm-offset-1 ">
                    <div class="panel-body preto">
                         
                         	<input type="hidden" name="foutros" value="1">
                          
                            <center>
                              <h4><img src="imgs/portas.png" width="20px" height="20px"/> Portao garagem</h4>
                              <hr>
                              <button class="botaoLigar" type="submit" name="abrirp" value="1">Abrir</button> <br>
                              <button class="botaoDesligar" type="submit" name="desligarp" value="1">Fechar</button> 
                            </center>                           	
                          
                        </div>
                    </div>
    			<div class="panel panel-default col-sm-3  col-sm-offset-2 ">
                    <div class="panel-body preto">                         
                    
                            <center>
                              <h4><img src="imgs/lampada.png" width="20px" height="20px"/> Todas lampadas</h4>
                              <hr>
                              <button class="botaoLigar" type="submit" name="abrirl" value="1">Ligar</button> <br>
                              <button class="botaoDesligar" type="submit" name="desligarl" value="1">Desligar</button> 
                            </center>                           	
                        
                    </div>
               </div>
             </form>
    		</div>
    	</div>
    </div>
</div>
</row>