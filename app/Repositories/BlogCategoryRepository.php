<?php


namespace App\Repositories;

use App\Models\BlogCategory as Model;

class BlogCategoryRepository extends CoreRepository
{

    protected function getModelClass()
    {
       return Model::class;
    }

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getForComboBox()
    {

        $fields = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS id_title'
        ]);

//        $result[] = $this->startConditions()->all();
//        $result[] = $this
//            ->startConditions()
//            ->select('blog_categories.*',
//                \DB::raw('CONCAT (id, ". ", title) AS id_title'))
//            ->toBase()
//            ->get();
        $result = $this
            ->startConditions()
            ->selectRaw($fields)
            ->toBase()
            ->get();

        return $result;
    }

    public function getAllWithPaginate($perPage = null)
    {
        $fields = ['id', 'title', 'parent_id'];

        $result = $this
            ->startConditions()
            ->select($fields)
            ->paginate($perPage);

        return $result;
    }

}
