<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>@yield('title')</title>
		<link rel="shorcut icon" href="img/icon_page.svg">
		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="/css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="/css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="/css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="/css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="/css/style.css"/>
    </head>
    <body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +55 (19) 99760-2293</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> contact@Vcell.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Rua Antônio Cavalheiro, 192, Parque Vicente Leporace, São Paulo</a></li>
					</ul>
					<ul class="header-links pull-right">
						@auth
						<li>
							<a href="/user/{{ auth()->user()->id }}"><i class="fa fa-user-o"></i>Meu perfil</a>
						</li>
						<li>
							<form action="/logout" method="POST">
								@csrf
								<a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
							</form>
						</li>
						@endauth
						@guest
						<li>
							<a href="/login"><i class="fa fa-user-o"></i> Entrar </a>
						</li>
						@endguest
					</ul>
				</div>
			</div>
			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="/" class="logo">
									<img src="/img/logo.svg" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="{{ route('busca.busca_product') }}">
									<select class="input-select">
										<option value="0">Todas categorias</option>
										<option value="CAPA">Capas</option>
										<option value="2">Fones</option>
										<option value="3">Celulares</option>
										<option value="4">Peliculas</option>
										<option value="5">Carregadores</option>
										<option value="6">Diversos</option>
									</select>
									<input class="input" name="search" placeholder="Pesquise aqui">
									<button class="search-btn">Pesquisa</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Favoritos</span>
										<!--<div class="qty">3</div>-->
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Carrinho</span>
										<!--<div class="qty">2</div>-->
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											@if(isset($ProductsAsCarrinho))
											@if ($ProductsAsCarrinho->isEmpty())
											<p>Carrinho vazio</p>
											@else
											@foreach ($ProductsAsCarrinho as $ProductsAsCarrinhos)
											<div class="product-widget">
												<div class="product-img">
													<img src="/img/product/{{ $ProductsAsCarrinhos->imagem_produto }}" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="/product">{{ $ProductsAsCarrinhos->nome_produto }}</a></h3>
													<h4 class="product-price"><span class="qty"></span>R$ {{number_format($ProductsAsCarrinhos->valor,2, ',', '.')}}</h4>
													<h4>Quantidade: {{ $ProductsAsCarrinhos->pivot->quantidade_produto }}</h4>
												</div>
												<form class="deleteForm" id="deleteForm" action="/produto/leave/{{ $ProductsAsCarrinhos->id }}" method="POST">
													@csrf
													@method("DELETE")
													<button class="delete"><i class="fa fa-close"></i></button>
												</form>
											</div>
											@endforeach
												<script>
													document.addEventListener("DOMContentLoaded", function() {
														const deleteForms = document.querySelectorAll(".deleteForm");

														deleteForms.forEach(deleteForm => {
															const deleteButton = deleteForm.querySelector(".delete");
															const productId = deleteButton.getAttribute("data-product-id");

															deleteButton.addEventListener("click", function(event) {
																event.preventDefault();

																const confirmation = confirm("Tem certeza que deseja remover o produto do carrinho?");
																if (confirmation) {
																	deleteForm.submit();
																}
															});
														});
													});
												</script>
											@endif
											@else
											<p>Carrinho vazio</p>
											<a href="/login">Adicionar produtos no carrinho</a>
											<div class="cart-summary">
    											<small>0 Item(s) selecionados</small>
    											<h5>SUBTOTAL: R$ 00,00</h5>
											</div>
											@endif
										</div>
										@if (isset($ProductsAsCarrinho))
										<div class="cart-summary">
    										<small>{{ $ProductsAsCarrinho->count() }} Item(s) selecionados</small>
    										<h5>SUBTOTAL: R${{ number_format($subtotal, 2, ',', '.') }}</h5>
										</div>
										@endif
										<div class="cart-btns">
											<a href="/checkout">Ver carrinho</a>
											<a href="/checkout">Conferir  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart MUDEI MANO DENOVO -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Início</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
		<main>
					@if(session('msg'))
						<p class="msg">{{ session('msg') }}</p>
					@endif
					@yield ('content')
		</main>
        <footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Sobre nós</h3>
								<p>A Vcell é uma empresa especializada em suplementos nutricionais para atletas e entusiastas do fitness, comprometida em oferecer produtos de alta qualidade e desempenho para melhorar a performance e os resultados nos treinos e competições.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>Rua Antônio Cavalheiro, 192, Parque Vicente Leporace, São Paulo</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+55 (19) 99760-2293</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>contact@Vcell.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categorias</h3>
								<ul class="footer-links">
									<li><a href="#">Capas</a></li>
									<li><a href="#">Fones</a></li>
									<li><a href="#">Celulares</a></li>
									<li><a href="#">Peliculas</a></li>
									<li><a href="#">Carregadores</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Informação</h3>
								<ul class="footer-links">
									<li><a href="#">Sobre nós</a></li>
									<li><a href="#">Contato</a></li>
									<li><a href="#">Politicas de privacidade</a></li>
									<li><a href="#">Retornos e pedidos</a></li>
									<li><a href="#">Termos e condições</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Serviço</h3>
								<ul class="footer-links">
									<li><a href="#">Minha Conta</a></li>
									<li><a href="/product">Carrinho</a></li>
									<li><a href="/store">Compras</a></li>
									<li><a href="/checkout">Rastreamento</a></li>
									<li><a href="#">Ajuda</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos direitos reservados por Marco Nascimento e Roberto Santana
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
    </body>
</html>