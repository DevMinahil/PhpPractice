<?php


    $cards;

    //generate an array of card reqiured to play the game
    $colors=['Red','Green','Blue','Yellow'];
    $numbers=['0','1','2','3','4','5','6','7','8','9','Draw two',"Skip","Reverse"];
    $Special=["Wild","DrawFourWild"];
    $count=0;
   
    
       
            foreach($numbers as $number){
            foreach ($colors as $color) 
            {
                if($number!='0')
                {
                    echo $number." ".$color." ".PHP_EOL;
                    echo $number." ".$color." ".PHP_EOL;
                    $count=$count+2;
                }
                else{
                    echo $number." ".$color." ".PHP_EOL;
                    $count++;
                
                }
                
            }
          
        }
        for($i=0;$i<4;$i++)
        {
            echo $Special[0].PHP_EOL;
            echo $Special[1].PHP_EOL;
          
        }
        $count=$count+8;
    
        echo $count;


        
    









?>