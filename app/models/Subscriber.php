<?php

class Subscriber extends \Eloquent {
	protected $fillable = ['email', 'level', 'description', 'active', 'conformed', 'activation_code', 'confirmation_code'];
}