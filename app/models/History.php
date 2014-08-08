<?php

class history extends Eloquent {

	protected $table = 'historys';


    public function user() {
        # history belongs to user
        return $this->belongsTo('User');
    }
	

}
