<?php

namespace App\Contracts\Repositories;

use App\Contracts\Traits\ValidatableInterface;

interface SlideRepository extends ValidatableInterface
{
    public function getDataByType($limit, $type, $columns = ['*']);
}
