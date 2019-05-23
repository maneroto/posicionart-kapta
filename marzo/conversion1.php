<!DOCTYPE html>
<html>
<head>
	<title>Kapta</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/validacion.js"></script>
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<style>
		.alert{
			border: 5px solid yellow;
		}
	</style>
</head>
<body>
	<header>
		<img src="img/kapta-logo-blanco-marzo.png" id="headerLogo">
		<div id="headerTitle">
			<h1 id="h1Title">
				<span id="h1Span">Descarga gratis la</span><br>
				Guía de mejores prácticas para convertir a tus leads en alumnos.
			</h1>
			<hr>
			<p class="boldText medium">
				Tips, consejos y más sobre la tecnología en el ámbito de la educación, el marketing para escuelas y herramientas digitales para el aula.
			</p>
		</div>
	</header>
	<main>
		<section>
			<article class="floated" id="articleForm">
				<h2 class="sectionTitle">
					¡Descárgalo aquí!
				</h2>
				<h3 id="formFillIndication">
					Solo tienes que llenar el siguiente formulario:
				</h3>
				<form id="form" action="mail/envio_correo.php" method="POST" onsubmit="return validar()">
					<div class="formField">
						<label for="nombre">Nombre completo</label>
						<input type="text" name="nombre" id="nombre">
					</div>
					<div class="formField">
						<label for="email">Email</label>
						<input type="email" name="email" id="email">
					</div>
					<div class="formField">
						<label for="institucion">Institución Educativa</label>
						<input type="text" name="institucion" id="institucion">
					</div>
					<div class="formField">
						<label for="sitioweb">Sitio web de la institución</label>
						<input type="url" name="sitioweb" id="sitioweb">
					</div>
					<p class="boldText medium">
						Niveles educativos que ofertan:
					</p>
					<div id="checkboxForm">
						<div class="checkboxField">
							Maternal / Kinder
							<input type="checkbox" name="niveles[]" value="Pre-escolar"><!---->
  							<span class="checkmark"></span>
						</div>
						<div class="checkboxField">
							Primaria
							<input type="checkbox" name="niveles[]" value="Primaria"><!---->
  							<span class="checkmark"></span>
						</div>
						<div class="checkboxField">
							Secundaria
							<input type="checkbox" name="niveles[]" value="Secundaria"><!---->
							<span class="checkmark"></span>
						</div>
						<div class="checkboxField">
							Preparatoria
							<input type="checkbox" name="niveles[]" value="Preparatoria"><!---->
							<span class="checkmark"></span>
						</div>
						<div class="checkboxField">
							Licenciatura
							<input type="checkbox" name="niveles[]" value="Licenciatura"><!---->
							<span class="checkmark"></span>
						</div>
						<div class="checkboxField">
							Posgrado
							<input type="checkbox" name="niveles[]" value="Posgrado"><!---->
							<span class="checkmark"></span>
						</div>
						<div class="checkboxField">
							Escuela especial
							<input type="checkbox" name="niveles[]" value="Especializado"><!---->
							<span class="checkmark"></span>
						</div>
					</div>
					<div class="dv_recaptcha">
						<button class="contentBtn g-recaptcha btn_send" name="btn_enviar" id="btn_enviar" type="submit" data-sitekey="6LcsJZoUAAAAADiEbduRAYrgrhoWCdLSD6rPVcja" data-callback="validar">
							quiero recibir mi guía
						</button>
					</div>
				</form>
			</article>
			<article class="floated" id="articleInfo">
				<h2 class="sectionTitle">
					Incrementa tu matrícula llevando a tu institución educativa a otro nivel.
				</h2>
				<p class="normalText">
					<span class="boldText">Conforme pasa el tiempo, el marketing se vuelve más necesario para el ámbito de la educación, </span> siendo necesario aplicar diferentes estrategias para mantener promover los logros y valores de cada institución y satisfacer a los alumnos y sus familias.
				</p>

				<p class="boldText">
					Por ello te presentamos las mejores prácticas para que tu departamento de reclutamiento y marketing convierta a todos tus leads en alumnos.
				</p>
				<p class="boldText">
					En nuestra <span class="redText">GUÍA GRATUITA</span> conocerás:
					<ul class="normalText">
						<li>
							Las habilidades necesarias para convertir leads en estudiantes.
						</li>
						<li>
							Factores críticos para el éxito.
						</li>
						<li>
							El CRM y la gestión de leads.
						</li>
					</ul>
				</p>
			</article>
		</section>
		<section class="finalInfo">
			<article>
				<h2 class="sectionTitle barBehind">
					¡Déjanos ayudarte a evolucionar tu escuela!
				</h2>
				<p class="boldText">
					Constantemente compartimos recursos gratuitos en nuestras redes sociales
				</p>
				<div id="redesSociales">
					<a href="https://goo.gl/yN5Ah5" target="_blank">
						<i class="fab fa-facebook"></i>
					</a>
					<a href="https://goo.gl/Ehh3KC" target="_blank">
						<i class="fab fa-linkedin"></a></i>
					</a>
					<a href="https://www.youtube.com/channel/UC-ECSXMtawLW71BvkwmQUaA" target="_blank">
						<i class="fab fa-youtube"></i>
					</a>
				</div>
				<p class="normalText small">
					Al realizar la descarga estás autorizando recibir contenidos sobre Kapta, tecnología en la educación, marketing para escuelas y herramientas digitales para el aula de tu interés. Respetamos tu privacidad y no hacemos spam.
				</p>
			</article>
		</section>
	</main>
	<footer>
		<p id="copyright">
			KAPTA CRM &copy; 2019, Derechos Reservados
		</p>
	</footer>
	<script type="text/javascript" src="js/init.js"></script>
</body>
</html>