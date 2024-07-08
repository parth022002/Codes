<?php
// Set the default time zone to India
date_default_timezone_set('Asia/Kolkata');

// Get the current day
$day = date("l");  // e.g., "Monday"

// Get the current date (day of the month)
$date = date("dS");  // e.g., "23"

// Get the current year
$year = date("Y");  // e.g., "2024"

// Get the current month
$month = date("F");  // e.g., "June"

// Output the results
echo "Day: " . $day . "<br>";
echo "Date: " . $date . "<br>";
echo "Year: " . $year . "<br>";
echo "Month: " . $month . "<br>";

// Custom date format: "Day, Month Date, Year" (e.g., "Monday, June 23, 2024")
$customDate = date("l, F d , Y");
echo $customDate."<br>";

// Get the current hour (12-hour format with leading zeros)
$hour12 = date("h");  // e.g., "01" to "12"

// Get the current hour (24-hour format with leading zeros)
$hour24 = date("H");  // e.g., "00" to "23"

// Get the current minute with leading zeros
$minute = date("i");  // e.g., "00" to "59"

// Get the current second with leading zeros
$second = date("s");  // e.g., "00" to "59"

// Get the current period (AM or PM)
$period = date("A");  // e.g., "AM" or "PM"

// Output the results
echo "Current Time (12-hour format): " . $hour12 . ":" . $minute . ":" . $second . " " . $period . "<br>";
echo "Current Time (24-hour format): " . $hour24 . ":" . $minute . ":" . $second . " " . $period . "<br>";

?>
