<?php
	$app_name = 'VDM';
	$currDir = dirname(__FILE__);
	include("{$currDir}/defaultLang.php");
	include("{$currDir}/language.php");
	include("{$currDir}/lib.php");


	$adminConfig = config('adminConfig');

	if(!$cg = sqlValue("select count(1) from membership_groups where allowSignup=1")){
		$noSignup = true;
		echo error_message($Translation['sign up disabled']);
		exit;
	}

	if($_POST['signUp'] != ''){
		// receive data
		$memberID = is_allowed_username($_POST['newUsername']);
		$email = isEmail($_POST['email']);
		$password = $_POST['password'];
		$confirmPassword = $_POST['confirmPassword'];
		$groupID = intval($_POST['groupID']);
		$custom1 = makeSafe($_POST['custom1']);
		$custom2 = makeSafe($_POST['custom2']);
		$custom3 = makeSafe($_POST['custom3']);
		$custom4 = makeSafe($_POST['custom4']);
		$phone = makeSafe($_POST['phone']);
		
		// validate data
		if(!$phone){
			echo error_message("Invalid Phone number");
			exit;
		}
		if(!$memberID){
			echo error_message($Translation['username invalid']);
			exit;
		}
		if(strlen($password) < 8 || trim($password) != $password){
			echo error_message($Translation['password invalid']);
			exit;
		}
		if($password != $confirmPassword){
			echo error_message($Translation['password no match']);
			exit;
		}
		if(!$email){
			echo error_message($Translation['email invalid']);
			exit;
		}
		if(!sqlValue("select count(1) from membership_groups where groupID='$groupID' and allowSignup=1")){
			echo error_message($Translation['group invalid']);
			exit;
		}
		if(sqlValue("select phone from membership_users where phone='$phone'")){
			echo error_message('Phone number already exists');
			exit;
		}
		

		// save member data
		$needsApproval = sqlValue("select needsApproval from membership_groups where groupID='$groupID'");
		sql("INSERT INTO `membership_users` set phone='$phone', memberID='$memberID', passMD5='".md5($password)."', email='$email', signupDate='".@date('Y-m-d')."', groupID='$groupID', isBanned='0', isApproved='".($needsApproval==1 ? '0' : '1')."', custom1='$custom1', custom2='$custom2', custom3='$custom3', custom4='$custom4', comments='member signed up through the registration form.'", $eo);

		// admin mail notification
		/* ---- application name as provided in AppGini is used here ---- */
		$message = nl2br(
			"A new member has signed up for {$app_name}.\n\n" .
			"Member name: {$memberID}\n" .
			"Member group: " . sqlValue("select name from membership_groups where groupID='{$groupID}'") . "\n" .
			"Member email: {$email}\n" .
			"IP address: {$_SERVER['REMOTE_ADDR']}\n" .
			"Custom fields:\n" .
			($adminConfig['custom1'] ? "{$adminConfig['custom1']}: {$custom1}\n" : '') .
			($adminConfig['custom2'] ? "{$adminConfig['custom2']}: {$custom2}\n" : '') .
			($adminConfig['custom3'] ? "{$adminConfig['custom3']}: {$custom3}\n" : '') .
			($adminConfig['custom4'] ? "{$adminConfig['custom4']}: {$custom4}\n" : '')
		);

		if($adminConfig['notifyAdminNewMembers'] == 2 && !$needsApproval){
			sendmail(array(
				'to' => $adminConfig['senderEmail'],
				'subject' => "[{$app_name}] New member signup",
				'message' => $message
			));
		}elseif($adminConfig['notifyAdminNewMembers'] >= 1 && $needsApproval){
			sendmail(array(
				'to' => $adminConfig['senderEmail'],
				'subject' => "[{$app_name}] New member awaiting approval",
				'message' => $message
			));
		}

		// hook: member_activity
		if(function_exists('member_activity')){
			$args = array();
			member_activity(getMemberInfo($memberID), ($needsApproval ? 'pending' : 'automatic'), $args);
		}

		// redirect to thanks page
		$redirect = ($needsApproval ? '' : '?redir=1');
		redirect("membership_thankyou.php$redirect");

		exit;
	}

	// drop-down of groups allowing self-signup
	$groupsDropDown = preg_replace('/<option.*?value="".*?><\/option>/i', '', htmlSQLSelect('groupID', "select groupID, concat(name, if(needsApproval=1, ' *', ' ')) from membership_groups where allowSignup=1 order by name", ($cg == 1 ? sqlValue("select groupID from membership_groups where allowSignup=1 order by name limit 1") : 0 )));
	$groupsDropDown = str_replace('<select ', '<select class="form-control" ', $groupsDropDown);
?>



