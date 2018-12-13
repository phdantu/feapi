<?php $this->load->view('header'); 
            if(isset($altera)){
              echo "<h3>".$altera."</h3>";
            }elseif(isset($cadastra)){
              echo "<h3>".$cadastra."</h3>";
            }elseif(isset($deleta)){
              echo "<h3>".$deleta."</h3>";
            } ?>
    <br><br>
    <h1 class="col-md-10 mx-auto">Autores Registrados</h1>
    <br><br>
    <div class="col-md-10 mx-auto">
            <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Matrícula</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">CEP</th>
            <th scope="col">Logradouro</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($clientes as $row){ ?>
            <tr>
            <?php $temp = $row->idCliente ?>
            <th scope="row"><?php echo $row->idCliente ?></th>
            <td><?php echo $row->matricula ?></td>
            <td><?php echo $row->nome ?></td>
            <td><?php echo $row->telefone ?></td>
            <td><?php echo $row->cep ?></td>
            <td><?php echo $row->logradouro ?></td>
            <td><a type="button" href="<?php echo base_url('index.php/cliente/alterCliente/'.$temp) ?>" value="<?php echo $row->idCliente; ?>" class="btn btn-success">Alterar</a></td>
            <td><a type="button" href="<?php echo base_url('index.php/cliente/deletaCliente/'.$temp) ?>" value="<?php echo $row->idCliente; ?>" class="btn btn-danger">Deletar</a></td>
            </tr>
        <?php } ?>
        </tbody>
        </table>
    </div>
</body>
</html>