<?php echo $this->session->flashdata('verify_msg'); ?>
<section class="vh-101" style="background-color: #e9ffea;">
<?php $attributes = array("name" => "loginform");
echo form_open("user/login", $attributes);?>
<div class="container py-5 h-101">
    <div class="row d-flex justify-content-center align-items-center h-101">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-green text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">KIRANA MEGATARA</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>

              <div class="form-outline form-white mb-4">
                <td><label for="nik">NIK</label></td><td><input class="form-control" name="nik" placeholder="NIK" type="text" /> <span style="color:red"><?php echo form_error('email'); ?></span></td>
              </div>

              <div class="form-outline form-white mb-4">
                <td><label for="subject">Password</label></td><td><input class="form-control" name="password" placeholder="Password" type="password" /> <span style="color:red"><?php echo form_error('password'); ?></span></td>
                <?php echo form_close(); ?>

<p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
<p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>  
            </div>

 <!-- Checkbox -->
 <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
              <label class="form-check-label" for="form1Example3"> Remember password </label>
            </div>
            
              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
            </div>
            <div>
              <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
              <div>
          </div>
        </div>
      </div>
    
</section>
