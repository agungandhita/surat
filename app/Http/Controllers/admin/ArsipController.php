<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ArsipController extends Controller
{
    public function index()
    {
        $arsips = Arsip::latest()->get();
        return view('admin.arsip.index', compact('arsips'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_surat' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'asal_surat' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'file_surat' => 'required|mimes:pdf,doc,docx|max:2048'
        ]);

        try {
            $file = $request->file('file_surat');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('arsip', $fileName, 'public');

            Arsip::create([
                'jenis_surat' => $request->jenis_surat,
                'perihal' => $request->perihal,
                'tanggal_surat' => $request->tanggal_surat,
                'asal_surat' => $request->asal_surat,
                'keterangan' => $request->keterangan,
                'file_surat' => $filePath,
                'created_by' => Auth::id(),
                'updated_by' => Auth::id()
            ]);

            Alert::success('Success', 'Arsip berhasil ditambahkan');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Gagal menambahkan arsip');
            return redirect()->back();
        }
    }

    public function update(Request $request, Arsip $arsip)
    {
        $request->validate([
            'jenis_surat' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'asal_surat' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'file_surat' => 'nullable|mimes:pdf,doc,docx|max:2048'
        ]);

        try {
            $data = [
                'jenis_surat' => $request->jenis_surat,
                'perihal' => $request->perihal,
                'tanggal_surat' => $request->tanggal_surat,
                'asal_surat' => $request->asal_surat,
                'keterangan' => $request->keterangan,
                'updated_by' => Auth::id()
            ];

            if ($request->hasFile('file_surat')) {
                // Delete old file
                if ($arsip->file_surat) {
                    Storage::disk('public')->delete($arsip->file_surat);
                }

                // Store new file
                $file = $request->file('file_surat');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('arsip', $fileName, 'public');
                $data['file_surat'] = $filePath;
            }

            $arsip->update($data);

            Alert::success('Success', 'Arsip berhasil diperbarui');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Gagal memperbarui arsip');
            return redirect()->back();
        }
    }

    public function destroy(Arsip $arsip)
    {
        try {
            if ($arsip->file_surat) {
                Storage::disk('public')->delete($arsip->file_surat);
            }

            $arsip->delete();

            Alert::success('Success', 'Arsip berhasil dihapus');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Gagal menghapus arsip');
            return redirect()->back();
        }
    }


}
