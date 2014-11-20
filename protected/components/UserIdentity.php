<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	 private $_id;
	 const ERROR_INACTIVE_ACCOUNT=3;
	 
	public function authenticate()
	{
		//$user = Member::model()->findByAttributes(array('user_name'=>$this->username,'password'=>$this->password, 'is_active'=>1));	
		$user = User::model()->findByAttributes(array('username'=>$this->username));
 		if($user===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        //else if(!$this->validatePassword($this->password))
          //  $this->errorCode=self::ERROR_PASSWORD_INVALID;

//else if($user->is_active ==0){$this->errorCode=self::ERROR_INACTIVE_ACCOUNT;}
else{			
			 $this->errorCode=self::ERROR_NONE;	
			 $this->_id = $user->id; 			 
		}
		return $this->errorCode;
	}
	
	public function getId(){ return $this->_id;	}
	
	
}