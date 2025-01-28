<?php

namespace App\Repositories\Base;

use App\Interfaces\IRepositories\Base\IDBTransaction;
use Illuminate\Support\Facades\DB;

class DBTransaction implements IDBTransaction
{
    public function __construct()
    {
        DB::beginTransaction();
    }

    public function commit()
    {
        DB::commit();
    }

    public function rollback()
    {
        DB::rollBack();
    }
}