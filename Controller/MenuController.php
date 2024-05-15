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
                'id' => 1, 'title' => 'Parent 1', 'url' => 'https://localhost:11111', 'depth' => 0, 'childrens' => 
                [
                    [
                        'id' => 2, 'title' => 'Child 1.1', 'url' => 'https://localhost:12222', 'depth' => 1, 'childrens' => 
                        [
                            [
                                'id' => 3, 'title' => 'Child 1.1.1', 'url' => 'https://localhost:12333', 'depth' => 2
                            ]
                        ]
                    ],
                    [
                        'id' => 4, 'title' => 'Child 1.2', 'url' => 'https://localhost:13333', 'depth' => 1, 'childrens' => 
                        [
                            [
                                'id' => 5, 'title' => 'Child 1.2.1', 'url' => 'https://localhost:13222', 'depth' => 2
                            ],
                            [
                                'id' => 6, 'title' => 'Child 1.2.2', 'url' => 'https://localhost:13322', 'depth' => 2, 'childrens' => 
                                [
                                    [
                                        'id' => 74, 'title' => 'Child 1.2.2.1', 'url' => 'https://localhost:13323', 'depth' => 3, 'childrens' => 
                                        [
                                            ['id' => 8, 'title' => 'Child 1.2.2.1.1', 'url' => 'https://localhost:13567', 'depth' => 4],
                                            ['id' => 9, 'title' => 'Child 1.2.2.1.2', 'url' => 'https://localhost:13589', 'depth' => 4]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            ['id' => 10, 'title' => 'Parent 3', 'url' => 'https://localhost:33333', 'depth' => 0]
        ];

        $dataToLoad = json_encode($stub);

        setcookie('menuItems', $dataToLoad);
    }
}