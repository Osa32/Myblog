<ul class="menu">
	<li>
		<h2>Header</h2>
		<p><img src="../style/bmw.png"></p>
		<a class="all_blogs" href="/">-Всі блоги-</a>
			<?php 
			$header = $blog->header();
			foreach ($header as $post) { 
			?>
		<a href="/?action=get_blogs_by_type&id=<?=$post['link_id']?>"><?=$post['category']?></a>
			<?php }
			if (isset($_COOKIE['login'])) { ?>
		<a class="all_blogs" href="/?action=admin">-Адмінка-</a>
			<?php } ?>
		<br>
	</li>
	<li>
		<div class="header">
			<br>
				<?php if (!isset($_COOKIE['login'])) { ?>
						<form action="/" method = "POST" >
							<input type="text" name="login" placeholder="enter login">
							<input type="password" name="password" placeholder="enter password">
							<input type="submit" value="Вхід на сайт!">
						<input type="hidden" name="action" value="in_out">
						</form>
				<?php }
					if (($_COOKIE['error']) == TRUE) { ?>
						<br>
						<div class="error1">
							Невірний курва пароль!
						</div>
				<?php }
					if (isset($_COOKIE['login'])) { ?>
						<form action="/" method = "POST" >
							<?="Привіт ".$_COOKIE['login']."! "?>
							<input type="submit" value="Вийти курва">
							<input type="hidden" name="action" value="in_out">
						</form>				
				<?php } ?>	
		</div>
	</li>
</ul>
<hr class="line1">