<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí bình luận</title>
    <style> 
    body { 
        font-family: Arial, sans-serif; 
        padding: 20px; background-color: #f5f5f5; 
    } 
    h2 { 
        color: #333; 
        margin-bottom: 20px; 
    } 
    h4 { 
        margin-top: 30px; 
        color: #2c3e50; 
    } 
    table { 
        width: 100%; 
        border-collapse: collapse; 
        margin-top: 10px; 
        background-color: #fff; 
        } 
    table, th, td { 
        border: 1px solid #ccc; 
        } 
    th { 
        background-color: #3498db; 
        color: #fff; 
        text-align: left; 
        padding: 10px; 
        } 
    td { 
        padding: 10px; 
        } 
    tr:nth-child(even) { 
        background-color: #f9f9f9; 
        } 
    button { 
        background-color: #e74c3c; 
        color: #fff; 
        border: none; 
        padding: 5px 10px; 
        border-radius: 4px; 
        cursor: pointer; 
        } 
    button:hover { 
        background-color: #c0392b; 
        } em { color: #888; } 
    hr { 
        margin-top: 40px; 
        border: none; 
        border-top: 1px solid #ccc; 
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
</body>
</html>