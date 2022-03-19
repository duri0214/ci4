<?php

namespace App\Models;

use App\Entities\PostalEntity;
use CodeIgniter\Model;
use ReflectionException;
use SplFileObject;

/**
 * @method PostalEntity find($id = null)
 */
class PostalModel extends Model
{
    const TRIM_LIST = ["\""];
    protected $DBGroup          = 'default';
    protected $table            = 'm_postal';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = PostalEntity::class;
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
     * @param $csvUtf8Path
     * @return int
     * @throws ReflectionException
     */
    public function insertFromCsv($csvUtf8Path): int
    {
        $file = new SplFileObject($csvUtf8Path);
        $file->setFlags(
            SplFileObject::READ_AHEAD |    // 先読み/巻き戻しで読み出す
            SplFileObject::SKIP_EMPTY |         // 空行は読み飛ばす
            SplFileObject::DROP_NEW_LINE        // 行末の改行を読み飛ばす
        );
    
        $i = 0;
        $numberOfFields = 15;  // Total number of fields
        $records = [];
    
        foreach ($file as $line) {
            $row = str_getcsv(mb_convert_encoding($line, 'UTF-8', 'ASCII, JIS, UTF-8, SJIS-win'));
            if (count($row) == $numberOfFields) {
                // key name should be same the insert table field names
                $records[$i]['code'] = str_replace(self::TRIM_LIST, '', $row[2]);
                $records[$i]['prefecture'] = str_replace(self::TRIM_LIST, '', $row[6]);
                $records[$i]['municipality'] = str_replace(self::TRIM_LIST, '', $row[7]);
                $records[$i]['town'] = str_replace(self::TRIM_LIST, '', $row[8]);
            }
            $i++;
        }
    
        // insert data
        if (count($records) > 0) {
            $this->truncate();
            $this->insertBatch($records);
        }
        
        return count($records);
    }
}
