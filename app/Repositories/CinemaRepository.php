<?php
namespace App\Repositories;

use App\Models\Cinema;

class CinemaRepository
{
    protected $cinema;
    public function __construct(cinema $cinema)
    {
        $this->cinema = $cinema;
    }
    public function all()
    {
        return $this->cinema->with('movies')->get();
    }
    public function create($data)
    {
        return $this->cinema->create([
            'name' => $data['name'],
            'location' => $data['location'],
            'address'=>$data['address'],
            'created_by' => $data['created_by']
        ]);
    }
}
