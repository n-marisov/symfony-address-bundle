<?php

namespace Maris\Symfony\Address\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Maris\Symfony\Address\Entity\Address;

class AddressRepository extends ServiceEntityRepository
{
    public function __construct( ManagerRegistry $registry )
    {
        parent::__construct( $registry, Address::class );
    }

    /**
     * Сохраняет сущность с проверкой на уникальность.
     * В качестве значение приниматься полный юридический адрес.
     * @param Address $location
     * @param bool $flush
     * @return void
     */
    public function save( Address &$location , bool $flush = false ):void
    {
        $entity = $this->findOneBy([
            "unrestricted" => $location->getUnrestricted()
        ]);

        if(isset($entity))
            $location = $entity;
        else{
            $this->getEntityManager()->persist($location);
            if($flush)
                $this->getEntityManager()->flush();
        }
    }

    public function remove( Address $location , bool $flush = false ):void
    {
        $this->getEntityManager()->remove($location);
        if( $flush )
            $this->getEntityManager()->flush();
    }

    /**
     * Выбирает все адреса в компонентах адреса которых $query
     * является частью $value
     * @param string $query
     * @param array $options
     * @return array
     */
    public function likeQuery( string $query , array $options ) : array
    {
        $value = trim($query);
        $builder = $this->createQueryBuilder("a");

        $components = ["country","region","settlement","street","house","flat"];

        if(!empty($value)){
            foreach ($components as $component)
                $builder->orWhere("a.components.$component.value LIKE :val");
            $builder->setParameter('val', "%$value%");
        }

        foreach ($components as $component)
            if(isset($options[$component]))
                $builder->andWhere("a.components.$component.value = :$component")
                    ->setParameter(":$component",$options[$component]);

        return  $builder->getQuery()->getResult();
    }

}