<?php

namespace App\Traits;
use App\Models\Seo;

trait SeoModel{
    public function getSeoAttribute(){
        return $this->seos();
    }

    public function seos(){
        return Seo::where(['modelable_type'=>$this->getModelAttribute(), 'modelable_id'=>$this->id])->first();
    }

    public function getModelAttribute(){
        return str_replace('\\','/', get_class($this));
    }
}