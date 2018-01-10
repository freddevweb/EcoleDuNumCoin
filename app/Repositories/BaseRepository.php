<?php

namespace App\Repositories;

class BaseRepository implements InterfaceRepository
{
    protected $entity;

    function getAll()
    {
        return $this->entity->all();
    }

    function getById($id)
    {
        return $this->entity->find( $id );
    }

    function create(array $attributes)
    {
        return $this->entity->create( $attributes );
    }

    function update($id, array $attributes)
    {
        return $this->entity->find( $id )->update( $attributes );
    }

    function delete($id)
    {
        return $this->entity->find( $id )->delete();
    }
}