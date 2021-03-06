<?php

namespace AppBundle\Repository;

use AppBundle\Entity\RechercheJoueur;

/**
 * JoueurRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class JoueurRepository extends \Doctrine\ORM\EntityRepository
{
    public function findJoueur(RechercheJoueur $recherche){

        // le querybuilder sert à verifier le nom et le prénom du joueur
        $query = $this->createQueryBuilder('j')
            ->leftJoin ('j.club', 'club')
            ->addSelect('club')
            ->where('j.nom LIKE :nom')
            ->orWhere('j.prenom LIKE :prenom')
            ->andWhere('club.nom LIKE :club')
            ->setParameter('nom', '%'.$recherche->getNom().'%')
            ->setParameter('prenom', '%'.$recherche->getPrenom().'%' )
            ->setParameter('club', '%'.$recherche->getClub().'%' )
            ->getQuery();
        $recherches = $query->getResult();


        return $recherches;
    }
}
