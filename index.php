<?php
//***********************************************************************************
//	Personalizzare la cartella delle immagini definita in IMG_PATH
//	Personalizzare le voci del proprio menu contestuale ed aggiungere i propri link
//***********************************************************************************
	session_start();
	define ("IMG_PATH", $_SERVER['DOCUMENT_ROOT']."/images/");
	$exts=array("jpg","jpeg");
	$images=wwGetFilesExt(IMG_PATH,$exts);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Custom Context Menu (multi-images)</title>
		<link rel="stylesheet" href="css/cmenu.css">
	</head>
	<body>
		<header>
			<div>
				<h1>Prova di Menu Contestuale Personalizzato (multi-images)</h1>
			</div>
		</header>
		<section style="width:100%; height:280px;">
			<div id="areamenu" class="areamenu">
				<?php
				$TotImg=count($images);
				for($x = 0; $x < $TotImg; $x++) {
					$img="images/".$images[$x];
					echo '<div class="CellImg" id="img-'.$x.'" onmousedown="ContextM('.$x.', '.$TotImg.')">';
						echo '<img src="'.$img.'" alt="" style="max-height:280px; height:280px;">';
					echo '</div>';
				}
				?>
			</div>
			<div>
				<?php
				for($x = 0; $x < $TotImg; $x++) {
					$img="images/".$images[$x];
					?>
					<div class="cmenu" id="cmenu<?php echo $x;?>">
						<ul class="menu-options">
							<li class="menu-option"><a href="#">Add New Image</a></li>
							<li class="menu-option"><a href="#">Replace Image <b><i><?php echo $img;?></i></b></a></li>
							<li class="menu-option"><a href="#">Delete Image</a></li>
						</ul>
					</div>
					<?php
				}
				?>
			</div>
		</section>
		<script src="js/cmenu.js" type="text/javascript"></script>
	</body>
	<?php 
	function wwGetFilesExt($dir, $exts) {
	//-----------------------------------------------------------------------------
	// Ritorna un array con i files di $dir con estension inclusa nell'array $exts
	//-----------------------------------------------------------------------------
		$filesarray=array();
		$path = pathinfo($dir);
		if (is_dir($dir)) {	// Verifica che $dir sia una directory
			if ($dh = opendir($dir)) {	// apre la directory
				$n = 0;
				while (($file = readdir($dh)) !== false) {
					$extension = pathinfo($file, PATHINFO_EXTENSION);
					if (in_array(strtolower($extension), $exts)) {
						$filesarray[$n] = $file;
						$n++;
					}	
				}
				closedir($dh);
			}
		}
		return $filesarray;
	}	
	?>
</html>
