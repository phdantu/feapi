<?php $this->load->view('header'); ?>
<br><br><br>

<?php echo validation_errors(); ?>

<?php echo form_open('pagina/header'); ?>
<div class="col-md-3 mx-auto card">
<h4 class="mx-auto">Login</h4>
  <div class="form-group">
    <label for="exampleInputEmail1">ID</label>
    <input type="text" class="form-control" id="login" name="login" placeholder="Digite seu ID">
    <?php if(isset($loginFail)){ echo '<small id="emailHelp" class="form-text text-muted"><b>'.$loginFail.'</b></small>'; } ?>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Senha</label>
    <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha">
  </div>
  <div class="mx-auto">
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  </div>
</form>


</body>
</html> 