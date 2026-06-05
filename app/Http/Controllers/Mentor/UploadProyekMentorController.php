<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UploadProyekMentor;
use Illuminate\Support\Facades\Storage;
class UploadProyekMentorController extends Controller
{
    /**
     * Tampilkan halaman form upload proyek
     */
    public function create()
    {
        return view('mentor.upload_proyek');
    }

    /**
     * Simpan data proyek mentor ke database
     */
    public function store(Request $request)
    {
        // VALIDASI INPUT
        $request->validate([
            'judul_proyek' => 'required|string|max:255',
            'deskripsi'    => 'nullable|string',
            'file_proyek'  => 'required|file|mimes:pdf,zip,rar,docx|max:20480',
        ]);

        $filePath = null;

        // CEK DAN SIMPAN FILE
        if ($request->hasFile('file_proyek')) {
            $filePath = $request->file('file_proyek')
                ->store('proyek_mentor', 'public');
        }

        // SIMPAN KE DATABASE
        UploadProyekMentor::create([
            'mentor_id'    => auth()->id(),
            'judul_proyek' => $request->judul_proyek,
            'deskripsi'    => $request->deskripsi,
            'file_proyek'  => $filePath,
        ]);

        // REDIRECT KE DASHBOARD + NOTIFIKASI
        return redirect()
            ->route('mentor.dashboard')
            ->with('success', 'Proyek berhasil diupload!');
    }
    public function edit($id)
{
    $proyek = UploadProyekMentor::findOrFail($id);

    return view('mentor.edit_proyek', compact('proyek'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'judul_proyek' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'file_proyek' => 'nullable|file|mimes:pdf,zip,rar|max:20480',
    ]);

    $proyek = UploadProyekMentor::findOrFail($id);

    if ($request->hasFile('file_proyek')) {

        // hapus file lama
        if ($proyek->file_proyek) {
            Storage::disk('public')->delete($proyek->file_proyek);
        }

        $filePath = $request->file('file_proyek')
            ->store('proyek_mentor', 'public');

        $proyek->file_proyek = $filePath;
    }

    $proyek->update([
        'judul_proyek' => $request->judul_proyek,
        'deskripsi' => $request->deskripsi,
        'file_proyek' => $proyek->file_proyek,
    ]);

    return redirect()->route('mentor.dashboard')
        ->with('success', 'Proyek berhasil diupdate!');
}
public function destroy($id)
{
    $proyek = UploadProyekMentor::findOrFail($id);

    if ($proyek->file_proyek) {
        Storage::disk('public')->delete($proyek->file_proyek);
    }

    $proyek->delete();

    return redirect()->back()
        ->with('success', 'Proyek berhasil dihapus!');
}
public function show($id)
{
    $proyek = UploadProyekMentor::findOrFail($id);

    return view('mentor.show_proyek', compact('proyek'));
}
}