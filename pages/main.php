<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<style>
    .card {
        max-width: 100%;
        margin: 0px;
        padding: 0px;
    }
    body {
        background-color: #f0f0f1;
    }
    .btn {
        width: 100%;
    }
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: auto;
    }
    .status {
        background-color: #f5f5f5;
        padding: 10px;
        border-radius: 4px;
        color: #adadad;
        height: auto;
        display: flex;
    }
    .dot-success {
        height: 25px;
        width: 25px;
        background-color: #bce86f;
        border-radius: 50%;
        display: inline-block;
    }
    .dot-error {
        height: 25px;
        width: 25px;
        background-color: #e86f6f;
        border-radius: 50%;
        display: inline-block;
    }
    .status-text {
        margin: 0 auto;
        padding: 10px;
    }
    .status-text > h6{
        text-align: center;
    }
    .btn-primary {
        background-color: #0079BF;
    }
</style>

<div class="container my-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Status do seu plugin.</h4>
                </div>

                <div class="card-body">
                <div class="status">
                    <div class="status-text">
                        <div class="row">
                            <div class="status-success" style="display: none;">
                                <div class="row">
                                    <div class="col" style="flex: 0 0 0%;">
                                        <span class="dot-success"></span>
                                    </div>
                                    <div class="col">
                                        <h5>PLUGIN ATIVO</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="status-error" style="display: none;">
                                <div class="row">
                                    <div class="col" style="flex: 0 0 0%;">
                                        <span class="dot-error"></span>
                                    </div>
                                    <div class="col">
                                        <h5>PLUGIN INATIVO</h5>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
               
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Bem-vindo(a) ao Plugin Trayllo WooCommerce.</h4>
                </div>

                <div class="card-body">

                    
                    <img src="https://static.integromat.com/img/templates/439.png" class="center"/>
                    
                    <div class="div-success" style="display: none;">
                        <p class="text-center">O seu plugin já esta funcionado, mas você pode modifica-lo quando desejar.</p>
                        <a href="https://tests.codecontrol.com.br/pagina-inicial-woo-trayllo/?domain=<?= get_site_url();?>" target="_blank" class="btn btn-primary btn-lg btn-block">Configurar Plugin</a>
                    </div>

                    <div class="div-error" style="display: none;">
                        <p class="text-center">Configure agora o plugin com o seu WooCommerce & Trello</p>
                        <a href="https://tests.codecontrol.com.br/pagina-inicial-woo-trayllo/?domain=<?= get_site_url();?>" target="_blank" class="btn btn-primary btn-lg btn-block">Configurar Plugin</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    axios.post("https://tests.codecontrol.com.br/wp-admin/admin-ajax.php?action=trayllo_check_domain", 
        {
            domain: "<?= get_site_url();?>",
            nonce: "<?= $nonce; ?>"
        }).then(res => {
            $.each(res.data, function(index, itemData){
                if(itemData == 'true'){
                    $('.status-success').show();
                    $('.div-success').show();
                }else{
                    $('.status-error').show();
                    $('.div-error').show();
                }
            })
        }).catch(err => {
            console.log(err.response);
        }) 
</script>