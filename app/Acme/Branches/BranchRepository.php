<?php namespace Acme\Branches;

use Acme\Base\BaseRepositoryInterface;
use Branch;


class BranchRepository implements BaseRepositoryInterface {

    /**
     * Persist a branch
     *
     * @param Branch $branch
     * @return bool
     */
    public function save(Branch $branch)
    {
        return $branch->save();
    }

    /**
     * Delete a branch.
     *
     * @param Branch $branch
     * @return bool|null
     * @throws \Exception
     */
    public function close(Branch $branch)
    {
        return $branch->delete();
    }

    /**
     * Get Paginated List of all branches
     *
     * @param int $howMany
     * @return \Illuminate\Pagination\Paginator
     */
    public function getPaginated($howMany = 3)
    {
        return Branch::operational()
            ->orderBy('created_at', 'desc')
            ->simplePaginate($howMany);
    }

    /**
     * @return mixed
     */
    public function getTableData()
    {
        return Branch::all();
    }

    public function getTableColumns()
    {
        return [
            ['column' => 'Branch', 'width' => '2'],
            ['column' => 'Address', 'width' => '2'],
            ['column' => 'Contact', 'width' => '1'],
            ['column' => 'Action', 'width' => '1']
        ];
    }

    public function search($query)
    {
        return Branch::search($query)
            ->operational()
            ->orderBy('created_at', 'desc')
            ->simplePaginate();
    }
}