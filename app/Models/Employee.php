<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $employee_id
 * @property integer $company_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone_number
 * @property string $created_at
 * @property string $updated_at
 * @property Company $company
 */
class Employee extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'employee_id';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['company_id', 'first_name', 'last_name', 'email', 'phone_number', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo('App\Models\Company', null, 'company_id');
    }
}
