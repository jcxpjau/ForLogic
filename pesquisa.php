<?php include_once 'header.php'; ?>
    <div class="container">
        <div class="py-5 text-center">
            <h2>Cadastro de Pesquisa</h2>
            <?php if ( isset( $result[ 'error' ] ) && $result[ 'error' ] ) { ?>
                <span><?php echo $result[ 'error' ]; ?></span>
            <?php } else if ( isset( $result[ 'response' ] ) && $result[ 'response' ] ) {  ?>
                <span>As Informações foram inseridas com sucesso</span>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-md-12 order-md-1">
                <h4 class="mb-3">Pesquisa</h4>
                <form class="needs-validation" novalidate="" action="" method="POST">
                    <div class="row">
                        <div class="col-md-12 mb-12">
                            <label for="client">Selecione sua empresa</label>
                            <?php
                            $res = new Functions();
                            $clients = $res->process( array( 'action' => 'get_clients' ) );
                            if ( is_array( $clients[ 'response' ] ) ) {
                                ?>
                                <select class="custom-select d-block w-100" id="client" name="_id" required>
                                    <option value="">Escolha</option>
                                    <?php foreach( $clients[ 'response' ] as $client ) { ?>
                                        <option value="<?php echo $client->id_client; ?>"><?php echo $client->name_client; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Esse campo é obrigatório, selecione pelo menos um.
                                </div>
                            <?php } else { ?>
                                <div>
                                    Não existe cliente cadastrado!
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="row">
                        <div class="col-md-12 mb-12">
                            <label for="question1">Em uma escala de 0 a 10, qual a probabilidade de você recomendar nosso produto/serviço a um amigo/conhecido?</label>
                            <input type="text" class="form-control" id="question1" name="_score" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Esse campo é obrigatório.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-12">
                            <label for="question2">Qual é o motivo dessa nota?</label>
                            <input type="text" class="form-control" id="question2" name="_reason" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Esse campo é obrigatório.
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <input type="hidden" name="action" value="insert_question" />
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Concluir Pesquisa</button>
                </form>
            </div>
        </div>
    </div>
<?php include_once 'footer.php'; ?>