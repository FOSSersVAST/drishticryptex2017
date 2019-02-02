<?php
if (!empty($this->session->userdata['userData']['id'])){
  $checkvalueadditional = $model_obj->returnCheckValueAdditional($this->session->userdata['userData']['id']);

  if($checkvalueadditional == '0'){
    redirect('more_details');
  }
}
?>
<body id="singlecolored">
<?php
if(isset($userData)) {
?>
<div class="container">
  <div class="row">
    <div class="col-md-12 wrapper">
      <h1>Profile Details</h1>
      <?php
      echo '<div class="welcome_txt"><p>Welcome <b>'.$userData['first_name'].'</b></p></div>';
      echo '<div class="fb_box" style="margin-top:30px;">';
      //echo '<p class="image"><img src="'.$userData['picture_url'].'" alt="" width="300" height="220"/></p>';
      //echo '<p><b>Facebook ID : </b>' . $userData['oauth_uid'].'</p>';
      echo '<p><b>Name : </b>' . $userData['first_name'].' '.$userData['last_name'].'</p>';
      echo '<p><b>Email : </b>' . $userData['email'].'</p>';
      //if(!empty($userData['level'])){
      echo '<p><b>College name : </b>'.$userData['collegename'].'</p>';
      echo '<p><b>Current level : </b>'.$userData['level'].'</p>';
      //}
      //if(!empty($userData['levelcheckintime'])){
      echo '<p><b>Current level check in time : </b>'.$userData['levelcheckintime'].'</p>';
      //}
      //echo '<p><b>Gender : </b>' . $userData['gender'].'</p>';
      //echo '<p><b>Locale : </b>' . $userData['locale'].'</p>';
      //echo '<p><b>FB Profile Link : </b>' . $userData['profile_url'].'</p>';
      echo '<p><b><a href="'.base_url().'user_authentication/logout">Logout</a></b></p>';
      echo '</div>';
      ?>
    </div>
  </div>
</div>
<?php
} else {
?>
<div class="container">
  <?php
  if (isset($msg)) {
    echo "<blockquote>{$msg['text']}</blockquote>";
  }
  ?>
    <div class="row">
      <div class="col-md-6">
        <form action="<?php base_url().'/user_authentication' ?>" method="POST">
          <div class="form-group">
            <label>Email</label><br/>
            <input type="text" class="form-control" name="email" />
          </div>
          <div class="form-group">
            <label>Password</label><br/>
            <input type="password" class="form-control" name="password" />
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-default">Log In</button>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <form action="<?php base_url().'/user_authentication' ?>" method="POST">
          <div class="form-group">
            <label>First Name</label><br/>
            <input type="text" class="form-control" name="first_name" />
          </div>
          <div class="form-group">
            <label>Last Name</label><br/>
            <input type="text" class="form-control" name="last_name" />
          </div>
          <div class="form-group">
            <label>Gender</label><br/>
            <select name="gender" class="form-control">
              <option value="o">Other</option>
              <option value="m">Male</option>
              <option value="f">Female</option>
            </select>
          </div>
          <div class="form-group">
            <label>Email</label><br/>
            <input type="text" class="form-control" name="email" />
          </div>
          <div class="form-group">
            <label>Password</label><br/>
            <input type="password" class="form-control" name="password" />
          </div>
          <div class="form-group">
            <label>College</label><br/>
            <input type="text" class="form-control" name="collegename" />
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-default">Register</button>
          </div>
        </div>
      </form>
    </div>
  </form>
</div>
<?php
}
?>
