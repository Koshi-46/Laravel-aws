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
    <form action="{{ route('mail') }}" method="post" id="reused_form">
    {{ csrf_field() }}
        <div class="container">
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="name">
                    Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">
                    Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 form-group">
                <label for="subject">
                    Subject:</label>
                <input type="subject" class="form-control" id="subject" name="subject" required>
            </div>
        </div>
        <!--<div class="row">-->
        <!--    <div class="col-sm-12 form-group">-->
        <!--        <label for="comments">-->
        <!--            Comments:</label>-->
        <!--        <textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="Comments" maxlength="6000" rows="5"></textarea>-->
        <!--    </div>-->
        <!--</div>-->
        
        <div class="row">
            <div class="col-sm-12 form-group">
                <button type="submit" class="btn btn-lg btn-primary btn-block" >メール送信</button>
            </div>
        </div>
        </div>
    </form>
</body>
</html>