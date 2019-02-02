<div class="container">
  <div class="row">
<div class="col-md-12 wrapper">
<h3>Leaderboard</h3>
<table style="width:100%">
  <tr>
    <th style="padding-top: 8px;
padding-bottom: 8px;">Rank</th>
<!--<th style="padding-top: 8px;
padding-bottom: 8px;">User ID</th>-->
<th style="padding-top: 8px;
padding-bottom: 8px;">Name</th>
<th style="padding-top: 8px;
padding-bottom: 8px;">College Name</th>
<th style="padding-top: 8px;
padding-bottom: 8px;">Level</th>
<!--<th style="padding-top: 8px;
padding-bottom: 8px;">Level Check In Time</th>-->
  </tr>
<?php
$i = 1;
$testusers = array("1","2","3","4","5","6","7","83","141");
//define testusers here.
foreach($userdetails->result() as $user) {
    echo '<tr>';
    echo '<td style="padding-top: 5px;
padding-bottom: 5px;">'.$i.'</td>';
    //echo '<td style="padding-top: 5px; padding-bottom: 5px;">'.$userdetails->id.'</td>';
    echo '<td style="padding-top: 5px;
padding-bottom: 5px;">'.$user->first_name.' ';
    echo $user->last_name.'</td>';
    echo '<td style="padding-top: 5px;
padding-bottom: 5px;">'.$user->collegename.'</td>';
    echo '<td style="padding-top: 5px;
padding-bottom: 5px;">'.$user->level.'</td>';
    //echo '<td style="padding-top: 5px; padding-bottom: 5px;">'.$userdetails->levelcheckintime.'</td>';
    $i = $i + 1;
    echo '</tr>';
}?>
</table>
</div>
</div>
</div>
