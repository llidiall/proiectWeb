<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;
  

class UsersModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id','username','password','admin'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['BeforeInsert'];
    protected $afterInsert    = ['AfterInsert'];
    protected $beforeUpdate   = ['BeforeUpdate'];
    protected $afterUpdate    = ['AfterUpdate'];
    protected $beforeFind     = ['BeforeFind'];
    protected $afterFind      = ['AfterFind'];
    protected $beforeDelete   = ['BeforeDelete'];
    protected $afterDelete    = ['AfterDelete'];
    
    protected function BeforeInsert(array $data) 
    {
        $rec = new DataModel();
        $myTime = new Time('now');
        $dat = ['name' =>  "BEFORE INSERT RECORD", "time" => $myTime];
        $rec->insert($dat);
        
        return $data;
    }
    
    protected function AfterInsert(array $data) 
    {
        $rec = new DataModel();
        $myTime = new Time('now');
        $dat = ['name' =>  "AFTER INSERT RECORD", "time" => $myTime];
        $rec->insert($dat);
        
        return $data;
    }
    
    protected function BeforeUpdate(array $data) 
    {
        $rec = new DataModel();
        $myTime = new Time('now');
        $dat = ['name' =>  "BEFORE UPDATE RECORD", "time" => $myTime];
        $rec->insert($dat);
        
        return $data;
    }
    
    protected function AfterUpdate(array $data) 
    {
        $rec = new DataModel();
        $myTime = new Time('now');
        $dat = ['name' =>  "AFTER UPDATE RECORD", "time" => $myTime];
        $rec->insert($dat);
        
        return $data;
    }
    
    protected function BeforeFind(array $data) 
    {
        $rec = new DataModel();
        $myTime = new Time('now');
        $dat = ['name' =>  "BEFORE FIND RECORD", "time" => $myTime];
        $rec->insert($dat);
        
        return $data;
    }
    
    protected function AfterFind(array $data) 
    {
        $rec = new DataModel();
        $myTime = new Time('now');
        $dat = ['name' =>  "AFTER FIND RECORD", "time" => $myTime];
        $rec->insert($dat);
        
        return $data;
    }
    
    protected function BeforeDelete(array $data) 
    {
        $rec = new DataModel();
        $myTime = new Time('now');
        $dat = ['name' =>  "BEFORE DELETE RECORD", "time" => $myTime];
        $rec->insert($dat);
        
        return $data;
    }
    
    protected function AfterDelete(array $data) 
    {
        $rec = new DataModel();
        $myTime = new Time('now');
        $dat = ['name' =>  "AFTER DELETE RECORD", "time" => $myTime];
        $rec->insert($dat);
        
        return $data;
    }
}
