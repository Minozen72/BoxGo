@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails du Modèle de Contrat : {{ $contractModel->name }}</h1>
    <div class="card">
        <div class="card-header">
            Modèle de Contrat #{{ $contractModel->id }}
        </div>
        <div class="card-body">
            <p><strong>Nom :</strong> {{ $contractModel->name }}</p>
            <p><strong>Contenu :</strong></p>
            <div id="editorjs-viewer" style="min-height: 300px; border: 1px solid #ced4da; padding: 10px;"></div>
        </div>
    </div>
    <a href="{{ route('contract_models.index') }}" class="btn btn-secondary mt-3">Retour à la liste des modèles de contrat</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>

<!-- Ensuite les plugins -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/paragraph@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/list@1.8.0"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/link@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/marker@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/warning@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editorData = {!! $contractModel->content !!};

        const editor = new EditorJS({
            holder: 'editorjs-viewer',
            readOnly: true,
              tools: {
                header: {
                    class: Header,
                    inlineToolbar: ['link']
                },
                paragraph: {
                    class: Paragraph,
                    inlineToolbar: true
                },
                list: {
                    class: List,
                    inlineToolbar: true
                },
                table: {
                    class: Table,
                    inlineToolbar: true
                },
                linkTool: {
                    class: LinkTool,
                    inlineToolbar: true
                },
                embed: {
                    class: Embed,
                    inlineToolbar: true
                },
                checklist: {
                    class: Checklist,
                    inlineToolbar: true
                },
                quote: {
                    class: Quote,
                    inlineToolbar: true
                },
                marker: {
                    class: Marker,
                    inlineToolbar: true
                },
                warning: {
                    class: Warning,
                    inlineToolbar: true
                },
                code: {
                    class: CodeTool,
                    inlineToolbar: true
                }
            },
            data: editorData
        });
    });
</script>
@endsection