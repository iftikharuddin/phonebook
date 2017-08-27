	<h1><?php echo $title; ?></h1>
	<?php echo $this->getContent() ?>
	<table>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
		</tr>

		{% for contact in contacts %}

		<tr>
			<td>{{ contact.name }}</td>
			<td>{{ contact.email }}</td>
			<td>{{ contact.phone }}</td>
			<td>{{ link_to('contacts/edit/' ~ contact.id, 'Edit') }}</td>
			<td>{{ link_to('contacts/delete/' ~ contact.id, 'Delete') }}</td>
		</tr>
		{% endfor %}
	</table>
	{{ link_to('contacts/new/', 'Add New Contact') }}