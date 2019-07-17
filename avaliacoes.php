<?php include_once 'header.php'; ?>
<div class="container">
    <div class="py-5 text-center">
        <h2>Cadastro de Avaliações</h2>
        <?php if ( isset( $result[ 'error' ] ) && $result[ 'error' ] ) { ?>
            <span><?php echo $result[ 'error' ]; ?></span>
        <?php } else if ( isset( $result[ 'response' ] ) && $result[ 'response' ] ) {  ?>
            <span>As Informações foram inseridas com sucesso</span>
        <?php } ?>
    </div>
    <div class="row">
        <div class="col-md-12 order-md-1">
            <h4 class="mb-3">Informações da Avalicação</h4>
            <form class="needs-validation" novalidate="" action="" method="POST">
                <div class="row">
                    <div class="col-md-12 mb-12">
                        <label for="month">Mês da Avaliação</label>
                        <select class="custom-select d-block w-100" id="month" name="_month" required>
                            <option value="">Escolha...</option>
                            <option value="01">Janeiro</option>
                            <option value="02">Fevereiro</option>
                            <option value="03">Março</option>
                            <option value="04">Abril</option>
                            <option value="05">Maio</option>
                            <option value="06">Junho</option>
                            <option value="07">Julho</option>
                            <option value="08">Agosto</option>
                            <option value="09">Setembro</option>
                            <option value="10">Outubro</option>
                            <option value="11">Novembro</option>
                            <option value="12">Dezembro</option>
                        </select>
                        <div class="invalid-feedback">
                            Esse campo é obrigatório.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-12">
                        <label for="year">Ano da avaliação</label>
                        <input type="text" class="form-control" id="year" name="_year" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Esse campo é obrigatório.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-12">
                        <label for="clients">Clientes</label>
                        <?php
                        $res = new Functions();
                        $clients = $res->process( array( 'action' => 'get_clients' ) );
                        if ( is_array( $clients['response' ] ) ) {
                        ?>
                        <select class="custom-select d-block w-100" id="clients" name="_clients[]" required multiple>
                            <?php foreach( $clients['response' ] as $client ) { ?>
                            <option value="<?php echo $client->id_client; ?>"><?php echo $client->name_client; ?></option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback">
                            Esse campo é obrigatório selecionar pelo menos um.
                        </div>
                        <?php } else { ?>
                        <div>
                            Não existe cliente cadastrado!
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <hr class="mb-4">
                <input type="hidden" name="action" value="insert_survey" />
                <button class="btn btn-primary btn-lg btn-block" type="submit">Cadastrar Avalições</button>
            </form>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>