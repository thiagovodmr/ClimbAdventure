<?php $clientes = $customers ?>
<div class="container">
	<div class="jumbotron padding-jumbotron">
		<table>
			<tr>
				<th>Nome</th><th>Ponto(s)</th>
			</tr>
			<?php foreach ($clientes as $ranking => $cliente): ?>
					<tr>
						<td><?= $cliente->name ?></td>
						<td><?= $cliente->score ?></td>
					</tr>
			<?php endforeach ?>
		</table>
	</div>	
</div>