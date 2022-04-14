<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $company_id
 * @property string $company_name
 * @property string $company_email
 * @property string $company_logo
 * @property string $company_website
 * @property string $created_at
 * @property string $updated_at
 * @property Employee[] $employees
 */
class Company extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'company_id';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['company_name', 'company_email', 'company_logo', 'company_website', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany('App\Models\Employee', null, 'company_id');
    }
}
