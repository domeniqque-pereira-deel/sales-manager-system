<?php

namespace App\Controllers;

use App\Repositories\CategoriesRepositories;
use Core\Request;

class CategoriesController
{
    /**
     * @var CategoriesRepositories
     */
    protected $repository;

    /**
     * ProductsController constructor.
     */
    public function __construct()
    {
        $this->repository = new CategoriesRepositories;
    }

    /**
     * Require the view
     */
    public function index()
    {
        return view("categories.index", array(
            'categories' => $this->repository->all()
        ));
    }

    /**
     * Store a category
     */
    public function store()
    {
        $response = $this->repository->save(Request::all());

        message()->flash($response["type"], $response["message"]);

        return redirectTo("categories");
    }

    /**
     * Delete
     */
    public function delete()
    {
        $response = $this->repository->delete((int) Request::get('id'));

        message()->flash($response["type"], $response["message"]);

        redirectTo("categories");
    }
}