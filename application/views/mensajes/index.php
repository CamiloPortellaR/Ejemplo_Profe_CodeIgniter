<div class="container">
	<?php if(!empty($success_msg)){?>
	<div class="cols-xs-12">
		<div class="alert alert-success"><?php echo $success_msg;?></div>
	</div>
	<?php }elseif(!empty($error_msg)){?>
	<div class="col-xs-12">
		<div class="alert alert-danger"><?php echo $error_msg;?></div>
	</div>
	<?php } ?>
	<div class="row">
		<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel panel-heading">Mensajes 
				<a href="<?php echo site_url('mensajes/agregar/'); ?>"
				class="glyphicon glyphicon-plus pull-right"> </a></div>
				<table class="table table-striped">
				<thead>
					<tr>
						<th width="5%">ID</th>
						<th width="30%">Titulo</th>
						<th width="50%">Contenido</th>
						<th width="15%">Accion</th>
					</tr>
				</thead>
				<tbody id="userData">
					<?php if(!empty($mensajes)):foreach($mensajes as $mensaje): ?>
					<tr>
						<td><?php echo '#'.$mensaje['id'];?></td>
						<td><?php echo $mensaje['titulo'];?></td>
						<td><?php echo $mensaje['contenido'];?></td>
						<td>
							<a href="<?php echo site_url('mensajes/ver/'.$mensaje['id']); ?>" class="glyphicon glyphicon-eye-open"> </a>
							<a href="<?php echo site_url('mensajes/editar/'.$mensaje['id']); ?>" class="glyphicon glyphicon-edit"> </a>
							<a href="<?php echo site_url('mensajes/borrar/'.$mensaje['id']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Esta seguro de borrar?')"> </a>
							
						</td>
					</tr>
					<?php endforeach;else: ?>
					<tr><td colspan="4">Mensaje(s) No encontrado(s) ....</td></tr>
					<?php endif; ?>
					
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>