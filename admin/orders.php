<?
include_once "../lib/db.class.php";
include_once "../config/config.php";
include_once "../models/order.class.php";


$orders = Order::getOrders();
?>

<h2>Orders</h2>
<div class="order_wrap">
	<table class="orders_table">
		<tbody>
			<tr>
				<th>Order id</th>
				<th>User email</th>
				<th>Full price</th>
				<th>Registration date</th>
				<th>Date complete</th>
				<th>Status</th>
				<th>Order Details</th>
				<th>Change</th>
			</tr>
			<?
			foreach ($orders as $order) :?>
			<tr id="<?=$order['order_id'];?>"> 
				<form class="order_form" method="post" action="../controllers/admin.php" enctype="multipart/form-data">
				<td><input type="number" name="id" value="<?=$order['order_id'];?>"></td>
				<td><input type="text" name="login" value="<?=$order['login'];?>"></td>
				<td><input type="number" name="price" value="<?=$order['order_price'];?>"></td>
				<td><input type="date" name="date_reg" value="<?=$order['date_reg'];?>"></td>
				<td><input type="date" name="date_comp" value="<?=$order['date_complete'];?>"></td>
				<td>
					<select name="status" value="<?=$order['order_status'];?>">
						<option selected value="<?=$order['order_status'];?>"><?=$order['order_status'];?></option>
						<option value='Active'>Active</option>
						<option value='Confirmed'>Confirmed</option>
						<option value='Finished'>Finished</option>
						<option value='Cancelled'>Cancelled</option>
					</select>
				</td>
				<td class="view_details">
					<a href="javascript:void(0)">View Details</a>
				</td>
				<td class="change_order">
					<a href="javascript:void(0)">Save Changes</a>
				</td>
				</form>
			</tr>
			<?endforeach;?>
		</tbody>
	</table>
	<div class="order_details">
	</div>
</div>
