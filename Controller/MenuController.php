<?php

namespace CustomFrontMenu\Controller;

use Thelia\Controller\Admin\BaseAdminController;

class MenuController extends BaseAdminController
{
    // Save the menu items
    public function saveMenuItems() : void
    {

    }

    // Load the menu items
    public function loadMenuItems() : void
    {
        $stub = [
            ['id' => '1', 'title' => 'Parent 1', 'childrens' => [['id' => '2', 'title' => 'Child 1.1', 'childrens' => [['id' => '3', 'title' => 'Child 1.1.1', 'depth' => 2]], 'depth' => 1], ['id' => '4', 'title' => 'Child 1.2', 'depth' => 1, 'childrens' => [['id' => '5', 'title' => 'Child 1.2.1', 'depth' => 2], ['id' => '6', 'title' => 'Child 1.2.2', 'depth' => 2]]]], 'depth' => 0],
            ['id' => '7', 'title' => 'Parent 2', 'childrens' => [['id' => '8', 'title' => 'Child 2.1', 'depth' => 1], ['id' => '9', 'title' => 'Child 2.2', 'depth' => 1]], 'depth' => 0],
            ['id' => '10', 'title' => 'Parent 3', 'depth' => 0]
        ];

        $dataToLoad = json_encode($stub);

        setcookie('menuItems', $dataToLoad);
    }
}