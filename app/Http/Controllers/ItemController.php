<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    protected $item;

    /**
     * Create a new controller instance.
     *
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * @return Collection|static[]
     */
    public function index(): object
    {
        return $this->item->all();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function store(Request $request): array
    {
        $validator = app('validator')->make($request->all(), [
            'name' => 'required|string',
            'price' => 'required|integer|min:1'
        ]);
        if ($validator->fails())
            return ['created' => false, 'errors' => $validator->errors()];

        $data = $request->all();
        $item = $this->item->create($data);
        if (!$item)
            return ['created' => false];

        return ['created' => true, 'item' => $item];
    }

    /**
     * @param string $id
     * @return array
     */
    public function show(string $id): array
    {
        return $this->item->findOrFail($id);
    }
}
