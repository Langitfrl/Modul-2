<?php

namespace App\Http\Controllers;

use App\Models\DataAkun; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AkunController extends Controller
{
    public function create()
    {
        return view('akun.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('signup') // Mengganti route('signup.php') menjadi route('signup')
                ->withErrors($validator)
                ->withInput();
        }

        Akun::create($request->all());

        return redirect()->route('signup') // Mengganti route('signup.php') menjadi route('signup')
            ->with('success', 'Akun created successfully.');
    }

    public function show(Akun $akun)
    {
        return view('akun.show', compact('akun'));
    }

    public function edit(Akun $akun)
    {
        return view('akun.edit', compact('akun'));
    }

    public function update(Request $request, Akun $akun)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $akun->update($request->all());

        return redirect()->route('signup') // Mengganti route('signup.php') menjadi route('signup')
            ->with('success', 'Akun updated successfully');
    }

    public function destroy(Akun $akun)
    {
        $akun->delete();

        return redirect()->route('signup') // Mengganti route('signup.php') menjadi route('signup')
            ->with('success', 'Akun deleted successfully');
    }
}