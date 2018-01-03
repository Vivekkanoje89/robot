<?php

    class Diggy {
        /* Member variables */
        // var $Direction = "NORTH";
        var $Direction;
        var $x;
        var $y;
        
        /* Member functions */
        public function setDirection($par){
            // echo "\nsetDirection = $par\n";
            $this->Direction = $par;
        }
        
        public function setX($par1){
            $this->x = $par1;
        }
        
        public function setY($par2){
            $this->y = $par2;
        }
        
        public function getDirection(){
            return $this->Direction;
        }
        
        public function getX(){
            return $this->x;
        }
        
        public function getY(){
            return $this->y;
        }
    }

    class robot {

        var $current_direction;
        var $current_x;
        var $current_y;
        
        public function getC($Direction, $x, $y){                
            echo "\nRobot is directed in $Direction having X-position = $x and Y-position = $y\n";
            // fgetc(STDIN);
        }      
        
    }

    $comm_count = $argc;
    if($comm_count == 5){
        // echo "\n comm_count = $comm_count \n";
    }else{
        exit;
    }
    $comm_val = $argv;
    // print_r($comm_val);
   
    $config_Robot = new robot();

    //intialise robot Diggy
    $config_Diggy = new Diggy();
    
    $config_Diggy->setDirection(strtoupper(trim($comm_val[3])));
    $config_Diggy->setX($comm_val[1]);
    $config_Diggy->setY($comm_val[2]);

    $v1 = $config_Diggy->getDirection();
    $v2 = $config_Diggy->getX();
    $v3 = $config_Diggy->getY();

    echo "\nDiggy Robot is if Facing towards $v1 having X-position = $v2 and Y-position = $v3\n";
    $dirc = $comm_val[3];
    $Direction = strtoupper(trim($dirc));
        // echo $Direction;

        if($Direction == "NORTH" || $Direction == "SOUTH" || $Direction == "EAST" || $Direction == "WEST"){
            
            $config_Robot->current_direction = $config_Diggy->getDirection();
            
            $check_Dir = $config_Robot->current_direction;
            switch ($Direction) {
                case "NORTH":
                    if($check_Dir == "EAST" || $check_Dir == "WEST" || $check_Dir == "NORTH"){
                        $config_Robot->current_direction = $Direction;
                        // echo "\n moved to NORTH\n";
                    }else{
                        echo "\nError: Diggy Robo can turn to 90 Degree clockwise on Right and counterclockwise on Left";
                    }
                    break;
                case "SOUTH":
                    if($check_Dir == "EAST" || $check_Dir == "WEST" || $check_Dir == "SOUTH"){
                        $config_Robot->current_direction = $Direction;
                        // echo "\n moved to SOUTH\n";
                    }else{
                        echo "\nError: Diggy Robo can turn to 90 Degree clockwise on Right and counterclockwise on Left";
                    }
                    break;
                case "EAST":
                    if($check_Dir == "NORTH" || $check_Dir == "SOUTH" || $check_Dir == "EAST"){
                        $config_Robot->current_direction = $Direction;
                        // echo "\n moved to EAST\n";
                    }else{
                        echo "\nError: Diggy Robo can turn to 90 Degree clockwise on Right and counterclockwise on Left";
                    }
                    break;
                case "WEST":
                    if($check_Dir == "NORTH" || $check_Dir == "SOUTH" || $check_Dir == "WEST"){
                        $config_Robot->current_direction = $Direction;
                        // echo "\n moved to WEST\n";
                    }else{
                        echo "\nError: Diggy Robo can turn to 90 Degree clockwise on Right and counterclockwise on Left";
                    }
                    break;
            }

            $x = trim($comm_val[1]);
            // echo "\n X command to Diggy Robo:$x\n";
            
            $config_Diggy->setX($x);
            $config_Robot->current_x = $config_Diggy->getX();
        
            $y = trim($comm_val[2]);
            // echo "\n Y command to Diggy Robo:$y\n";
            
            $config_Diggy->setY($y);
            $config_Robot->current_y = $config_Diggy->getY();            

            
            $s = trim($comm_val[4]);
            echo "\n Waking command to Diggy Robo S = $s\n";
            // echo "\nRobot walk to $s \n";
            $roboWalk = (string)$s;
    
            $roboWalk = strtoupper(trim($roboWalk));
            // echo "\n roboWalk string -- $roboWalk \n";
                
            $arrWalk = str_split($roboWalk);
            // echo "\narrWalk array -->"; print_r($arrWalk)."\n";
                foreach ($arrWalk as $arrk => $arrv) {
                    if($arrv == "-"){
                        $defaultDir = $config_Diggy->getDirection();
                        echo "\nError: Diggy Robot can move forward only. current direction is $defaultDir .\n";
                        exit;
                    }else{}
                }
    
                foreach ($arrWalk as $key => $value) {
                    switch ($value) {
                        case "L":
                            $check_WDir_current = $config_Robot->current_direction;
                            // echo "\n $key : $value\n";
                            // echo "\n check_WDir_current : $check_WDir_current\n";
                        
                            if($check_WDir_current == "NORTH"){
                                $config_Robot->current_direction = "WEST";
                            }else if($check_WDir_current == "SOUTH"){
                                $config_Robot->current_direction = "EAST";
                            }else if($check_WDir_current == "EAST"){
                                $config_Robot->current_direction = "NORTH";
                            }else if($check_WDir_current == "WEST"){
                                $config_Robot->current_direction = "SOUTH";
                            }else{}
    
                            // echo "\n config_Robot current dir : $config_Robot->current_direction\n"; 
                            break;
                        case "R":
                            $check_WDir_current = $config_Robot->current_direction;
                            // echo "\n $key : $value\n";
                            // echo "\n check_WDir_current : $check_WDir_current\n";
                        
                            if($check_WDir_current == "NORTH"){
                                $config_Robot->current_direction = "EAST";
                            }else if($check_WDir_current == "SOUTH"){
                                $config_Robot->current_direction = "WEST";
                            }else if($check_WDir_current == "EAST"){
                                $config_Robot->current_direction = "SOUTH";
                            }else if($check_WDir_current == "WEST"){
                                $config_Robot->current_direction = "NORTH";
                            }else{}
    
                            // echo "\n config_Robot current dir : $config_Robot->current_direction\n";
                            break;
                        case "W":
                            $check_WDir_current = $config_Robot->current_direction;
                            $check_WX_current = $config_Robot->current_x;
                            $check_WY_current = $config_Robot->current_y;
                            // echo "\n $key : $value\n";
                            // echo "\n check_WDir_current : $check_WDir_current\n";
                            // echo "\n check_WX_current : $check_WX_current\n";
                            // echo "\n check_WY_current : $check_WY_current\n";
    
                            $step = $arrWalk[$key+1];
                            // echo "\n waking step = $step \n";
    
                            if ($check_WDir_current == "NORTH") {
                                $config_Robot->current_y = (($config_Robot->current_y) + ($step));
                            }else if($check_WDir_current == "SOUTH"){
                                $config_Robot->current_y = (($config_Robot->current_y) - ($step));
                            }else if($check_WDir_current == "EAST"){
                                $config_Robot->current_x = (($config_Robot->current_x) + ($step));
                            }else if($check_WDir_current == "WEST"){
                                $config_Robot->current_x = (($config_Robot->current_x) - ($step));
                            }else{}
                            
                            break;                   
                    }
                }//end foreach
            $new_direction = $config_Robot->current_direction;
            $config_Diggy->setDirection($new_direction);
            echo "\n o/p : $config_Robot->current_x  $config_Robot->current_y  $config_Robot->current_direction\n";
        }else{
            echo "\n Wronge Direction";             
        }
?>