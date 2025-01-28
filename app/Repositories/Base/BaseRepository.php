<?php

namespace App\Repositories\Base;

class BaseRepository 
{
    protected $modelClass;
    
    protected function setModel(string $modelClass) 
    { 
        $this->modelClass = $modelClass;
        return app($this->modelClass);
    }

    protected function getModel()
    {
        return app($this->modelClass);
    }

    public function findById(int $id)
    {  
        return $this->newQuery()->find($id);
    }

    public function create(array $data)
    {
        return $this->newQuery()->create($data);
    }

    public function update($objectModel, array $inputData)
    {
        return $objectModel->update($inputData);
    }

    public function destroy(int $id)
    {   
        return $this->getModel()->destroy($id);
    }

    protected function newQuery()
    {   
        return $this->getModel()->newQuery();
    }

    public function list(int $page, int $perpage, bool $paginate, array $columns = ['*'], array $relationships = [])
    {
        $query = $this->getModel()->newQuery();
        return $this->mountQuery($query, $perpage, $columns, $pageName = null, $page, $paginate);
    }

    protected function mountQuery($query, $limit, $columns, $pageName , $page , $paginate)
    {   
        if (is_null($query)) {
            $query = $this->newQuery();
        }

        if ($paginate) {
            return $query->paginate($limit, $columns, $pageName, $page);
        }

        return $query->get();
    }
}