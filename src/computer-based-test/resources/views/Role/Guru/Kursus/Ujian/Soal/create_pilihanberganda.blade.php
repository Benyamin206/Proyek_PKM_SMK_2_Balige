@extends('layouts_guru.app',[
    'title' => 'Tambah Soal - Pilihan Ganda',
    'contentTitle' => 'Tambah Soal - Pilihan Ganda',
])

@push('css')
<link rel="stylesheet" href="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/summernote') }}/summernote-bs4.min.css">
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.3.0/ckeditor5.css" />
<script src="https://cdn.ckeditor.com/ckeditor5/44.3.0/ckeditor5.umd.js"></script>
@endpush

<script src="https://cdn.tailwindcss.com"></script>

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Input Pertanyaan -->
                    <div class="form-group">
                        <label for="pertanyaan">Pertanyaan</label>
                        <textarea required="" name="pertanyaan_pilihanberganda" id="pertanyaan" class="text-dark form-control summernote"></textarea>
                    </div>

                    <!-- Input Jawaban -->
                    <label class="block text-gray-700 font-semibold mb-2">Pilihan Jawaban</label>
                    <div class="space-y-3">
                        @foreach(['A', 'B', 'C', 'D'] as $key => $option)
                        <div class="flex items-center gap-2 border p-2 rounded-lg">
                            <span class="font-semibold">{{ $option }}.</span>
                            <input type="text" name="jawaban[{{ $option }}]" class="flex-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required placeholder="Masukkan jawaban {{ $option }}">

                            <!-- Input Persentase -->
                            <input type="number" name="persentase[{{ $option }}]" min="0" max="100" class="w-20 p-2 border border-gray-300 rounded-lg text-center focus:outline-none focus:ring-2 focus:ring-blue-500" required placeholder="%">
                        </div>
                        @endforeach
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="mt-4">
                        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition" onclick="return validatePercentage()">
                            Simpan Soal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@push('js')
<script type="text/javascript" src="{{ asset('plugins/summernote') }}/summernote-bs4.min.js"></script>
<script>
    $(".summernote").summernote({
            height:500,
            callbacks: {
            // callback for pasting text only (no formatting)
                onPaste: function (e) {
                  var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                  e.preventDefault();
                  bufferText = bufferText.replace(/\r?\n/g, '<br>');
                  document.execCommand('insertHtml', false, bufferText);
                }
            }
        })

        $(".summernote").on("summernote.enter", function(we, e) {
            $(this).summernote("pasteHTML", "<br><br>");
            e.preventDefault();
        });

    function validatePercentage() {
        let total = 0;
        document.querySelectorAll('input[name^="persentase"]').forEach(input => {
            total += parseInt(input.value) || 0;
        });

        if (total !== 100) {
            Swal.fire({
                title: 'Error!',
                text: 'Total persentase harus 100%',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return false;
        }
        return true;
    }

    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif

        @if(session('error'))
            Swal.fire({
                title: 'Gagal!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        @endif
    });
</script>


@endpush
