<div class="wrapper">
	<a id="logo" href="./">
		<img src="<?php echo $baseurl; ?>/images/global/logo.png" alt="logo" />
	</a>
	<div id="main-menu">
		<a href="javascript:;" class="btn-m-menu">
			<span></span>
		</a>
		<div class="menu">
			<div class="menu-header">
				<img src="<?php echo $baseurl; ?>/images/global/logo-white.png" alt="">
			</div>
			<ul>
				<li><a href="<?php echo $baseurl; ?>/" <?php echo ( $page_name != '' && $page_name == 'home' ) ? 'class="active"' : '';?> title=""><i class="fa-solid fa-house">&nbsp;</i> Beranda</a></li>
				<!-- <li>
					<a href="#" <?php echo ( $page_name != '' && $page_name == 'menu2' ) ? 'class="active"' : '';?> title="">Content</a>
					<ul class="submenu">
						<li><a href="banner.php" title="">Banner</a></li>
					</ul>					
				</li> -->
				<li><a href="<?php echo $baseurl; ?>/jadwalsholat" <?php echo ( $page_name != '' && $page_name == 'jadwalsholat' ) ? 'class="active"' : '';?> title=""><i class="fa-regular fa-clock">&nbsp;</i> Jadwal Sholat</a></li>				
				<li><a href="<?php echo $baseurl; ?>/jadwalkajian" <?php echo ( $page_name != '' && $page_name == 'jadwalkajian' ) ? 'class="active"' : '';?> title=""><i class="fa-regular fa-calendar">&nbsp;</i> Jadwal Kajian</a></li>				
				<li><a href="<?php echo $baseurl; ?>/sitemap" <?php echo ( $page_name != '' && $page_name == 'sitemap' ) ? 'class="active"' : '';?> title=""><i class="fa-solid fa-link">&nbsp;</i> Daftar Tautan</a></li>				
				<?php 
					if( isset($_SESSION["mah_loggedin"]) ) {
						echo '<li><a href="'. $baseurl .'/settings.php" title=""><i class="fa-solid fa-gear">&nbsp;</i> Settings</a></li>';
						echo '<li><a href="'. $baseurl .'/logout.php" title=""><i class="fa-solid fa-right-from-bracket">&nbsp;</i> Logout</a></li>';
					} else {
						echo '<li><a href="'. $baseurl .'/login.php" ' . (( $page_name != '' && $page_name == 'login') ? 'class="active"' : '') . ' title=""><i class="fa-solid fa-right-to-bracket">&nbsp;</i> Login</a></li>';
					}
				?>
				
			</ul>
		</div>
	</div>
</div>