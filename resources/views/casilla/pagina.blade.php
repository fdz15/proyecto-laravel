<style>
    .page-break {page-break-after: always;}
</style>

<h1>Pagina 1</h1>
<div class='page-break'></div>

<h1>Pagina 2</h1>
@php
if ( isset($pdf) ) {
 $pdf->page_script('
 $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
 $pdf->text(270, 730, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 10);
 ');
 }
@endphp
       