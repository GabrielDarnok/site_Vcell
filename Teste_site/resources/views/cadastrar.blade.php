@extends('layouts.main')

@section('title','checkout')

@section('content')
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
						<li><a href="#"><i class="fa fa-dollar"></i> Real</a></li>
						<li><a href="#"><i class="fa fa-user-o"></i> Minha conta</a></li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="/index" class="logo">
									<img src="/img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="0">Todas categorias</option>
										<option value="1">Capas</option>
										<option value="2">Fones</option>
										<option value="3">Celulares</option>
										<option value="4">Peliculas</option>
										<option value="5">Carregadores</option>
										<option value="6">Diversos</option>
									</select>
									<input class="input" placeholder="Pesquise aqui">
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
										<div class="qty">3</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Carrinho</span>
										<div class="qty">2</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											<div class="product-widget">
												<div class="product-img">
													<img src="/img/product1.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="/product">Titulo produto</a></h3>
													<h4 class="product-price"><span class="qty">1x</span>R$149,90</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>

											<div class="product-widget">
												<div class="product-img">
													<img src="/img/product2.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">Titulo produto</a></h3>
													<h4 class="product-price"><span class="qty">3x</span>R$179,70</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
										</div>
										<div class="cart-summary">
											<small> 2 Item(s) selecionados</small>
											<h5>SUBTOTAL: R$329,60</h5>
										</div>
										<div class="cart-btns">
											<a href="/checkout">Ver carrinho</a>
											<a href="/checkout">Conferir  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

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

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li><a href="/index">Início</a></li>
						<li><a href="/product">Produtos</a></li>
						<li><a href="/store">Loja</a></li>
						<li><a href="/trace">Checar</a></li>
						<li class="active"><a href="/checkout">Pedido</a></li>
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
						<h3 class="breadcrumb-header">Cadastrar produto</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Início</a></li>
							<li class="active">Cadastrar produto</li>
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
								<h3 class="title">Cadastrar Produto</h3>
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