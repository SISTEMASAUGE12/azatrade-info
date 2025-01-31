<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <?php include("css.php"); ?>

        <title>Contáctanos | Azatrade</title>

        <link rel="icon" type="image/png" href="assets/img/favicon.png">
    </head>

    <body>

        <?php include("preloader.php"); ?>

        <?php include("menu.php"); ?>
		
		
		<!-- Start Page Title Area -->
        <div class="page-title-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>Cont&aacute;ctanos</h2>
                            <ul>
                                <li><a href="./">Inicio</a></li>
                                <li>Cont&aacute;ctanos</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Contact Box Area -->
		<section class="contact-box pt-100 pb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="single-contact-box">
							<i class="fa fa-map-marker"></i>
							<div class="content-title">
								<h3>Esrtamos en</h3>
								<p>Youtube <br> Facebook</p>
							</div>
						</div>
                    </div>
                    
					<div class="col-lg-4 col-md-6">
						<div class="single-contact-box">
							<i class="fa fa-envelope"></i>
							<div class="content-title">
								<h3>Email</h3>
								<a href="mailto:informes@azatrade.info">informes@azatrade.info</a>
								<!-- <a href="mailto:informes@azatrade.info">informes@azatrade.info</a> -->
							</div>
						</div>
                    </div>
                    
					<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
						<div class="single-contact-box">
							<i class="fa fa-phone"></i>
							<div class="content-title">
								<h3>Celular</h3>
								<a href="tel:+51999999999">+51 999 999 999</a>
								<!--<a href="tel:+882-569-756">+123(456)123</a>-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
        <!-- End Contact Box Area -->
        
        <!-- Start Contact Section -->
        <div class="contact-section ptb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="contact-image">
                            <img src="assets/img/contact.png" alt="image">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="contact-form">
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" required data-error="Ingresa tu nombre" placeholder="Tu Nombre">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" required data-error="Ingresa tu Email" placeholder="Email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="phone_number" id="phone_number" required data-error="Ingresa tu numero celular" class="form-control" placeholder="Numero Celular">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Ingresa un Asunto" placeholder="Asunto">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="6" required data-error="Escribe el mensaje" placeholder="Tu Mensaje"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="submit-btn">Enviar !</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
					</div>
                </div>
            </div>
        </div>
        <!-- End Contact Section -->

        <?php include("footer.php"); ?>

        <?php include("js.php"); ?>
    </body>
</html>