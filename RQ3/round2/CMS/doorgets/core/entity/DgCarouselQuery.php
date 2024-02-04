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

class DgCarouselQuery extends AbstractQuery 
{

	protected $_table = '_dg_carousel';
    
    protected $_className = 'DgCarousel';

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
		
	public function findByUri($Uri) {
		$this->_findBy['Uri'] =  $Uri;
		$this->_load();
		return $this;
	} 
		
	public function findByGroupeTraduction($GroupeTraduction) {
		$this->_findBy['GroupeTraduction'] =  $GroupeTraduction;
		$this->_load();
		return $this;
	} 
		
	public function findByType($Type) {
		$this->_findBy['Type'] =  $Type;
		$this->_load();
		return $this;
	} 
		
	public function findByAutoPlay($AutoPlay) {
		$this->_findBy['AutoPlay'] =  $AutoPlay;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByAutoPlay($from,$to) {
		$this->_findRangeBy['AutoPlay'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByAutoPlay($int) {
		$this->_findGreaterThanBy['AutoPlay'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByAutoPlay($int) {
		$this->_findLessThanBy['AutoPlay'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByStopOnHover($StopOnHover) {
		$this->_findBy['StopOnHover'] =  $StopOnHover;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByStopOnHover($from,$to) {
		$this->_findRangeBy['StopOnHover'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByStopOnHover($int) {
		$this->_findGreaterThanBy['StopOnHover'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByStopOnHover($int) {
		$this->_findLessThanBy['StopOnHover'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByNavigation($Navigation) {
		$this->_findBy['Navigation'] =  $Navigation;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByNavigation($from,$to) {
		$this->_findRangeBy['Navigation'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByNavigation($int) {
		$this->_findGreaterThanBy['Navigation'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByNavigation($int) {
		$this->_findLessThanBy['Navigation'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByItemsCount($ItemsCount) {
		$this->_findBy['ItemsCount'] =  $ItemsCount;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByItemsCount($from,$to) {
		$this->_findRangeBy['ItemsCount'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByItemsCount($int) {
		$this->_findGreaterThanBy['ItemsCount'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByItemsCount($int) {
		$this->_findLessThanBy['ItemsCount'] = $int;
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
		
	public function findByDateModification($DateModification) {
		$this->_findBy['DateModification'] =  $DateModification;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDateModification($from,$to) {
		$this->_findRangeBy['DateModification'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDateModification($int) {
		$this->_findGreaterThanBy['DateModification'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDateModification($int) {
		$this->_findLessThanBy['DateModification'] = $int;
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

		
	public function findOneById($Id) {
		$this->_findOneBy['Id'] =  $Id;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUri($Uri) {
		$this->_findOneBy['Uri'] =  $Uri;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByGroupeTraduction($GroupeTraduction) {
		$this->_findOneBy['GroupeTraduction'] =  $GroupeTraduction;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByType($Type) {
		$this->_findOneBy['Type'] =  $Type;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAutoPlay($AutoPlay) {
		$this->_findOneBy['AutoPlay'] =  $AutoPlay;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByStopOnHover($StopOnHover) {
		$this->_findOneBy['StopOnHover'] =  $StopOnHover;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByNavigation($Navigation) {
		$this->_findOneBy['Navigation'] =  $Navigation;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByItemsCount($ItemsCount) {
		$this->_findOneBy['ItemsCount'] =  $ItemsCount;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateCreation($DateCreation) {
		$this->_findOneBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateModification($DateModification) {
		$this->_findOneBy['DateModification'] =  $DateModification;
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

		
	public function findByLikeId($Id) {
		$this->_findByLike['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUri($Uri) {
		$this->_findByLike['Uri'] =  $Uri;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeGroupeTraduction($GroupeTraduction) {
		$this->_findByLike['GroupeTraduction'] =  $GroupeTraduction;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeType($Type) {
		$this->_findByLike['Type'] =  $Type;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAutoPlay($AutoPlay) {
		$this->_findByLike['AutoPlay'] =  $AutoPlay;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeStopOnHover($StopOnHover) {
		$this->_findByLike['StopOnHover'] =  $StopOnHover;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeNavigation($Navigation) {
		$this->_findByLike['Navigation'] =  $Navigation;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeItemsCount($ItemsCount) {
		$this->_findByLike['ItemsCount'] =  $ItemsCount;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateCreation($DateCreation) {
		$this->_findByLike['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateModification($DateModification) {
		$this->_findByLike['DateModification'] =  $DateModification;
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
		
	public function filterByUri($Uri, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Uri',$Uri,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByGroupeTraduction($GroupeTraduction, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('GroupeTraduction',$GroupeTraduction,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByType($Type, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Type',$Type,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByAutoPlay($AutoPlay, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('AutoPlay',$AutoPlay,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByAutoPlay($from,$to) {
		$this->_filterRangeBy['AutoPlay'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByAutoPlay($int) {
		$this->_filterGreaterThanBy['AutoPlay'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByAutoPlay($int) {
		$this->_filterLessThanBy['AutoPlay'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByStopOnHover($StopOnHover, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('StopOnHover',$StopOnHover,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByStopOnHover($from,$to) {
		$this->_filterRangeBy['StopOnHover'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByStopOnHover($int) {
		$this->_filterGreaterThanBy['StopOnHover'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByStopOnHover($int) {
		$this->_filterLessThanBy['StopOnHover'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByNavigation($Navigation, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Navigation',$Navigation,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByNavigation($from,$to) {
		$this->_filterRangeBy['Navigation'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByNavigation($int) {
		$this->_filterGreaterThanBy['Navigation'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByNavigation($int) {
		$this->_filterLessThanBy['Navigation'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByItemsCount($ItemsCount, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ItemsCount',$ItemsCount,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByItemsCount($from,$to) {
		$this->_filterRangeBy['ItemsCount'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByItemsCount($int) {
		$this->_filterGreaterThanBy['ItemsCount'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByItemsCount($int) {
		$this->_filterLessThanBy['ItemsCount'] = $int;
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
		
	public function filterByDateModification($DateModification, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateModification',$DateModification,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDateModification($from,$to) {
		$this->_filterRangeBy['DateModification'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDateModification($int) {
		$this->_filterGreaterThanBy['DateModification'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDateModification($int) {
		$this->_filterLessThanBy['DateModification'] = $int;
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

		
	public function filterLikeById($Id) {
		$this->_filterLikeBy['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUri($Uri) {
		$this->_filterLikeBy['Uri'] =  $Uri;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByGroupeTraduction($GroupeTraduction) {
		$this->_filterLikeBy['GroupeTraduction'] =  $GroupeTraduction;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByType($Type) {
		$this->_filterLikeBy['Type'] =  $Type;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAutoPlay($AutoPlay) {
		$this->_filterLikeBy['AutoPlay'] =  $AutoPlay;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByStopOnHover($StopOnHover) {
		$this->_filterLikeBy['StopOnHover'] =  $StopOnHover;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByNavigation($Navigation) {
		$this->_filterLikeBy['Navigation'] =  $Navigation;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByItemsCount($ItemsCount) {
		$this->_filterLikeBy['ItemsCount'] =  $ItemsCount;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateCreation($DateCreation) {
		$this->_filterLikeBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateModification($DateModification) {
		$this->_filterLikeBy['DateModification'] =  $DateModification;
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

		
	public function orderById($direction = 'ASC') {
		$this->loadDirection('id',$direction);
		return $this;
	} 
		
	public function orderByUri($direction = 'ASC') {
		$this->loadDirection('uri',$direction);
		return $this;
	} 
		
	public function orderByGroupeTraduction($direction = 'ASC') {
		$this->loadDirection('groupe_traduction',$direction);
		return $this;
	} 
		
	public function orderByType($direction = 'ASC') {
		$this->loadDirection('type',$direction);
		return $this;
	} 
		
	public function orderByAutoPlay($direction = 'ASC') {
		$this->loadDirection('auto_play',$direction);
		return $this;
	} 
		
	public function orderByStopOnHover($direction = 'ASC') {
		$this->loadDirection('stop_on_hover',$direction);
		return $this;
	} 
		
	public function orderByNavigation($direction = 'ASC') {
		$this->loadDirection('navigation',$direction);
		return $this;
	} 
		
	public function orderByItemsCount($direction = 'ASC') {
		$this->loadDirection('items_count',$direction);
		return $this;
	} 
		
	public function orderByDateCreation($direction = 'ASC') {
		$this->loadDirection('date_creation',$direction);
		return $this;
	} 
		
	public function orderByDateModification($direction = 'ASC') {
		$this->loadDirection('date_modification',$direction);
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


	public function _getMap() { 
		$parentMap = parent::_getMap();
		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'Uri' =>  'uri',            
		    'GroupeTraduction' =>  'groupe_traduction',            
		    'Type' =>  'type',            
		    'AutoPlay' =>  'auto_play',            
		    'StopOnHover' =>  'stop_on_hover',            
		    'Navigation' =>  'navigation',            
		    'ItemsCount' =>  'items_count',            
		    'DateCreation' =>  'date_creation',            
		    'DateModification' =>  'date_modification',            
		    'IdUser' =>  'id_user',            
		    'IdGroupe' =>  'id_groupe',		
		));
	} 


}