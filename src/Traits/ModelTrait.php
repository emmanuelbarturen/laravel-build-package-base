<?php namespace VendorName\PackageName\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;


trait ModelTrait
{
    protected $attribute_key = 'attribute_name';

    /**
     * @return array
     */
    abstract public function functionWouldBeImplement(): array;

    /**
     * boot class. Binding trait to model. Remove if is necessary
     */
    protected static function bootPackageNameTrait()
    {
        static::created(function (Model $model) {
            # code after created
        });

        static::updated(function (Model $model) {
            # code after updated
            $model->aBehavior();
        });
    }

    /**
     * @return array
     */
    public function aBehavior(): array
    {
        $data = $this->functionWouldBeImplement();
        # do magic with data variable
        $identifier = Arr::pull($data, $this->attribute_key);
        return $identifier;

    }
}