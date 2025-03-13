<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . '../vendor/autoload.php'; // Load Composer Autoload
use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf {
    public function createPDF($html, $filename = 'laporan.pdf', $paper = 'A4', $orientation = 'portrait') {
        $options = new Options();
        $options->set('defaultFont', 'Arial');

        // Inisialisasi Dompdf
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();

        // Download file
        $dompdf->stream($filename, array("Attachment" => false));
    }
}
