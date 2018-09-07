<?php

namespace App\Models\Traits;

trait DwSubmissionGenericQueryTraits {
	private static function orderBy() {
	   return self::$groupBy;
	}
}
