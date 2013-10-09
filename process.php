<?php

	require("connection.php");

	$data = array();

	if (isset($_POST['from_date']) AND !empty($_POST['from_date']))
	{
		$from = date('Y-m-d', strtotime($_POST['from_date']));	
	}
	else {
		$from = "1800-01-01";
	}
	
	if (isset($_POST['to_date']) AND !empty($_POST['to_date']))
	{
		$to = date('Y-m-d', strtotime($_POST['to_date']));
	}
	else {
		$to = "2080-01-01";
	}

	$query = "SELECT * 
			FROM leads 
			WHERE (first_name LIKE '{$_POST['search_name']}%' 
				OR last_name LIKE '{$_POST['search_name']}%')
				AND registered_datetime BETWEEN '{$from}' AND '{$to}'
				LIMIT {$_POST['page']}, 30
		";

	$users = fetch_all($query);

	$html = "
		<table class='table'>
			<thead>
				<tr>
					<th>leads_id</th>
					<th>first_name</th>
					<th>last_name</th>
					<th>registered_datetime</th>
					<th>email</th>
				</tr>
			<tbody>
		";

	foreach ($users as $user)
	{
		$html .= "
				<tr>
					<td>{$user['leads_id']}</td>
					<td>{$user['first_name']}</td>
					<td>{$user['last_name']}</td>
					<td>{$user['registered_datetime']}</td>
					<td>{$user['email']}</td>
				</tr>
		";
	}

	$html .= "
			</tbody>
		</table>
	";

	$data['html'] = $html;
	echo json_encode($data);

?>