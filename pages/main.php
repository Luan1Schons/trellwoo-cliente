<?php
/**
 * Description: Integração entre WooCommerce e Trello. Crie cards automaticamente no seu Trello e melhore a organização dos pedidos da sua loja virtual.
 *
 * @package trellwoo
 */

?>

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
					<img src="<?php echo esc_attr( plugin_dir_url( __FILE__ ) . '/assets/img/img-plugin.png' ); ?>" class="center"/>
					<div class="div-success" style="display: none;">
						<p class="text-center">O seu plugin já esta funcionado, mas você pode modifica-lo quando desejar.</p>
						<a href="https://<?php echo esc_attr( SITE_TRELLWOO ); ?>/pagina-inicial-woo-trayllo/?domain=<?php echo esc_attr( get_site_url() ); ?>" target="_blank" class="btn btn-primary btn-lg btn-block">Configurar Plugin</a>
					</div>

					<div class="div-error" style="display: none;">
						<p class="text-center">Configure agora o plugin com o seu WooCommerce & Trello</p>
						<a href="https://<?php echo esc_attr( SITE_TRELLWOO ); ?>/pagina-inicial-woo-trayllo/?domain=<?php echo esc_attr( get_site_url() ); ?>" target="_blank" class="btn btn-primary btn-lg btn-block">Configurar Plugin</a>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<script>
	axios.post("https://<?php echo esc_attr( SITE_TRELLWOO ); ?>/wp-admin/admin-ajax.php?action=trayllo_check_domain", 
		{
			domain: "<?php echo esc_attr( get_site_url() ); ?>",
			nonce: "<?php echo esc_attr( $nonce ); ?>"
		}).then(res => {
				if(res.data.status == 'true'){
					jQuery('.status-success').show();
					jQuery('.div-success').show();
				}else{
					jQuery('.status-error').show();
					jQuery('.div-error').show();
				}
		}).catch(err => {
			console.log(err);
		}) 
</script>
