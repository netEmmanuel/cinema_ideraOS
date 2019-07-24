<?php
namespace App\Services;

use App\Repositories\CinemaRepository;
use Illuminate\Http\Request;

class CinemaService
{
    protected $cinema;
    public function __construct(CinemaRepository $cinema)
    {
        $this->cinema = $cinema;
    }
    public function getAll()
    {
        return $this->cinema->all();
    }
    public function createCinema(Request $request)
    {
        $attributes = $request->all();
        $cinema = $this->cinema->create($attributes);
        return $cinema;
    }
}
