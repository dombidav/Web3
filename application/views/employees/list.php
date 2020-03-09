<?php echo anchor(base_url('employees/add'), 'Új alkalmazott rögzítése') ?>
<?php if($employees == null || empty($employees)): ?>
	<p>Nincs egyetlen alkalmazott sem</p>
<?php else: ?>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Név</th>
				<th>SSN</th>
				<th>TIN</th>
				<th>Műveletek</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($employees as &$employee): ?>
				<tr>
					<td><?= $employee->id ?></td>
					<td><?= $employee->name ?></td>
					<td><?= $employee->ssn ?></td>
					<td><?= $employee->tin ?></td>
					<td><?= anchor(base_url('employees/edit/'.$employee->id), 'Szerkeszt') ?></td>
					<td><?= anchor(base_url('employees/delete/'.$employee->id), 'Töröl') ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endif;
