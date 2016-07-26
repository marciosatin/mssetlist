<?php

namespace SUser\Auth;

use Zend\Authentication\Adapter\AdapterInterface,
    Zend\Authentication\Result;

use Doctrine\ORM\EntityManager;

class DoctrineAdapter implements AdapterInterface{
    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;
    protected $username;
    protected $password;
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    public function authenticate() {
        $repository = $this->em->getRepository('SUser\Entity\User');
        $user = $repository->findOneBy(array(
            'username' => $this->getUsername(),
            'password' => $this->getPassword()
        ));
        
        if ($user) {
            return new Result(Result::SUCCESS, array('user' => $user), array('OK'));
        } else {
            return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, array());
        }
    }
}
