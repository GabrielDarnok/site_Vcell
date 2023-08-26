@extends('layouts.main')

@section('title','cadastrar')

@section('content')

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
								<form action="/index" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
										<label for="image">Imagem do Produto</label>
										<input class="input" type="file" id="imagem_produto" name="imagem_produto" required>
									</div>
									<div class="form-group">
										<label for="title">Nome do Produto</label>
										<input class="input" type="text" id="nome_produto" name="nome_produto" placeholder="Nome do produto..." required>
									</div>
									<div class="form-group">
										<label for="title">Categoria do Produto</label>
										<select type="text" class="form-control "id="categoria" name="categoria" placeholder="Categoria do produto..." required>
											<option value="CAPA">Capa</option>
											<option value="FONE">Fone de ouvido</option>
											<option value="PELICULA">Pelicula</option>
											<option value="CELULAR">Celular</option>
											<option value="COMBO">Combo</option>
										</select>
									</div>
									<div class="form-group">
										<label for="title">Descrição do Produto</label>
										<textarea class="input" type="text" id="descricao" name="descricao" placeholder="Descrição..." required></textarea>
									</div>
									<div class="form-group">
										<label for="title">Valor do Produto</label>
										<input class="input" type="text" id="valor" name="valor" pattern="^\d+(\.\d{1,2})?$" placeholder="Valor..." required>
									</div>
									<div class="form-group">
										<input type="submit" class="btn btn-primary" value="Cadastrar Produto">
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