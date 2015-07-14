<!DOCTYPE html>
<html lang="en" class="no-js">
	<head><?php $datos = get_object_vars($relato[0]);?>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Tetrico - {{$datos["nombre"]}}</title>
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
				<h3>{{$datos["nombre"]}}</h3>
				<ul id="menu-toc" class="menu-toc">
					<?php $pag=1; ?>
					@foreach($paginas as $pagina)
						<li><a href=<?php echo "#item".$pag ?>>Pagina {{$pag}}</a></li>
					<?php $pag=$pag+1; ?>
					@endforeach
				</ul>
				<div>
					<a href="<?=URL::to('/');?>">&larr; Volver a tétrico</a>
				</div>
			</div>
			</div>
			<div class="bb-custom-wrapper"><?php $var = 1; ?>
				<div id="bb-bookblock" class="bb-bookblock">
					@foreach($paginas as $pagina)
					<div class="bb-item" id={{"item".$var}}>
						<div class="content">
							<div class="scroller">
								<h2>{{$var}}</h2>
								<p>{{$pagina->texto}}</p>
							</div>
						</div>
					</div>
					{{
						$var = $var + 1;
					}}
					@endforeach
				</div>
				
				<nav>
					<span id="bb-nav-prev">&larr;</span>
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
		</script>
	</body>
</html>
