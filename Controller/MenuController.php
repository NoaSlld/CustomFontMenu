<?php

namespace CustomFrontMenu\Controller;

use HookAdminHome\HookAdminHome;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Thelia\Controller\Admin\BaseAdminController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Thelia\Core\HttpFoundation\JsonResponse;
use Thelia\Core\Security\Resource\AdminResources;
use Thelia\Core\Security\AccessManager;
use Thelia\Form\Exception\FormValidationException;
use Thelia\Tools\URL;

class MenuController extends BaseAdminController
{
    /**
     * @Route("/admin/module/CustomFrontMenu/configure", name="admin.responseform", methods={"POST"})
     */
    public function saveMenuItems() : void
    {
        if (null !== $this->checkAuth(
            AdminResources::MODULE,
            ['customfrontmenu'],
            AccessManager::UPDATE
        )) {
            return;
        }
        $rep = $this->getRequest()->get('menuData');
        $array = json_decode($rep, true);
        print_r($array);
        die;
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
            ['id' => 10, 'title' => 'Parent 2', 'url' => 'https://localhost:33333', 'depth' => 0, 'childrens' =>
                [
                    [
                        'id' => 11, 'title' => 'Child 2.1', 'url' => 'https://localhost:12222', 'depth' => 1, 'childrens' =>
                        [
                            [
                                'id' => 12, 'title' => 'Child 2.1.1', 'url' => 'https://localhost:12333', 'depth' => 2
                            ]
                        ]
                    ]
                ]
            ],
            ['id' => 13, 'title' => 'Parent 3', 'url' => 'https://localhost:33333', 'depth' => 0, 'childrens' =>
                [
                    [
                        'id' => 14, 'title' => 'Child 3.1', 'url' => 'https://localhost:12222', 'depth' => 1,
                    ],
                    [
                        'id' => 15, 'title' => 'Child 3.2', 'url' => 'https://localhost:12222', 'depth' => 1,
                    ]
                ]
            ]
        ];

        $dataToLoad = json_encode($stub);

        setcookie('menuItems', $dataToLoad);
    }
}