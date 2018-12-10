<?php $this->load->view('header'); ?>
        <!-- Page Content -->
        <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5"><?php echo $titulo ?></h1>
            
              <?php echo validation_errors(); ?>

              <?php echo form_open('pagina/alterar');
              foreach($tempLivro as $row){ ?>
            <div class="form-group col-md-4 mx-auto">
              <label for="exampleInputEmail1">ID</label>
              <input class="form-control" type="text" name="idLivro" value="<?php echo $row->idLivro; ?>" required />
              <label for="exampleInputEmail1">ISBN</label>
              <input class="form-control" type="text" name="isbn" value="<?php echo $row->isbn; ?>" required />
              <label for="exampleInputEmail1">Nome</label>
              <input class="form-control" type="text" name="nome" value="<?php echo $row->nome; ?>" required/>
              <label for="exampleInputEmail1">Editora</label>
              <input class="form-control" type="text" name="editora" value="<?php echo $row->editora; ?>" required />
              <label for="exampleInputEmail1">Ano</label>
              <input class="form-control" type="text" name="ano" value="<?php echo $row->ano; ?>" required />
              <label for="exampleInputEmail1">IDAutor</label>
              <input class="form-control" type="text" name="idAutor" value="<?php echo $row->idAutor; ?>" required />
              
              <br><br>
              <div class="col-md-12"><input class="btn btn-primary" type="submit" value="Submit" /></div>
              <?php } ?>
              </form>
            </div>
        </div>
      </div>
 </body>

</html>