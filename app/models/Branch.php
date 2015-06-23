<?php


class Branch extends \Eloquent {

    /** fillable fields prevent mass assignment exception
     * @var array
     */
    protected $fillable = ['name', 'contact_no', 'address', 'lat', 'lng'];

    /**
     * @param $name
     * @param $address
     * @param $contact_no
     * @param $lat
     * @param $lng
     * @return static
     */
    public static function newBranch($name, $address, $contact_no, $lat, $lng)
    {
        return new static(compact('name', 'address', 'contact_no', 'lat', 'lng'));
    }

    public static function updateInformation($id, $name, $address, $contact_no, $lat, $lng)
    {
        $branch = static::find($id);

        $branch->name = $name;

        $branch->address = $address;

        $branch->contact_no = $contact_no;

        $branch->lat = $lat;

        $branch->lng = $lng;

        return $branch;
    }

    public static function close($id)
    {
        return static::find($id);
    }

    public function scopeOperational($query)
    {
        return $query->whereRecstat('A');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('address', 'LIKE', "%$search%");
    }

}