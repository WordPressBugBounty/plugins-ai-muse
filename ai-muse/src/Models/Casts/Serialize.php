<?php

namespace AIMuse\Models\Casts;

use AIMuseVendor\Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Serialize implements CastsAttributes
{
  public function get($model, string $key, $value, array $attributes)
  {
    return unserialize($value);
  }

  public function set($model, string $key, $value, array $attributes)
  {
    return serialize($value);
  }
}
