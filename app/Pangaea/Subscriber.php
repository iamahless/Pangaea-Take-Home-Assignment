<?php

namespace App\Pangaea;

use App\Models\Subscriber as Model;

class Subscriber
{

    private $model;

    public function __construct(Model $subscriber)
    {
        $this->model = $subscriber;
    }

    public static function createNewSubscription(array $data): ?self
    {
        $subscriber = Model::create($data);

        return new static($subscriber);
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
