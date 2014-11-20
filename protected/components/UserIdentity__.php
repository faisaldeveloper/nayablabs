<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

	 // Need to store the user's ID:
	 private $_id;
	 const ERROR_VALIDITY_INVALID=3;

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */

	public function ipentry($errorcode){
	$ip = $_SERVER["REMOTE_ADDR"];
	$ip_row = Yii::app()->db->createCommand("select entries,wrong from ip where ip like'".$ip."' ")->queryRow();

	if($ip_row['entries']>0){
			if($ip_row['wrong']>=3){$status=0;}else{$status=1;}
			if($errorcode>0){$wrong="wrong=wrong+1";}else{$wrong="wrong=0";}
			Yii::app()->db->createCommand("update ip set $wrong,`date`='".date('Y-m-d')."' , entries=".($ip_row['entries']+1)." , status=$status where ip like'".$ip."'")->execute();
			}else{
			if($errorcode>0){$wrong="1";}else{$wrong="0";}
			Yii::app()->db->createCommand("insert into ip(ip,entries,wrong,status,date)values ('".$ip."',1,".$wrong.",1,'".date('Y-m-d')."')")->execute();	
			}
	}
	public function authenticate()
	{
		Yii::app()->user->setState('pageSize',40);
		$user = User::model()->findByAttributes(array('username'=>$this->username));
		if ($this->username !== $user->username) { // No user found!	
			$this->errorCode=self::ERROR_USERNAME_INVALID;
			$this->ipentry($this->errorCode);
		} else if ($user->password !== $this->password ) { // Invalid password!//SHA1($this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
			$this->ipentry($this->errorCode);
		}else { // Okay!	
		$this->ipentry(0);
		$branch = Branche::model()->find(
		//array('condition'=>'id=:id ','params'=>array('branch_id'=>$user->hotel_branch_id))
		);
		
//======================================================================================================================
//print_r($_SERVER);

//=======================
$thisdate = date('Y-m-d');
$thismonth = date('Y-m');
$thisday = (int)date('j');
//++++++++++++++++++++++++++++++++++++++++ Update APP KEY according to the requirements  ++++++++++++++++++
//$enc = $this->encrypt('20-68-9D-55-1F-0B,'.'2013-05-30');
//$enc = utf8_encode($enc);
//Yii::app()->db->createCommand()->update('hms_branches',array('appkey'=>$enc),'branch_id=:branch_id',array(':branch_id'=>$branch->branch_id));
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//$record = Yii::app()->db->createCommand()->select('appkey')->from('hms_branches')->where('branch_id='.$branch->branch_id)->queryRow();
$dec = utf8_decode($branch->appkey);
$dec = Controller::decrypt($dec);

$parts = explode(',',$dec);

$dbmac = $parts[0];
$dbdate = date('Y-m-d',strtotime($parts[1]));
$dbmonth = date('Y-m',strtotime($parts[1]));
$dbday = (int)date('j',strtotime($parts[1]));


if (function_exists('exec')) {
    exec("\\windows\\system32\\getmac.exe", $output, $return);
	if(empty($output)){exec("getmac.exe", $output, $return);}
	
	$systemmac_arr = explode(' ',$output[3]);
	$systemmac = $systemmac_arr[0];
	
	if(!empty($systemmac)){
	
	}else{
		$systemmac = $_SERVER['HTTP_HOST'].'/'.$_SERVER['DOCUMENT_ROOT'];
	}
	
}else{
	$systemmac = $_SERVER['HTTP_HOST'].'/'.$_SERVER['DOCUMENT_ROOT'];
}

//echo "<br>$dbmac==$systemmac<br>$thismonth==$dbmonth && $thisday<=$dbday && $thisday>18  || $thisdate>$dbdate";

//=============================
//if expiray date is in this month and date is greater than 25 or product is expired then request to web service
if( $dbmac!=$systemmac  || empty($branch->appkey) || ($thismonth==$dbmonth && $thisday<=$dbday && $thisday>18)
|| strtotime($thisdate) > strtotime($dbdate) ){//same month

//echo "<br>It will request to web service before inactive/on expired";

$url = "http://maaliksoft.com/mce/reg.php?mac=$systemmac&app_id=2";

$content = @file_get_contents($url);

$content = json_decode($content,true);
	//echo "<br>Content from ($url)  is $content";
	if($content['status']==1){
	//echo "<br> if response is good it will update mac and expiry date accordingly";
	$enc = Controller::encrypt($content['mac_address'].','.$content['expiry_date']);
	
	$enc = utf8_encode($enc);
	
	Yii::app()->db->createCommand()->update('branche',array('appkey'=>$enc)
	//,'branch_id=:branch_id',
	//array(':branch_id'=>$branch->branch_id)
	);
	//echo "<br>Move Next after db entry";
	}else if($content['status']==2){		
	Yii::app()->user->setFlash("success","What is this");//echo "--".Yii::app()->baseUrl; exit();
	echo "<script>window.location='".Yii::app()->baseUrl."/site/login'</script>";
	exit();
	}
}

//===============================-

//it will check mac address of the system with db mac
//echo strtotime($thisdate).'<='.strtotime($dbdate);

$record = Yii::app()->db->createCommand()->select('appkey')->from('branche')->queryRow();

$dec = utf8_decode($record['appkey']);

$dec = Controller::decrypt($dec);

$parts = explode(',',$dec);

$dbmac = $parts[0];
$dbdate = date('Y-m-d',strtotime($parts[1]));
$dbmonth = date('Y-m',strtotime($parts[1]));
$dbday = (int)date('j',strtotime($parts[1]));


if(strpos($systemmac,$dbmac)!==false && strtotime($thisdate)<=strtotime($dbdate) ){
$this->errorCode=self::ERROR_NONE;
$this->_id = $user->id;			


$settings = Yii::app()->db->createCommand()->select('unit,value')->from('settings')->queryAll();

Yii::app()->session['settings'] = CHtml::listData($settings,'unit','value');

//echo "<script>alert(\"Exit due to mac not matched ($dbmac=$systemmac) or wrong($thisdate <=$dbdate)\");";
//echo '<br>no error<br>';
}else{
$this->errorCode=self::ERROR_VALIDITY_INVALID;
echo "<script>alert(\"Exit due to mac not matched ($dbmac=$systemmac) or wrong($thisdate <=$dbdate)\");</script>";
echo "<script>window.location='".Yii::app()->baseUrl."/site/login';</script>";
echo "<br>Exit due to mac not matched ($dbmac=$systemmac) or wrong($thisdate <=$dbdate)";	
exit;
}
//echo !$this->errorCode;
//===============================
//echo "<br>[$mac][$date]=$enc<br>$thismonth=$dbmonth,$thisday=$dbday<br>";
//echo '<pre>';
//print_r($output);
//echo "</pre>";
	
	//20-68-9D-55-1F-0B(imdad)//00-12-3F-61-67-99(regency)20-68-9D-55-1F-0B
	
	

//echo gethostname();
//echo phpinfo();
//====================================================================================================================	
		
				/*if($branch->branch_id > 0){				
					
					// Store the role in a session:
					//$this->setState('role', $user->role);
					$this->errorCode=self::ERROR_NONE;	
					$this->_id = $user->id;			
					$this->setState("branch_id",$user->hotel_branch_id);
					$this->setState("hotel_id",$user->hotel_id);			
					//$session=new CHttpSession;
					//$session->open();
					//$session['hotel_branch_id']=$user->hotel_branch_id;
					//$session->close();
				}else{//else if branch_id>0
					//$this->errorCode=self::ERROR_UNKNOWN_IDENTITY;
					$this->errorCode=self::ERROR_VALIDITY_INVALID;
				}*/
				
		
		return !$this->errorCode;		
		} //end main else
	}
	
	public function getId()
	{
	 return $this->_id;
	}
	
	
	
}