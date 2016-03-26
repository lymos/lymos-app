<h2><?php echo $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('news/create'); ?>
	<label for="title">Titile:</label>
	<input name="title" type="text">
	</br>
	<label for="text">Text:</label>
	<textarea name="text"></textarea>
	</br>
	<input type="submit" name="submit" value="Create news item">
</form>
