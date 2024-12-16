<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Models\Katalog;
use App\Models\Kategori;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Exception;

class KatalogController extends Controller
{
    public $active;

    public function __construct()
    {
        $this->active = 'products';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $katalog = Katalog::all();
        $stokHabis = Katalog::where('stok', 0)->count();

        return view('pengelola.katalog.index', [
            'katalog' => $katalog,
            'active' => $this->active,
            'stokHabis' => $stokHabis,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('pengelola.katalog.add', [
            'active' => $this->active,
            'kategori' => $kategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required|exists:App\Models\Kategori,id',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'nullable',
            'gambar' => 'required|file|mimes:jpg,bmp,png'
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'kategori.required' => 'Kategori tidak boleh kosong',
            'kategori.exists' => 'Kategori harus sesuai dengan data yang ada pada database',
            'harga.required' => 'Harga tidak boleh kosong',
            'harga.numeric' => 'Harga tidak boleh mengandung selain penomoran',
            'stok.required' => 'Stok tidak boleh kosong',
            'stok.numeric' => 'Stok tidak boleh mengandung selain penomoran',
            'gambar.required' => 'Gambar tidak boleh kosong',
            'gambar.file' => 'Gambar harus berbentuk file',
            'gambar.mimes' => 'Format gambar harus :values'
        ]);

        try {
            $produk = $request->gambar->store('public/produk');
            $namaProduk = explode('/', $produk)[2];
            $insert = Katalog::create([
                'nama' => $request->nama,
                'kategori_katalog_id' => $request->kategori,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'deskripsi' => $request->deskripsi,
                'gambar' => $namaProduk
            ]);
            return redirect()
                ->route('pengelola.katalog.index')
                ->with('success', 'Berhasil menambahkan data');
        } catch (Exception $e) {
            Storage::delete('public/produk/' . $namaProduk);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Katalog $katalog)
    {
        $kategori = Kategori::all();
        return view('pengelola.katalog.edit', [
            'katalog' => $katalog,
            'active' => $this->active,
            'kategori' => $kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|exists:App\Models\Kategori,id',
            'harga' => 'required | numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|file|mimes:jpg,bmp,png'
        ]);
    
        $katalog = Katalog::find($id);
    
        if (!$katalog) {
            return redirect()->route('pengelola.katalog.index')->with('error', 'Produk tidak ditemukan.');
        }
    
        // Cek apakah kombinasi nama dan harga yang baru sudah ada di database untuk ID yang berbeda
        $existing = Katalog::where('nama', $request->nama)
                            ->where('harga', $request->harga)
                            ->where('id', '!=', $id)
                            ->first();
    
        if ($existing) {
            Log::warning('Duplicate entry detected', ['nama' => $request->nama, 'harga' => $request->harga]);
            return redirect()->back()->with('error', 'Kombinasi nama dan harga sudah ada.');
        }
    
        
        // $produk = $request->gambar->store('public/produk');
        // $namaProduk = explode('/', $produk)[2];

        // $gambar = $request->gambar;

        // $namaProduk = 'HusU9a33ZWMuY5C4cPCAMppsI87Hk2xyCPk1lhrk.png';
        
        $request->merge(['gambar' => $namaProduk]);

        $katalog->update($request->all());
    
        return redirect()->route('pengelola.katalog.index')->with('success', 'Produk berhasil diperbarui.');
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Katalog $katalog)
    {
        Storage::delete('public/produk/' . $katalog->gambar);
        $katalog->delete();

        return redirect()->back()->with('success', 'Berhasil hapus produk');
    }
}
