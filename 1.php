<!--p>Your order</p-->
                     <?php
                        $order = [];
                        // echo "<p>".$_COOKIE['order']."</p>";
                        // $order = $_COOKIE['order'].split("", string)
                        $order = explode("|", $_COOKIE['order']);
                        // print_r($order);
                        $total = 0;
                        echo "Order Id: ".$order[0],"<br>";
                        for ($i=1; $i < sizeof($order); $i+=3) { 
                            echo $order[$i]."  x".$order[$i+1]."  Rs.".$order[$i+2], "<br>";
                            $total += $order[$i+2];
                        }
                        echo "<br>Your Total: Rs.".$total,"/-<br><br>";
                    ?>