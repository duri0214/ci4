<?php

namespace App\Models;

use App\Entities\MPostalEntity;
use App\Models\Domain\Logic\Postal\PostalNumberEntity;
use CodeIgniter\Model;

/**
 * @method MPostalEntity find($id = null)
 * @method MPostalEntity first()
 */
class MPostalModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'm_postal';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = MPostalEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['code', 'prefecture', 'municipality', 'town'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    
    /**
     * CSV取得元: https://www.post.japanpost.jp/zipcode/dl/kogaki-zip.html
     * @param PostalNumberEntity $postalCode
     * @return MPostalEntity|null
     */
    public function getByCode(PostalNumberEntity $postalCode): ?MPostalEntity
    {
        return $this->where('code', $postalCode->getPostalNumber())->first();
    }
}
