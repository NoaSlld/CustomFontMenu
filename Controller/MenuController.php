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
    public function loadMenuItems() : array
    {
        $stub = [
            ['title' => 'Parent 1', 'children' => [['title' => 'Child 1.1', 'children' => [['title' => 'Child 1.1.1', 'depth' => 2]], 'depth' => 1], ['title' => 'Child 1.2', 'depth' => 1, 'children' => [['title' => 'Child 1.2.1', 'depth' => 2], ['title' => 'Child 1.2.2', 'depth' => 2]]]], 'depth' => 0],
            ['title' => 'Parent 2', 'children' => [['title' => 'Child 2.1', 'depth' => 1], ['title' => 'Child 2.2', 'depth' => 1]], 'depth' => 0],
            ['title' => 'Parent 3', 'depth' => 0]
        ];

        $dataToLoad = $stub.json_encode();

        setcookie('menuItems', $dataToLoad);

        return $dataToLoad;
    }
}