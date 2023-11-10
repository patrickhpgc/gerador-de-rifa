<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PdfController extends Controller
{

    public function index(Request $request)
    {
        return view('pdf');
    }

    public function generate(Request $request)
    {

        $settings = $request->only([
            'option',
            'title',
            'description',
            'quantity',
            'image',
        ]);

        $validator = Validator::make(
            $settings,
            [
                'option' => ['required', 'string', 'max:100'],
                'title' => ['string', 'max:100', 'nullable'],
                'description' => ['string', 'max:1000', 'nullable'],
                'quantity' => ['numeric', 'max:1000', 'nullable'],
                // 'image' => 'image|mimes:png,jpg,jpeg|max:5000',
            ]
        );

        self::emptyImages();
        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        if ($validator->fails()) {
            return redirect()->route('home')->withErrors($validator);
        }

        if (!empty($settings['description'])) {
            $settings['description'] = Str::markdown($settings['description']);
        }

        $data['settings'] = $settings;

        if ($settings['option'] == 'print') {
            $pdf = Pdf::loadView('pdf', $data);
            return $pdf->stream();
        } else if ($settings['option'] == 'download') {
            $pdf = Pdf::loadView('pdf', $data);
            return $pdf->download('rifa.pdf');
        } else {
            return redirect()->route('home')->withErrors(['Informe se deseja "Gerar impressão" ou "Fazer download do PDF".']);
        }
    }

    public function emptyImages()
    {
        $files = glob(public_path('images') . '/*'); // get all file names
        foreach ($files as $file) { // iterate files
            if (is_file($file)) {
                unlink($file); // delete file
            }
        }
    }
}
