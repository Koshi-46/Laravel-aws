<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ファイルアップロード</title>
</head>
<body>
    <form action="{{ route('s3') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" id="">
        <input type="submit" value="アップロード">
    </form>
    <form action="{{ route('sqs') }}" method="post">
        @csrf
        <input type="submit" value="SQSテスト">
    </form>
        <form action="{{ route('job') }}" method="post">
        @csrf
        <input type="submit" value="JOBのディスパッチテスト">
    </form>
</body>
</html>