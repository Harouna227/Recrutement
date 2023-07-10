<?php    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";    
    
    $url.= $_SERVER['REQUEST_URI'];    
      
    echo $url;  ?>
<ul>
  <li><a href="../collaborateurs/">Collaborateurs</a></li>
  <li><a href="../departement/">Département</a></li>
  <li><a href="../taches/">Tâches</a></li>
  <li><a href="../tache_collaborateur/">Tâches/collaborateurs</a></li>
</ul>