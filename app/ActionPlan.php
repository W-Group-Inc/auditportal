<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use OwenIt\Auditing\Contracts\Auditable;
class ActionPlan extends Model implements Auditable
{
    
    //
    use \OwenIt\Auditing\Auditable;

    public function teams()
    {
        return $this->hasMany(ActionPlanInvolve::class);
    }
    public function observation()
    {
        return $this->belongsTo(AuditPlanObservation::class,'audit_plan_observation_id','id');
    }
    public function histories()
    {
        return $this->hasMany(ActionPlanRemark::class)->orderBy('created_at','desc');
    }
}