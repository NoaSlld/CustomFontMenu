<?php

namespace CustomFrontMenu\Hook;

use Thelia\Core\Event\Hook\HookRenderEvent;
use Thelia\Core\Hook\BaseHook;
use CustomFrontMenu\Controller\MenuController;

class ConfigHook extends BaseHook
{
    public function onModuleConfiguration(HookRenderEvent $event){

        $controller = new MenuController;

        $dataToLoad = $controller->loadMenuItems();

        $event->add($this->render("config/module-config.html", ['items' => $dataToLoad]));
    }
}