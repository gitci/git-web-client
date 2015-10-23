<?php
namespace VersionContol\GitControlBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserProjectsRepository extends EntityRepository
{

    public function findByUserAndKeyword($user, $keyword = false,$queryOnly= false){
     $em=$this->getEntityManager();
     $qb = $em->createQueryBuilder();
 
     
     $qb->select('a')
       ->from('VersionContolGitControlBundle:UserProjects','a')
        ->leftJoin('a.project', 'b')
        ->where('a.user = :user')
        ->setParameter('user', $user);

     

      //If keyword is set 
      if($keyword){
        $qb->andWhere(' b.title LIKE :keyword OR b.description LIKE :keyword ')
          ->setParameter('keyword', '%'.$keyword.'%');
      }
    
     if($queryOnly === true){
         return $qb;
     }else{
         return $qb->getQuery()->getResult();
     }
    
  }
}