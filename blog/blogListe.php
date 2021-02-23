<?php defined('_DEFVAR') or exit('Restricted Access'); 
    //require('../connexionbdd.php');
    $reqNombre = $bdd->query('SELECT count(*) AS n from message');
    $nombrerow = $reqNombre->fetch(PDO::FETCH_ASSOC);
    $nombreMessage = $nombrerow['n'];
    $nombrePages = (int) ($nombreMessage/10);
    $reste = ($nombreMessage%10);
    if($reste==0){$nombrePages--;}
    if((!isset($_GET['page']) )  ||  (!is_numeric($_GET['page']))  ||  ($_GET['page'] < 0) ){$page=0;}
    else{  if($_GET['page'] > $nombrePages){$page = $nombrePages;}else{$page=$_GET['page'];}}   

     $req = $bdd->prepare('SELECT DATE_FORMAT(message.d, \'%d/%m/%Y à %H:%i:%s\') AS d,message.contenu AS contenu,membres.pseudo AS username,message.message_ID AS code
                         from message ,membres
                         where  membres.membre_ID = message.membre_ID
                         ORDER BY code DESC LIMIT :debut ,10
                         ');
/* Pour les req préparées avec LIMIT on doit passer par bindParam() Si on a opté pour PDO*/
        $debut = $page*10;
        $req->bindParam(':debut', $debut, PDO::PARAM_INT); 
        $req->execute();         
                         
                        
       if(!($donnees = $req->fetch()) &&  ($page!=0)){die ('404 PAGE NOT FOUND');}

        
    ?> <ul>  <?php 
                         
    while ($donnees)
    {
    ?>
    <li style="border-bottom:1px solid rgb(196,196,196);">
        <h3>
            <?php  echo '@'. $donnees['username'] ; ?> <span style="width:15px;margin-left:400px;"></span>  <?php echo "le " . $donnees['d'];  ?> 
        </h3>
        <p> 

            <?php echo $donnees['contenu']; ?>

        </p>
       <br> 
             
        </li>
        <?php $donnees = $req->fetch(); } $req->closeCursor();     ?> </ul>
                <br><br><br><br>
        <?php if($page>1)  {  ?>
        <a class="chevron"  href="/INTR_SEC/blog/?page=<?php echo ($page-1); ?>"><img src="../images/last.png" style="width:20px;height:20px;" alt=""></a> 
        <a <?php if($page<($nombrePages)) { ?>class="chevron" href="/INTR_SEC/blog/?page=<?php echo ($page+1); ?>" 
            <?php }else{ ?>class="chevrond"<?php } ?> ><img style="width:20px;height:20px;" src="../images/next.png" alt=""></a>
        <?php }  ?>

        <?php if($page==1)  {  ?>
        <a class="chevron"  href="/INTR_SEC/blog/"><img src="../images/last.png" style="width:20px;height:20px;" alt=""></a> 
        <a <?php if($page<($nombrePages)) { ?>class="chevron" href="/INTR_SEC/blog/?page=<?php echo ($page+1); ?>"
            <?php }else{ ?>class="chevrond"<?php } ?> ><img style="width:20px;height:20px;" src="../images/next.png" alt=""></a>
        <?php }  ?>

        <?php if($page==0)  {  ?>
        <a class="chevrond" disabled><img src="../images/last.png" style="width:20px;height:20px;" alt=""></a> 
        <a <?php if($page<($nombrePages)) { ?>class="chevron" href="/INTR_SEC/blog/?page=<?php echo ($page+1); ?>" <?php }else{ ?>class="chevrond" <?php } ?>>
            <img style="width:20px;height:20px;" src="../images/next.png" alt=""></a>
        <?php }  ?>





