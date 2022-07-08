<<<<<<< HEAD
<?php
  
  <img class="bi pe-none mb-1" src="icon/read-icon.svg" width="16" height="16"></img>
  
  <?php if($couponCount>0):?>
    <?php  while($row = $result->fetch_assoc()):
        ?>
        <div>
        <?php //var_dump($row);?>
        <?php echo $row["name"].", number:".$row["number"] ?>
        </div>
        <?php endwhile; ?>
      
        <?php else: ?>
            目前沒有資料
     <?php endif; ?>   

     <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>


?>

=======
<?php
  
  <img class="bi pe-none mb-1" src="icon/read-icon.svg" width="16" height="16"></img>
  
  <?php if($couponCount>0):?>
    <?php  while($row = $result->fetch_assoc()):
        ?>
        <div>
        <?php //var_dump($row);?>
        <?php echo $row["name"].", number:".$row["number"] ?>
        </div>
        <?php endwhile; ?>
      
        <?php else: ?>
            目前沒有資料
     <?php endif; ?>   

     <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>


?>

>>>>>>> 4609369059da681773dd28f2efdfb780bd1aaebf
