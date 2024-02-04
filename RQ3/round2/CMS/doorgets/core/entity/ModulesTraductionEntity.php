<?php 

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2015 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/t/en/?contact
    
/*******************************************************************************
    -= One life, One code =-
/*******************************************************************************
    
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
    
******************************************************************************
******************************************************************************/

class ModulesTraductionEntity extends AbstractEntity
{

	

	/**
	* @type  : int
	* @size  : 11 
	* @key   : PRIMARY KEY 
	* @extra : AUTO INCREMENT
	*/
	protected $Id; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $IdModule; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Langue; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Nom; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Titre; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $Description; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $SendMailTo; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $TopTinymce; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $BottomTinymce; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $Extras; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $SendMailUser; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $SendMailName; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $SendMailEmail; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $SendMailSujet; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $SendMailMessage; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaTitre; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaDescription; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaKeys; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaFacebookType; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaFacebookTitre; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaFacebookDescription; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaFacebookImage; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaTwitterType; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaTwitterTitre; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaTwitterDescription; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaTwitterImage; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaTwitterPlayer; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateModification; 
 
	

	public function setId($Id) {
		$this->Id = $Id;
		return $this;
	} 
	

	public function setIdModule($IdModule) {
		$this->IdModule = $IdModule;
		return $this;
	} 
	

	public function setLangue($Langue) {
		$this->Langue = $Langue;
		return $this;
	} 
	

	public function setNom($Nom) {
		$this->Nom = $Nom;
		return $this;
	} 
	

	public function setTitre($Titre) {
		$this->Titre = $Titre;
		return $this;
	} 
	

	public function setDescription($Description) {
		$this->Description = $Description;
		return $this;
	} 
	

	public function setSendMailTo($SendMailTo) {
		$this->SendMailTo = $SendMailTo;
		return $this;
	} 
	

	public function setTopTinymce($TopTinymce) {
		$this->TopTinymce = $TopTinymce;
		return $this;
	} 
	

	public function setBottomTinymce($BottomTinymce) {
		$this->BottomTinymce = $BottomTinymce;
		return $this;
	} 
	

	public function setExtras($Extras) {
		$this->Extras = $Extras;
		return $this;
	} 
	

	public function setSendMailUser($SendMailUser) {
		$this->SendMailUser = $SendMailUser;
		return $this;
	} 
	

	public function setSendMailName($SendMailName) {
		$this->SendMailName = $SendMailName;
		return $this;
	} 
	

	public function setSendMailEmail($SendMailEmail) {
		$this->SendMailEmail = $SendMailEmail;
		return $this;
	} 
	

	public function setSendMailSujet($SendMailSujet) {
		$this->SendMailSujet = $SendMailSujet;
		return $this;
	} 
	

	public function setSendMailMessage($SendMailMessage) {
		$this->SendMailMessage = $SendMailMessage;
		return $this;
	} 
	

	public function setMetaTitre($MetaTitre) {
		$this->MetaTitre = $MetaTitre;
		return $this;
	} 
	

	public function setMetaDescription($MetaDescription) {
		$this->MetaDescription = $MetaDescription;
		return $this;
	} 
	

	public function setMetaKeys($MetaKeys) {
		$this->MetaKeys = $MetaKeys;
		return $this;
	} 
	

	public function setMetaFacebookType($MetaFacebookType) {
		$this->MetaFacebookType = $MetaFacebookType;
		return $this;
	} 
	

	public function setMetaFacebookTitre($MetaFacebookTitre) {
		$this->MetaFacebookTitre = $MetaFacebookTitre;
		return $this;
	} 
	

	public function setMetaFacebookDescription($MetaFacebookDescription) {
		$this->MetaFacebookDescription = $MetaFacebookDescription;
		return $this;
	} 
	

	public function setMetaFacebookImage($MetaFacebookImage) {
		$this->MetaFacebookImage = $MetaFacebookImage;
		return $this;
	} 
	

	public function setMetaTwitterType($MetaTwitterType) {
		$this->MetaTwitterType = $MetaTwitterType;
		return $this;
	} 
	

	public function setMetaTwitterTitre($MetaTwitterTitre) {
		$this->MetaTwitterTitre = $MetaTwitterTitre;
		return $this;
	} 
	

	public function setMetaTwitterDescription($MetaTwitterDescription) {
		$this->MetaTwitterDescription = $MetaTwitterDescription;
		return $this;
	} 
	

	public function setMetaTwitterImage($MetaTwitterImage) {
		$this->MetaTwitterImage = $MetaTwitterImage;
		return $this;
	} 
	

	public function setMetaTwitterPlayer($MetaTwitterPlayer) {
		$this->MetaTwitterPlayer = $MetaTwitterPlayer;
		return $this;
	} 
	

	public function setDateModification($DateModification) {
		$this->DateModification = $DateModification;
		return $this;
	} 


	public function getId() {
		return $this->Id ;
	} 

	public function getIdModule() {
		return $this->IdModule ;
	} 

	public function getLangue() {
		return $this->Langue ;
	} 

	public function getNom() {
		return $this->Nom ;
	} 

	public function getTitre() {
		return $this->Titre ;
	} 

	public function getDescription() {
		return $this->Description ;
	} 

	public function getSendMailTo() {
		return $this->SendMailTo ;
	} 

	public function getTopTinymce() {
		return $this->TopTinymce ;
	} 

	public function getBottomTinymce() {
		return $this->BottomTinymce ;
	} 

	public function getExtras() {
		return $this->Extras ;
	} 

	public function getSendMailUser() {
		return $this->SendMailUser ;
	} 

	public function getSendMailName() {
		return $this->SendMailName ;
	} 

	public function getSendMailEmail() {
		return $this->SendMailEmail ;
	} 

	public function getSendMailSujet() {
		return $this->SendMailSujet ;
	} 

	public function getSendMailMessage() {
		return $this->SendMailMessage ;
	} 

	public function getMetaTitre() {
		return $this->MetaTitre ;
	} 

	public function getMetaDescription() {
		return $this->MetaDescription ;
	} 

	public function getMetaKeys() {
		return $this->MetaKeys ;
	} 

	public function getMetaFacebookType() {
		return $this->MetaFacebookType ;
	} 

	public function getMetaFacebookTitre() {
		return $this->MetaFacebookTitre ;
	} 

	public function getMetaFacebookDescription() {
		return $this->MetaFacebookDescription ;
	} 

	public function getMetaFacebookImage() {
		return $this->MetaFacebookImage ;
	} 

	public function getMetaTwitterType() {
		return $this->MetaTwitterType ;
	} 

	public function getMetaTwitterTitre() {
		return $this->MetaTwitterTitre ;
	} 

	public function getMetaTwitterDescription() {
		return $this->MetaTwitterDescription ;
	} 

	public function getMetaTwitterImage() {
		return $this->MetaTwitterImage ;
	} 

	public function getMetaTwitterPlayer() {
		return $this->MetaTwitterPlayer ;
	} 

	public function getDateModification() {
		return $this->DateModification ;
	} 

		
	public function getValidationId() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => true,
			'auto_increment' => true
		);
	} 
		
	public function getValidationIdModule() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationLangue() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationNom() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationTitre() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDescription() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationSendMailTo() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationTopTinymce() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationBottomTinymce() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationExtras() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationSendMailUser() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationSendMailName() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationSendMailEmail() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationSendMailSujet() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationSendMailMessage() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaTitre() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaDescription() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaKeys() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaFacebookType() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaFacebookTitre() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaFacebookDescription() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaFacebookImage() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaTwitterType() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaTwitterTitre() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaTwitterDescription() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaTwitterImage() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaTwitterPlayer() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDateModification() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 


	public function _getMap() { 
		$parentMap = parent::_getMap();
		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'IdModule' =>  'id_module',            
		    'Langue' =>  'langue',            
		    'Nom' =>  'nom',            
		    'Titre' =>  'titre',            
		    'Description' =>  'description',            
		    'SendMailTo' =>  'send_mail_to',            
		    'TopTinymce' =>  'top_tinymce',            
		    'BottomTinymce' =>  'bottom_tinymce',            
		    'Extras' =>  'extras',            
		    'SendMailUser' =>  'send_mail_user',            
		    'SendMailName' =>  'send_mail_name',            
		    'SendMailEmail' =>  'send_mail_email',            
		    'SendMailSujet' =>  'send_mail_sujet',            
		    'SendMailMessage' =>  'send_mail_message',            
		    'MetaTitre' =>  'meta_titre',            
		    'MetaDescription' =>  'meta_description',            
		    'MetaKeys' =>  'meta_keys',            
		    'MetaFacebookType' =>  'meta_facebook_type',            
		    'MetaFacebookTitre' =>  'meta_facebook_titre',            
		    'MetaFacebookDescription' =>  'meta_facebook_description',            
		    'MetaFacebookImage' =>  'meta_facebook_image',            
		    'MetaTwitterType' =>  'meta_twitter_type',            
		    'MetaTwitterTitre' =>  'meta_twitter_titre',            
		    'MetaTwitterDescription' =>  'meta_twitter_description',            
		    'MetaTwitterImage' =>  'meta_twitter_image',            
		    'MetaTwitterPlayer' =>  'meta_twitter_player',            
		    'DateModification' =>  'date_modification',		
		));
	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}