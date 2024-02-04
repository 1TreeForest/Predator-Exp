<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorgets it's free PHP Open Source CMS PHP & MySQL
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


class doorGetsUserModuleRequest extends doorGetsUserRequest{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function doAction() {

        $out = '';
        
        // Init langue 
        $lgActuel       = $this->doorGets->getLangueTradution();
        $User           = $this->doorGets->user;
        $moduleInfos    = $this->doorGets->moduleInfos($this->doorGets->Uri,$lgActuel);
        
        // Init url redirection 
        $redirectUrl = './?controller=module'.$moduleInfos['type'].'&uri='.$this->doorGets->Uri.'&lg='.$lgActuel;
        
        // Check if is content modo
        $is_modo = (in_array($moduleInfos['id'], $User['liste_module_modo']))?true:false;

        // Check if is module modo
        (
            in_array('module', $User['liste_module_interne'])  
            && in_array('module_'.$moduleInfos['type'],  $User['liste_module_interne'])

        ) ? $is_modules_modo = true : $is_modules_modo = false;

        // check if user can edit content
        $user_can_edit = (in_array($moduleInfos['id'], $User['liste_module_edit']))?true:false;

        // check if user can delete content
        $user_can_delete = (in_array($moduleInfos['id'], $User['liste_module_delete']))?true:false;
        
        // Init count total contents
        $countContents = 0;
        $arrForCountSearchQuery[] = array('key'=>"id_user",'type'=>'=','value'=>$User['id']);
        $countContents = $this->doorGets->getCountTable($this->doorGets->Table,$arrForCountSearchQuery);

        // Check limit to add content
        $isLimited = 0;
        if (array_key_exists($moduleInfos['id'], $User['liste_module_limit']) &&  $User['liste_module_limit'] !== '0') {
            $isLimited = (int)$User['liste_module_limit'][$moduleInfos['id']];
        }
        
        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,$this->doorGets->Table);
            
            if (!empty($isContent)) {
                
                if ($lgGroupe = @unserialize($isContent['groupe_traduction'])) {
                    
                    $idLgGroupe = $lgGroupe[$lgActuel];
                    
                    $isContentTraduction = $this->doorGets->dbQS($idLgGroupe,$this->doorGets->Table.'_traduction');
                    if (!empty($isContentTraduction)) {
                        
                        $isContent = array_merge($isContent,$isContentTraduction);
                        
                    }else{
                        
                        $isContentTraductionTemp = $this->doorGets->dbQS($this->doorGets->configWeb['langue_front'],$this->doorGets->Table.'_traduction','langue');
                        
                        unset($isContentTraductionTemp['id']);
                        $isContentTraductionTemp['langue'] = $lgActuel;
                        
                        $idNewContent = $this->doorGets->dbQI($isContentTraductionTemp,$this->doorGets->Table.'_traduction');
                        
                        $lgGroupe[$lgActuel] = $idNewContent;
                        
                        $sLgGroupe['groupe_traduction'] = serialize($lgGroupe);
                        $this->doorGets->dbQU($id,$sLgGroupe,$this->doorGets->Table);
                        
                        
                        $isContentTraduction = $this->doorGets->dbQS($idLgGroupe,$this->doorGets->Table.'_traduction');
                        $isContent = array_merge($isContent,$isContentTraduction);
                    }
                    
                }

                
            }
            
        }
        
        $champsNonObligatoire = array('meta_titre','meta_description','meta_keys','sendto','id_disqus','image_gallery','meta_facebook_titre','meta_facebook_description','meta_facebook_image',
            'meta_twitter_titre','meta_twitter_description','meta_twitter_image','meta_twitter_player',);
        
        $messageSuccess = $this->doorGets->__("Vos informations ont bien été mises à jour");
        
        switch($this->Action) {
            
            case 'add':
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    $cResultsInt = $this->doorGets->getCountTable($this->doorGets->Table);
                    
                    $listToCategories = '';
                    // gestion des champs vide
                    foreach($this->doorGets->Form->i as $k=>$v) {
                        
                        if (
                           !in_array($k,$champsNonObligatoire) &&  empty($v)
                       ) {
                            
                            $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_'.$k] = 'ok';
                            
                        }
                        
                        $iCat = explode('_',$k);
                        if (!empty($iCat) && $iCat[0] === 'categories' && is_numeric($iCat[1])) {
                            
                            $listToCategories .= '#'.$iCat[1].',';
                            unset($this->doorGets->Form->i[$k]);
                            
                        }
                        
                    }
                    
                    // gestion de l'uri
                    $uri = $this->doorGets->Form->i['uri'].'-'.$lgActuel;
                    $isValidUri = $this->doorGets->isValidUri($uri,$this->doorGets->Table.'_traduction');
                    if (!$isValidUri) {
                        $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_uri'] = 'ok';
                    }
                    
                    // validation si aucune erreur
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$this->doorGets->Form->i)) {
                            $this->doorGets->Form->i['active'] = 2;
                        }

                        if (!array_key_exists('comments',$this->doorGets->Form->i)) {
                            $this->doorGets->Form->i['comments'] = 0;
                        }
                        if (!array_key_exists('partage',$this->doorGets->Form->i)) {
                            $this->doorGets->Form->i['partage'] = 0;
                        }
                        if (!array_key_exists('mailsender',$this->doorGets->Form->i)) {
                            $this->doorGets->Form->i['mailsender'] = 0;
                        }
                        if (!array_key_exists('facebook',$this->doorGets->Form->i)) {
                            $this->doorGets->Form->i['facebook'] = 0;
                        }
                        if (!array_key_exists('disqus',$this->doorGets->Form->i)) {
                            $this->doorGets->Form->i['disqus'] = 0;
                        }
                        if (!array_key_exists('id_disqus',$this->doorGets->Form->i)) {
                            $this->doorGets->Form->i['id_disqus'] = 0;
                        }
                        if (!array_key_exists('sendto',$this->doorGets->Form->i)) {
                            $this->doorGets->Form->i['sendto'] = 0;
                        }
                        if (!array_key_exists('in_rss',$this->doorGets->Form->i)) {
                            $this->doorGets->Form->i['in_rss'] = 0;
                        }
                        //
                        
                        $data['pseudo']         = $User['pseudo'];
                        $data['id_user']        = $User['id'];
                        $data['id_groupe']      = $User['groupe'];
                        $data['categorie']      = $listToCategories;
                        $data['ordre']          = $cResultsInt + 1 ;
                        $data['active']         = $this->doorGets->Form->i['active'];
                        if (!$is_modo) {
                            $data['active']         = 3;
                        }
                        $data['comments']       = $this->doorGets->Form->i['comments'];
                        $data['partage']        = $this->doorGets->Form->i['partage'];
                        $data['mailsender']     = $this->doorGets->Form->i['mailsender'];
                        $data['facebook']       = $this->doorGets->Form->i['facebook'];
                        $data['disqus']         = $this->doorGets->Form->i['disqus'];
                        $data['sendto']         = $this->doorGets->Form->i['sendto'];
                        $data['in_rss']         = $this->doorGets->Form->i['in_rss'];
                        $data['id_disqus']      = $this->doorGets->Form->i['id_disqus'];
                        $data['date_creation']  = time();
                        
                        $idContent = $this->doorGets->dbQI($data,$this->doorGets->Table);
                        
                        //
                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                            
                            $dataNext = array();
                            
                            $dataNext['date_modification'] = $data['date_creation'];
                            
                            //
                            $dataNext['titre']              = $this->doorGets->Form->i['titre'];
                            $dataNext['article_tinymce']    = $this->doorGets->Form->i['article_tinymce'];
                            
                            $dataNext['meta_titre']         = $this->doorGets->Form->i['meta_titre'];
                            $dataNext['meta_description']   = $this->doorGets->Form->i['meta_description'];
                            $dataNext['meta_keys']          = $this->doorGets->Form->i['meta_keys'];

                            $dataNext['meta_facebook_titre']         = $this->doorGets->Form->i['meta_facebook_titre'];
                            $dataNext['meta_facebook_description']   = $this->doorGets->Form->i['meta_facebook_description'];
                            $dataNext['meta_facebook_image']         = $this->doorGets->Form->i['meta_facebook_image'];

                            $dataNext['meta_twitter_titre']         = $this->doorGets->Form->i['meta_twitter_titre'];
                            $dataNext['meta_twitter_description']   = $this->doorGets->Form->i['meta_twitter_description'];
                            $dataNext['meta_twitter_image']         = $this->doorGets->Form->i['meta_twitter_image'];
                            $dataNext['meta_twitter_player']        = $this->doorGets->Form->i['meta_twitter_player'];
                            //
                            
                            $dataNext['id_content']     = $idContent;
                            $dataNext['langue']         = $k;
                            $dataNext['categorie']      = $listToCategories;
                            $dataNext['uri']            = $this->doorGets->Form->i['uri'].'-'.$k;
                            $idTraduction[$k]           = $this->doorGets->dbQI($dataNext,$this->doorGets->Table.'_traduction');
                            
                        }
                        
                        $dataModification['groupe_traduction'] = serialize($idTraduction);
                        $this->doorGets->dbQU($idContent,$dataModification,$this->doorGets->Table);

                        // Tracker
                        $usersTracking = new UsersTrackEntity(null,$this->doorGets);
                        $usersTracking->setIdSession(session_id())
                            ->setIpUser($_SERVER['REMOTE_ADDR'])
                            ->setUrlPage($_SERVER['REQUEST_URI'])
                            ->setUrlReferer($_SERVER['HTTP_REFERER'])
                            ->setIdUser($User['id'])
                            ->setTitle($dataNext['titre'])
                            ->setIdGroupe($User['groupe'])
                            ->setLangue($lgActuel)
                            ->setUriModule($this->doorGets->Uri)
                            ->setIdContent($idContent)
                            ->setAction($this->Action)
                            ->setDate(time())
                            ->save();

                        if (!$is_modo) {
                            
                            $moderation = new ModerationEntity(null,$this->doorGets);
                            $moderation->setIdContent($idContent)
                                ->setIdUser($User['id'])
                                ->setPseudo($User['pseudo'])
                                ->setIdGroupe($User['groupe'])
                                ->setUriModule($this->doorGets->Uri)
                                ->setTypeModule($moduleInfos['type'])
                                ->setAction($this->Action)
                                ->setLangue($lgActuel)
                                ->setDateCreation(time())
                                ->save();

                            $this->doorGets->sendEmailNotificationToGroupe(
                                $moduleInfos['uri_notification_moderator'],
                                $moduleInfos['id']
                            );

                            $messageSuccess = $this->doorGets->__("Votre contenu est en cours de modération");
                        }

                        $this->doorGets->successHeaderResponse(
                            $messageSuccess,
                            $redirectUrl.'&action=edit&id='.$idContent
                        );
                    }

                    $this->doorGets->errorHeaderResponse(
                        $this->doorGets->__("Veuillez remplir correctement le formulaire"),
                        $this->doorGets->Form->e
                    );
                    
                }
                
                break;
            
            case 'edit':
                
                if (!empty($this->doorGets->Form->i) && $user_can_edit) {
                    
                    $this->doorGets->checkMode();
                    
                    $listToCategories = '';
                    // gestion des champs vide
                    foreach($this->doorGets->Form->i as $k=>$v) {
                        
                        if (
                           !in_array($k,$champsNonObligatoire) &&  empty($v)
                       ) {
                            
                            $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_edit_'.$k] = 'ok';
                            
                        }
                        
                        $iCat = explode('_',$k);
                        if (!empty($iCat) && $iCat[0] === 'categories' && is_numeric($iCat[1])) {
                            
                            $listToCategories .= '#'.$iCat[1].',';
                            unset($this->doorGets->Form->i[$k]);
                            
                        }
                        
                    }
                    
                    // gestion de l'uri
                    $uri = $this->doorGets->Form->i['uri'];
                    $isValidUri = $this->doorGets->isValidUri($uri,$this->doorGets->Table.'_traduction',$isContent);
                    if (!$isValidUri) {
                        $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_edit_uri'] = 'ok';
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$this->doorGets->Form->i)) {
                            $this->doorGets->Form->i['active'] = $isContent['active'];
                        }
                        if (!array_key_exists('comments',$this->doorGets->Form->i)) {
                            $this->doorGets->Form->i['comments'] = ($is_modo) ? 0 : $isContent['comments'];
                        }
                        if (!array_key_exists('partage',$this->doorGets->Form->i)) {
                            $this->doorGets->Form->i['partage'] = ($is_modo) ? 0 : $isContent['partage'];
                        }
                        if (!array_key_exists('mailsender',$this->doorGets->Form->i)) {
                            $this->doorGets->Form->i['mailsender'] = ($is_modo) ? 0 : $isContent['mailsender'];
                        }
                        if (!array_key_exists('facebook',$this->doorGets->Form->i)) {
                            $this->doorGets->Form->i['facebook'] = ($is_modo) ? 0 : $isContent['facebook'];
                        }
                        if (!array_key_exists('disqus',$this->doorGets->Form->i)) {
                            $this->doorGets->Form->i['disqus'] = ($is_modo) ? 0 : $isContent['disqus'];
                        }
                        if (!array_key_exists('in_rss',$this->doorGets->Form->i)) {
                            $this->doorGets->Form->i['in_rss'] = ($is_modo) ? 0 : $isContent['in_rss'];
                        }
                        if (!array_key_exists('sendto',$this->doorGets->Form->i)) {
                            $this->doorGets->Form->i['sendto'] = ($is_modo) ? 0 : $isContent['sendto'];
                        }
                        if (!array_key_exists('id_disqus',$this->doorGets->Form->i)) {
                            $this->doorGets->Form->i['id_disqus'] = ($is_modo) ? 0 : $isContent['id_disqus'];
                        }
                        
                        $dataContenu['categorie']       = $listToCategories;
                        $dataContenu['active']          = $this->doorGets->Form->i['active'];
                        if (!$is_modo) {
                            $dataContenu['active']         = 3;
                        }
                        $dataContenu['comments']        = $this->doorGets->Form->i['comments'];
                        $dataContenu['partage']         = $this->doorGets->Form->i['partage'];
                        $dataContenu['facebook']        = $this->doorGets->Form->i['facebook'];
                        $dataContenu['disqus']          = $this->doorGets->Form->i['disqus'];
                        $dataContenu['in_rss']          = $this->doorGets->Form->i['in_rss'];
                        
                        $dataTraduction = array(
                            'active'                    => $dataContenu['active'],
                            'titre'                     => $this->doorGets->Form->i['titre'],
                            'uri'                       => $this->doorGets->Form->i['uri'],
                            'article_tinymce'           => $this->doorGets->Form->i['article_tinymce'],
                            'meta_titre'                => $this->doorGets->Form->i['meta_titre'],
                            'meta_description'          => $this->doorGets->Form->i['meta_description'],
                            'meta_keys'                   => $this->doorGets->Form->i['meta_keys'],
                            'meta_facebook_type'         => $this->doorGets->Form->i['meta_facebook_type'],
                            'meta_facebook_titre'         => $this->doorGets->Form->i['meta_facebook_titre'],
                            'meta_facebook_description'   => $this->doorGets->Form->i['meta_facebook_description'],
                            'meta_facebook_image'         => $this->doorGets->Form->i['meta_facebook_image'],
                            'meta_twitter_type'         => $this->doorGets->Form->i['meta_twitter_type'],
                            'meta_twitter_titre'         => $this->doorGets->Form->i['meta_twitter_titre'],
                            'meta_twitter_description'   => $this->doorGets->Form->i['meta_twitter_description'],
                            'meta_twitter_image'         => $this->doorGets->Form->i['meta_twitter_image'],
                            'meta_twitter_player'        => $this->doorGets->Form->i['meta_twitter_player'],
                            'date_modification'     => time()
                        );

                        $dataTraduction['categorie']       = $listToCategories;

                        $dataVersion = $dataTraduction;

                        unset($dataTraduction['active']);

                        $this->saveLastContentVersion($isContent['id_content'],$dataVersion);
                        
                        // Tracker
                        $usersTracking = new UsersTrackEntity(null,$this->doorGets);
                        $usersTracking->setIdSession(session_id())
                            ->setIpUser($_SERVER['REMOTE_ADDR'])
                            ->setUrlPage($_SERVER['REQUEST_URI'])
                            ->setUrlReferer($_SERVER['HTTP_REFERER'])
                            ->setIdUser($User['id'])
                            ->setTitle($dataTraduction['titre'])
                            ->setIdGroupe($User['groupe'])
                            ->setLangue($lgActuel)
                            ->setUriModule($this->doorGets->Uri)
                            ->setIdContent($isContent['id_content'])
                            ->setAction($this->Action)
                            ->setDate(time())
                            ->save();

                        if (!$is_modo) {
                            
                            $moderation = new ModerationEntity(null,$this->doorGets);
                            $moderation->setIdContent($isContent['id_content'])
                                ->setIdUser($User['id'])
                                ->setPseudo($User['pseudo'])
                                ->setIdGroupe($User['groupe'])
                                ->setUriModule($this->doorGets->Uri)
                                ->setTypeModule($moduleInfos['type'])
                                ->setAction($this->Action)
                                ->setLangue($lgActuel)
                                ->setDateCreation(time())
                                ->save();

                            $this->doorGets->sendEmailNotificationToGroupe(
                                $moduleInfos['uri_notification_moderator'],
                                $moduleInfos['id']
                            );

                            $messageSuccess = $this->doorGets->__("Votre contenu est en cours de modération");
                            
                        } else {

                            $uri_module = $this->doorGets->Uri;
                            $id_content = $isContent['id_content'];

                            $this->doorGets->dbQL("
                                DELETE FROM _moderation 
                                WHERE id_content = '$id_content' 
                                AND uri_module = '$uri_module'
                                LIMIT 1000
                            ");

                            $uriNotification = ($isContent['active'] === '2') ? 
                                $moduleInfos['uri_notification_user_success'] : 
                                $moduleInfos['uri_notification_user_error']
                            ;
                            
                            $this->doorGets->sendEmailNotificationToUser(
                                $uriNotification,
                                $isContent['id_user']

                            );
                        }
                        
                        // Update Data
                        $this->doorGets->dbQU(
                            $isContent['id_content'],
                            $dataContenu,
                            $this->doorGets->Table
                        );

                        $this->doorGets->dbQU(
                            $isContent['id'],
                            $dataTraduction,
                            $this->doorGets->Table.'_traduction'
                        );

                        $this->doorGets->successHeaderResponse(
                            $messageSuccess
                        );

                    }
                    
                    $this->doorGets->errorHeaderResponse(
                        $this->doorGets->__("Veuillez remplir correctement le formulaire"),
                        $this->doorGets->Form->e
                    );
                }
                
                break;
            
            case 'delete':
                
                if (!empty($this->doorGets->Form->i) && $user_can_delete) {
                    
                    $this->doorGets->checkMode();
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!empty($isContent)) {
                            $lgGroupe = unserialize($isContent['groupe_traduction']);
                            foreach($lgGroupe as $v) {
                                @$this->doorGets->dbQD($v,$this->doorGets->Table.'_traduction');
                            }
                            
                            $this->doorGets->dbQD($isContent['id_content'],$this->doorGets->Table);
                            $this->doorGets->dbQL("DELETE FROM _dg_comments WHERE uri_module = '".$this->doorGets->Uri."' AND uri_content = '".$isContent['id_content']."' ");
                            $this->doorGets->dbQL("UPDATE ".$this->doorGets->Table." SET ordre = ordre - 1 WHERE ordre > ".$isContent['ordre']." ");
                            
                            $this->doorGets->clearModuleDBCache($this->doorGets->Table);
                            
                            // Tracker
                            $usersTracking = new UsersTrackEntity(null,$this->doorGets);
                            $usersTracking->setIdSession(session_id())
                                ->setIpUser($_SERVER['REMOTE_ADDR'])
                                ->setUrlPage($_SERVER['REQUEST_URI'])
                                ->setUrlReferer($_SERVER['HTTP_REFERER'])
                                ->setIdUser($User['id'])
                                ->setTitle($isContent['titre'])
                                ->setIdGroupe($User['groupe'])
                                ->setLangue($lgActuel)
                                ->setUriModule($this->doorGets->Uri)
                                ->setIdContent($isContent['id_content'])
                                ->setAction($this->Action)
                                ->setDate(time())
                                ->save();
                        }
                        
                        $this->doorGets->successHeaderResponse(
                            $this->doorGets->__("Les données sont supprimées"),
                            $redirectUrl
                        );

                    }
                    
                }
                
                break;
            
            
        }
        
    }
    
    public function saveLastContentVersion($id_content,$next_content = array(),$name_field="id_content") {

        $lgActuel       = $this->doorGets->getLangueTradution();
        $User           = $this->doorGets->user;

        // Save last Version
        $isLastVersionTemp = $isLastVersion = $this->doorGets->dbQS($id_content,$this->doorGets->Table.'_traduction',$name_field," AND langue='$lgActuel' LIMIT 1 ");
        if (!empty($isLastVersion)) {

            unset($isLastVersion['id']);
            unset($isLastVersionTemp['id']);
            if (array_key_exists('date_modification', $isLastVersionTemp)) {
                unset($isLastVersionTemp['date_modification']);
            }
            if (array_key_exists('active', $next_content)) {
                $isLastVersionTemp['active']    = $next_content['active'];
            }
            

            $next_content['pseudo']         = $isLastVersion['pseudo']          = $isLastVersionTemp['pseudo']          = $User['pseudo'];
            $next_content['id_user']        = $isLastVersion['id_user']         = $isLastVersionTemp['id_user']         = $User['id'];
            $next_content['id_groupe']      = $isLastVersion['id_groupe']       = $isLastVersionTemp['id_groupe']       = $User['groupe'];
            $next_content['date_creation']  = $isLastVersion['date_creation']   = $isLastVersionTemp['date_creation']   = time();

            if (count($next_content) > 4) {

                foreach ($isLastVersion as $key => $value) {
                    if (!array_key_exists($key, $next_content)) {
                        unset($isLastVersion[$key]);
                    }
                }

                ksort($isLastVersion);
                ksort($next_content);
                
                $checkIfDataEqualLastVersion = strcmp(serialize($isLastVersion), serialize($next_content));

                if ($checkIfDataEqualLastVersion !== 0) {

                    $this->doorGets->dbQI($isLastVersionTemp,$this->doorGets->Table.'_version');

                }

            }

        }

    }
}
