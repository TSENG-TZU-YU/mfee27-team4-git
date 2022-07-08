<!doctype html>
<html lang="en">
  <head>
    <title>Create ins</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body>
      <div class="container">
        <form action="docreate-course.php" method="post">
            <div class="mb-2">
                <label for="">課程類別</label>
                <input type="text" class="form-control" name="course_cate">
            </div>
            <div class="mb-2">
                <label for="">課程名稱</label>
                <input type="text" class="form-control" name="course_name">
            </div>
            <div class="mb-2">
                <label for="">庫存</label>
                <input type="number" class="form-control" name="stock">
            </div>
            <div class="mb-2">
                <label for="">價格</label>
                <input type="number" class="form-control" name="price">
            </div>
            <div class="mb-2">
                <label for="">開課時間</label>
                <input type="date" class="form-control" name="begin_date"></input>
            </div>
            <div class="mb-2">
                <label for="">結束時間</label>
                <input type="date" class="form-control" name="over_date"></input>
            </div>
            <button class="btn btn-info" type="submit">送出</button>
            <button class="btn btn-info" type="reset">清除</button>
            <a class="btn btn-info" href="course-shop.php">返回上一頁</a>
        </form>
      </div>
  </body>
</html>