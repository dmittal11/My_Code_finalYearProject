<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.14.2010
*
* Description:  English language file for Ion Auth messages and errors
*
*/
// Account Creation
$lang['error_activation_key_expired'] = 'The activation key you have attempted using has expired. Please request a new Activation Key <a href="%s/member/request_activation" title="Request a New Activation Key">here</a>.';

$lang['account_creation_successful'] 	  	 = 'Account Successfully Created';
$lang['account_creation_unsuccessful'] 	 	 = 'Unable to Create Account';
$lang['account_creation_duplicate_email'] 	 = 'This E-mail address is already used.';
$lang['account_creation_duplicate_username'] = 'Username Already Used or Invalid';
$lang['account_creation_missing_default_group'] = 'Default group is not set';
$lang['account_creation_invalid_default_group'] = 'Invalid default group name set';

// Password
$lang['password_change_successful'] 	 	 = 'Password Successfully Changed';
$lang['password_change_unsuccessful'] 	  	 = 'Unable to Change Password';
$lang['forgot_password_successful'] 	 	 = 'Password Reset Email Sent';
$lang['forgot_password_unsuccessful'] 	 	 = 'Unable to Reset Password';

// Activation
$lang['activate_successful'] 		  	     = 'Account Activated';
$lang['activate_unsuccessful'] 		 	     = 'Unable to Activate Account';
$lang['deactivate_successful'] 		  	     = 'Account De-Activated';
$lang['deactivate_unsuccessful'] 	  	     = 'Unable to De-Activate Account';
$lang['activation_email_successful'] 	  	 = 'Activation Email Sent';
$lang['activation_email_unsuccessful']   	 = 'Unable to Send Activation Email';

// Login / Logout
$lang['login_successful'] 		  	         = 'Logged In Successfully';
$lang['login_unsuccessful'] 		  	     = 'Incorrect Login';
$lang['login_unsuccessful_not_active'] 		 = 'Account is inactive';
$lang['login_timeout']                       = 'Temporarily Locked Out.  Try again later.';
$lang['logout_successful'] 		 	         = 'Logged Out Successfully';
$lang['login_wrong_user_password'] 		 	         = 'Wrong username or wrong password.';
$lang['login_user_not_found'] 		 	         = 'User not found';


// Account Changes
$lang['update_successful'] 		 	         = 'Account Information Successfully Updated';
$lang['update_unsuccessful'] 		 	     = 'Unable to Update Account Information';
$lang['delete_successful']               = 'User Deleted';
$lang['delete_unsuccessful']           = 'Unable to Delete User';

// Groups
$lang['group_creation_successful']  = 'Group created Successfully';
$lang['group_already_exists']       = 'Group name already taken';
$lang['group_update_successful']    = 'Group details updated';
$lang['group_delete_successful']    = 'Group deleted';
$lang['group_delete_unsuccessful'] 	= 'Unable to delete group';
$lang['group_name_required'] 		= 'Group name is a required field';

// Activation Email
$lang['email_activation_subject']            = 'Account Activation';
$lang['email_activate_heading']    = 'Activate account for %s';
$lang['email_activate_subheading'] = 'Please click this link to %s.';
$lang['email_activate_link']       = 'Activate Your Account';

// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Forgotten Password Verification';
$lang['email_forgot_password_heading']    = 'Reset Password for %s';
$lang['email_forgot_password_subheading'] = 'Please click this link to %s.';
$lang['email_forgot_password_link']       = 'Reset Your Password';
$lang['email_check']       = 'Given email is not associated with any account.';
$lang['forgot_success']       = 'Please check your e-mail, we have sent a password reset link to your registered email.';
$lang['forgot_error']       = 'Some problem occurred, please try again.';
$lang['error_code_check']       = 'You does not authorized to reset new password of this account.';
$lang['email_forgot_subject']       = 'Password Update Request';


// New Password Email
$lang['email_new_password_subject']          = 'New Password';
$lang['email_new_password_heading']    = 'New Password for %s';
$lang['email_new_password_subheading'] = 'Your password has been reset to: %s';
$lang['success_msg_resetpassword'] = 'Your account password has been reset successfully. Please login with your new password.';

// Admin 
$lang['question_update_success'] = 'Question Sucessfully Updated.';
$lang['question_insert_success'] = 'Question Sucessfully Inserted.';
$lang['common_error'] = 'Your form not submited please try again.';
$lang['image_validation_error'] = 'Please select valid extension image.';

 $lang['category_update_success'] = 'Category Sucessfully Updated.';
 $lang['category_insert_success'] = 'Category Sucessfully Inserted.';

  $lang['users_update_success'] = 'User Sucessfully Updated.';
 $lang['users_insert_success'] = 'User Sucessfully Inserted.';
  $lang['profile_update_success'] = 'Profile sucessfully updated.';

   $lang['product_update_success'] = 'Product Sucessfully Updated.';
  $lang['product_insert_success'] = 'Product Sucessfully Inserted.';
  $lang['email_sent_success'] = 'Message sucessfully Sent.';


  /* admin dashboard */

  $lang['text_dashboard'] = 'dashboard';
  $lang['text_TOTAL_USERS'] = 'KUNDENANZAHL';
  $lang['text_TOTAL_ORDERS'] = 'ALLE BESTELLUNGEN';
  $lang['text_TOTAL_PRODUCTS'] = 'ALLE PRODUKTE';
  $lang['text_PRODUCTS_COMMENTS'] = 'POSTEINGANG';
  $lang['text_PRODUCTS_PRICE'] = 'PREISÜBERSICHT';

  /* admin profile */


$lang['text_Update_Profile'] = 'Profil';
$lang['text_Profile_Image'] = 'Profile Image';
$lang['text_Select_Image'] = 'Select Image';
$lang['text_Gender'] = 'Gender';
$lang['text_Gender_male'] = 'Male';
$lang['text_Gender_female'] = 'Female';
$lang['text_Title'] = 'Title';
$lang['text_User_Type'] = 'User Type';
$lang['text_Position'] = 'Position';
$lang['text_Select_Member_Type'] = 'Select Member Type';
$lang['text_Firstname'] = 'Firstname';
$lang['text_Firstname'] = 'Firstname';












  



