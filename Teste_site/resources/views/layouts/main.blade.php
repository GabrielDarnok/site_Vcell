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