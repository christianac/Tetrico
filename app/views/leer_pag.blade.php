<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Tetrico</title>
		<meta name="description" content="Fullscreen Pageflip Layout with BookBlock" />
		<meta name="keywords" content="fullscreen pageflip, booklet, layout, bookblock, jquery plugin, flipboard layout, sidebar menu" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 

		<link rel="stylesheet" type="text/css" href="<?=URL::to('css/jquery.jscrollpane.custom.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?=URL::to('css/bookblock.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?=URL::to('css/custom.css'); ?>" />
		<script src="<?=URL::to('js/modernizr.custom.79639.js'); ?>"></script>
	</head>
	<body>
		<div id="container" class="container">	
				
			<div class="scroller">
				<div class="menu-panel">
				<h3 >Menu de edicion</h3>
				<ul id="menu-toc" class="menu-toc-e">
						<li><a id="edit" href="<?=URL::to('editarPaginas/'.$lectura_id.'/'.$pagina_id); ?>"><u>E</u>ditar</a></li>
						<li><a id="del" href="<?=URL::to('deletePagina/'.$lectura_id.'/'.$pagina_id); ?>">Elimina<u>r</u></a></li>
				</ul>
				<div>
					<a id="vol" href="<?=URL::to('crearPaginas/'.$lectura_id);?>">&larr; <u>V</u>olver a creación</a>
				</div>
			</div>
			</div>

			<div class="bb-custom-wrapper">
				<div id="bb-bookblock" class="bb-bookblock">
					<div class="bb-item" id="item1">
				<div class="txt">Presione <b>'Q'</b> para abrir el menú</div>
						<div class="content">

							<div class="scroller">
								<p>{{$pagina->texto}}</p>
							</div>
						</div>
					</div>
				</div>
				
				<nav>
					<span id="bb-nav-prev"></span>
					<span id="bb-nav-next">&rarr;</span>
				</nav>
				<span id="tblcontents" class="menu-button">Table of Contents</span>

			</div>
				
		</div><!-- /container -->
		<script src="<?=URL::to('js/jquery.js'); ?>"></script>
		<script src="<?=URL::to('js/jquery.mousewheel.js'); ?>"></script>
		<script src="<?=URL::to('js/jquery.jscrollpane.min.js'); ?>"></script>
		<script src="<?=URL::to('js/jquerypp.custom.js'); ?>"></script>
		<script src="<?=URL::to('js/jquery.bookblock.js'); ?>"></script>
		<script src="<?=URL::to('js/page.js'); ?>"></script>
		<script>
			$(function() {

				Page.init();

			});
			$(document).keypress(function(e){
				if(e.which == 113){
				//alert('u pressed enter'+ e.which);
					if($( '#container' ).data('opened') == true){
						$( '#container' ).removeClass( 'slideRight' ).data( 'opened', false );
					}
					else{
						$( '#container' ).addClass( 'slideRight' ).data( 'opened', true );
					}
				}
				if($( '#container' ).data('opened') == true && e.which == 101){
					$('#edit')[0].click();
				}
				if($( '#container' ).data('opened') == true && e.which == 114){
					$('#del')[0].click();
				}
				if($( '#container' ).data('opened') == true && e.which == 118){
					$('#vol')[0].click();
				}
			});
		</script>
	</body>
</html>
