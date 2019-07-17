<?php include_once 'header.php'; ?>
    <div class="container">
        <div class="py-5 text-center">
            <h2>Resultado de Mensal das avaliações</h2>
        </div>
        <div class="row">
            <div class="col-md-12 order-md-1">
                <h4 class="mb-3">Resultado Mensal</h4>
                <form class="needs-validation" novalidate="" action="" method="POST">
                    <div class="row">
                        <div class="col-md-12 mb-12">
                            <label for="month">Escolha um mês de referência</label>
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
                            <label for="year">Insira um ano de referência</label>
                            <input type="text" class="form-control" id="year" name="_year" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Esse campo é obrigatório.
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <input type="hidden" name="action" value="get_survey" />
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Consultar</button>
                </form>
            </div>
        </div>
        <hr class="mb-4">
        <?php if ( isset( $result[ 'error' ] ) && $result[ 'error' ] ) { ?>
            <span><?php echo $result[ 'error' ]; ?></span>
        <?php } else if ( isset( $result[ 'response' ] ) && $result[ 'response' ] ) { ?>
            <p>Número total de Participantes: <?php echo $result[ 'response'][ 'total' ];?></p>
            <p>Número total de Promotores: <?php echo $result[ 'response'][ 'promotores' ];?></p>
            <p>Número total de Neutros: <?php echo $result[ 'response'][ 'neutros' ];?></p>
            <p>Número total de Detratores: <?php echo $result[ 'response'][ 'detratores' ];?></p>
            <p>Meta NPS: <?php echo $result[ 'response'][ 'nps' ];?></p>

        <?php } ?>
    </div>
<?php include_once 'footer.php'; ?>