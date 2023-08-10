@extends('layouts.main')

@section('title','index')

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
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop01.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Celulares</h3>
								<a href="/busca/busca_product?search=celular" class="cta-btn">Adquira já <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop03.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Fones de ouvido</h3>
								<a href="/busca/busca_product?search=fone" class="cta-btn">Adquira já <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop02.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Cabos de Carregadores</h3>
								<a href="/busca/busca_product?search=pelicula" class="cta-btn">Adquira já <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Novos produtos</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Tipo</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->
					<!-- Products tab & slick -->
					<div class="col-md-12">
						<!--row-->
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										@foreach ($Product_date as $Products_date)
											<!-- product -->
											<div class="product">
												<div class="product-img">
													<img src="/img/product/{{ $Products_date->imagem_produto }}" alt="">
													<div class="product-label">
														<span class="sale">-12%</span>
														<span class="new">NOVO</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category">{{ $Products_date->categoria }}</p>
													<h3 class="product-name"><a href="/produto/{{ $Products_date->id }}"> {{ $Products_date->nome_produto }} </a></h3>
													<h4 class="product-price">R$ {{number_format($Products_date->valor,2) }} <del class="product-old-price"> R$ {{number_format((($Products_date->valor * 12)/100) + $Products_date->valor,2)}}</del></h4>
													<div class="product-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="product-btns">
														<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">adicionar nos favoritos</span></button>
														<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Adicionar para comparar</span></button>
														<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">ver rapidamente</span></button>
													</div>
												</div>
												<div class="add-to-cart">
													<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Adicionar no carrinho</button>
												</div>
											</div>
											<!-- /product -->
										@endforeach
									</div>
								</div>
								<!-- tab -->
							</div>
						</div>
						<!--row-->
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Dias</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Horas</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Minutos</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Segundos</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">PROMOÇÃO ESSA SEMANA</h2>
							<p>PRODUTOS COM ATÉ 30% DE DESCONTO</p>
							<a class="primary-btn cta-btn" href="#">COMPRE JÁ</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Top Vendas</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab2">Tipo</a></li>
									<li><a data-toggle="tab" href="#tab2">Tipo</a></li>
									<li><a data-toggle="tab" href="#tab2">Tipo</a></li>
									<li><a data-toggle="tab" href="#tab2">Lançamentos</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<!--Row-->
						<div class="row">
							<!--Products-tab-->
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										@foreach ($Product as $Products)
											<!-- product -->
											<div class="product">
												<div class="product-img">
													<img src="/img/product/{{ $Products->imagem_produto }}" alt="">
													<div class="product-label">
														<span class="sale">-30%</span>
														<span class="new">NOVO</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category">{{$Products->categoria}}</p>
													<h3 class="product-name"><a href="/produto/{{ $Products->id }}">{{ $Products->nome_produto }}</a></h3>
													<h4 class="product-price">R$ {{number_format($Products->valor,2) }} <del class="product-old-price"> R$ {{number_format((($Products->valor * 30)/100) + $Products->valor,2)}}</del></h4>
													<div class="product-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="product-btns">
														<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">adicionar no favoritos</span></button>
														<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">adicionar para comparar</span></button>
														<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">ver rapidamente</span></button>
													</div>
												</div>
												<div class="add-to-cart">
													<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> adicionar no carrinho</button>
												</div>
											</div>
											<!-- /product -->
										@endforeach
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
							<!--Products-tab-->
						</div>
						<!--Row-->
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Melhores compras</h4>
							<div class="section-nav">
								<div id="slick-nav-3" class="products-slick-nav"></div>
							</div>
						</div>
						<div class="products-widget-slick" data-nav="#slick-nav-3">
							@foreach ($Product as $Products)
								@if ($Products->categoria == "CAPA")
									<div>
									<!-- product widget -->
										<div class="product-widget">
											<div class="product-img">
												<img src="/img/product/{{ $Products->imagem_produto }}" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">{{ $Products->categoria }}</p>
												<h3 class="product-name"><a href="/produto/{{ $Products->id }}">{{ $Products->nome_produto }}</a></h3>
												<h4 class="product-price">R$ {{number_format($Products->valor,2) }}<del class="product-old-price"> R$ {{number_format((($Products->valor * 10)/100) + $Products->valor,2)}}</del></h4>
											</div>
										</div>
										<!-- /product widget -->
									</div>
								@endif
							@endforeach
						</div>
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Melhores compras</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
						</div>
					
						<div class="products-widget-slick" data-nav="#slick-nav-4">
							@foreach ($Product as $Products)
								@if ($Products->categoria == "CELULAR")
									<div>
										<!-- product widget -->
										<div class="product-widget">
											<div class="product-img">
												<img src="/img/product/{{ $Products->imagem_produto }}" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">{{ $Products->categoria }}</p>
												<h3 class="product-name"><a href="/produto/{{ $Products->id }}">{{ $Products->nome_produto }}</a></h3>
												<h4 class="product-price">R$ {{number_format($Products->valor,2) }}<del class="product-old-price"> R$ {{number_format((($Products->valor * 10)/100) + $Products->valor,2)}}</del></h4>
											</div>
										</div>
										<!-- /product widget -->
									</div>
								@endif
							@endforeach
						</div>
					</div>
					<div class="clearfix visible-sm visible-xs"></div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Melhores compras</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-5">
							@foreach ($Product as $Products)
								@if ($Products->categoria == "FONE")
									<div>
									<!-- product widget -->
										<div class="product-widget">
											<div class="product-img">
												<img src="/img/product/{{ $Products->imagem_produto }}" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">{{ $Products->categoria }}</p>
												<h3 class="product-name"><a href="/produto/{{ $Products->id }}">{{ $Products->nome_produto }}</a></h3>
												<h4 class="product-price">R$ {{number_format($Products->valor,2) }}<del class="product-old-price"> R$ {{number_format((($Products->valor * 10)/100) + $Products->valor,2)}}</del></h4>
											</div>
										</div>
										<!-- /product widget -->
									</div>
								@endif
							@endforeach
						</div>
					</div>
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
							<p>Inscreva-se no nosso <strong>Boletim informativo</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
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
