<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css"type="text/css"/>
       
       
	</head>
			<body>
			<form action="2task.php" method="post">
			<b>CustomerId:</b><h4><?php echo $id;?></h4>
<?php
 $db=new mysqli('localhost', 'smedia', '', "smedia");
	if(mysqli_connect_errno()){
		printf("Error connect to DB:%S\n",mysqli_error($db));
		exit();
								}
		$query1="SELECT id FROM `smedia` ";
		$query2="SELECT Seconds FROM `smedia` ";
		$query3="SELECT Name_country FROM `countries`";
		$result1 -> $db -> query($query1);
		$row = $result1 -> fetch_array(MYSQLI_NUM);
		$result2 -> $db -> query($query2);
		$row = $result1 -> fetch_array(MYSQLI_NUM);
		$sec = $result2 -> fetch_array(MYSQLI_NUM);
?>
 <p><input type="submit" value="Отправить"></p>
  </form>
   <script  type="text/javascript">
    var row = "<?php echo $row; ?>";
	var sec = "<?php echo $sec; ?>";
   for(var i=0;i<=row.length;i++){
    <tr>
		<th>row[i]</th>
		<th>sec[i]</th>
		<th></th>
		<th></th>
		<th></th>
	   </tr>
   }
    </script>
</body>		
</html>