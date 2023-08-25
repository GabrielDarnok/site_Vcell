@extends('layouts.main')

@section('title','store')

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
						@if (!isset($user->role) || $user->role == 'admin')
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
						<ul class="breadcrumb-tree">
							<li><a href="/">Início</a></li>
							<li><a href="/loja/store_product">Loja</a></li>
							<li class="active">Produtos encontrados ({{ isset($Product_find) ? $Product_find->count() : 0 }})</li>
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
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categorias</h3>
							<div class="checkbox-filter">

								<div class="input-checkbox">
									<input type="checkbox" id="category-1">
									<label for="category-1">
										<span></span>
										Tipo produto
										<small>(120)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-2">
									<label for="category-2">
										<span></span>
										Tipo produto
										<small>(740)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-3">
									<label for="category-3">
										<span></span>
										Tipo produto
										<small>(1450)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-4">
									<label for="category-4">
										<span></span>
										Tipo produto
										<small>(578)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-5">
									<label for="category-5">
										<span></span>
										Tipo produto
										<small>(120)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-6">
									<label for="category-6">
										<span></span>
										Tipo produto
										<small>(740)</small>
									</label>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Preço</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Marca</h3>
							<div class="checkbox-filter">
								<div class="input-checkbox">
									<input type="checkbox" id="brand-1">
									<label for="brand-1">
										<span></span>
										Qualidade produto
										<small>(578)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-2">
									<label for="brand-2">
										<span></span>
										Qualidade produto
										<small>(125)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-3">
									<label for="brand-3">
										<span></span>
										Qualidade produto
										<small>(755)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-4">
									<label for="brand-4">
										<span></span>
										Qualidade produto
										<small>(578)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-5">
									<label for="brand-5">
										<span></span>
										Qualidade produto
										<small>(125)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-6">
									<label for="brand-6">
										<span></span>
										Qualidade produto
										<small>(755)</small>
									</label>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->
						@if(isset($cheapestProduct))
							<h3 class="aside-title">Melhor preço</h3>
							@foreach ($cheapestProduct as $cheapestProducts)
								<!-- aside Widget -->
								<div class="aside">
									<div class="product-widget">
										<div class="product-img">
											<img src="/img/product/{{ $cheapestProducts->imagem_produto }}" alt="">
										</div>
										<div class="product-body">
											<p class="product-category">{{ $cheapestProducts->categoria }}</p>
											<h3 class="product-name"><a href="/produto/{{ $cheapestProducts->id }}">{{ $cheapestProducts->nome_produto }}</a></h3>
											<h4 class="product-price">R$ {{number_format($cheapestProducts->valor,2, ',', '.') }} <del class="product-old-price"> R$ {{number_format((($cheapestProducts->valor * 30)/100) + $cheapestProducts->valor,2, ',', '.')}}</del></h4>
										</div>
									</div>
								</div>
								<!-- /aside Widget -->
							@endforeach
						@endif
					</div>
					<!-- /ASIDE -->
					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									ordenar por:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Posição</option>
									</select>
								</label>

								<label>
									Mostrar:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->
						<div class="row">
							@if(isset($Product_find))
								@foreach ($Product_find as $Products_find)
										<!-- product -->
										<div class="col-md-4 col-xs-6">
											<div class="product">
												<div class="product-img">
													<img src="/img/product/{{ $Products_find->imagem_produto }}" alt="">
													<div class="product-label">
														<span class="sale">-30%</span>
														<span class="new">Novo</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category">{{ $Products_find->categoria }}</p>
													<h3 class="product-name"><a href="/produto/{{ $Products_find->id }}">{{ $Products_find->nome_produto }}</a></h3>
													<h4 class="product-price">R$ {{number_format($Products_find->valor,2, ',', '.') }}<del class="product-old-price"> R$ {{number_format((($Products_find->valor * 30)/100) + $Products_find->valor,2, ',', '.')}}</del></h4>
													<div class="product-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="product-btns">
														<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Adicionar nos favoritos</span></button>
														<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Adicionar para comparar</span></button>
														<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
													</div>
												</div>
												<div class="add-to-cart">
													<form action="/loja/produto/join/{{ $Products_find->id }}" method="POST">
														@csrf
														<input type="hidden" name="quantidade_produto" value="1">
														<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Adicionar ao carrinho</button>
													</form>											
												</div>
											</div>
										</div>
										<!-- /product -->
								@endforeach
							@elseif(isset($message))
								<p>{{ $message }}</p>
							@endif
						</div>
						<!-- /store products -->
						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Mostrar 20-100 produtos</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
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
		<script src="/js/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/slick.min.js"></script>
		<script src="/js/nouislider.min.js"></script>
		<script src="/js/jquery.zoom.min.js"></script>
		<script src="/js/main.js"></script>
@endsection
