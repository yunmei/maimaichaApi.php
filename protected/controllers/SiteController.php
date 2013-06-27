<?php

class SiteController extends Controller
{

	public function actionIndex()
	{
		echo '11';
		echo sign('sdf');
		
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
	    	//else
	        	//$this->render('error', $error);
	    }
	}
	
}