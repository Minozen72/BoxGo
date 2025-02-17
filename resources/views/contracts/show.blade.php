@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails du Contrat</h1>
    <div class="card">
        <div class="card-header">
            Contrat #{{ $contract->id }}
        </div>
        <div class="card-body">
            <p><strong>Date de début :</strong> {{ $contract->date_start }}</p>
            <p><strong>Date de fin :</strong> {{ $contract->date_end }}</p>
            <p><strong>Prix mensuel :</strong> {{ $contract->monthly_price }} €</p>
            <p><strong>Box :</strong> {{ $contract->box->name }}</p>
            <p><strong>Locataire :</strong> {{ $contract->tenant->name }}</p>
            <p><strong>Propriétaire :</strong> {{ $contract->owner->name }}</p>
            <p><strong>Modèle de contrat :</strong> {{ $contract->contractModel->name }}</p>
            <p><strong>Contenu du contrat :</strong></p>
            <div id="editorjs-viewer" style="min-height: 300px; border: 1px solid #ced4da; padding: 10px;"></div>
        </div>
    </div>
    <a href="{{ route('contracts.index') }}" class="btn btn-secondary mt-3">Retour à la liste des contrats</a>
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
        let content = {!! json_encode($contract->contractModel->content) !!};

        // Remplacer les placeholders par les valeurs réelles
        content = content.replace(/\[NOM_LOCATAIRE\]/g, '{{ $contract->tenant->name }}');
        content = content.replace(/\[NOM_PROPRIETAIRE\]/g, '{{ $contract->owner->name }}');
        content = content.replace(/\[DATE_START\]/g, '{{ $contract->date_start }}');
        content = content.replace(/\[DATE_END\]/g, '{{ $contract->date_end }}');
        content = content.replace(/\[MONTHLY_PRICE\]/g, '{{ $contract->monthly_price }}');

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
            data: JSON.parse(content)
        });
    });
</script>
@endsection