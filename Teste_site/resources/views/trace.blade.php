@extends('layouts.main')

@section('title','trace')

@section('content')

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li><a href="/">Início</a></li>
						<li><a href="/loja/store_product">Loja</a></li>
						<li class="active"><a href="/trace">Checar</a></li>
						<li><a href="/checkout">Pedido</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->


		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">

                <!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Rastrear seu pedido</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="CPF" placeholder="Digite seu CPF">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="CodPedido" placeholder="Digite o código do seu pedido">
							</div>
		
								</div>
							</div>
						</div>
						<!-- /Billing Details -->
                        <a href="#" onclick="testeMostrarStatus()" class="primary-btn order-submit">Rastrear</a>
    
                        <div class="alerta">
                          <p>O status do seu pedido é: Em andamento</p>
                        </div>
                        
                        <script>
							var Alerta = {
								mostrar: function() {
									var alerta = document.querySelector('.alerta');
									alerta.style.display = 'block';
								}
							};
					
							// Teste unitário para a função mostrar() do objeto Alerta
							function testeMostrarStatus() {
								
								var alerta = document.createElement('div');
								alerta.classList.add('alerta');
								alerta.style.display = 'none';
								document.body.appendChild(alerta);
					
								Alerta.mostrar();
					
								var estiloDisplay = alerta.style.display = 'block';
								if (estiloDisplay === 'block') {
									console.log('Teste Mostrar Status: Funcionou!');
								} else {
									console.error('Teste Mostrar Status: Falhou!');
								}
					
								document.body.removeChild(alerta);
							}

	</script>

                </div>
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">

			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Inscreva-se no nosso <strong>Boletim informativo</strong></p>
							<form>
								<input class="input" type="email" placeholder="Digite seu melhor e-mail!">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Increva-se!</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="https://www.instagram.com/vcell2022/"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->
		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
@endsection
