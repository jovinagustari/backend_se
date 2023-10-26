<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    // buat property animals
    public $animals = ["Kucing", "Kelinci", "Kuda"];

    public function index() {
        echo "Menampilkan data animals";
        echo "<br>";
        foreach ($this->animals as $animal)
        {
            echo $animal;
            echo "<br>";
        }

        // kalo mau bentuk json
        // $data = [
        //  'data' => $this->animals
        // ];
        // return response()->json($data);
    }

    // request itu dipakai karna kita ngambil dri api, request itu fungsi bawaan laravel
    public function store(Request $request) {
        echo "Menambahkan hewan baru";
        echo "<br>";
        echo "Nama hewan : " , array_push($this->animals, $request->nama);
        echo "<br>";
        $this->index();
    }

    public function update(Request $request, $id) {
        echo "Mengupdate data animals id $id";
        $this->animals[$index] = $request->nama;
        // echo "Nama hewan : $request->nama";
        // echo "<br>";
        // echo "Mengupdate data animals id $id";
    }

    public function destroy($id) {
        array_splice($this->animals, $index, 1);
        // echo "Menghapus data animals id $id";
    }
}
