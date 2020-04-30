<h2>List of blogs</h2>
<?php 
	if (!empty($posts)) {
	$blog = new Controller;
	foreach ($posts as $post) : ?>
		<p align="center"><b><?=$post['name']?></b></p>
		<p>Текст статті: <?=$post['body']?></p>
		<p>Розділ: <a href="/?action=get_blogs_by_type&id=<?=$post['link_id']?>"> <?=$blog->get_one_category($post['link_id']);?></a></p>
		<hr class="line2">
	<?php endforeach; 
	}else{
		echo "Немає курва блогів!";
	} ?>