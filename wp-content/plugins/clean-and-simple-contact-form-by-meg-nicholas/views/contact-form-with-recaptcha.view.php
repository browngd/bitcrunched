<script type="text/javascript">
 var RecaptchaOptions = {
    theme : '<?php echo cff_PluginSettings::Theme(); ?>'
 };
 </script>


<p><?php echo $message; ?></p>

<form id="frmContact" name="frmContact" method="post">

<?php wp_nonce_field('cff_contact','cff_nonce'); ?>
    
<!-- Clean and Simple Contact Form by megnicholas. Version <?php echo $version; ?> -->

<!-- Clean and Simple Contact Form. Version <?php echo $version; ?> -->
  <div class="control-group">
      <div class="controls">
      <p class="text-error"><?php if (isset($contact->Errors['recaptcha'])) echo $contact->Errors['recaptcha']; ?></p>
      </div>
  </div>


  <!--email address -->
  <div class="control-group<?php 
    if (isset($contact->Errors['Email'])) echo ' error'; ?>">
     <label class="control-label" for="cf-Email">Email Address:</label>
     <div class="controls">
       <input class="input-xlarge {email:true, required:true, messages:{required:'Please give your email address.',email:'Please enter a valid email address.'}}" type="text" id="cf-Email" name="cf-Email" value="<?php echo $contact->Email; ?>" placeholder="Your Email Address">
       <span for="cf-Email" generated="true" class="help-inline" style=""><?php if (isset($contact->Errors['Email'])) echo $contact->Errors['Email']; ?></span>
     </div>
  </div>

  <!--confirm email address -->
  <div class="control-group<?php 
    if (isset($contact->Errors['Confirm-Email'])) echo ' error'; ?>">
     <label class="control-label" for="cfconfirm-email">Confirm Email Address:</label>
     <div class="controls">
       <input class="input-xlarge {email:true, required:true, equalTo:'#cf-Email', messages:{equalTo:'Please enter the same email address again.',required:'Please enter the same email address again.'}}" type="text" id="cfconfirm-email" name="cfconfirm-email" value="<?php echo $contact->ConfirmEmail; ?>" placeholder="Confirm Your Email Address">
       <span for="cfconfirm-email" generated="true" class="help-inline" style=""><?php if (isset($contact->Errors['Confirm-Email'])) echo $contact->Errors['Confirm-Email']; ?></span>
     </div>
  </div>              

<!-- name --> 
 <div class="control-group<?php 
    if (isset($contact->Errors['Name'])) echo ' error'; ?>">
     <label class="control-label" for="cf-Name">Name:</label>
     <div class="controls">
       <input class="input-xlarge {required:true, messages:{required:'Please give your name.'}}" type="text" id="cf-Name" name="cf-Name" value="<?php echo $contact->Name; ?>" placeholder="Your Name">
       <span for="cf-Name" generated="true" class="help-inline" style=""><?php if (isset($contact->Errors['Name'])) echo $contact->Errors['Name']; ?></span>
     </div>
  </div>  

 <!-- message -->
  <div class="control-group<?php 
    if (isset($contact->Errors['Message'])) echo ' error'; ?>">
     <label class="control-label" for="cf-Message">Message:</label>
     <div class="controls">
       <textarea class="input-xlarge {required:true, messages:{required:'Please give a message.'}}" id="cf-Message" name="cf-Message" rows="10" placeholder="Your Message"><?php echo $contact->Message; ?></textarea>
       <span for="cf-Message" generated="true" class="help-inline" style=""><?php if (isset($contact->Errors['Message'])) echo $contact->Errors['Message']; ?></span>
     </div>
  </div>
 
 
<div class="control-group<?php 
  if (isset($contact->Errors['recaptcha'])) echo ' error'; ?>">
   <div id="recaptcha_div" class="controls">
     <?php echo recaptcha_get_html($contact->RecaptchaPublicKey,null,isset($_SERVER['HTTPS'])); ?>
     <span class="help-inline"><?php if (isset($contact->Errors['recaptcha'])) echo $contact->Errors['recaptcha']; ?></span> 
   </div>
</div>	

  <div class="control-group">
    <div class="controls">
        <button type="submit" class="btn">Send Message</button>
    </div>
  </div>	  
</form>