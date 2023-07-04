<?php
$data = json_decode(file_get_contents('dummy.json'), true);

$headings = [
    "ID", "Name", "Position", "Salary", "Departments", "Address",
    "Projects"
];

foreach ($data['employees'] as $employee) {
    echo 'Employee Information:<br>';
    foreach ($headings as $heading) {
        if ($heading == "Departments") {
            $departments = implode(", ", $employee[strtolower($heading)]);
            echo $heading . ": " . $departments . "<br>";
        } elseif ($heading == "Address") {
            $address = $employee[strtolower($heading)];
            $address_str = $address['street'] . ', ' . $address['city'] . ', ' . $address['country'];
            echo $heading . ": " . $address_str . "<br>";
        } elseif ($heading == "Projects") {
            echo $heading . ":<br>";
            foreach ($employee[strtolower($heading)] as $project) {
                echo "  Project Name: " . $project['name'] . "<br>";
                echo "  Status: " . $project['status'] . "<br>";
                echo "  Start Date: " . $project['start_date'] . "<br>";
                echo "  End Date: " . $project['end_date'] . "<br>";
                echo "<br>";
            }
        } else {
            echo $heading . ": " . $employee[strtolower($heading)] . "<br>";
        }
    }
    echo "<br>";
}
?>