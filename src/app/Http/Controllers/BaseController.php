<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class BaseController extends Controller
{
    /**
     * @param $items
     * @param array $options
     * @return LengthAwarePaginator
     */
    public function paginate($items, $options = []): LengthAwarePaginator
    {
        $perPage = config("finance.records_per_page");
        $page = (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        $options = array_merge(['path' => Request()->url()], $options);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
