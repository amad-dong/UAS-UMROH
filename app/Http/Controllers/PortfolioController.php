<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolioData = Portfolio::all();  // Mengambil semua data  

        return view('portfolio', compact('portfolioData'));  

        // Cek jika data tidak ditemukan  
        if (!$portfolioData) {
            // Tangani kasus ketika tidak ada data  
            // Misalnya, Anda bisa mengalihkan pengguna atau menampilkan pesan  
            return view('portfolio')->with('message', 'Tidak ada data merek pribadi ditemukan.');
        }

        return view('portfolio', compact('portfolioData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        //
    }
}