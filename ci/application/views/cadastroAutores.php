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
            
              <?php echo validation_errors(); ?>

              <?php echo form_open('pagina/salvarAutor'); ?>
            <div class="form-group col-md-4 mx-auto">
              <label for="exampleInputEmail1">ID</label>
              <input class="form-control" type="text" name="idAutor" value="<?php echo set_value('idAutor'); ?>" required />
              <label for="exampleInputEmail1">Nome</label>
              <input class="form-control" type="text" name="nome" value="<?php echo set_value('nome'); ?>" required />
              <label for="exampleInputEmail1">País</label>
              <input class="form-control" type="text" name="pais" value="<?php echo set_value('pais'); ?>" required/> 


              <br><br>
              <div class="col-md-12"><input class="btn btn-secondary" type="submit" value="Submit" /></div>

              </form>
            </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <!-- <script src="site/vendor/jquery/jquery.min.js')"></script>
    <script src="site/vendor/bootstrap/js/bootstrap.bundle.min.js')"></script>
 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
-->
  </body>

</html>