	<div class="jumbotron">
		<h1 class="display-4">Soap Data</h1>
		<?php if(!Helper::validateSoapData($data)): ?>
			<p class="lead alert alert-danger" >Data is not available!</p>
		</div>
		<?php else: ?>
	</div>

	<div class="jumbotron noBg">
		<p class="lead"><b>Users (those include 'a' on first letter):</b></p>
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">ID</th>
					<th scope="col">Name</th>
					<th scope="col">Date of Birth</th>
					<th scope="col">SSN</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sumAmount = 0;
					$count = 0;
					foreach ($data['ListByName']['SQL'] ?? [] as $key => $value):
						if(!Helper::checkIfStartsWith_A($value['Name']))
							continue;
						$count++;
				?>
				<tr>
					<th scope="row"><?=$count?></th>
					<td><?=$value['ID']?></td>
					<td><?=$value['Name']?></td>
					<td><?=$value['DOB']?></td>
					<td><?=$value['SSN']?></td>
				</tr>
				<?php endforeach; ?>
				<?php if(!$count): ?>
					<tr><td class="t-center" colspan="5">No data found</td></tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
	<?php endif; ?>
