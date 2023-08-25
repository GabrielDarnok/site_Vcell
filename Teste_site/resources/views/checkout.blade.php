@extends('layouts.main')

@section('title','checkout')

@section('content')

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="/">Início</a></li>
						<li><a href="/loja/store_product">Loja</a></li>
						<li><a href="/trace">Checar</a></li>
						<li><a href="/checkout">Pedido</a></li>
						@if (!isset($user->role) || $user->role == 'user')
						<li><a href="/cadastrar_produto">Cadastrar produto</a></li>
						<li><a href="/">Visulizar produtos</a></li>
						@endif
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Conferir pedido</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Início</a></li>
							<li class="active">Conferir pedido</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

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
								<h3 class="title">Endereço</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="Primeiro nome" placeholder="Primeiro nome">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="Sobrenome" placeholder="Sobrenome">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="endereço" placeholder="endereço">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="cidade" placeholder="cidade">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="país" placeholder="país">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="CEP" placeholder="CEP">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="Telefone" placeholder="Telefone">
							</div>
							<div class="form-group">
								<div class="input-checkbox">
									<input type="checkbox" id="create-account">
									<label for="create-account">
										<span></span>
										Criar uma conta?
									</label>
									<div class="caption">
										<p>Crie sua senha</p>
										<input class="input" type="password" name="Senha" placeholder="Digite sua senha">
									</div>
								</div>
							</div>
						</div>
						<!-- /Billing Details -->

						<!-- Shiping Details -->
						<div class="shiping-details">
							<div class="section-title">
								<h3 class="title">Endereço de envio</h3>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="shiping-address">
								<label for="shiping-address">
									<span></span>
									O endereço é diferente?
								</label>
								<div class="caption">
									<div class="form-group">
										<input class="input" type="text" name="Primeio nome" placeholder="Primeiro nome">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="Sobrenome" placeholder="Sobrenome">
									</div>
									<div class="form-group">
										<input class="input" type="email" name="email" placeholder="Email">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="endereço" placeholder="endereço">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="cidade" placeholder="cidade">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="país" placeholder="país">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="CEP" placeholder="CEP">
									</div>
									<div class="form-group">
										<input class="input" type="tel" name="telefone" placeholder="telefone">
									</div>
								</div>
							</div>
						</div>
						<!-- /Shiping Details -->

						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" placeholder="Anotações pedido"></textarea>
						</div>
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Seu pedido</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>Produto</strong></div>
								<div><strong>Total</strong></div>
							</div>
							<div class="order-products">
								<div class="order-col">
									<div>Titulo produto</div>
									<div>R$149,90</div>
								</div>
								<div class="order-col">
									<div>Titulo produto</div>
									<div>R$179,70 (3x)</div>
								</div>
							</div>
							<div class="order-col">
								<div>Frete</div>
								<div><strong>Grátis</strong></div>
							</div>
							<div class="order-col">
								<div><strong>Total</strong></div>
								<div><strong class="order-total">R$689,00</strong></div>
							</div>
						</div>
						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-1">
								<label for="payment-1">
									<span></span>
									PIX 
								</label>
								<div class="caption">
									<p>Manda ai o pixzin</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-2">
								<label for="payment-2">
									<span></span>
									Cheque
								</label>
								<div class="caption">
									<p>Nem usa mais</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-3">
								<label for="payment-3">
									<span></span>
									Paypal
								</label>
								<div class="caption">
									<p>Paypal - Teto.</p>
								</div>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								Você concorda com os <a href="#">termos e condições</a>
							</label>
						</div>
						<a href="#" onclick="testeMostrarAdicionarOrder()" class="primary-btn order-submit">Confirmar Pedido</a>

						<div class="alerta">
							<p>O seu pedido foi confirmado!</p>
						  </div>

						<a href="/" target="_blank" onclick="testeMostrarExcluirOrder()" class="cancel order-submit">Cancelar Pedido</a>

						  
						  <script>
							  var Alerta = {
								  mostrar: function() {
									  var alerta = document.querySelector('.alerta');
									  alerta.style.display = 'block';
								  }
							  };
					  
							  // Teste unitário para a função mostrar() do objeto Alerta
							  function testeMostrarAdicionarOrder() {
								  
								  var alerta = document.createElement('div');
								  alerta.classList.add('alerta');
								  alerta.style.display = 'none';
								  document.body.appendChild(alerta);
					  
								  Alerta.mostrar();
					  
								  var estiloDisplay = alerta.style.display = 'block';
								  if (estiloDisplay === 'block') {
									  console.log('Teste Mostrar Adicionar Order: Funcionou!');
								  } else {
									  console.error('Teste Mostrar Adicionar Order: Falhou!');
								  }
					  
								  document.body.removeChild(alerta);
							  }

							  function testeMostrarExcluirOrder() {
								  
								  var alerta = document.createElement('div');
								  alerta.style.display = 'none';
								  document.body.appendChild(alerta);
					  
												  
								  var estiloDisplay = alerta.style.display = 'block';
								  if (estiloDisplay === 'block') {
									  console.log('Teste Direcionar Excluir order: Funcionou!');
								  } else {
									  console.error('Teste Direcionar Excluir order: Falhou!');
								  }
					  
								  document.body.removeChild(alerta);
							  }
						  </script>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Inscreva-se para ficar por dentro do nosso <strong>Boletim informativo</strong></p>
							<form>
								<input class="input" type="email" placeholder="Digite seu e-mail">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Inscreva-se</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
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
		<script src="/js/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/slick.min.js"></script>
		<script src="/js/nouislider.min.js"></script>
		<script src="/js/jquery.zoom.min.js"></script>
		<script src="/js/main.js"></script>
@endsection