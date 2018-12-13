<?php $this->load->view('header'); ?>
<script src="//code.jquery.com/jquery-2.2.2.min.js"></script>
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <?php 
            if(isset($altera)){
              echo "<h3>".$altera."</h3>";
            }elseif(isset($cadastra)){
              echo "<h3>".$cadastra."</h3>";
            }elseif(isset($deleta)){
              echo "<h3>".$deleta."</h3>";
            } ?>
          
          <h1 class="mt-5"><?php echo $titulo ?></h1>
            <div class="col-md-4">
                  <div class="form-group">
                      <label for="cep">CEP:</label>
                      <input type="text" name="cep" id="cep" class="form-control" autofocus required placeholder="Somente os números do CEP" />
                  </div>
                  <div class="form-group">
                    <button id="btn_consulta" class="btn btn-success">Consultar</button>
                  </div>
                  <div class="form-group">
                      <label for="rua">Rua:</label>
                      <input type="text" name="rua" id="rua" class="form-control" disabled required />
                  </div>
                  <div class="form-group">
                      <label for="bairro">Bairro:</label>
                      <input type="text" name="bairro" id="bairro" class="form-control" disabled  required />
                  </div>
                  <div class="form-group">
                      <label for="cidade">Cidade:</label>
                      <input type="text" name="cidade" id="cidade" class="form-control"  disabled required />
                  </div>
                  <div class="form-group">
                      <label for="estado">Estado:</label>
                      <input type="text" name="estado" id="estado" class="form-control"  disabled required size="2"/>
                  </div>
              </div>

          
              <?php echo validation_errors(); ?>

              <?php echo form_open('cliente/salvarClienteParaConfirmar'); ?>
            <div class="form-group col-md-4">
              <label for="exampleInputEmail1">ID</label>
              <input class="form-control" type="text" name="idCliente" value="<?php echo set_value('idCliente'); ?>" required />
              <label for="exampleInputEmail1">Matricula</label>
              <input class="form-control" type="text" name="matricula" value="<?php echo set_value('matricula'); ?>" required />
              <label for="exampleInputEmail1">Nome</label>
              <input class="form-control" type="text" name="nome" value="<?php echo set_value('nome'); ?>" required/> 
              <label for="exampleInputEmail1">Telefone</label>
              <input class="form-control" type="text" name="telefone" value="<?php echo set_value('telefone'); ?>" required/> 
              <label for="exampleInputEmail1">Cep</label>
              <input class="form-control" type="text" name="cep" value="<?php echo set_value('cep'); ?>" required/> 
              


              <br><br>
              <div class="col-md-12"><input class="btn btn-secondary" type="submit" value="Submit" /></div>

              </form>
            </div>
        </div>
      </div>
    </div>

  </body>
  <script>
            
            $(function(){
                $("#btn_consulta").click(function(){
                    var cep = $('#cep').val();
                    if (cep == '') {
                        alert('Informe o CEP antes de continuar');
                        $('#cep').focus();
                        return false;
                    }
                    $('#btn_consulta').html ('Aguarde...');
                    $.post('index.php/cliente/consulta',
                    {
                        cep : cep
                    }, 
                    function(dados){
                        $('#rua').val(dados.logradouro);
                        $('#bairro').val(dados.bairro);
                        $('#cidade').val(dados.localidade);
                        $('#estado').val(dados.uf);
                        $('#btn_consulta').html('Consultar');
                    }, 'json');
                });
            });
            
            
        </script>
</html>