<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
Use Doctrine\ORM\QueryBuilder;
Use AppBundle\Entity\Joueur;
/**
 * JoueurRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class JoueurRepository extends \Doctrine\ORM\EntityRepository
{
    public function myFindAll(){
        $queryBuilder = $this->createQueryBuilder('a');
        $query = $queryBuilder->getQuery();
        $results = $query->getResults();
        
        return $results;
    }
}
