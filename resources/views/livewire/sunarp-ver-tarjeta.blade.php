@php
$agent = new \Jenssegers\Agent\Agent;
$scale = 1;
if ($agent->isMobile()) {
  $scale = 0.6;
} else {
  $scale = 1;
}
@endphp
<div
  x-data="{ 
  open: true,
  url: @entangle('url'),
  PdfViewer: null
}"
  x-init="
  PdfViewer = PDFViewer({
    container: $refs.viewer,
    canvas: null,
    scale: {{ $scale }}
  })
  PdfViewer.loadSource(url);
  PdfViewer.init();
">
    <section class="container" style="height: 100%;padding-top:20px;">
        <div class="d-flex justify-content-center mb-3">
            <a href="{{ $url }}" download="{{ $codigo }}.pdf" target="_blank" class="btn btn-primary">Descargar</a>
        </div>
        <div class="d-flex justify-content-center">
            <div x-ref="viewer" class="mx-auto"></div>
        </div>
    </section>
    <div class="d-none">
      <div id="pageCount"></div>
      <div id="pageNum"></div>
      <div id="prev"></div>
      <div id="next"></div>
      <div id="upZoom"></div>
      <div id="downZoom"></div>
    </div>
  </div>
</div>
