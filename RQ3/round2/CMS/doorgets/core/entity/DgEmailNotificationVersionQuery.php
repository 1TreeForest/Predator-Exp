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

class DgEmailNotificationVersionQuery extends AbstractQuery 
{

	protected $_table = '_dg_email_notification_version';
    
    protected $_className = 'DgEmailNotificationVersion';

    public function __construct(&$doorGets = null) {
        parent::__construct($doorGets);
    }

	protected $_pk = 'id';

	public function _getPk() {
		return $this->_pk;
	} 

	public function findByPK($Id) {
		$this->_findBy['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function findById($Id) {
		$this->_findBy['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function findRangeById($from,$to) {
		$this->_findRangeBy['Id'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanById($int) {
		$this->_findGreaterThanBy['Id'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanById($int) {
		$this->_findLessThanBy['Id'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByIdContent($IdContent) {
		$this->_findBy['IdContent'] =  $IdContent;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdContent($from,$to) {
		$this->_findRangeBy['IdContent'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdContent($int) {
		$this->_findGreaterThanBy['IdContent'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdContent($int) {
		$this->_findLessThanBy['IdContent'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByTitle($Title) {
		$this->_findBy['Title'] =  $Title;
		$this->_load();
		return $this;
	} 
		
	public function findByPseudo($Pseudo) {
		$this->_findBy['Pseudo'] =  $Pseudo;
		$this->_load();
		return $this;
	} 
		
	public function findByIdUser($IdUser) {
		$this->_findBy['IdUser'] =  $IdUser;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdUser($from,$to) {
		$this->_findRangeBy['IdUser'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdUser($int) {
		$this->_findGreaterThanBy['IdUser'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdUser($int) {
		$this->_findLessThanBy['IdUser'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByIdGroupe($IdGroupe) {
		$this->_findBy['IdGroupe'] =  $IdGroupe;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdGroupe($from,$to) {
		$this->_findRangeBy['IdGroupe'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdGroupe($int) {
		$this->_findGreaterThanBy['IdGroupe'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdGroupe($int) {
		$this->_findLessThanBy['IdGroupe'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByLangue($Langue) {
		$this->_findBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByType($Type) {
		$this->_findBy['Type'] =  $Type;
		$this->_load();
		return $this;
	} 
		
	public function findBySubject($Subject) {
		$this->_findBy['Subject'] =  $Subject;
		$this->_load();
		return $this;
	} 
		
	public function findByMessageTinymce($MessageTinymce) {
		$this->_findBy['MessageTinymce'] =  $MessageTinymce;
		$this->_load();
		return $this;
	} 
		
	public function findByDateCreation($DateCreation) {
		$this->_findBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDateCreation($from,$to) {
		$this->_findRangeBy['DateCreation'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDateCreation($int) {
		$this->_findGreaterThanBy['DateCreation'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDateCreation($int) {
		$this->_findLessThanBy['DateCreation'] = $int;
		$this->_load();
		return $this;
	} 

		
	public function findOneById($Id) {
		$this->_findOneBy['Id'] =  $Id;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdContent($IdContent) {
		$this->_findOneBy['IdContent'] =  $IdContent;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTitle($Title) {
		$this->_findOneBy['Title'] =  $Title;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPseudo($Pseudo) {
		$this->_findOneBy['Pseudo'] =  $Pseudo;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdUser($IdUser) {
		$this->_findOneBy['IdUser'] =  $IdUser;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdGroupe($IdGroupe) {
		$this->_findOneBy['IdGroupe'] =  $IdGroupe;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLangue($Langue) {
		$this->_findOneBy['Langue'] =  $Langue;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByType($Type) {
		$this->_findOneBy['Type'] =  $Type;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySubject($Subject) {
		$this->_findOneBy['Subject'] =  $Subject;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMessageTinymce($MessageTinymce) {
		$this->_findOneBy['MessageTinymce'] =  $MessageTinymce;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateCreation($DateCreation) {
		$this->_findOneBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this->_result;
	} 

		
	public function findByLikeId($Id) {
		$this->_findByLike['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdContent($IdContent) {
		$this->_findByLike['IdContent'] =  $IdContent;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTitle($Title) {
		$this->_findByLike['Title'] =  $Title;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePseudo($Pseudo) {
		$this->_findByLike['Pseudo'] =  $Pseudo;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdUser($IdUser) {
		$this->_findByLike['IdUser'] =  $IdUser;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdGroupe($IdGroupe) {
		$this->_findByLike['IdGroupe'] =  $IdGroupe;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLangue($Langue) {
		$this->_findByLike['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeType($Type) {
		$this->_findByLike['Type'] =  $Type;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSubject($Subject) {
		$this->_findByLike['Subject'] =  $Subject;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMessageTinymce($MessageTinymce) {
		$this->_findByLike['MessageTinymce'] =  $MessageTinymce;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateCreation($DateCreation) {
		$this->_findByLike['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this;
	} 

		
	public function filterById($Id, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Id',$Id,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeById($from,$to) {
		$this->_filterRangeBy['Id'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanById($int) {
		$this->_filterGreaterThanBy['Id'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanById($int) {
		$this->_filterLessThanBy['Id'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByIdContent($IdContent, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdContent',$IdContent,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdContent($from,$to) {
		$this->_filterRangeBy['IdContent'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdContent($int) {
		$this->_filterGreaterThanBy['IdContent'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdContent($int) {
		$this->_filterLessThanBy['IdContent'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByTitle($Title, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Title',$Title,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPseudo($Pseudo, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Pseudo',$Pseudo,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByIdUser($IdUser, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdUser',$IdUser,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdUser($from,$to) {
		$this->_filterRangeBy['IdUser'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdUser($int) {
		$this->_filterGreaterThanBy['IdUser'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdUser($int) {
		$this->_filterLessThanBy['IdUser'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByIdGroupe($IdGroupe, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdGroupe',$IdGroupe,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdGroupe($from,$to) {
		$this->_filterRangeBy['IdGroupe'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdGroupe($int) {
		$this->_filterGreaterThanBy['IdGroupe'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdGroupe($int) {
		$this->_filterLessThanBy['IdGroupe'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByLangue($Langue, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Langue',$Langue,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByType($Type, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Type',$Type,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySubject($Subject, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Subject',$Subject,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByMessageTinymce($MessageTinymce, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('MessageTinymce',$MessageTinymce,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByDateCreation($DateCreation, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateCreation',$DateCreation,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDateCreation($from,$to) {
		$this->_filterRangeBy['DateCreation'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDateCreation($int) {
		$this->_filterGreaterThanBy['DateCreation'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDateCreation($int) {
		$this->_filterLessThanBy['DateCreation'] = $int;
		$this->_load();
		return $this;
	} 

		
	public function filterLikeById($Id) {
		$this->_filterLikeBy['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdContent($IdContent) {
		$this->_filterLikeBy['IdContent'] =  $IdContent;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTitle($Title) {
		$this->_filterLikeBy['Title'] =  $Title;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPseudo($Pseudo) {
		$this->_filterLikeBy['Pseudo'] =  $Pseudo;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdUser($IdUser) {
		$this->_filterLikeBy['IdUser'] =  $IdUser;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdGroupe($IdGroupe) {
		$this->_filterLikeBy['IdGroupe'] =  $IdGroupe;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLangue($Langue) {
		$this->_filterLikeBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByType($Type) {
		$this->_filterLikeBy['Type'] =  $Type;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySubject($Subject) {
		$this->_filterLikeBy['Subject'] =  $Subject;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMessageTinymce($MessageTinymce) {
		$this->_filterLikeBy['MessageTinymce'] =  $MessageTinymce;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateCreation($DateCreation) {
		$this->_filterLikeBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this;
	} 

		
	public function orderById($direction = 'ASC') {
		$this->loadDirection('id',$direction);
		return $this;
	} 
		
	public function orderByIdContent($direction = 'ASC') {
		$this->loadDirection('id_content',$direction);
		return $this;
	} 
		
	public function orderByTitle($direction = 'ASC') {
		$this->loadDirection('title',$direction);
		return $this;
	} 
		
	public function orderByPseudo($direction = 'ASC') {
		$this->loadDirection('pseudo',$direction);
		return $this;
	} 
		
	public function orderByIdUser($direction = 'ASC') {
		$this->loadDirection('id_user',$direction);
		return $this;
	} 
		
	public function orderByIdGroupe($direction = 'ASC') {
		$this->loadDirection('id_groupe',$direction);
		return $this;
	} 
		
	public function orderByLangue($direction = 'ASC') {
		$this->loadDirection('langue',$direction);
		return $this;
	} 
		
	public function orderByType($direction = 'ASC') {
		$this->loadDirection('type',$direction);
		return $this;
	} 
		
	public function orderBySubject($direction = 'ASC') {
		$this->loadDirection('subject',$direction);
		return $this;
	} 
		
	public function orderByMessageTinymce($direction = 'ASC') {
		$this->loadDirection('message_tinymce',$direction);
		return $this;
	} 
		
	public function orderByDateCreation($direction = 'ASC') {
		$this->loadDirection('date_creation',$direction);
		return $this;
	} 


	public function _getMap() { 
		$parentMap = parent::_getMap();
		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'IdContent' =>  'id_content',            
		    'Title' =>  'title',            
		    'Pseudo' =>  'pseudo',            
		    'IdUser' =>  'id_user',            
		    'IdGroupe' =>  'id_groupe',            
		    'Langue' =>  'langue',            
		    'Type' =>  'type',            
		    'Subject' =>  'subject',            
		    'MessageTinymce' =>  'message_tinymce',            
		    'DateCreation' =>  'date_creation',		
		));
	} 


}