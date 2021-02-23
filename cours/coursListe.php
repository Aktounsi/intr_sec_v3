<?php  defined('_DEFVAR') or exit('Restricted Access');
    //require('../connexionbdd.php');
    $reqNombre = $bdd->query('SELECT  count(*) AS n from cours');
    $nombrerow = $reqNombre->fetch(PDO::FETCH_ASSOC);
    $nombreCours = $nombrerow['n'];
    $nombrePages = (int) ($nombreCours/10);
    $reste = ($nombreCours%10);
    if($reste==0){$nombrePages--;}
    if((!isset($_GET['page']) )  ||  (!is_numeric($_GET['page']))  ||  ($_GET['page'] < 0) ){$page=0;}
    else{  if($_GET['page'] > $nombrePages){$page = $nombrePages;}else{$page=$_GET['page'];}}      
    

     $req = $bdd->prepare('SELECT cours.cours_ID AS cours_ID, DATE_FORMAT(cours.date_ajout, \'%d/%m/%Y à %H:%i:%s\') AS d, cours.size AS size ,membres.nom AS nom_admin,membres.prenom AS prenom_admin,
                        cours.URI AS URI, cours.titre AS titre
                         from cours, membres
                         where cours.membre_ID = membres.membre_ID
                         ORDER BY cours_ID DESC LIMIT :debut ,10
                         ');    
     /* Pour les req préparées avec LIMIT on doit passer par bindParam() Si on a opté pour PDO*/
     $debut = $page*10;
     $req->bindParam(':debut', $debut, PDO::PARAM_INT); 
     $req->execute();                    
                                 
       if((!($donnees = $req->fetch()))  &&  ($page != 0)  ){die ('404 PAGE NOT FOUND');}

        
    ?> 
    <tr>  <?php 
            while ($donnees)
            {
            ?>
            <td style="Text-decoration-line:underline;">  <?php   echo $donnees['cours_ID'];    ?>#  </td>
            <td> <?php   echo $donnees['titre'];    ?> </td>
            <td> <?php   echo $donnees['d'];    ?> </td>
            <td> <?php   echo $donnees['nom_admin']. ' '.$donnees['prenom_admin'];    ?> </td>
            <td> <?php   echo round($donnees['size']/1024,2);    ?> KB </td>
            <td style="Text-decoration-line:underline;"><a href="download.php?id=<?php echo $donnees['cours_ID']; ?>" >download</a></td>

    </tr>
    <?php $donnees = $req->fetch(); } $req->closeCursor();     ?> </table>
                <br><br><br><br>
                <?php if($page>1)  {  ?>
        <a class="chevron"  href="/INTR_SEC/cours/?page=<?php echo ($page-1); ?>"><img src="../images/last.png" style="width:20px;height:20px;" alt=""></a> 
        <a <?php if($page<($nombrePages)) { ?>class="chevron" href="/INTR_SEC/cours/?page=<?php echo ($page+1); ?>" 
            <?php }else{ ?>class="chevrond"<?php } ?> ><img style="width:20px;height:20px;" src="../images/next.png" alt=""></a>
        <?php }  ?>

        <?php if($page==1)  {  ?>
        <a class="chevron"  href="/INTR_SEC/cours/"><img src="../images/last.png" style="width:20px;height:20px;" alt=""></a> 
        <a <?php if($page<($nombrePages)) { ?>class="chevron" href="/INTR_SEC/cours/?page=<?php echo ($page+1); ?>"
            <?php }else{ ?>class="chevrond"<?php } ?> ><img style="width:20px;height:20px;" src="../images/next.png" alt=""></a>
        <?php }  ?>

        <?php if($page==0)  {  ?>
        <a class="chevrond" disabled><img src="../images/last.png" style="width:20px;height:20px;" alt=""></a> 
        <a <?php if($page<($nombrePages)) { ?>class="chevron" href="/INTR_SEC/cours/?page=<?php echo ($page+1); ?>" <?php }else{ ?>class="chevrond" <?php } ?>>
            <img style="width:20px;height:20px;" src="../images/next.png" alt=""></a>
        <?php }  ?>