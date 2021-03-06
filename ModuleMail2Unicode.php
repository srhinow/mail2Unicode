<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');
/**
 * TYPOlight webCMS
 * Copyright (C) 2005-2009 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 */


/**
 * Class ModuleMail2Unicode
 *
 * @copyright  sr-tag 2011 
 * @author     sr-tag Sven Rhinow Webentwicklung <support@sr-tag.de>
 * @package    mail2Unicode 
 */
class ModuleMail2Unicode extends Module
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_mail2unicode';

        /**
        * error files and layer
        * @var bool
        */
        protected $error = false;
        
                
	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### MAIL2UNICODE ###';

			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'typolight/main.php?do=modules&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		return parent::generate();
	}


	/**
	 * Generate module
	 */
	protected function compile()
	{
	    global $objPage;
	    
	    $inputEmail = new FormTextField();
	    $inputEmail->id = 'email';
	    $inputEmail->name = 'email';
	    $inputEmail->label = 'Email';
	    $inputEmail->mandatory = true;	    
	    $inputEmail->value = '';
		 
	    if($this->Input->post('FORM_SUBMIT')=='mail_2_unicode')
	    {
		$email = $this->Input->post('email');  
		$inputEmail->validate();
	      
		//auf Fehler pruefen
		if(strlen($inputEmail->getErrorAsString())) $this->error = true;	      
		
		if(!$this->error)
		{
		        
		        //nur Email unicoden
		        $ucemail = '';
		        
			for($i=0;$i<strlen($email);$i++){
			    $ucemail.="&#".ord($email[$i]).";";
			}
			$this->Template->ucEmail = $ucemail;
			$this->Template->uceEmail= htmlentities($ucemail);
			//mailto mit email unicoden
			$ucmailto = '';
			$mailto="mailto:".$email;
			
			for($i=0;$i<strlen($mailto);$i++){
			    $ucmailto.="&#".ord($mailto[$i]).";";
			}
			$this->Template->ucMailTo = $ucmailto;
			$this->Template->uceMailTo = htmlentities($ucmailto);
		}

            }
            $pageId = ($this->m2u_jumpTo)? $this->m2u_jumpTo : $objPage->id;           
				
            $this->Template->action = $pageId;
            $this->Template->inputEmail = $inputEmail;			   
		   		
	   	  	   
	}

}