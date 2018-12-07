<?php $this->load->view('header'); ?>
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5"><?php echo $titulo ?></h1>
            
              <?php echo validation_errors(); ?>

              <?php echo form_open('pagina/form'); ?>
            <div class="form-group col-md-4 mx-auto">
              <label for="exampleInputEmail1">Username</label>
              <input class="form-control" type="text" name="username" value="<?php echo set_value('username'); ?>" />

              <label for="exampleInputEmail1">Password</label>
              <input class="form-control" type="text" name="password" value="<?php echo set_value('password'); ?>" />

              <label for="exampleInputEmail1">Password Confirm</label>
              <input class="form-control" type="text" name="passconf" value="<?php echo set_value('passconf'); ?>" />

              <label for="exampleInputEmail1">Email Address</label>
              <input class="form-control" type="text" name="email" value="<?php echo set_value('email'); ?>" />
              <br><br>
              <div class="col-md-12"><input class="btn btn-primary" type="submit" value="Submit" /></div>

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
