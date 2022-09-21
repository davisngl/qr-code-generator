<?php

namespace App\Http\Livewire;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class QrCodeGenerator extends Component
{
    public ?string $url = null;
    public bool $generating = false;
    public string $generatedImage = '';

    public function updatingUrl()
    {
        $this->clearValidation('url');
    }

    public function generate()
    {
        $this->validate([
            'url' => ['required', 'url'],
        ]);

        $this->generating = true;

        $this->generateQrCode();

        $this->generating = false;
    }

    public function render(): View
    {
        return view('livewire.qr-code-generator');
    }

    private function generateQrCode()
    {
        $this->generatedImage =  Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($this->url)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->labelText('URL')
            ->labelFont(new NotoSans(20))
            ->labelAlignment(new LabelAlignmentCenter())
            ->build()
            ->getDataUri();
    }
}
