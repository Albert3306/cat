<?php

namespace App\Repositories;

use App\Interfaces\IRepository;

/**
 * 资源库抽象类
 */
abstract class BaseRepository implements IRepository
{
    /**
     * The Model instance.
     * @var Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Get Model by id.
     * @param  int $id
     * @return App\Model
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * IRepository接口destory方法
     * @param  int $id
     * @param  string|array $extra
     * @return void
     */
    public function destroy($id = 0, $extra = '')
    {
        return;
    }
}
