<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('/assets/sass/custom.css') }}">

    <title>Gerador de rifa</title>
</head>

<body>

    <div class="container">

        <h1 class="text-primary fw-bold mt-5">Gerador de rifa</h1>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <h4>Algum campo não foi preenchido corretamente!</h4>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('pdf.generate') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title" class="form-label">Título da rifa</label>
            <input type="text" name="title" id="title" class="form-control"
                aria-describedby="passwordHelpBlock">
            <div id="passwordHelpBlock" class="form-text mb-3">
                Escolha um título para a rifa
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrição da rifa</label>
                <textarea name="description" class="form-control" id="description" rows="3"></textarea>
            </div>

            <label for="quantity" class="form-label">Quantidade de números da rifa</label>
            <input type="number" step="20" name="quantity" id="quantity" class="form-control"
                aria-describedby="passwordHelpBlock">
            <div id="passwordHelpBlock" class="form-text mb-3">
                Escolha a quantidade de números
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Escolha uma imagem para a rifa</label>
                <input class="form-control" type="file" name="image" id="image">
            </div>

            <div class="form-check mt-3">
                <input class="form-check-input" type="radio" name="option" value="print" id="flexRadioDefault1"
                    checked>
                <label class="form-check-label" for="flexRadioDefault1">
                    Gerar impressão
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="option" value="download" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    Fazer download do PDF
                </label>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Gerar Rifa</button>
            </div>
        </form>
    </div>

</body>

</html>
