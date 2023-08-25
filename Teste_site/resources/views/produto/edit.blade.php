@extends('layouts.main')

@section('title','Editando' . '$Product->nome_produto')

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
						<!-- Billing Detail -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Cadastrar Produto</h3>
								<form action="/produto_lista/update/{{ $Product->id }}" method="POST" enctype="multipart/form-data">
									@csrf
                                    @method('PUT')
									<div class="form-group">
										<label for="image">Imagem do Produto</label>
										<input class="input" type="file" id="imagem_produto" name="imagem_produto">
                                        <img src="/img/product/{{ $Product->imagem_produto }}" alt="{{ $Product->nome_produto }}" class="img-preview">
                                    </div>
									<div class="form-group">
										<label for="title">Nome do Produto</label>
										<input class="input" type="text" id="nome_produto" name="nome_produto" placeholder="Nome do produto..." value="{{ $Product->nome_produto }}">
									</div>
									<div class="form-group">
										<label for="title">Categoria do Produto</label>
										<select type="text" class="form-control "id="categoria" name="categoria" placeholder="Categoria do produto..." value="{{ $Product->categoria }}">
											<option value="CAPA" {{ $Product->categoria == "CAPA" ? "selected = 'selected'": "" }}>Capa</option>
											<option value="FONE" {{ $Product->categoria == "FONE" ? "selected = 'selected'": "" }}>Fone de ouvido</option>
											<option value="PELICULA" {{ $Product->categoria == "PELICULA" ? "selected = 'selected'": "" }}>Pelicula</option>
											<option value="CELULAR" {{ $Product->categoria == "CELULAR" ? "selected = 'selected'": "" }}>Celular</option>
											<option value="COMBO" {{ $Product->categoria == "COMBO" ? "selected = 'selected'": "" }}>Combo</option>
										</select>
									</div>
									<div class="form-group">
										<label for="title">Descrição do Produto</label>
										<textarea class="input" type="text" id="descricao" name="descricao" placeholder="Descrição...">{{$Product->descricao}}</textarea>
									</div>
									<div class="form-group">
										<label for="title">Valor do Produto</label>
										<input class="input" type="text" id="valor" name="valor" pattern="^\d+(\.\d{1,2})?$" placeholder="Valor..." value="{{ $Product->valor }}">
									</div>
									<div class="form-group">
										<input type="submit" class="btn btn-primary" value="Atualizar Produto">
									</div>
								</form>
							</div>	
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