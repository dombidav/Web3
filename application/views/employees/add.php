<?php echo form_open(); ?>
<?php echo form_label('Név:', 'employee_name'); ?>
<?php echo form_input('name', set_value('name', ''), ['required'=>'required', 'id'=>'employee_name']); ?>
<?php echo form_error('name'); ?>
<br/>
<?php echo form_label('TIN:', 'employee_tin'); ?>
<?php echo form_input('tin', set_value('tin', ''), ['required'=>'required', 'id'=>'employee_tin']); ?>
<?php echo form_error('tin'); ?>
<br/>
<?php echo form_label('SSN:', 'employee_ssn'); ?>
<?php echo form_input('ssn', set_value('ssn', ''), ['required'=>'required', 'id'=>'employee_ssn']); ?>
<?php echo form_error('ssn'); ?>
<br/>
<?php echo form_submit('submit', 'Mentés'); ?>
<?php echo form_close(); ?>
