<h2>Add new Contact</h2>
<?php echo $this->getContent() ?>

<?php echo $this->tag->form('contacts/create') ?>

<p>
	<label for="name">Name</label>
	<?php echo $this->tag->textField("name") ?>
</p>

<p>
	<label for="phone">Phone</label>
	<?php echo $this->tag->textField("phone") ?>
</p>

<p>
	<label for="email">Email</label>
	<?php echo $this->tag->textField("email") ?>
</p>

<p>
	<?php echo $this->tag->submitButton("Create") ?>
</p>
</form>

<?php echo $this->tag->linkTo('contacts/index', ' Go Back');