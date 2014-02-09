
<!doctype HTML>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="description" content="" />
	<title>CSV</title>
	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/dark-hive/jquery-ui.css"/>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css"/>
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	
	<script>
	$(document).ready(function(){
	
	});
	</script>
</head>
<!-- PHP DECLARE FUNCTIONS AND VARIABLES -->
<?php
	function open_csv($string_location)
	{
		ini_set('auto_detect_line_endings', true);

		if (($handle = fopen($string_location, "r+")) !== false)
		{
			while (($data = fgetcsv($handle, ",")) !== false)
			{
				$length = count($data);

				for ($index=0; $index < $length; $index++) 
				{ 
					$array[] = $data[$index];
				}
			}
		}
		return $array;
	}

	function format_csv($array)
	{
		$array_len = count($array);

		for ($index = 12; $index < $array_len; $index += 12) 
		{ 
			// Declare variables
			$count = 0;
			$record_number = $index / 12;

			echo "<h1>Record " . $record_number . "</h1><ul>";
			// Retrieve next entry
			while ($count != 11)
			{
				echo "<li>" . $array[$count] . ": " . 
						$array[$index + $count] . "</li>";

				$count++;
			}
			echo "</ul>";
		}
	}
?>
<!-- END OF PHP DECLARATIONS -->
<body>
	<div class="container">
	    <?php
			$csv_array = open_csv("us-500.csv");

			format_csv($csv_array);
		?>
	</div> <!--End of #container -->
</body>
</html>