<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí bình luận</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f0f2f5;
        padding: 30px;
    }

    h2 {
        color: #2c3e50;
        font-size: 28px;
        margin-bottom: 30px;
        border-left: 5px solid #3498db;
        padding-left: 10px;
    }

    h4 {
        color: #34495e;
        margin-top: 40px;
        font-size: 20px;
    }

    table {
        width: 100%;
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
        margin-top: 15px;
    }

    thead th {
        background-color:rgb(0, 88, 146);
        color: #fff;
        padding: 12px 15px;
        font-weight: 600;
        border-bottom: 2px solid rgb(0, 88, 146);
    }

    tbody td {
        padding: 12px 15px;
        vertical-align: middle;
        border-bottom: 1px solid #eee;
        color: #333;
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    em {
        color: #888;
        font-style: italic;
    }

    button {
        background-color: #e74c3c;
        color: #fff;
        border: none;
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 14px;
        transition: background-color 0.2s ease;
    }

    button:hover {
        background-color: #c0392b;
    }

    hr {
        margin: 50px 0;
        border: none;
        border-top: 1px solid #ddd;
    }

    form {
        margin: 0;
    }
</style>

</head>
<body>
    @include('menu')
    <h2>Quản lý bình luận</h2>

    @foreach ($products as $product)
        <h4>{{ $product->name }}</h4>
        @if ($product->comments->count() > 0)
            <table border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>Người đánh giá</th>
                        <th>Username</th>
                        <th>Nội dung</th>
                        <th>Thời gian</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product->comments as $comment)
                        <tr>
                            <td>{{ $comment->customer->name ?? 'Ẩn danh' }}</td>
                            <td>{{ $comment->customer->username ?? 'Ẩn danh' }}</td>
                            <td>{{ $comment->content }}</td>
                            <td>{{ $comment->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Xoá bình luận này?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Xoá</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p><em>Chưa có bình luận nào cho sản phẩm này.</em></p>
        @endif
        <hr>
    @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
