<?php $this->load->view('header'); ?>
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
            
              <?php echo validation_errors();
              foreach($tempAutor as $row){ ?>
              <?php echo form_open('cliente/salvarCliente'); ?>
            <div class="form-group col-md-4 mx-auto">
              <label for="exampleInputEmail1">ID</label>
              <input class="form-control" type="text" name="idCliente" value="<?php echo $row->idCliente; ?>" required />
              <label for="exampleInputEmail1">Matricula</label>
              <input class="form-control" type="text" name="matricula" value="<?php echo $row->matricula; ?>" required />
              <label for="exampleInputEmail1">Nome</label>
              <input class="form-control" type="text" name="nome" value="<?php echo $row->nome; ?>" required/> 
              <label for="exampleInputEmail1">Telefone</label>
              <input class="form-control" type="text" name="telefone" value="<?php echo $row->telefone; ?>" required/> 
              <label for="exampleInputEmail1">Cep</label>
              <input class="form-control" type="text" name="cep" value="<?php echo $row->cep; ?>" required/> 
              <label for="exampleInputEmail1">Logradouro</label>
              <input class="form-control" type="text" name="logradouro" value="<?php echo $row->logradouro; ?>" required/> 


              <br><br>
              <div class="col-md-12"><input class="btn btn-secondary" type="submit" value="Submit" /></div>
              <?php } ?>
              </form>
            </div>
        </div>
      </div>
    </div>

  </body>

</html>