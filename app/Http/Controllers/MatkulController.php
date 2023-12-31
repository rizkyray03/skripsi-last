<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Enroll;
use App\Models\Matkul;

use App\Models\Pertemuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->dosen) {
            $id_dosen = Auth::user()->dosen->id;
            $matkuls = Matkul::with('semester', 'prodi')->where('dosen_id', $id_dosen)->get();
            return view('frontend.pages.matkul', ['matkuls' => $matkuls]);
        } else {
            $mahasiswa_id = Auth::user()->mahasiswa->id;
            $matkuls = Enroll::where('mahasiswa_id', $mahasiswa_id)->with('matkul.dosen')->get();
            return view('frontend.pages.matkul', ['matkuls' => $matkuls]);
        }
    }

    public function pertemuanPreview($id)
    {
        //Ambil 1 record yang punya id di $id
        $matkul = Matkul::with('semester', 'prodi')->findOrFail($id);
        $pertemuans = Pertemuan::where('matkul_id', $id)->get();
        $lastPertemuan = Pertemuan::where('matkul_id', $id)->latest()->first();
        $totalUser = Enroll::where('matkul_id', $matkul->id)->get();

        if (Auth::user()->dosen) {
            checkPermission($matkul->dosen_id, Auth::user()->dosen->id);
            return view('frontend/pages/dosen/pertemuan/dosen-pertemuan', compact('pertemuans', 'matkul', 'lastPertemuan', 'totalUser'));
        } else {

            $enroll_id = Matkul::where('id', $id)->first();
            $mahasiswa = Auth::user()->mahasiswa;
            $sudahEnroll = $mahasiswa->enroll()->where('matkul_id', $enroll_id->id)->exists();

            if (!$sudahEnroll) {
                abort(403, 'Tidak terdaftar pada mata kuliah ini');
            }

            return view('frontend/pages/mahasiswa/pertemuan/mahasiswa-pertemuan', compact('pertemuans', 'matkul', 'enroll_id', 'lastPertemuan', 'sudahEnroll', 'totalUser'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('frontend.pages.dosen.matkul.tambah-matkul');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama_matkul' => 'required',
            'deskripsi' => 'required|min:20',
            'gambar' => 'required|file',
            'semester_id' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'prodi' => 'required',
            'kode_matkul' => 'unique:matkuls,kode_matkul',
        ]);

        $nama_matkul = $request->input('nama_matkul');
        $jam = $request->input('jam');
        $deskripsi = $request->input('deskripsi');
        $semester_id = $request->input('semester_id');
        $hari = $request->input('hari');
        $prodi_id = $request->input('prodi');
        $kode_mk = $request->input('kode_matkul');
        $gambar = $request->file('gambar'); // Use file() instead of input()

        // Convert the image to WebP format
        $webpImage = Image::make($gambar)->encode('webp', 90); // Adjust quality as needed
        $webpPath = 'public/thumbnail/' . time() . '.webp';
        // Save the WebP image to storage
        Storage::put($webpPath, $webpImage->stream());


        $userId = Auth::user()->dosen->id;

        $matkul = new Matkul;
        $matkul->nama_matkul = $nama_matkul;
        $matkul->dosen_id = $userId;
        $matkul->deskripsi = $deskripsi;
        $matkul->gambar = $webpPath;
        $matkul->jam = $jam;
        $matkul->semester_id = $semester_id;
        $matkul->prodi_id = $prodi_id;
        $matkul->hari = $hari;

        $matkul->kode_matkul = $kode_mk;
        $matkul->save();

        Session::flash('success');

        return redirect('/matkul');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matkul = Matkul::findOrFail($id);
        $matkul->load('dosen');
        return view('frontend.pages.matkul-preview', compact('matkul'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the Matkul model by ID
        $matkul = Matkul::with('semester', 'prodi')->findOrFail($id);

        checkPermission($matkul->dosen_id, Auth::user()->dosen->id);
        return view('frontend.pages.dosen.matkul.edit-matkul', compact('matkul'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $matkul = Matkul::findOrFail($id);
        $dosen_id = Auth::user()->dosen->id;

        // Check permission before updating
        checkPermission($matkul->dosen_id, $dosen_id);

        $request->validate([
            'nama_matkul' => 'required',
            'deskripsi' => 'required|min:20',
            'gambar' => 'required',
            'semester_id' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'prodi' => 'required',
            'kode_matkul' => 'unique:matkuls,kode_matkul',
        ]);

        // If a new image file is uploaded, update the image
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $webpImage = Image::make($gambar)->encode('webp', 90);
            $webpPath = 'public/thumbnail/' . time() . '.webp';
            Storage::put($webpPath, $webpImage->stream());
            $matkul->gambar = $webpPath;
        } else {
            $gambar = $request->input('gambar'); // Use file() instead of input()
            $matkul->gambar = $gambar;
        }

        $nama_matkul = $request->input('nama_matkul');
        $jam = $request->input('jam');
        $deskripsi = $request->input('deskripsi');
        $semester_id = $request->input('semester_id');
        $hari = $request->input('hari');
        $prodi_id = $request->input('prodi');
        $kode_mk = $request->input('kode_matkul');




        $matkul->nama_matkul = $nama_matkul;
        $matkul->jam = $jam;
        $matkul->dosen_id = $dosen_id;
        $matkul->deskripsi = $deskripsi;
        $matkul->semester_id = $semester_id;
        $matkul->hari = $hari;
        $matkul->prodi_id = $prodi_id;
        $matkul->kode_matkul = $kode_mk;


        $matkul->update();

        Session::flash('success');

        return redirect('/matkul');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
