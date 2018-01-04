<?php
/**
 * Created by PhpStorm.
 * User: eake
 * Date: 04.01.18
 * Time: 12:28
 */

namespace AppBundle\Controller;


use AppBundle\Libs\User\Entity\User;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends FOSRestController
{
    /**
     * @Rest\Get("/user")
     */
    public function getAction()
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        if(count($users) === 0)
        {
            return new View('0 records for users', Response::HTTP_NOT_FOUND);
        }

        return $users;
    }

    /**
     * @Rest\Get("/user/{id}")
     */
    public function getIdAction(int $id)
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);

        if(is_null($user))
        {
            return new View('User with id ' . $id . ' doesn\'t exist', Response::HTTP_NOT_FOUND);
        }

        return $user;
    }

    /**
     * @param Request $request
     * @Rest\Post("/user/")
     */
    public function postAction(Request $request)
    {
        $name = $request->get('name');
        $surname = $request->get('surname');
        $address = $request->get('address');
        $employer = $request->get('employer');

        if(empty($name) || empty($surname))
        {
            return new View('Name and surname must be filled', Response::HTTP_NOT_ACCEPTABLE);
        }

        $user = new User();

        $user->setName($name);
        $user->setSurname($surname);

        if(!empty($address))
        {
            $user->setAddress($address);
        }

        if(!empty($employer))
        {
            $user->setEmployer($employer);
        }

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($user);
        $manager->flush();

        return new View($user->getId(), Response::HTTP_OK);
    }

    /**
     * @param int $id
     * @param Request $request
     * @Rest\Put("/user/{id}")
     */
    public function putAction(int $id, Request $request)
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);

        if(is_null($user))
        {
            return new View('User with id ' . $id . ' doesn\'t exist', Response::HTTP_NOT_FOUND);
        }

        $name = $request->get('name');
        $surname = $request->get('surname');
        $address = $request->get('address');
        $employer = $request->get('employer');

        if($request->get('name') && empty($name))
        {
            return new View('Name can not be empty', Response::HTTP_NOT_ACCEPTABLE);
        }

        if($request->get('surname') && empty($surname))
        {
            return new View('Surname can not be empty', Response::HTTP_NOT_ACCEPTABLE);
        }

        if(!empty($name))
        {
            $user->setName($name);
        }

        if(!empty($surname))
        {
            $user->setSurname($surname);
        }

        if(!empty($address))
        {
            $user->setAddress($address);
        }

        if(!empty($employer))
        {
            $user->setEmployer($employer);
        }

        $this->getDoctrine()->getManager()->flush();

        return new View('User with id ' . $id . ' was updated successfully', Response::HTTP_OK);
    }

    /**
     * @param int $id
     * @Rest\Delete("/user/{id}")
     */
    public function deleteAction(int $id)
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);

        if(is_null($user))
        {
            return new View('User with id ' . $id . ' doesn\'t exist', Response::HTTP_NOT_FOUND);
        }

        $manager = $this->getDoctrine()->getManager();
        $manager->remove($user);
        $manager->flush();

        return new View('User with id ' . $id . ' was deleted successfully', Response::HTTP_OK);
    }


}