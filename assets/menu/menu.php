<?php require_once 'variables.php'; ?>

<div class="main-container">
	<div class="navbar-content">
		<div class="main-navigation navbar-collapse collapse">
			<div class="navigation-toggler">
				<i class="clip-chevron-left"></i>
				<i class="clip-chevron-right"></i>
			</div>
			<ul class="main-navigation-menu">
				<li id="selected2" <?php if($Class == 'Home'): ?> class="active" <?php endif; ?>>
						<a href="<?php echo $Path.'app/Home/' ?>"><i class="clip-home-3"></i>
							<span class="title"> Inicio </span>
							<?php if($Subclass == 'Home'): ?><span class="selected"></span><?php endif; ?>
						</a>
					</li>
				</li>
				<?php foreach($Menu as $list): ?>
				<?php if ($list['clase'] == 'Registro' && (count($Acceso_parametros) > 0)): ?>
				<li id="selected2" <?php if($Class == $list['clase']): ?> class="active" <?php endif; ?>>
					<a href="javascript:void(0)">
						<i class="<?php echo $list['icono'] ?>"></i>
						<span class="title"> <?php echo $list['nombre'] ?> </span>
						<?php if($Class == $list['clase']): ?><span class="selected"></span><?php endif; ?>
						<i class="icon-arrow"></i>
					</a>
					<ul class="sub-menu">
						<?php foreach($Subumenu as $item): ?>
						<?php if (in_array($item['nombre'], $Acceso_parametros)): ?>
						<li <?php if($Subclass == $item['subclase']): ?> class="active" <?php endif; ?>>
							<a href="<?php echo $Path.$item['ruta'] ?>">
							<span class="title"><?php echo $item['nombre'] ?></span>
							</a>
						</li>
						<?php endif ?>
						<?php endforeach; ?>
					</ul>
				</li>
				<?php elseif($list['clase'] == 'Proyecto' && (count($Acceso_registros) > 0)): ?>
				<li id="selected2" <?php if($Class == $list['clase']): ?> class="active" <?php endif; ?>>
					<a href="javascript:void(0)">
						<i class="<?php echo $list['icono'] ?>"></i>
						<span class="title"> <?php echo $list['nombre'] ?> </span>
						<?php if($Class == $list['clase']): ?><span class="selected"></span><?php endif; ?>
						<i class="icon-arrow"></i>
					</a>
					<ul class="sub-menu">
						<?php foreach($Subumenu as $item): ?>
						<?php if(in_array($item['nombre'], $Acceso_registros)): ?>
						<li <?php if($Subclass == $item['subclase']): ?> class="active" <?php endif; ?>>
							<a href="<?php echo $Path.$item['ruta'] ?>">
							<span class="title"><?php echo $item['nombre'] ?></span>
							</a>
						</li>
						<?php endif; ?>
						<?php endforeach; ?>
					</ul>
					<li id="selected2">
						<a href="">
							<i class="clip-file-2"></i>
							<span class="title">Manual</span>
						</a>
					</li>
					<li id="selected2">
						<a href="#" target="_blank">
							<i class="fa fa-wrench"></i>
							<span class="title">Soporte Tecnico</span>
						</a>
					</li>
					<li id="selected2">
						<a href="<?php echo $Path ?>assets/sql export/sql-export.php">
							<i class="clip-copy-2"></i>
							<span class="title">Backup</span>
						</a>
					</li>
					<li id="selected2">
						<a id="logout">
							<i class="clip-exit"></i>
							<span class="title">Salir</span>
						</a>
					</li>
				</li>
				<?php else: ?>
				<?php endif ?>
				<?php endforeach; ?>
				<!-- <li>
					<a href="">
						<i class="fa fa-sign-out"></i>
						<span class="title"> Salir </span>
					</a>
				</li> -->
			</ul>
		</div>
	</div>
</div>