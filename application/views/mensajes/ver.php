<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Mensaje Detalle<a href="<?php echo site_url('mensajes/');?>" 
			class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>Titulo:</label>
					<p><?php echo !empty($mensaje['titulo'])?$mensaje['titulo']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Contenido:</label>
					<p><?php echo !empty($mensaje['contenido'])?$mensaje['contenido']:''; ?></p>
				</div>
			</div>
			
		</div>
	</div>
</div>