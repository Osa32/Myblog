<h2>Edit posts</h2>
<form action="/" method = "POST">
	Name:
		<p><textarea name="name" cols="100"><?=$post['name']?></textarea></p>
	Description:
		<p><textarea name="body" cols="100" rows="10"><?=$post['body']?></textarea></p>
	Author:
		<p><textarea name="author" cols="100"><?=$post['author']?></textarea></p>
	Tags:
		<p><textarea name="tags" cols="100"><?=$post['tags']?></textarea></p>
		<input type="hidden" name="id" value="<?=$post['id']?>">
	<br>Choose the category:
		<p>
			<?php
			$blog = new Controller;
			$categories = $blog->header();
			foreach ($categories as $arrays) { ?>
			<input type="radio" name="link_id" value="<?=$arrays['link_id']?>" <?=(($arrays['link_id'] == $post['link_id'])?' checked':" ")?> > <?=$arrays['category']?> 
			<?php } ?>
		</p>
<br>
<p>
	<input type="submit" value="Зберегти зміни!">
	<input type="button" value="Назад курва!" onclick="history.back()">
</p>
<input type="hidden" name="action" value="edit">
</form>