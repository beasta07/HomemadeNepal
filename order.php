<?php include('header.php'); ?>

<body>

	<?php include('navbar.php'); ?>
	<div class="container">
		<h1 class="page-header text-center">ORDER</h1>
		<form method="POST" action="purchase.php">
			<table class="table table-striped table-bordered">
				<thead>
					<th class="text-center"><input type="checkbox" id="checkAll"></th>
					<th class="productheading">Category</th>
					<th class="productheading">Product Image
					<th class="productheading">Product Name</th>
					<th class="productheading">Price</th>
					<th class="productheading">Quantity</th>
				</thead>
				<tbody>
					<?php
					$sql = "select * from product left join category on category.categoryid=product.categoryid order by product.categoryid asc, productname asc";
					$query = $conn->query($sql);
					$iterate = 0;
					while ($row = $query->fetch_array()) {
					?>
						<tr>
							<td class="text-center"><input type="checkbox" value="<?php echo $row['productid']; ?>||<?php echo $iterate; ?>" name="productid[]" style=""></td>
							<td><?php echo $row['catname']; ?></td>

							<td><a href="<?php if (empty($row['photo'])) {
												echo "upload/noimage.jpg";
											} else {
												echo $row['photo'];
											} ?>"><img src="<?php if (empty($row['photo'])) {
																echo "upload/noimage.jpg";
															} else {
																echo $row['photo'];
															} ?>" height="170px" width="80%"></a></td>
							<td class="productname1"><?php echo $row['productname']; ?></td>
							<td class="price">Rs <?php echo number_format($row['price'], 2); ?></td>
							<td><input type="text" class="form-control" name="quantity_<?php echo $iterate; ?>"></td>
						</tr>
					<?php
						$iterate++;
					}
					?>
				</tbody>
			</table>

			<div class="row">
				<div class="col-md-3">
					<input type="text" name="customer" class="form-control" placeholder="Customer Name" required>
				</div>
				<div class="col-md-3">
					<input type="text" name="number" class="form-control" placeholder="Contact Number" required>
				</div>
				<div class="col-md-2" style="margin-left:-20px;">
					<button type="submit" onclick="myFunction()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
					<br />
					<br />
					<br />

				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#checkAll").click(function() {
				$('input:checkbox').not(this).prop('checked', this.checked);
			});
		});
	</script>
</body>

</html>