		<div class="chat-wrap">
  <div id="chat"> 

<?php 
// строим чат 
$id = 0; 
while ($array = sqlite_fetch_array($res)) 
  { 
    $id++;
    if (($id % 2)==0){  
      $color = 'black';
    }  
    else {        
      $color = 'white';
    }
?>
  <p class="post <?php echo($color);?>">
    <i class="post-meta">><?echo($id);?> by <b><?echo($array['name']);?></b> at <?echo($array['time']);?> 
    </i>
        <form class="post-form">
          <button name="delete" class="delete-button" formmethod="post" value=<?echo($array['id']);?> >x
          </button>
        </form>
    
    <p class="post-data <?echo($color);?>" > <?echo($array['massage']);?> </p>
  
<?php  }  //чат готов, хозяин ?>

  </div>



		</div>