<?php

namespace App\Http\Controllers\Mobile\Product;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Mobile\Category\CategoryController;
use App\Models\ProductCategories;
use Illuminate\Http\Request;

class UserProductController extends Controller
{

    public function getAllCategories(CategoryController $categoryController, ProductCategories $productCategories)
    {
        // get categories
        $categoryData = $categoryController->allCategories($productCategories)->getData();
        if ($categoryData->status === 'success') {
            $categories = $categoryData->data;
        } else {
            $categories = [];
        }

        return response()->json(['status' => 'success', 'message' => 'Data berhasil didapatkan', 'data' => $categories], 200);
    }

    
    public function getAllProducts()
    {
        try {

            // inisialisasi collection
            $firestore = app('firebase.firestore');
            $collectionRef = $firestore->database()->collection("0products");

            // mendapatkan semua data dalam collection
            $documents = $collectionRef->documents();

            $data = [];

            // membaca semua data dalam dokumen
            foreach ($documents as $document) {

                // mendapatkan data dari dokumen
                $docData = $document->data();

                // mendapatkan id dokumen
                $docId = $document->id();
                $docData['id'] = $docId;

                // save data
                $data[] = $docData;
            }

            // random urutan data pada $data
            shuffle($data);

            return response()->json(['status' => 'success', 'message' => 'Data berhasil didapatkan', 'data' => $data], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Gagal mendapatkan data: ' . $e->getMessage()], 500);
        }
    }
}
