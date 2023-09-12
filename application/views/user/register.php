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
</tr>
</table>
<p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
<p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>