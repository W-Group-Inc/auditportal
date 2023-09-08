<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use OwenIt\Auditing\Contracts\Auditable;
class AuditPlanAttachment extends Model implements Auditable
{
    //
    use \OwenIt\Auditing\Auditable;
    //


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
