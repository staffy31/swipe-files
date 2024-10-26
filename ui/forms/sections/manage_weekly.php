<?php 
  function th_head($title){
    ?>
    <tr>
      <th colspan="4" class="px-3"><?=$title?></th>
    </tr>
    <?php
  }
?>

<?php 
  function td_three($col1,$col2,$col3){
    ?>
    <tr>
      <td class="text-center" width="3%"><?=$col1?></td>
      <td class="px-3" width="56%"><?=$col2?></td>
      <td><?=$col3?></td>
    </tr>
    <?php
  }
?>

<?php 
  function th_four($col1,$col2,$col3,$col4){
    ?>
    <tr>
      <th class="px-3"><?=$col1?></th>
      <th class="px-3"><?=$col2?></th>
      <th class="px-3"><?=$col3?></th>
      <th class="px-3"><?=$col4?></th>
    </tr>
    <?php
  }
?>

<?php 
  function td_four($col1,$col2,$col3,$col4){
    ?>
    <tr>
      <td class="text-center" width="3%"><?=$col1?></td>
      <td class="px-3" width="56%"><?=$col2?></td>
      <td class="px-3" width="16%"><?=$col3?></td>
      <td class="px-3"><?=$col4?></td>
    </tr>
    <?php
  }
?>
<?php
  function td_last_four($col1,$col2,$col3,$col4){
    ?>
    <tr>
      <td class="px-3" width="36%"><?=$col1?></td>
      <td class="px-3" width="15%"><?=$col2?></td>
      <td class="px-3" width="15%"><?=$col3?></td>
      <td class="px-3"><?=$col4?></td>
    </tr>
    <?php
  }
?>
<?php ?>
<?php ?>