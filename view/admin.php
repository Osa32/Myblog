<h2>Adminka</h2>
<?php
    if (!empty($posts)) {
    $blog = new Controller?>
<table>
		<tr>
			<td>Name</td>
			<td>Description</td>
			<td>Author</td>
			<td>Category</td>
			<td>Created time</td>
			<td>Tags</td>
		</tr>
<?php
	foreach ($posts as $post ) { ?>
    	<tr>
    		<td width="60"><?=$post['name']?></td>
    		<td width="250"><?=$post['body']?></td>
    		<td><?=$post['author']?></td>
    		<td width="80"><?=$blog->get_one_category($post['link_id']);?></td>
    		<td width="200"><?=$post['created_time']?></td>
    		<td width="60"><?=$post['tags']?></td>
    		<td width="50"><a href="/?action=edit&id=<?=$post['id']?>">Edit</a></td>
    		<td width="50"><a href="/?action=delete&id=<?=$post['id']?>">Delete </a></td>
  		</tr>
<?php } ?>
</table>
<?php } else {
    echo "Курва нічо нема, сасай!"; } ?>
<p><a href="/?action=insert">Add post</a></p>