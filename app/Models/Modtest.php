<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Modtest
 * @package App\Models
 * @version September 12, 2022, 6:52 am UTC
 *
 * @property string $field_A
 * @property string $field_B
 */
class Modtest extends Model
{
    use SoftDeletes;


    public $table = 'modtest';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'field_A',
        'field_B'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'field_A' => 'string',
        'field_B' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
