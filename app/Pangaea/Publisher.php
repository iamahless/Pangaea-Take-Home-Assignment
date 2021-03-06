<?php

namespace App\Pangaea;

use App\Models\Publisher as Model;

class Publisher
{

    private $model;

    public function __construct(Model $publisher)
    {
        $this->model = $publisher;
    }

    public static function createNewSubscription(array $data): ?self
    {
        $publisher = Model::create($data);

        return new static($publisher);
    }

    public function getId(): string
    {
        return $this->model->id;
    }

    public function getModel(): Model
    {
        return $this->model;
    }
}
