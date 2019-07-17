<?php include_once 'header.php'; ?>
<div class="container">
    <div class="py-5 text-center">
        <h2>Cadastro de Clientes</h2>
        <?php if ( isset( $result[ 'error' ] ) && $result[ 'error' ] ) { ?>
            <span><?php echo $result[ 'error' ]; ?></span>
        <?php } else if ( isset( $result[ 'response' ] ) && $result[ 'response' ] ) {  ?>
            <span>As Informações foram inseridas com sucesso</span>
        <?php } ?>
    </div>
    <div class="row">
        <div class="col-md-12 order-md-1">
            <h4 class="mb-3">Informações do Cliente</h4>
            <form class="needs-validation" novalidate="" action="" method="POST">
                <div class="row">
                    <div class="col-md-12 mb-12">
                        <label for="name">Nome / Razão Social</label>
                        <input type="text" class="form-control" id="name" name="_name" placeholder="Insira o nome ou Razão Social" value="" required>
                        <div class="invalid-feedback">
                            Esse campo é obrigatório.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-12">
                        <label for="contact">Nome do Contato</label>
                        <input type="text" class="form-control" id="contact" name="_contact" placeholder="Insira o nome do contato da empresa" value="" required>
                        <div class="invalid-feedback">
                            Esse campo é obrigatório.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-12">
                        <label for="date">Desde quando é cliente</label>
                        <input type="text" class="form-control" id="date" name="_date" placeholder="12/12/2002" value="" required>
                        <div class="invalid-feedback">
                            Esse campo é obrigatório.
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <input type="hidden" name="action" value="insert_client" />
                <button class="btn btn-primary btn-lg btn-block" type="submit">Cadastrar Cliente</button>
            </form>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>