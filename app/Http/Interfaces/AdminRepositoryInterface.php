<?php

namespace App\Http\Interfaces;

interface AdminRepositoryInterface
{
    public function create_product($request);

    public function update_product($request);

    public function data_product($request);

    public function delete_product($request);
}
