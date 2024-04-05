<?php

class backendModeration extends cmsBackend {

    public $useDefaultOptionsAction = true;

    public function getBackendMenu() {
        return [
            [
                'title' => LANG_OPTIONS,
                'url'   => href_to($this->root_url),
                'options' => [
                    'icon' => 'cog'
                ]
            ],
            [
                'title' => LANG_MODERATION_LOGS,
                'url'   => href_to($this->root_url, 'logs'),
                'options' => [
                    'icon' => 'clipboard-list'
                ]
            ]
        ];
    }

}
