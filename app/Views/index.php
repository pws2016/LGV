<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $settings['meta_title']?></title>
    <meta name="robots" CONTENT="noindex, nofollow">
		<meta name="googlebot" content="noindex, nofollow">
        <meta content="Creazioneimpresa" name="author" />
    <link rel="icon" type="image/x-icon" href="<?php echo base_url()?>/template/assets/images/icons/favicon.ico">
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/template/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/template/assets/css/style.css">
	<link href="<?php echo base_url()?>/template/login-register-master/assets/css/login-register.css" rel="stylesheet" />
	<style>
		.history-section .lead p{line-height: 2em;letter-spacing: 1px;color: #000000;font-weight: 300;font-size: 2rem;line-height: 2;font-weight: 400;
}
		/*.history-section .lead {max-width: 790px;margin-left: auto;margin-right: auto;}*/
		.history-section .lead a {color: #FF7700;text-decoration: underline;}
		.history-section .lead h1 {font-family: serif;font-size:4rem !important;}
		.banner a{font-size:20px;margin-top: 1.8rem;}
	</style>
</head>
<body>
    <div class="page-wrapper">
	<?php  echo view('includes/header');?>


        <main class="main">
            <div class="banner banner-cat" style="background-color:#FAFAFA;">
                <div class="banner-content container">
                    <h2 class="banner-subtitle" style="color:#000;">Benvenuto nel nostro tool per costituire la tua startup innovativa!</h2>
                    <h1 class="banner-title" style="color:#000;">
                        CREA LA TUA STARTUP
                    </h1>
                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#loginModal" onclick="$('#div_skip_login').show(0)">INIZIA SUBITO</a>
                </div>
            </div>

			<div class="history-section">
                <div class="container lead">
					<br><br><h2>Perché un tool per costituire una startup innovativa?</h2>
					<p>In tanti ci chiedono come fare a costituire una startup, anche senza l’aiuto del notaio: come scrivere l’oggetto sociale, quali clausole inserire nello statuto, come individuare correttamente i requisiti per essere startup innovativa.&nbsp;</p>
					<h2>Il modello ministeriale per la costituzione online</h2>
					<p>Con questo software vogliamo accompagnare chi desidera creare una startup innovativa nel percorso di costituzione. Abbiamo utilizzato il <strong>modello di atto costitutivo e di statuto conforme a quello ministeriale previsto per la costituzione on line, utilizzabile per la costituzione con la camera di commercio</strong>.</p>
					<p>Alla fine, potrai quindi scaricare uno <strong>statuto in formato pdf</strong> redatto sulla scorta di questo modello.</p>
					<h2>Il percorso di Creazioneimpresa</h2>
					<p>E ora arriviamo alla parte che ci piace di più.</p>
					<p>Ogni domanda, ogni scelta, ogni opzione è assistita da almeno un supporto informativo che può essere una infobreve, una videopillola o un approfondimento.</p>
					<p>Il nostro desiderio è infatti quello di consentire a che vuole costituire una startup di avere tutte le conoscenze necessarie per decidere il funzionamento della propria società.</p>
					<p>Lo statuto, infatti, non è una formalità burocratica che predispone il notaio o il consulente. Lo statuto contiene le regole del gioco che determineranno i rapporti fra i soci attuali e futuri. Riteniamo quindi sia importante conoscerne le logiche e le modalità di funzionamento.</p>
					<h2 class="elementor-heading-title elementor-size-default expand">E per quanto riguarda i dati?</h2>
					<p>Puoi iniziare a esplorare il tool senza nessuna necessità di registrarti. Sappiamo che i dati personali sono una cosa preziosa e vogliamo che tu decida di fornirceli solo quando desideri. In questa modalità i dati verranno immagazzinati dai nostri server solo per il tempo necessario a gestire la compilazione dei vari step.</p>
					<p>Se decidi di registrarti i tuoi dati saranno salvati e potrai interrompere la compilazione e ritornarci più volte per completarla o modificare le scelte effettuate.</p>
					<h2 class="elementor-heading-title elementor-size-default expand">E poi?</h2>
					<p>Una volta completata la compilazione dello statuto, ti chiederemo di integrare alcuni dati mancanti e di correggere eventuali errori e potrai scaricare il documento in formato pdf.</p>
					<p>Lo statuto è redatto secondo lo standard ministeriale previsto per la costituzione online con la camera di commercio.</p>
					<p>Questo però non ti darà garanzia di conformità e legalità, né ti consentirà di essere automaticamente startup innovativa. Per esempio, l’oggetto sociale deve rispettare alcune condizioni, così come pure alcune scelte relative al trasferimento delle partecipazioni devono essere attentamente valutate!</p>
					<p>Se desideri puoi affidarti a un consulente di Creazioneimpresa con cui confrontarti sui tuoi dubbi, definire le scelte più opportune in base alle tue esigenze e finalizzare la costituzione della tua startup.</p>
					<p>Per saperne di più contattaci.</p>
					<p>Intanto ti auguriamo buon lavoro!</p>
				</div>
			</div>
			
                
            <div class="mb-6"></div>
        </main>

<?php  echo view('includes/footer');?>
    </div><!-- End .page-wrapper -->

    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<!--div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-cancel"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>
                        <a href="category.html">Categories</a>
                        <ul>
                            <li><a href="category.html">Full Width Banner</a></li>
                            <li><a href="category-banner-boxed-slider.html">Boxed Slider Banner</a></li>
                            <li><a href="category-banner-boxed-image.html">Boxed Image Banner</a></li>
                            <li><a href="category.html">Left Sidebar</a></li>
                            <li><a href="category-sidebar-right.html">Right Sidebar</a></li>
                            <li><a href="category-flex-grid.html">Product Flex Grid</a></li>
                            <li><a href="category-horizontal-filter1.html">Horizontal Filter 1</a></li>
                            <li><a href="category-horizontal-filter2.html">Horizontal Filter 2</a></li>
                            <li><a href="#">Product List Item Types</a></li>
                            <li><a href="category-infinite-scroll.html">Ajax Infinite Scroll<span class="tip tip-new">New</span></a></li>
                            <li><a href="category-3col.html">3 Columns Products</a></li>
                            <li><a href="category.html">4 Columns Products</a></li>
                            <li><a href="category-5col.html">5 Columns Products</a></li>
                            <li><a href="category-6col.html">6 Columns Products</a></li>
                            <li><a href="category-7col.html">7 Columns Products</a></li>
                            <li><a href="category-8col.html">8 Columns Products</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="product.html">Products</a>
                        <ul>
                            <li>
                                <a href="#">Variations</a>
                                <ul>
                                    <li><a href="product.html">Horizontal Thumbnails</a></li>
                                    <li><a href="product-full-width.html">Vertical Thumbnails<span class="tip tip-hot">Hot!</span></a></li>
                                    <li><a href="product.html">Inner Zoom</a></li>
                                    <li><a href="product-addcart-sticky.html">Addtocart Sticky</a></li>
                                    <li><a href="product-sidebar-left.html">Accordion Tabs</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Variations</a>
                                <ul>
                                    <li><a href="product-sticky-tab.html">Sticky Tabs</a></li>
                                    <li><a href="product-simple.html">Simple Product</a></li>
                                    <li><a href="product-sidebar-left.html">With Left Sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Product Layout Types</a>
                                <ul>
                                    <li><a href="product.html">Default Layout</a></li>
                                    <li><a href="product-extended-layout.html">Extended Layout</a></li>
                                    <li><a href="product-full-width.html">Full Width Layout</a></li>
                                    <li><a href="product-grid-layout.html">Grid Images Layout</a></li>
                                    <li><a href="product-sticky-both.html">Sticky Both Side Info<span class="tip tip-hot">Hot!</span></a></li>
                                    <li><a href="product-sticky-info.html">Sticky Right Side Info</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Pages<span class="tip tip-hot">Hot!</span></a>
                        <ul>
                            <li><a href="cart.html">Shopping Cart</a></li>
                            <li>
                                <a href="#">Checkout</a>
                                <ul>
                                    <li><a href="checkout-shipping.html">Checkout Shipping</a></li>
                                    <li><a href="checkout-shipping-2.html">Checkout Shipping 2</a></li>
                                    <li><a href="checkout-review.html">Checkout Review</a></li>
                                </ul>
                            </li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="#" class="login-link">Login</a></li>
                            <li><a href="forgot-password.html">Forgot Password</a></li>
                        </ul>
                    </li>
                    <li><a href="blog.html">Blog</a>
                        <ul>
                            <li><a href="single.html">Blog Post</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="#">Special Offer!<span class="tip tip-hot">Hot!</span></a></li>
                    <li><a href="#">Buy Porto!</a></li>
                </ul>
            </nav>

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                <a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
            </div>
        </div>
    </div-->

    <div class="modal fade" id="stampadesktop" tabindex="-1" role="dialog" aria-labelledby="stampadesktopLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="#">
                    <div class="modal-header">
                        <h3 class="modal-title" id="stampadesktopLabel">Prova contenuto da finire</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
<p>Modello uniforme atto costitutivo/statuto per start-up innovative in forma di s.r.l. (art. 3, comma 10-
bis, del decreto-legge 3/2015, convertito, con modificazioni, dalla legge 33/2015)</p>
<p>atto costitutivo</p>
<p><b>REPUBBLICA ITALIANA</b></p>
<p>1. L’anno [ ]<br>
2. il giorno [ ]<br>
3. del mese di [ ]<br>
4. in [ ]</p>
il sottoscritto/i sottoscritti:<br>
dichiara/dichiarano e convengono<br>
quanto segue:<br>
E’ costituita una società a responsabilità limitata<br>
13. denominata [ ]<br>
14. La società ha per oggetto lo sviluppo, la produzione e la commercializzazione di prodotti o
servizi innovativi ad alto valore tecnologico, come meglio specificato nello statuto di seguito
riportato.<br>
15. La società ha sede in [ ]<br>
☐ 15-bis La società ha sede secondaria in [ ] [indicare solo il comune]
16. La durata della società è indicata nello statuto
17. Il capitale sociale è pari ad euro [ ]
☐ 17-bis [selezionare se ricorre l’ipotesi] E’ contestualmente versato un soprapprezzo pari ad euro
[ ] interamente liberato
18. Detto capitale è sottoscritto nel modo seguente

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Chiudi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="<?php echo base_url()?>/template/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>/template/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url()?>/template/assets/js/plugins.min.js"></script>
<script src="<?php echo base_url()?>/template/login-register-master/assets/js/login-register.js"></script>
    <!-- Main JS File -->
    <script src="<?php echo base_url()?>/template/assets/js/main.min.js"></script>
	  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/it_IT/sdk.js"></script>
	<script>
		function loginAjax(){
	/*   Simulate error message from the server   */
		var login_email=$("#login_email").val();
		var login_password=$("#login_password").val();
		
		$.ajax({
			  url:"<?php echo base_url()?>/ajax/login",
			  method:"POST",
			  data:{login_email:login_email,login_password:login_password}
			  
		}).done(function(data){
			
			var obj=JSON.parse(data);
			if(obj.error==true){
				shakeModal(obj.validation);
			}
			else{
				document.location.href="<?php echo base_url()?>/creazione";
				
			}
		});
 
	}
	
	
	function signUpAjax(){
	/*   Simulate error message from the server   */
		var signup_email=$("#signup_email").val();
		var signup_password=$("#signup_password").val();
		var signup_password_confirmation=$("#signup_password_confirmation").val();
		var terms=$("#signup_terms").is(':checked');
		var newsletter=$("#signup_newsletter").is(':checked');
	
		$.ajax({
			  url:"<?php echo base_url()?>/ajax/signup",
			  method:"POST",
			  data:{signup_email:signup_email,signup_password:signup_password,signup_password_confirmation:signup_password_confirmation,terms:terms,newsletter:newsletter}
			  
		}).done(function(data){
			console.log(data);
			
			var obj=JSON.parse(data);
			if(obj.error==true){
				shakeModal(obj.validation);
			}
			else{
				document.location.href="<?php echo base_url()?>/myAccount";
				
			}
		});
 
	}
	
function shakeModal(error){
    $('#loginModal .modal-dialog').addClass('shake');
             $('.error').addClass('alert alert-danger').html(error);
             $('input[type="password"]').val('');
             setTimeout( function(){ 
                $('#loginModal .modal-dialog').removeClass('shake'); 
    }, 1000 ); 
}
</script>
</body>
</html>