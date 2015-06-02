<?php

require_once "layout/header.php";
require_once "request.php";

$request = new Request();
$sock = $request->createSocket();
$info = $request->getInfo();
$request->disconnect();
?>

<section class="wrapper scrollable">
	<?php require_once "layout/menubar.php"; ?>
	<br>
	
<div class="col-md-5">
	<div class="panel panel-default panel-block">
		<div class="list-group">
			<div class="list-group-item">
				<div class="form-group">
					<h4 class="section-title">Properties</h4>
					<table class="table table-bordered table-striped">
						<thead class="">
							<tr>
								<th>Key</th>
								<th>Value</th>
							</tr>
						</thead>
						<tbody>

							<?php
								if (!function_exists("printTableData")) {
									function printTableData($string) {
										if (strlen($string) == 0 || $string == "Nothing found") {
											echo "<td><b><font color='#ff0000'>$string</font></b></td>";
										} else {
											echo "<td>" . $string . "</td>";
										}
									}
								}
							?>
														
							<tr>
								<td>Uptime</td>
								<?php printTableData($info["uptime"]); ?>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</section>

<?php

require_once "layout/footer.php";

?>