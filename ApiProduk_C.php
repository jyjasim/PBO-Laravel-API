<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TbProduk;
use App\Http\Resources\ProdukResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ApiProduk_C extends Controller
{
   // GET
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TbProduk::all();
        Log::info("User sedang melihat data produk");
        return new ProdukResource(true, 'List Data Produk', $data);
    }

    // POST
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //define validation rules
        $validator = Validator::make($request->all(), [
            'judulProduk'     => 'required',
            'descripsi'   => 'required',
            'harga'   => 'required',
            'gambar'     => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        
            //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
            //upload image
        $image = $request->file('gambar');
        $image->storeAs('foto/', $image->hashName());
        
            //create post
        $data = TbProduk::create([
            'judulProduk'     => $request->judulProduk,
            'descripsi'   => $request->descripsi,
            'harga'   => $request->harga,
            'gambar'     => $image->hashName(),
        ]);

        Log::info("User sedang menambahkan data");
        
            //return response
        return new ProdukResource(true, 'Data Produk Berhasil Ditambahkan!', $data);
    }

     // SHOW
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = TbProduk::find($id);
        Log::info("User sedang mencari data produk");
            //return single post as a resource
        return new ProdukResource(true, 'Data Produk Ditemukan!', $data);
    }

    // PUT
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = TbProduk::find($id);
        
            //check if image is not empty
        if ($request->hasFile('gambar')) {
        
                //upload image
        $image = $request->file('gambar');
        $image->storeAs('foto/', $image->hashName());
        
                //delete old image
        Storage::delete('foto/'.$data->gambar);
        
                //update post with new image
        $data->update([
            'judulProduk'     => $request->judulProduk,
            'descripsi'   => $request->descripsi,
            'harga'   => $request->harga,
            'gambar'     => $image->hashName(),
        ]);

        Log::info("User sedang memperbarui data");

                //return response
            return new ProdukResource(true, 'Data Produk Berhasil Diubah!', $data);
        }
    }
    
    // DELETE
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = TbProduk::find($id);

            //delete image
        Storage::delete('foto/'.$data->gambar);

            //delete produk
        $data->delete();

        Log::info("User sedang menghapus data");
        
            //return response
        return new ProdukResource(true, 'Data Produk Berhasil Dihapus!', null);
    }
}
