<?php include 'header.php'; ?>
     



           
        <div class="cardapio-list small-11 large-12 columns no-padding small-centered">
            
            <div class="global-page-container">
                <div class="cardapio-title small-12 columns no-padding">
                    <h3>Cardapio</h3>
                    <hr></hr>
                </div>

                <?php

        $server = 'localhost';
        $user = 'root';
        $password = 'root';
        $db_name = 'restaurante';
        $port = '3306';

        $db_connect = new mysqli($server,$user,$password,$db_name,$port);
        mysqli_set_charset($db_connect,"utf8");

        if ($db_connect->connect_error) {
            echo 'Falha: ' . $db_connect->connect_error;
        } else {
            // echo 'Conexão feita com sucesso' . '<br><br>';
            $sql = "SELECT DISTINCT categoria FROM pratos";
            $result = $db_connect->query($sql);

            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                { ?>

<?php
                    $categoria = $row['categoria'];
                    ?>
                    <div class="category-slider small-12 columns no-padding">
                    <h4><?php echo $categoria; ?></h4>

                    <div class="slider-cardapio">
                        <div class="slider-002 small-12 small-centered columns">

                            <?php

                                $sql2 = "SELECT * FROM pratos WHERE categoria ='$categoria'";
                                 $result2 = $db_connect->query($sql2);

                                  if($result2->num_rows > 0)
                                    {
                                        while($row2 = $result2->fetch_assoc())
                                        { ?>    
                                             

                                            <div class="cardapio-item">
                                             <a href="prato.php?prato=<?php echo $row2['codigo'];  ?>">
                                        
                                                <div class="item-image">
                                                    <img src="img/cardapio/<?php echo $row2['codigo']; ?>.jpg" alt="cogumelos"/>   
                                                </div>

                                                <div class="item-info">
                                                    
                                                
                                                    <div class="title"><?php $row2['nome'];  ?></div>
                                                </div>

                                                <div class="gradient-filter">
                                            </div>
                                        
                                    </a>
                                </div>

                                       <?php  }

                                     }

                            ?>

                           
                        </div>
                    </div>
                </div>





              <?php  }
           }
            else
            {
                'Nao há pratos';
            }
        }     
    ?>   


                




            </div>
        </div>

            

   


        <?php include 'footer.php';