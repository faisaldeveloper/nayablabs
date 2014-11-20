<?php
class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				//'backColor'=>0xCCCCCC,
				'transparent'=>true,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			/*'page'=>array(
				'class'=>'CViewAction',
			),*/
		);
	}
	
	/*protected function beforeAction($action)
	{
		$actionToRun = $action->getId(); 
   		$id = Yii::app()->getRequest()->getQuery('id');
		//$return=true;
		
		if($actionToRun=='index'){
			$res = (int)Yii::app()->user->checkAccess('SiteIndex',array('userId'=>Yii::app()->user->id));
			if(!$res>0){
			$this->redirect( array( 'reports/index' ) );
			}
		
		}
	
	return parent::beforeAction($action);	
	
	}*/

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by user.
	 */
	public function actionIndex()
	{
		$this->render('index');
		//echo "success";
	}
	
	public function actionVoidBill()
	{
		
	}
	
	public function actionDiscount()
	{
		
	}
	
	public function actionConfirmation()
	{
		//$model=new Tableorder;
		$res = 0;
		//echo "SELECT * FROM user where username='".$_REQUEST['username']."' and password='".$_REQUEST['password']."' ";
		$rs_user = Yii::app()->db->createCommand("SELECT * FROM user where username='".$_REQUEST['username']."' and password='".$_REQUEST['password']."' ")->queryRow();
		
		if($_REQUEST['typ']=='void' && $rs_user['id']>0){
		$res = (int)Yii::app()->user->checkAccess('SiteVoidBill',array('userId'=>$rs_user['id']));
		}else if($_REQUEST['typ']=='discount'  && $rs_user['id']>0){
		$res = (int)Yii::app()->user->checkAccess('SiteDiscount',array('userId'=>$rs_user['id']));
		}
		
		//in SDbAuthManager.php
		//if(!empty($params) && $params['userId']>0){$userId=$params['userId'];}
		
		echo $res;
		
	}
	
	
	/*public function actionTest()
	{
		$model=new Tableorder;
		
		$this->performAjaxValidation($model);
		$this->render('test',array('model'=>$model));
	}*/
	
	
	
	public function actionPrint()
     {   # mPDF
	 
	 $createPDF=0;
	 $printStatus=2;
	 
	 	if($createPDF){
	 	$html='';
        $mPDF1 = Yii::app()->ePdf->mpdf();
 		$mPDF1 = Yii::app()->ePdf->mpdf('','A5',0,'',0,0,0,0,0,0,'P');
 		$html .= '<table width="100%">
		<tr><td>one</td><td>two</td></tr>
		<tr><td>one</td><td>two</td></tr>
		</table>'.str_replace('/','\\\\',Yii::getPathOfAlias('webroot').'/test.pdf');
		
		$html .='</body>';
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/pdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
		$mPDF1->WriteHTML($html);
        $mPDF1->Output('test.pdf','F');
		}
		//sleep(10);
		
		//$printers = Yii::app()->db->createCommand('select * from section where name like "Warm Kitchen"')->queryRow();
		//shell_exec('"C:\\Program Files (x86)\\Adobe\Reader 11.0\\Reader\\AcroRd32.exe" /t "D:\\pdf.pdf"  "ML-2571"');
		//shell_exec('"'.$printers['program'].'" /t "'.str_replace('/','\\\\',Yii::getPathOfAlias('webroot').'/test.pdf').'"  "'.$printers['printer_name'].'"');
		
		//shell_exec('print /d:\\\\Imdad-PC\\ML-2571 D:\\mac.txt');
		$printers_rs = Yii::app()->db->createCommand('select * from section where name !="" and server_name !="" and printer_name !=""')->queryAll();
		//print_r($printers_rs);
		$section_used=0;
		foreach($printers_rs as $kk=>$printers){//sections
		$current = '';
		
		
		//file_get_contents($file);
		
		$kot_sent_ids = array();
		$orderfilter ='';
		if(isset($_POST['tableorder_id'])&&$_POST['tableorder_id']>0){
		$orderfilter = 'and tblord.id='.$_POST['tableorder_id'];	
		}
		$orders = Yii::app()->db->createCommand('select tblord.* from tableorder tblord where tblord.status=0 '.$orderfilter)->queryAll();
		
		
		$printer_data = "\r\n".$printers['name']."\r\n";
		$file = 'kot/'.date('mdHis').Yii::app()->user->id.$kk.'kot.txt';
		
		$kot_items_exists = 0;
		foreach((array)$orders as $order){
		$kot_items_rs = Yii::app()->db->createCommand('select itm.name as item, ordtail.* from  orderdetail ordtail join item itm on ordtail.item_id=itm.id where ordtail.section_id='.$printers['id'].' and tableorder_id='.$order['id'])->queryAll();
		
		
		
		if(count($kot_items_rs)){
		$kot_items_exists = 1;
		$current  .= "\r\n".'-------------------------';
		$order_waiter='nil';
		if($order['waiter_id']>0){$order_waiter=$order['waiter_id'];}else{$order_waiter=$order['check_no'];}
		$current .= "\r\n".$order['tableno'].' / '.$order_waiter;
		$current .= "\r\n".'-------------------------';
		}
		
		foreach($kot_items_rs as $kot_items){
		//$text='Chicken Handi + Chicken Karahi + Shashlik';
		$kot_sent_ids[$kot_items['id']]=$kot_items['id'];
		$text= $kot_items['item'];
		$qty = $kot_items['quantity'];
		$width='33';
		$marker='\r\n';
		
		$wrapped = wordwrap($text, $width, $marker);
		$lines = explode($marker, $wrapped);
		foreach ($lines as $line_index=>$line) 
		{ 
			if($line_index==0){
			$current .= "\r\n".str_pad($line,$width,'-',STR_PAD_RIGHT)."\t".$qty;
			}else{
			$current .= "\r\n".str_pad($line,$width,' ',STR_PAD_RIGHT);	
			}
		}
		
		}
		}
		
		if($kot_items_exists){}else{continue;}
		//if(empty($current)){continue;}
		// Write the contents back to the file
		$current .= "\r\n";
		$current .= "\r\n";
		$current .= "\r\n";
		$current .= "\r\n";
		
		
		$current .= "\r\n";
		$current .= "\r\n";
		$current .= "\r\n";
		$current .= "\r\n";
		$current .= "\r\n";
		$current .= "\r\n";
		$current .= "\r\n";
		$current .= "\r\n";
		
		
		
		$current = $printer_data.$current;
		file_put_contents($file, $current);
		
		$output=array();
		//enable printers for printing
		if($printStatus==1){//in proper section
		if(!empty($printers['server_name'])&&!empty($printers['printer_name']) ){
		//echo 'Section: print /d:"\\\\'.$printers['server_name'].'\\'.$printers['printer_name'].'" '.str_replace('/','\\\\',Yii::getPathOfAlias('webroot').'/'.$file).'';
		exec('print /d:"\\\\'.$printers['server_name'].'\\'.$printers['printer_name'].'" '.str_replace('/','\\\\',Yii::getPathOfAlias('webroot').'/'.$file).'', $output, $return);
		}
		}else if($printStatus==2){//local system
		if(!empty(Yii::app()->session['pos']['server_name'])&&!empty(Yii::app()->session['pos']['printer_name']) ){
		//echo 'Local: print /d:"\\\\'.Yii::app()->session['pos']['server_name'].'\\'.Yii::app()->session['pos']['printer_name'].'" '.str_replace('/','\\\\',Yii::getPathOfAlias('webroot').'/'.$file).'';
		exec('print /d:"\\\\'.Yii::app()->session['pos']['server_name'].'\\'.Yii::app()->session['pos']['printer_name'].'" '.str_replace('/','\\\\',Yii::getPathOfAlias('webroot').'/'.$file).'', $output, $return);
		//shell_exec('print /d:"\\\\'.Yii::app()->session['pos']['server_name'].'\\'.Yii::app()->session['pos']['printer_name'].'" '.str_replace('/','\\\\',Yii::getPathOfAlias('webroot').'/'.$file).'');
		
		}
		}
		
		
		
		$printed = 0;
		
		if(strpos($output[0],'is currently being printed')!==false){
		$printed = 1;
		}
		
		if($printed){$current .= "\r\n Printed\r\n";}else{$current .=  "\r\n Not Printed(".$output[0].")\r\n";}
		$kot_sent_ids = implode(',',$kot_sent_ids);
		
		//update order detail after printing
		if(!empty($kot_sent_ids)){
		Yii::app()->db->createCommand("update orderdetail set section_id=0 where id in ($kot_sent_ids)")->execute();
		}
		//echo '<pre>';
		if( !Yii::app()->request->isAjaxRequest ){
		$current = str_replace("\r\n","<br>",$current);
		}
		
		print_r($current);
		$section_used=1;
		//echo '</pre>';
	 }//end sections 
	
	if(!$section_used){echo 'There is no pending data.';}
		//echo $html;
}//end function
	
	public function actionPrint_old()
	{
		$this->layout='//layouts/print';
		$this->render('print');
	}
	
	public function actionSaleReport()
     {   # mPDF
	 
	 
	 	$date = Yii::app()->db->createCommand("select date_of_tableorder from tableorder order by id desc limit 1")->queryScalar();
		
		//$date = explode(' ',$date_time);
		//$date = substr($date,0,10);
		$orders = Yii::app()->db->createCommand("select tblord.mop, sum(tblord.total) as grandtotal from tableorder tblord  where tblord.date_of_tableorder like '".$date."' and tblord.status=1 group by tblord.mop having grandtotal>0 ")->queryAll();
		
		$mops = Yii::app()->db->createCommand("select * from mop where status=1")->queryAll();
		$mop_arr = CHtml::listData($mops,'id','name');
		
		$current='';
		$printer_data = "\r\n Sale Report (".date('d M, Y',strtotime($date)).") \r\n";
		$grandtotal=0;
		foreach($orders as $kot_items){
		//$text='Chicken Handi + Chicken Karahi + Shashlik';
		//$kot_sent_ids[$kot_items['id']]=$kot_items['id'];
		$text= $mop_arr[$kot_items['mop']]."\t";
		$qty = $kot_items['grandtotal'];
		$width='33';
		$marker='\r\n';
		
		$wrapped = wordwrap($text, $width, $marker);
		$lines = explode($marker, $wrapped);
		
		foreach ($lines as $line_index=>$line) 
		{ 
			if($line_index==0){
			$current .= "\r\n".str_pad($line,$width,'-',STR_PAD_RIGHT)."\t".number_format($qty);
			$grandtotal+=$qty;
			}else{
			$current .= "\r\n".str_pad($line,$width,' ',STR_PAD_RIGHT);	
			}
		}
		
		}
		
		$current .= "\r\n".str_pad('Grand Total',$width,'-',STR_PAD_RIGHT)."\t".number_format($grandtotal);
		
		
		//================================= GST/Discount =======================
		
		$gst_discount = Yii::app()->db->createCommand("select sum(tblord.gst) as gst,sum(tblord.discount) as discount from tableorder tblord join mop m on tblord.mop=m.id where tblord.date_of_tableorder like '".$date."'")->queryRow();
		
		//$current='';
		//$current .= "\r\n Sale Report (".date('d M, Y',strtotime($date)).") \r\n";
		$orders=array(
		array('title'=>'GST','value'=>$gst_discount['gst']),
		array('title'=>'Discount','value'=>$gst_discount['discount'])
		);
		foreach($orders as $kot_items){
		//$text='Chicken Handi + Chicken Karahi + Shashlik';
		if($kot_items['value']>0){
		//$kot_sent_ids[$kot_items['id']]=$kot_items['id'];
		$text= $kot_items['title'];
		$qty = $kot_items['value'];
		$width='33';
		$marker='\r\n';
		
		$wrapped = wordwrap($text, $width, $marker);
		$lines = explode($marker, $wrapped);
		foreach ($lines as $line_index=>$line) 
		{ 
			if($line_index==0){
			$current .= "\r\n".str_pad($line,$width,'-',STR_PAD_RIGHT)."\t".$qty;
			}else{
			$current .= "\r\n".str_pad($line,$width,' ',STR_PAD_RIGHT);	
			}
		}
		}
		}
		//=============================================================================
		$current .= "\r\n";
		$current .= "\r\n";
		$current .= "\r\n";
		$current .= "\r\n";
		
		$output=array();
		
		$file = 'kot/'.date('mdHis-').Yii::app()->user->id.'-salereport.txt';

		$current = $printer_data.$current;
		file_put_contents($file, $current);


		//enable printers for printing
		if(!empty(Yii::app()->session['pos']['server_name'])&&!empty(Yii::app()->session['pos']['printer_name']) ){
		//echo 'Local: print /d:"\\\\'.Yii::app()->session['pos']['server_name'].'\\'.Yii::app()->session['pos']['printer_name'].'" '.str_replace('/','\\\\',Yii::getPathOfAlias('webroot').'/'.$file).'';
		exec('print /d:"\\\\'.Yii::app()->session['pos']['server_name'].'\\'.Yii::app()->session['pos']['printer_name'].'" '.str_replace('/','\\\\',Yii::getPathOfAlias('webroot').'/'.$file).'', $output, $return);
		//shell_exec('print /d:"\\\\'.Yii::app()->session['pos']['server_name'].'\\'.Yii::app()->session['pos']['printer_name'].'" '.str_replace('/','\\\\',Yii::getPathOfAlias('webroot').'/'.$file).'');
		
		}
		
		
		
		
		$printed = 0;
		
		if(strpos($output[0],'is currently being printed')!==false){
		$printed = 1;
		}
		
		if($printed){$current .= "\r\n Printed\r\n";}else{$current .=  "\r\n Not Printed(".$output[0].")\r\n";}
		
		
		
		
		if( !Yii::app()->request->isAjaxRequest ){
		$current = str_replace("\r\n","<br>",$current);
		}
		
		print_r($current);
		
		
	 }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout='//layouts/main';
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	protected function performAjaxValidation($model)
	{
	if(isset($_POST['ajax']) && $_POST['ajax']==='categories-form')
	{
	echo CActiveForm::validate($model);
	Yii::app()->end();
	}
}

}