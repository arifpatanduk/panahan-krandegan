@extends('layouts.backend')
@section('title', 'Manajemen Informasi')
@section('information-active', 'active')
@section('content')
@livewire('admin.information.information', ['user' => $user], key(time() . $user->id))
@endsection

@push('addon-scripts')
    <script>
        window.addEventListener('rendertinymce', ()=>{
            console.log('helo');
            tinymce.init({
                target: $refs.tinymce,
                themes: 'modern',
                height: 200,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                setup: function(editor) {
                    editor.on('blur', function(e) {
                        value = editor.getContent()
                    })

                    editor.on('init', function (e) {
                        if (value != null) {
                            editor.setContent(value)
                        }
                    })

                    function putCursorToEnd() {
                        editor.selection.select(editor.getBody(), true);
                        editor.selection.collapse(false);
                    }

                    $watch('value', function (newValue) {
                        if (newValue !== editor.getContent()) {
                            editor.resetContent(newValue || '');
                            putCursorToEnd();
                        }
                    });
                }
            });
        });
    </script>
@endpush