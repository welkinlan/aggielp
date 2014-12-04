

<?php echo validation_errors(); ?>
	<h2>Error message: Please enter some keywords.</h2>
<?php echo form_open('search/query') ?>

	<input type="input" name="keyword" /><br />
	<input type="submit" name="submit" value="Search" />

</form>