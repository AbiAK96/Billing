<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Models\Status;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    public function index()
    {
        try {
            $products = $this->productRepository->get();
            $status = Status::get();
            return view('pages/product/product-list', ['status' => $status, 'products' => $products]);
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
        
    }
    
    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $this->productRepository->create($input);
            return redirect()->back()->with('message', 'Inserted Successfully.');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }

    public function update($id, Request $request)
    {
        try {
            $product = $this->productRepository->find($id);

        if (empty($product)) {
            return back()->withError("Error!");
        }
        $this->productRepository->update($request->all(), $id);
        return redirect()->back()->with('message', 'Updated Successfully.');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }

    public function destroy($id)
    {
        try {
            $product = $this->productRepository->find($id);

            if (empty($product)) {
                return back()->withError("Error!");
            }
            $this->productRepository->delete($id);
            return redirect()->back()->with('message', 'Deleted Successfully.');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }
}