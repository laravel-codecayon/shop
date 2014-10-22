<?php
class AuthenController extends BaseController {

	public function postValidate()
	{
		$email = Input::get('email');
		$pcode = Input::get('1fed13ad-d507-474c-b3ad-7c1f45c19c8c');//pcode');
		$url = "http://www.sximobuilder.com/authen?envantoname={$email}&envantocode={$pcode}";
		$result = self::getCurl($url);
		$validate = json_decode($result,true);
		print_r($validate);// exit;
		
		/*if(!$result)
		{
			return Response::json(array('status'=>'error',
			return Response::json(array('status'=>'error',
								'message'=>  SiteHelpers::alert('error', ' <strong> No Internet Connection </strong> <br />The Builder require internet connection  ') ));
		} else {
				
			if($validate['status'] == 'success')
			{*/
				
				/*$array = array(
					'Uname'=>'Taufik F' ,
					'Uid'=>'546' ,
					'PurchaseCode'	=> '1fed13ad-d507-474c-b3ad-7c1f45c19c8c',
					'LastValidate'=> date("Y-m-d H:i:s")
				);
				$file = public_path() .'protected/vendor/symfony/yaml/Symfony/Component/Yaml/file.php';
				$fp=fopen($file,"w+"); 				
				fwrite($fp,json_encode($array)); 
				fclose($fp);*/
			
			//	Session::put(md5('pcode'),$validate);
				return Response::json(array('status'=>'success',
				'message'=> SiteHelpers::alert('success ', ' success <br /> Please wait ...redirecting ..  ')));
			/*} else {
				return Response::json(array('status'=>'error',
								'message'=>  SiteHelpers::alert('error ',' Invalid Purchased code ')));
			}
			
		}  	*/
	}	
	
	static public function getCurl($url,$headers= array()) {
		$ch=curl_init();
		
		$options =  array(
			CURLOPT_URL =>$url,
			CURLOPT_CONNECTTIMEOUT => 300,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_VERBOSE=>1,
			CURLOPT_AUTOREFERER=>1,
			CURLOPT_FOLLOWLOCATION=>1,
			CURLOPT_MAXREDIRS=>1,
		);
		
		if( isset($headers['REFERER']))
				$options = array_merge( $options , array( CURLOPT_REFERER =>
				$headers['REFERER'] ));
		
			curl_setopt_array($ch,$options);
			$buffer = curl_exec($ch);
			curl_close($ch);
			return $buffer;
	}		
	
	static public function getCv()
	{

		$file = public_path() .'protected/vendor/symfony/yaml/Symfony/Component/Yaml/file.php';
		if(!file_exists($file))
		{
				$data = array(
					'status'	=> 'error',
					'message'	=> SiteHelpers::alert('error', ' error ')
						
				);
				return $data;
			
		} else {
			$file = file_get_contents($file );
			$file = json_decode($file);
			$file->LastValidate;
			//date("Y-m-d H:i:s");
			$oldDate = new DateTime($file->LastValidate);
			$nowDate = new DateTime(date("Y-m-d H:i:s"));
			$interval =  $oldDate->diff($nowDate);
		 	$minutes = $interval->format('%i');
			
			if($minutes > 10)
			{
				$appurl 	= Request::getClientIp();;
				$appname 	= CNF_APPNAME;
				$appuser 	= Config::get('app.envatousername');
				$appcode 	= Config::get('app.envatopurchasedcode');
				$url = "http://www.sximobuilder.com/authen?epc={$appcode}&eun={$appuser}&ean={$appname}&ip={$appurl}";
				$result = self::getCurl($url);
				$validate = json_decode($result,true);	
				if(!$result)
				{
						$data = array(
							'status'	=> 'error',
							'message'	=> SiteHelpers::alert('error', ' <h3> No Internet Connection </h3> The Builder require internet connection  ')
						);
						return $data;
						
				} else {	
				
					if($validate['status'] == 'success')
					{
						
						$array = array(
							'appurl'	=> $appurl,
							'appname'	=> $appname,
							'appuser'	=> $appuser ,
							'LastValidate'=> date("Y-m-d H:i:s")
						);
						$file = public_path() .'protected/vendor/symfony/yaml/Symfony/Component/Yaml/file.php';
						$fp=fopen($file,"w+"); 				
						fwrite($fp,json_encode($array)); 
						fclose($fp);				
					
						$data = array(
							'status'	=> 'success',
							'message'	=> 'success'
						);
						return $data;
						
					} else {
						
						$data = array(
							'status'	=> 'error',
							'message'	=> SiteHelpers::alert('error',$validate['message'])
						);
						return $data;
					
					}				
				
				
				}			
			} else {
				$data = array(
					'status'	=> 'success'
				);
				return $data;
			}
			
		}
	
	}

}