<?php

namespace Nostromo\Classes;

use Nostromo\Classes\Exception\CollectionException;

/**
 * Class Collection
 * @package Nostromo\Classes
 */
class Collection
{
    /**
     * @var array
     */
    private $tab = [];

    /**
     * Ajoute un élément à la collection.
     *
     * @param mixed $obj
     * @param null $key
     *
     * @throws CollectionException
     */
    public function ajouter($obj, $key = null)
    {
        if ($key === null) {
            $this->tab[] = $obj;
        } else {
            if (array_key_exists($key, $this->tab)) {
                throw new CollectionException("Key $key already in use.");
            } else {
                $this->tab[$key] = $obj;
            }
        }
    }

    /**
     * Récupère l'élément $key.
     *
     * @param mixed $key
     *
     * @return mixed
     *
     * @throws CollectionException
     */
    public function getElement($key)
    {
        if (array_key_exists($key, $this->tab)) {
            return $this->tab[$key];
        } else {
            throw new CollectionException("Invalid key $key.");
        }
    }

    /**
     * @param mixed $key
     *
     * @throws CollectionException
     */
    public function supprimer($key)
    {
        if (array_key_exists($key, $this->tab)) {
            unset($this->tab[$key]);
        } else {
            throw new CollectionException("Invalid key $key.");
        }
    }

    /**
     * @return array
     */
    public function getCollection()
    {
        return $this->tab;
    }

    /**
     * @return array
     */
    public function getCles()
    {
        return array_keys($this->tab);
    }

    /**
     * @return int
     */
    public function taille()
    {
        return count($this->tab);
    }

    /**
     * @param mixed $key
     *
     * @return bool
     */
    public function cleExiste($key)
    {
        return array_key_exists($key, $this->tab);
    }

    public function vider()
    {
        $this->tab = [];
    }
}
