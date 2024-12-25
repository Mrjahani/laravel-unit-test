<?php

namespace Tests\Feature\Models;

trait ModelHelperTesting
{
    /**
     * A basic feature test example.
    */
    public function testInsertData(): void
    {
        $model = $this->model();
        $table = $model->getTable();

        $data = $model::factory()->make()->toArray();
        $model::create($data);

        $this->assertDatabaseHas($table , $data);
    }
    abstract public function model();
}