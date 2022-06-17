<?php include('header.php'); ?>

<body>

	<div class="container">
		<h1 class="page-header text-center">SALES</h1>
		<table class="table table-striped table-bordered">
			<thead>
				<th>Date</th>
				<th>Customer</th>
				<th>Contact number</th>
				<th>Total Sales</th>
				<th>Course Status</th>
				<th>Toggle</th>

			</thead>
			<tbody>
				<?php
				$sql = "select * from purchase order by purchaseid desc";
				$query = $conn->query($sql);
				while ($row = $query->fetch_array()) {
				?>
					<tr>
						<td><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></td>
						<td><?php echo $row['customer']; ?></td>
						<td><?php echo $row['number']; ?></td>
						<td class="text-right">Rs <?php echo number_format($row['total'], 2); ?></td>
						<td><?php
							// Usage of if-else statement to translate the 
							// tinyint status value into some common terms
							// 0-Inactive
							// 1-Active
							if ($row['status'] == "1")
								echo "Approved";
							else
								echo "Rejected";
							?>
						</td>
						<td>
							<?php
							if ($row['status'] == "1")

								// if a row is active i.e. status is 1 
								// the toggle button must be able to deactivate 
								// we echo the hyperlink to the page "deactivate.php"
								// in order to make it look like a button
								// we use the appropriate css
								// red-deactivate
								// green- activate
								echo
								"<a href=deactivate.php?purchaseid=" . $row['purchaseid'] . " class='btn1'>Approve</a>";
							else
								echo
								"<a href=activate.php?purchaseid=" . $row['purchaseid'] . " class='btn2'>Reject</a>";
							?>
					</tr>
					<td><a href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> View </a>
						<?php include('sales_modal.php'); ?>
					</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</body>

</html>