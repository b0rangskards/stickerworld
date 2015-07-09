<?php


use Laracasts\Presenter\PresentableTrait;

class Branch extends \Eloquent {

    use PresentableTrait;

    /** fillable fields prevent mass assignment exception
     * @var array
     */
    protected $fillable = ['name', 'contact_no', 'address', 'lat', 'lng'];


    /**
     * Path to the presenter for a branch.
     *
     * @var string
     */
    protected $presenter = 'Acme\Presenters\BranchPresenter';


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

    /**
     * @param $id
     * @param $name
     * @param $address
     * @param $contact_no
     * @param $lat
     * @param $lng
     * @return \Illuminate\Support\Collection|null|static
     */
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

    public static function getDataForSelect($except = [])
    {
        if ( empty($exceptRoles) ) {
            return static::select(['id', 'name', 'address'])
                ->orderBy('id')
                ->get();
        }

        return static::select(['id', 'name', 'address'])
            ->whereNotIn('name', $except)
            ->orderBy('id')
            ->get();
    }


    /* Scope Queries */

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