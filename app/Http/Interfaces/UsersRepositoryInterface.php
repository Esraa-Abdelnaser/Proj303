<?php

namespace App\Http\Interfaces;

interface UsersRepositoryInterface
{

    public function sign_up($request);

    public function sign_in($request);

    public function save_order($request);

    public function show_receipt($request);

    public function show_menu($request);

    public function sign_out($request);

    public function Confirm_order($request);

    public function delete_order($request);
}
