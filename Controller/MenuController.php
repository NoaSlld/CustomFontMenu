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
        $stub = 
        [
            [
                'id' => 1, 'title' => 'Parent 1', 'depth' => 0, 'childrens' => 
                [
                    [
                        'id' => 2, 'title' => 'Child 1.1', 'depth' => 1, 'childrens' => 
                        [
                            [
                                'id' => 3, 'title' => 'Child 1.1.1', 'depth' => 2
                            ]
                        ]
                    ],
                    [
                        'id' => 4, 'title' => 'Child 1.2', 'depth' => 1, 'childrens' => 
                        [
                            [
                                'id' => 5, 'title' => 'Child 1.2.1', 'depth' => 2
                            ],
                            [
                                'id' => 6, 'title' => 'Child 1.2.2', 'depth' => 2, 'childrens' => 
                                [
                                    [
                                        'id' => 74, 'title' => '1.2.2.1', 'depth' => 3, 'childrens' => 
                                        [
                                            ['id' => 8, 'title' => 'Child 1.2.2.1.1', 'depth' => 4],
                                            ['id' => 9, 'title' => 'Child 1.2.2.1.2', 'depth' => 4]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            ['id' => 10, 'title' => 'Parent 3', 'depth' => 0]
        ];

        $dataToLoad = json_encode($stub);

        setcookie('menuItems', $dataToLoad);
    }
}