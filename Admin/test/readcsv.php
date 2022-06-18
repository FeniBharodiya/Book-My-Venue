
		<?php
		echo "<html><body><center><table style='border:1px solid black;'>\n\n";

		// Open a file
		$file = fopen("./python/feedback.csv", "r");

		// Fetching data from csv file row by row
		while (($data = fgetcsv($file)) !== false) {

			// HTML tag for placing in row format
			echo "<tr style='border:1px solid black;'>";
			foreach ($data as $i) {
				echo "<td class='font-w600' style='border:1px solid black;'>" . htmlspecialchars($i)
					. "</td>";
			}
			echo "</tr> \n";
		}

		// Closing the file
		fclose($file);

		echo "\n</table></center></body></html>";
		?>


