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
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class MenuController extends BaseAdminController
{
    /**
     * @Route("/admin/module/CustomFrontMenu/configure", name="admin.responseform", methods={"POST"})
     */
    public function saveMenuItems() : RedirectResponse
    {
        if (null !== $this->checkAuth(
            AdminResources::MODULE,
            ['customfrontmenu'],
            AccessManager::UPDATE
        )) {
            return new RedirectResponse(URL::getInstance()->absoluteUrl('/admin/module/CustomFrontMenu'));;
        }
        $rep = $this->getRequest()->get('menuData');
        $array = json_decode($rep, true);
        //$this->testDisplay($array);

        $this->getSession()->getFlashBag()->add('success', 'This menu has been successfully saved !');
        
        return new RedirectResponse(URL::getInstance()->absoluteUrl('/admin/module/CustomFrontMenu'));
    }

    /**
     * @Route("/admin/module/CustomFrontMenu/clearFlashes", name="admin.clearflashes", methods={"GET"})
     */
    public function clearFlashes() : void
    {
        echo '<script>';
        echo 'console.log("Hello, console from PHP!");';
        echo '</script>';
        $this->getSession()->getFlashBag()->clear();
    }

    /**
     * This function will be deleted, this is for testing only
     */
    public function testDisplay($array) {
        foreach ($array as $parent) {
            echo '<strong>' . $parent['title'] . '</strong> -> ' . $parent['url'] . '<br>';
            if (isset($parent['childrens'])) {
                foreach ($parent['childrens'] as $child1) {
                    echo '. . . . . . |------- <strong>' . $child1['title'] . "</strong> -> " . $child1['url'] . '<br>';
                    if (isset($child1['childrens'])) {
                        foreach ($child1['childrens'] as $child2) {
                            echo '. . . . . . . . . . . . |------- <strong>' . $child2['title'] . "</strong> -> " . $child2['url'] . '<br>';
                            if (isset($child2['childrens'])) {
                                foreach ($child2['childrens'] as $child3) {
                                    echo '. . . . . . . . . . . . . . . . . . . . . |------- <strong>' . $child3['title'] . "</strong> -> " . $child3['url'] . '<br>';
                                    
                                }
                            }
                        }
                    }
                }
            }
        }
        //print_r($array);
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