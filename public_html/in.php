<?php


$servername = "localhost";
$username = "br410015_cp";
$password = "chand@1931";
$dbname = "br410015_cp";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$bidid = base64_decode($_GET['invoiceid']);

$sql_bid = "SELECT * FROM `bid_post` WHERE `id`= '$bidid'";

$result_bid = mysqli_query($conn, $sql_bid);
if (mysqli_num_rows($result_bid) > 0)
{
	$row_bid = mysqli_fetch_assoc($result_bid);
	$uid = $row_bid['uid'];

	$sql_user = "SELECT * FROM `users` WHERE `id`= '$uid'";
	$result_user = mysqli_query($conn, $sql_user);
	$row_user = mysqli_fetch_assoc($result_user);

	$sql_bus = "SELECT * FROM `bussnessdetails` WHERE `uid`= '$uid'";
	$result_bus = mysqli_query($conn, $sql_bus);
	$row_bus = mysqli_fetch_assoc($result_bus);

	$pid = $row_bid['pid'];
	$sql_post = "SELECT * FROM `post` WHERE `id`= '$pid'";
	$result_post = mysqli_query($conn, $sql_post);
	$row_post = mysqli_fetch_assoc($result_post);

	$earlier = new DateTime($row_post['fromdate']);
    $later = new DateTime($row_post['todate']);
    $diff = $later->diff($earlier)->format("%a");

    $bamount = $diff*$row_bid['bid_amount'];
    $tax = $bamount*3/100;
    $granttotal = $bamount+$tax;


}




// include autoloader
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

ob_start();
?>
<style>
	.header
	{
		width: 100%;
	}
	.header img
	{
		width: 200px;
		padding: 10px;
	}
	.user
	{
		width: 100%;
	}
	table td
	{
		padding-left:10px;
	}
	.user th
	{
		background: #ccc;
		text-align: left;
		padding-left:10px; 
	}
	.vendor th
	{
		background: #fff;
		text-align: left;
		padding-left:10px; 
	}
	.qty
	{
		width: 100%;
		margin-top: 50px;
	}
	.qty th
	{
		background: #ccc;
		text-align: center;
		padding:10px; 
		border:1px solid #ccc;
	}
	.qty td
	{
		padding:10px; 
		border:1px solid #ccc;
	}
	.total
	{
		width: 100%;
	}
	.thanks
	{
		text-align: center;
		font-weight: bold;
		border: none;
	}
</style>

<table class="header">
	<tr>
		<td><h1>Broombids</h1></td>
		<td>Invoice Number :  <?php echo $row_bid['id']; ?> <br> Date : <?php echo date('d-m-Y'); ?></td>
	</tr>
</table>

<table class="user">
	<tr>
		<th style="padding: 10px;">Bill To </th>
		<th style="padding: 10px;">Ship To </th>
	</tr>
	<tr>
		<td>
			<table class="vendor">
				<tr>
					<th>Company Name:</th>
					<td><?php echo $row_bus['bname']; ?></td>
				</tr>
				<tr>
					<th>Person Name:</th>
					<td><?php echo $row_user['fname'].' '.$row_user['surname']; ?></td>
				</tr>
				<tr>
					<th>Address:</th>
					<td><?php echo $row_bus['address']; ?></td>
				</tr>
				<tr>
					<th>Zip:</th>
					<td><?php echo $row_bus['zipcode']; ?></td>
				</tr>
				<tr>
					<th>Contact Number:</th>
					<td><?php echo $row_user['phone']; ?></td>
				</tr>
				<tr>
					<th>Email:</th>
					<td><?php echo $row_user['email']; ?></td>
				</tr>
			</table>
		</td>
		<td>
		<table class="vendor">
				<tr>
					<th>Company Name:</th>
					<td><?php echo $row_bus['bname']; ?></td>
				</tr>
				<tr>
					<th>Person Name:</th>
					<td><?php echo $row_user['fname'].' '.$row_user['surname']; ?></td>
				</tr>
				<tr>
					<th>Address:</th>
					<td><?php echo $row_bus['address']; ?></td>
				</tr>
				<tr>
					<th>Zip:</th>
					<td><?php echo $row_bus['zipcode']; ?></td>
				</tr>
				<tr>
					<th>Contact Number:</th>
					<td><?php echo $row_user['phone']; ?></td>
				</tr>
				<tr>
					<th>Email:</th>
					<td><?php echo $row_user['email']; ?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<table class="qty">
	<tr>
		<th>Item No</th>
		<th>Description</th>
		<th>Broom Amount</th>
	</tr>
	<tr>
		<td><?php echo $row_post['id']; ?></td>
		<td><?php echo $row_post['title']; ?> </td>
		<td>€ <?php echo $bamount; ?></td>
	</tr>
	<tr>
		<td colspan="2">Make All amount payable to <br>Bank Name : <br>Account Number : <br>Company Name : </td>
		<td>
			<table class="total">
				<tr>
					<th>Total</th>
					<td>€ <?php echo $bamount; ?></td>
				</tr>
				<tr>
					<th>Tax 3%</th>
					<td>€ <?php echo $tax; ?></td>
				</tr>
				<tr>
					<th>Grand Total</th>
					<td>€ <?php echo $granttotal; ?></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3" class="thanks">
			Thank You!<br>
			we appreciate your business
		</td>
	</tr>
</table>
<?php
$html = ob_get_clean();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('resulta.pdf',Array('Attachment'=>0));