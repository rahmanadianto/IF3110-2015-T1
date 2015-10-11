<div id="thread-answer-title">
	<h2><?php echo count($answers); ?> Answer</h2>
</div>
<hr>

<?php foreach ($answers as $answer) { ?>

	<div class="answer">
		<table>
			<tr>
				<td class="vote">
					<div class="upvote"></div>
					<div class="votes"><?php echo $answer->n_vote; ?></div>
					<div class="downvote"></div>
				</td>
				<td class="answer-content">
					<?php echo $answer->content; ?> 
				</td>
			</tr>
		</table>
		<div class="answered">
			<p>answered by <?php echo $answer->author; ?> at <?php echo $answer->date; ?>
		</div>	
	</div>
	<hr>

<?php } ?>

<div id="your-answer">
	<h2>Your Answer</h2>
</div>

<div class="form" id="answer-form">
	<form action="">
		<input type="text" name="user_name" id="user_name" placeholder="Name">
		<input type="email" name="user_email" id="user_email" placeholder="Email">
		<textarea name="thread_content" id="thread_content" rows="10" placeholder="Content"></textarea>
		<input type="submit" id="submit" value="Post">
	</form>
</div>