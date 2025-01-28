<?php

namespace App\Interfaces\IRepositories\Base;

interface IDBTransaction 
{
    public function commit();
    public function rollback();
}