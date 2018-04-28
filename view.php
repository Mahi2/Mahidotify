<h1>Notifications</h1>

<?php
    
    include("functions.php");

    $id = $_GET['id'];

    $query ="UPDATE `notifications` SET `status` = 'read' WHERE `id` = $id;";
    performQuery($query);

    $query = "SELECT * from `notifications` where `id` = '$id';";
    if(count(fetchAll($query))>0){
        foreach(fetchAll($query) as $i){
            if($i['type']=='like'){
                echo ucfirst($i['name'])." aime ce post. <br/>".$i['date'];
            }else{
                echo "Quelques commentaires sur le post.<br/>".$i['message'];
            }
        }
    }
    
?><br/>
<a href="index.php">Rétourner</a>