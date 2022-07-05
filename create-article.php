<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <title>新增文章</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- 版面元件樣式 css -->
  <link rel="stylesheet" href="style.css">
  </link>

  <!-- tinymce.js -->
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<body>
  <div class="container-fluid">
    <div class="row d-flex">

      <!-- 導覽列 nav -->
      <!-- 導覽列 nav end -->


      <!-- 主要區塊 main -->
      <main class="col-10 px-5 py-4">

        <!-- 麵包屑 breadcrumb -->
        <biv aria-label="breadcrumb">
          <ol class="breadcrumb fw-bold">
            <li class="breadcrumb-item"><a href="#">首頁</a></li>
            <li class="breadcrumb-item" aria-current="page">xxx</li>
          </ol>
        </biv>
        <!-- 麵包屑 breadcrumb end -->

        <hr>

        <!-- 內容 -->
        <div class="container">
          <div class="row">
            <p class="col-8 m-auto">總共 筆資料</p>
            <input class="col form-control me-3" type="text">
            <a class="col-1 btn btn-green" href="#">
              <img class="bi pe-none mb-1" src="icon/search-icon.svg" width="16" height="16"></img>
              搜尋
            </a>
          </div>
        </div>
        <hr>
        <div class="container">
          <div class="dcs">
            <form>
              <div class="form-row">
                <div class="form-group col-sm">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name">
                </div>

                <div class="form-group col-sm">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-sm">
                  <label for="email">Describe your issue in detail</label>
                  <textarea id="premiumskinsandicons-bootstrap"></textarea>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-sm">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                      I agree to the <a href="#">terms and conditions</a>
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-sm">
                  <div class="d-flex justify-content-center align-items-center mt-3">
                    <a class="btn btn-khak me-5" href="article-index.php">取消編輯</a>
                    <button class="btn btn-green" type="submit" name="submit_date">編輯完成</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- 內容 end -->


      </main>
      <!-- 主要區塊 main end-->
    </div>
  </div>

  <script>
    tinymce.init({
      selector: 'textarea#premiumskinsandicons-bootstrap',
      skin: 'bootstrap',
      icons: 'bootstrap',
      plugins: 'image lists link anchor charmap',
      toolbar: 'blocks | bold italic bullist numlist | link image charmap',
      menubar: false,
      setup: (editor) => {
        editor.on('init', () => {
          editor.getContainer().style.transition = 'border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out';
        });
        editor.on('focus', () => {
          editor.getContainer().style.boxShadow = '0 0 0 .2rem rgba(0, 123, 255, .25)';
          editor.getContainer().style.borderColor = '#80bdff';
        });
        editor.on('blur', () => {
          editor.getContainer().style.boxShadow = '';
          editor.getContainer().style.borderColor = '';
        });
      }
    });
    // Prevent Bootstrap dialog from blocking focusin
    document.addEventListener('focusin', (e) => {
      if (e.target.closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
        e.stopImmediatePropagation();
      }
    });
  </script>


  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  <!-- Bootstrap JavaScript Libraries end -->

</body>

</html>