<?php

namespace App\Repositories;

use App\Models\district;
use App\Repositories\Interfaces\DistrictRepositoryInterface;
use App\Repositories\baseRepository;
/**
 * Class UserService
 * @package App\Services
 */

class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface
{
    
        protected $model;
    
        public function __construct(
            district $model
        ){
            $this->model = $model;
        }

        public function findDistrictByProvinceId(int $province_id = 0 ){
            return $this->model->where('province_code','=', $province_id)->get();
        }
}
