<?php
class ReportsController extends Controller //SBaseController
{
	public function actionIndex()
	{
		$cs = Yii::app()->clientScript;
			
		//$cs->scriptMap['bootstrap-yii.css'] = false;
		//$cs->scriptMap['bootstrap.min.css'] = false;
		//$cs->scriptMap['bootstrap-notify.css'] = false;
		//$cs->scriptMap['jquery-ui-bootstrap.css'] = false;
		
		if($_POST['report_type']){
			
			//print_r($_POST); exit;
			
			$report_type = $_POST['report_type'];
			$from_date = $_POST['from_date'];
			$to_date = $_POST['to_date'];			
			$recruiting_agency = $_POST['recruiting_agency'];
			
		
			$data = array('report_type'=>$report_type,'from_date'=>$from_date,'to_date'=>$to_date, 'recruiting_agency'=>$recruiting_agency);			
					
			if($_POST[report_type]=='1'){ //log sheet
				$this->layout = '//layouts/print';
				$this->render('dailylogsheet', array('data'=>$data)); exit();	
			}
			else if($_POST[report_type]=='2'){ //cash report
				$this->layout = '//layouts/print';
				$this->render('cash_payments', array('data'=>$data)); exit();	
			}
			else if($_POST[report_type]=='3'){ //recruiting_agencies report
				$this->layout = '//layouts/print';
				$this->render('recruiting_agencies', array('data'=>$data)); exit();	
			}
			else if($_POST[report_type]=='4'){ //recruiting_agencies report
				$this->layout = '//layouts/print';
				$this->render('recruiting_agencies', array('data'=>$data)); exit();	
			}
		}
		
		$this->render('index');
	}
	
	////////////////////////////////////////////////



}