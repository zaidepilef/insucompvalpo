<table class="table display groceryCrudTable" id="<?php echo uniqid(); ?>">
	<thead>
		<tr>
			<?php foreach($columns as $column){?>
				<th><?php echo $column->display_as; ?></th>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
			<th class='actions'><?php echo $this->l('list_actions'); ?></th>
			<?php }?>
		</tr>
	</thead>
	<tbody>
		<?php foreach($list as $num_row => $row){ ?>
		<tr id='row-<?php echo $num_row?>'>
			<?php foreach($columns as $column){?>
				<td><?php echo $row->{$column->field_name}?></td>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
			<td class='actions'>
				<?php
				if(!empty($row->action_urls)){
					foreach($row->action_urls as $action_unique_id => $action_url){
						$action = $actions[$action_unique_id];
					?>
						<a href="<?php echo $action_url; ?>" class="btn btn-success btn-xs edit_button" role="button">
							<span class="ui-button-icon-primary ui-icon <?php echo $action->css_class; ?> <?php echo $action_unique_id;?>"></span>
							<span class="ui-button-text">&nbsp;<?php echo $action->label?></span>
						</a>
				<?php 
					}
				}
				?>
				
				<?php if(!$unset_read){?>
					<a href="<?php echo $row->read_url?>" class="btn btn-success btn-xs edit_button" role="button">
						<?php echo $this->l('list_view'); ?>
					</a>
				<?php }?>

				<?php if(!$unset_edit){?>
					<a href="<?php echo $row->edit_url?>" class="btn btn-info btn-xs edit_button" role="button">
						<?php echo $this->l('list_edit'); ?>
					</a>
				<?php }?>
				
				<?php if(!$unset_delete){?>
					<a class="btn btn-danger btn-xs delete_button" onclick = "javascript: return delete_row('<?php echo $row->delete_url?>', '<?php echo $num_row?>')" href="javascript:void(0)" role="button">
						<?php echo $this->l('list_delete'); ?>
					</a>
				<?php }?>
				
			</td>
			<?php }?>
		</tr>
		<?php }?>
	</tbody>
	<tfoot>
		<tr>
			<?php foreach($columns as $column){?>
				<th>
					<input type="text" name="<?php echo $column->field_name; ?>" placeholder="<?php echo $this->l('list_search').' '.$column->display_as; ?>" class="input-sm search_<?php echo $column->field_name; ?>" />
				</th>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
				<th>
					<button class="btn btn-info btn-xs floatR refresh-data" role="button" data-url="<?php echo $ajax_list_url; ?>">
						<span class="ui-button-icon-primary ui-icon ui-icon-refresh"></span>
						<span class="ui-button-text">&nbsp;</span>
					</button>
					<a href="javascript:void(0)" role="button" class="btn btn-info btn-xs clear-filtering ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary floatR">
						
					<?php echo $this->l('list_clear_filtering');?>
					</a>
				</th>
			<?php }?>
		</tr>
	</tfoot>
</table>
