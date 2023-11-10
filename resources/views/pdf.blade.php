<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Rifa</title>
</head>

<body>
    <style>
        html {
            font-size: 13px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .page-break {
            page-break-after: always;
        }

        .fw-bold {
            font-weight: bold;
        }

        .m-0 {
            margin: 0;
        }

        .d-flex {
            display: flex;
        }

        .p-2 {
            padding: 16px;
        }

        .flex-shrink-1 {
            flex-shrink: 1;
        }

        .text-center {
            text-align: center;
        }

        .mt-3 {
            margin-top: 32px;
        }

        .w-100 {
            width: 100%;
        }

        .text-white {
            color: white;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid black;
        }

        .table {
            border-collapse: collapse;
        }
    </style>

    @php
        $allFiles = scandir(public_path('images'));
        if (!empty($allFiles)) {
            $imageName = !empty($allFiles[2]) ? $allFiles[2] : null;
        }

        $count = 1;
        $pages = !empty($settings['quantity']) ? $settings['quantity'] / 20 : 1;
        $numberPerPaper = 10;
    @endphp
    @for ($i = 0; $i < $pages; $i++)
        <table style="width: 100%;">
            <tr>
                @if (!empty($imageName))
                    <td style="width: 20%">
                        <img src="{{ public_path('images') . '/' . $imageName }}" alt=""
                            style="width: 100px; height: 100px; max-width: 100%;">
                    </td>
                @endif
                <td class="p-2 w-100 text-center" style="{{ !empty($imageName) ? "width: 80%" : "width: 100%" }}">
                    <h5 class="fw-bold">{{ $settings['title'] }}</h5>
                    {!! $settings['description'] !!}
                </td>
            </tr>
        </table>
        <table class="table table-bordered table-responsive w-100 mt-3">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%"><b>N°</b></th>
                    <th scope="col" style="width: 45%"><b>Nome</b></th>
                    <th scope="col" style="width: 45%"><b>Contato</b></th>
                </tr>
            </thead>
            <tbody>
                @for ($j = 0; $j < $numberPerPaper; $j++)
                    <tr>
                        <td>{{ sprintf('%04d', $count) }}</td>
                        <td class="text-white">0001</td>
                        <td class="text-white">0001</td>
                    </tr>
                    @php
                        $count++;
                    @endphp
                @endfor
            </tbody>
        </table>

        <table style="width: 100%;">
            <tr>
                @if (!empty($imageName))
                    <td style="width: 20%">
                        <img src="{{ public_path('images') . '/' . $imageName }}" alt=""
                            style="width: 100px; height: 100px; max-width: 100%;">
                    </td>
                @endif
                <td class="p-2 w-100 text-center" style="{{ !empty($imageName) ? "width: 80%" : "width: 100%" }}">
                    <h5 class="fw-bold">{{ $settings['title'] }}</h5>
                    {!! $settings['description'] !!}
                </td>
            </tr>
        </table>
        <table class="table table-bordered table-responsive w-100 mt-3">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%"><b>N°</b></th>
                    <th scope="col" style="width: 45%"><b>Nome</b></th>
                    <th scope="col" style="width: 45%"><b>Contato</b></th>
                </tr>
            </thead>
            <tbody>
                @for ($j = 0; $j < $numberPerPaper; $j++)
                    <tr>
                        <td>{{ sprintf('%04d', $count) }}</td>
                        <td class="text-white">0001</td>
                        <td class="text-white">0001</td>
                    </tr>
                    @php
                        $count++;
                    @endphp
                @endfor
            </tbody>
        </table>

        @if ($i + 1 != $pages)
            <div class="page-break"></div>
        @endif

    @endfor

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>

</body>

</html>
