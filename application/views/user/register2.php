<?php echo $this->session->flashdata('verify_msg'); ?>

<section class="vh-100" style="background-color: #eee;">
    <?php $attributes = array("name" => "registrationform");
    echo form_open("user/register", $attributes);?>
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php echo set_value('fname'); ?>" />
                      <label class="form-label" for="form3Example1c">Firstname</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" name="lastname" placeholder="Last Name"  value="<?php echo set_value('lname'); ?>"/>
                      <label class="form-label" for="form3Example1c">LastName</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email');?>"/>
                      <label class="form-label" for="form3Example3c">Your Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" name="password" placeholder="Password" value="admin" disabled />
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  </div>

                  <button name="submit" type="submit">Signup</button>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
<p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>
</section>


register 1

<?php echo $this->session->flashdata('verify_msg'); ?>

<h4>User Registration Form</h4>

<?php $attributes = array("name" => "registrationform");
echo form_open("user/register", $attributes);?>
<table>
<tr>
<td><label for="name">First Name</label></td>
<td><input name="firstname" placeholder="First Name" type="text" value="<?php echo set_value('fname'); ?>" /> <span style="color:red"><?php echo form_error('firstname'); ?></span></td>
</tr>
<tr>
<td><label for="name">Last Name</label></td><td><input name="lastname" placeholder="Last Name" type="text" value="<?php echo set_value('lname'); ?>" /> <span style="color:red"><?php echo form_error('lastname'); ?></span></td>
</tr>
<tr>
<td><label for="email">NIK</label></td><td><input class="form-control" name="email" placeholder="NIK" type="text" value="<?php echo set_value('email');?>" /> <span style="color:red"><?php echo form_error('email');?></span></td>
</tr>
<tr>
<td><label for="subject">Password</label></td><td><input class="form-control" name="password" placeholder="Password" type="password" /> <span style="color:red"><?php echo form_error('password'); ?></span></td>
</tr>
<tr>
<td><label for="subject">Confirm Password</label></td><td><input class="form-control" name="cpassword" placeholder="Confirm Password" type="password" /> <span style="color:red"><?php echo form_error('cpassword'); ?></span></td>
</tr>
<tr>
<td></td>
<td><button name="submit" type="submit">Signup</button></td>
<td><button name="submit" type="submit">Signup</button></td>
</tr>
</table>
<p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
<p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>