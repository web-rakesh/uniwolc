<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePDF()
    {
        // Sample data to be passed to the PDF view
        $data = [
            'title' => 'Laravel PDF Example',
            'content' => 'This is an example of generating a PDF in Laravel using dompdf.',
        ];

        $pdf = PDF::loadView('pdf.example', $data);

        return $pdf->download('example.pdf');
    }
}
