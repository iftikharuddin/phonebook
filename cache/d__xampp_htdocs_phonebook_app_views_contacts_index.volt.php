	<h1><?php echo $title; ?></h1>
	<?php echo $this->getContent() ?>
	<table>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
		</tr>

		<?php foreach ($contacts as $contact) { ?>

		<tr>
			<td><?= $contact->name ?></td>
			<td><?= $contact->email ?></td>
			<td><?= $contact->phone ?></td>
			<td><?= $this->tag->linkTo(['contacts/edit/' . $contact->id, 'Edit']) ?></td>
			<td><?= $this->tag->linkTo(['contacts/delete/' . $contact->id, 'Delete']) ?></td>
		</tr>
		<?php } ?>
	</table>
	<?= $this->tag->linkTo(['contacts/new/', 'Add New Contact']) ?>