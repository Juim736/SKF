<?php

namespace Modules\Account\Entities;

use App\Libraries\CommonFunction;
use Illuminate\Database\Eloquent\Model;

class OfficeAccount extends Model
{
    protected $fillable = [];

    public static function boot() {
        parent::boot();
        static::creating(function($post) {
            $post->created_by = CommonFunction::getUserId();
            $post->updated_by = CommonFunction::getUserId();
        });

        static::updating(function($post) {
            $post->updated_by = CommonFunction::getUserId();
        });
    }
}
