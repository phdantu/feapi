<?php $this->load->view('header'); ?>
        <!-- Page Content -->
        <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5"><?php echo $titulo ?></h1>
            
              <?php echo validation_errors(); ?>

              <?php echo form_open('pagina/alterarAutor');
              foreach($tempAutor as $row){ ?>
            <div class="form-group col-md-4 mx-auto">
              <label for="exampleInputEmail1">ID</label>
              <input class="form-control" type="text" name="idAutor" value="<?php echo $row->idAutor; ?>" required />
              <label for="exampleInputEmail1">Nome</label>
              <input class="form-control" type="text" name="nome" value="<?php echo $row->nome; ?>" required />
              <label for="exampleInputEmail1">País</label>
              <input class="form-control" type="text" name="pais" value="<?php echo $row->pais; ?>" required/>
              <br><br>
              <div class="col-md-12"><input class="btn btn-primary" type="submit" value="Submit" /></div>
              <?php } ?>
              </form>
            </div>
        </div>
      </div>
 </body>

</html>