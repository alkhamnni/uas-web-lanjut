<?php 
namespace App\Http\Controllers;

use App\Models\Handphone;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HandphoneController extends Controller
{
    public function index()
    {
        $query = Handphone::latest();
        if (request('search')) {
            $query->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('deskripsi', 'like', '%' . request('search') . '%');
        }
        $handphones = $query->paginate(6)->withQueryString();
        return view('homepage', compact('handphones'));
    }

    public function detail($id)
    {
        $handphone = Handphone::find($id);
        return view('detail', compact('handphone'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('input', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'string', 'max:255', Rule::unique('handphone', 'id')],
            'nama' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'deskripsi' => 'required|string',
            'tahun' => 'required|integer',
            'perusahaan' => 'required|string',
            'foto_sampul' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect('handphones/create')
                ->withErrors($validator)
                ->withInput();
        }

        $randomName = Str::uuid()->toString();
        $fileExtension = $request->file('foto_sampul')->getClientOriginalExtension();
        $fileName = $randomName . '.' . $fileExtension;

        $request->file('foto_sampul')->move(public_path('images'), $fileName);

        Handphone::create([
            'id' => $request->id,
            'nama' => $request->nama,
            'category_id' => $request->category_id,
            'deskripsi' => $request->deskripsi,
            'tahun' => $request->tahun,
            'perusahaan' => $request->perusahaan,
            'foto_sampul' => $fileName,
        ]);

        return redirect('/')->with('success', 'Data berhasil disimpan');
    }

    public function data()
    {
        $handphones = Handphone::latest()->paginate(10);
        return view('data-handphones', compact('handphones'));
    }

    public function edit($id)
    {
        $handphone = Handphone::find($id);
        $categories = Category::all();
        return view('form-edit', compact('handphone', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'deskripsi' => 'required|string',
            'tahun' => 'required|integer',
            'perusahaan' => 'required|string',
            'foto_sampul' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect("/handphones/edit/{$id}")
                ->withErrors($validator)
                ->withInput();
        }

        $handphone = Handphone::findOrFail($id);

        if ($request->hasFile('foto_sampul') && $request->file('foto_sampul')->isValid()) {
            $randomName = Str::uuid()->toString();
            $fileExtension = $request->file('foto_sampul')->getClientOriginalExtension();
            $fileName = $randomName . '.' . $fileExtension;

            $request->file('foto_sampul')->move(public_path('images'), $fileName);

            if (File::exists(public_path('images/' . $handphone->foto_sampul))) {
                File::delete(public_path('images/' . $handphone->foto_sampul));
            }

            $handphone->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'category_id' => $request->category_id,
                'tahun' => $request->tahun,
                'perusahaan' => $request->perusahaan,
                'foto_sampul' => $fileName,
            ]);
        } else {
            $handphone->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'category_id' => $request->category_id,
                'tahun' => $request->tahun,
                'perusahaan' => $request->perusahaan,
            ]);
        }

        return redirect('/handphones/data')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $handphone = Handphone::findOrFail($id);

        if (File::exists(public_path('images/' . $handphone->foto_sampul))) {
            if ($handphone->foto_sampul != 'default.jpg') {
                File::delete(public_path('images/' . $handphone->foto_sampul));
            }
        }

        $handphone->delete();

        return redirect('/handphones/data')->with('success', 'Data berhasil dihapus');
    }
}
