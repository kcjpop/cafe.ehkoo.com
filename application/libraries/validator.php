<?php
class Validator extends Laravel\Validator
{
	public function validate_array_at_least_not_empty($attributes, $values, $parameters)
	{
		foreach($values as $value)
		{
			if(!empty($value))
			{
				return true;
			}
		}

		return false;
	}
}