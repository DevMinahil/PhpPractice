<?php
readfile("input.txt");
 $fptr=fopen("input.txt","r");
// echo $fptr;
if(!$fptr)
{
    echo "Unable to load the file";
}
// $content=fread($fptr,filesize("input.txt"));
// echo $content;
//Read a single line from file
echo fgets($fptr);
echo ftell($fptr);
echo fgets($fptr);
//return cursor position after reading the firts libe
echo ftell($fptr);
// change the position of the cursor
fseek($fptr,65);
//start outputting values after from line 65
echo fgets($fptr);
echo  fpassthru($fptr);

fclose($fptr);
//reading while eof
$fptr=fopen("input.txt","r");
echo "<ul>";
while (!feof($fptr))
{
    $line=fgets($fptr);
    echo "<li>" .$line ."</li>";
}
echo "</ul>";

fclose($fptr);


$fptr=fopen("input.txt","r");
echo "<pre>";
print_r(file("input.txt"));
echo "</pre>";

fclose($fptr);

//Appending  into the  starting file
$fptr=fopen("input.txt","r+");
fwrite($fptr,"Adding new line at the starting of the file"); 


fclose($fptr);

//over write the file
// $fptr=fopen("input.txt","w+");
// fwrite($fptr,"Adding new line at the starting of the file"); 


// fclose($fptr);
// fclose($fptr);

// writing at the end of file
$fptr=fopen("input.txt","a+");
fwrite($fptr,"\nAdding new line at the starting of the file"); 

//trauncating the content
fclose($fptr);
$fptr=fopen("input.txt","a+");
ftruncate($fptr,100);

fclose($fptr);


?>