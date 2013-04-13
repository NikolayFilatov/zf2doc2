<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    protected $em;
 
    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }
    public function indexAction()
    {
        $em = $this->getEntityManager();
        //$user = new \Application\Entity\User();
        $user = $em->getRepository('\Application\Entity\User')->find(1);
        //$user->setName("Alexey");
        //$user->setOtherName("Astafiev");
        //$em->persist($user);
        //$address = new \Application\Entity\Address();
        //$address->setParam(['name'=> 'test', 'desc' => 'about', 'user' => $user]);
        //$user->setAddress($address);
        //$em->persist($user);
        //$em->flush();
        $address = $user->getAddress();
        foreach($address as $val) {
            echo $val->getName();
        }
        return new ViewModel();
    }
}
