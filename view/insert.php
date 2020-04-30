<h2>Add posts</h2>
<form action="/" method = "POST">
	Name:
		<p><textarea name="name" cols="100"></textarea></p>
	Description:
		<p><textarea name="body" cols="100" rows="10"></textarea></p>
	Tags:
	<p><textarea name="tags" cols="100"></textarea></p>
	<p>
		<?php
		$blog = new Controller;
		$categories = $blog->header();
			foreach ($categories as $arrays) { ?>
			<input type="radio" name="link_id" value="<?=$arrays['link_id']?>" > <?=$arrays['category']?> 
		<?php } ?>
	</p>
<br>
<p>
	<input type="submit" value="Додати пост!">
	<input type="button" value="Назад курва!" onclick="history.back()">
</p>
<input type="hidden" name="action" value="insert">
</form>