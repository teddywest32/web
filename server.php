<?php

require_once "layout/header.php";
require_once "request.php";

$request = new Request();
$sock = $request->createSocket();
$request->redirectError();
$info = $request->getInfo();
$request->disconnect();
?>
<script type="text/javascript">
    setInterval("reload_table();", <?php echo REFRESH_INTERVAL; ?>); 
    function reload_table() {
      $('#refresh').load(location.href + ' #table');
    }
</script>

<section class="wrapper scrollable">
	<?php require_once "layout/menubar.php"; ?>
	<br>
	
<div class="col-md-5">
	<div class="panel panel-default panel-block">
		<div class="list-group">
			<div class="list-group-item">
				<h4 class="section-title">Properties</h4>
				<div id="refresh" class="form-group">
					<table id="table" class="table table-bordered table-striped">
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
							<tr>
								<td>Network Usage</td>
								<?php printTableData($info["netusage"]); ?>
							</tr>
							<tr>
								<td>Bandwidth</td>
								<?php printTableData($info["bandwidth"]); ?>
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