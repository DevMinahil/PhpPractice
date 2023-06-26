
<?php
$data= json_decode(file_get_contents('dummy.json'));
// echo $drinks;

// print_r($drinks);
// foreach($drinks as $drink)
// {
// echo '<li>'.$drink->name."$".$drink."</li>";
// }
//$data = json_decode($data, true);

if ($data && isset($data->employees)) {
    foreach ($data->employees as $employee) {
        echo $employee->name . '<br>';
        echo '<p><strong>Name:</strong> ' . $employee->name . '</p>';
        echo '<p><strong>Salary:</strong> $' . $employee->salary . '</p>';
        echo '<p><strong>Departments:</strong> ' . implode(', ', $employee->departments) . '</p>';
        echo '<p><strong>Address:</strong> ' . $employee->address->street . ', ' . $employee->address->city . ', ' . $employee->address->country. '</p>';
        echo '<h3>Projects:</h3>';
                echo '<ul>';
                foreach ($employee->projects as $project) {
                    echo '<li>';
                    echo '<strong>Name:</strong> ' . $project->name . '<br>';
                    echo '<strong>Status:</strong> ' . $project->status . '<br>';
                    echo '<strong>Start Date:</strong> ' . $project->start_date . '<br>';
                    echo '<strong>End Date:</strong> ' . $project->end_date . '<br>';
                    echo '</li>';
                }
                echo '</ul>';

                       echo '</div>';
      
    }
} else {
    echo 'Invalid JSON data';
}



?>

