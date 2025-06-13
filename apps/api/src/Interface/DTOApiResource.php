<?php

namespace App\Interface;

interface DTOApiResource
{
    public static function fromEntity(object $entity): DTOApiResource;
}
