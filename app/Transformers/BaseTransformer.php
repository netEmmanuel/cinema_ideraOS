<?php

namespace App\Transformers;

use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

trait BaseTransformer
{

    public function setPaginationLinks(AbstractPaginator $paginate, $params)
    {
        $paginate->setPageName('offset')->appends(array_except($params, 'offset'));
        return $paginate;
    }

    protected function getFractalInstance($includes = null)
    {
        $manager = new Manager();

        if ($includes) {
            $manager = $manager->parseIncludes($includes);
        }

        return $manager;
    }

    public function item($item, $callback, $includes = null)
    {
        $fractal = $this->getFractalInstance($includes);

        $resource = new Item($item, $callback);
        $rootScope = $fractal->createData($resource);

        return $rootScope->toArray();
    }

    public function collection($collection, $callback, $includes = null)
    {
        $fractal = $this->getFractalInstance($includes);

        $resource = new Collection($collection, $callback);
        $rootScope = $fractal->createData($resource);

        return $rootScope->toArray();
    }

}
