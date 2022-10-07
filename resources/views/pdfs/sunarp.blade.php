<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sunarp</title>
    <style>
        @page {
            size: auto;
            background-image: url({{base_path("/resources/images/fd.png")}}) no-repeat 0 0;
            background-image-resize: 6;
            background-size: contain;
        }
        .table {
            width: 100%;
        }
    </style>
</head>
<body>
    <table class="table">
        <tr>
            <td width="20%">
                <img src="data:image/png;base64,{!! base64_encode(QrCode::format('png')->margin(0)->size(93)->generate(url('/'))) !!}" alt="QrCode">
            </td>
            <td></td>
            <td width="25%">
                <img src="{{ base_path('/resources/images/sunarp_peru.png') }}" width="170px" alt="Sunarp">
            </td>
        </tr>
    </table>
</body>
</html>