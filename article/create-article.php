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
  <link rel="stylesheet" href="../style.css">
  </link>

  <!-- tinymce.js -->
  <script src="https://cdn.tiny.cloud/1/ra6za8s01m7q4oqxsvwljstmotk0qrk81aiob8ge0xd1c3hs/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>



</head>

<body>
  <div class="container-fluid">
    <div class="row d-flex">

      <!-- 導覽列 nav -->
      <?php require("../nav.php");  ?>
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
              <img class="bi pe-none mb-1" src="../icon/search-icon.svg" width="16" height="16"></img>
              搜尋
            </a>
          </div>
        </div>
        <hr>
        <div class="container">
          <!-- <div class="dcs"> -->
          <form>
            <div class="container">
              <div class="dcs">
                <div class="container">
                  <form>
                    <div class="form-row row">
                      <div class="form-group col-6  mt-3">
                        <label for="name">文章標題</label>
                        <input type="text" class="form-control mt-2" id="name">
                      </div>
                      <div class="form-group col-6  mt-3">
                        <label for="category">文章類別</label>
                        <select class="form-select mt-2" aria-label="Default select example" name="category">
                          <option value="產品資訊">產品資訊</option>
                          <option value="活動快訊">活動快訊</option>
                          <option value="重要通知">重要通知</option>
                          <option value="音樂教育">音樂教育</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-sm mt-4">
                        <textarea id="premiumskinsandicons-bootstrap"></textarea>
                      </div>
                    </div>


                    <div class="form-row">
                      <div class="d-flex justify-content-center align-items-center mt-3">
                        <a class="btn btn-khak me-5" href="article-index.php">取消編輯</a>
                        <button class="btn btn-green" type="submit" name="submit_date">編輯完成</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-sm">
                </div>
              </div>
          </form>
          <!-- </div> -->
        </div>
        <!-- 內容 end -->


      </main>
      <!-- 主要區塊 main end-->
    </div>
  </div>


  <script>
    tinymce.init({
      selector: 'textarea#premiumskinsandicons-bootstrap',
      height: 500,
      skin: 'bootstrap',
      icons: 'bootstrap',
      plugins: 'image lists link anchor charmap',
      toolbar: 'blocks | bold italic bullist numlist | link image',
      file_picker_types: 'file image media',
      automatic_uploads: true,
      menubar: 'insert',
      /* and here's our custom image picker*/
      file_picker_callback: (cb, value, meta) => {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');

        input.addEventListener('change', (e) => {
          const file = e.target.files[0];

          const reader = new FileReader();
          reader.addEventListener('load', () => {
            /*
              Note: Now we need to register the blob in TinyMCEs image blob
              registry. In the next release this part hopefully won't be
              necessary, as we are looking to handle it internally.
            */
            const id = 'blobid' + (new Date()).getTime();
            const blobCache = tinymce.activeEditor.editorUpload.blobCache;
            const base64 = reader.result.split(',')[1];
            const blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);

            /* call the callback and populate the Title field with the file name */
            cb(blobInfo.blobUri(), {
              title: file.name
            });
          });
          reader.readAsDataURL(file);
        });

        input.click();
      },
      file_picker_callback: function(callback, value, meta) {
        // Provide file and text for the link dialog
        if (meta.filetype == 'file') {
          callback('mypage.html', {
            text: 'My text'
          });
        }

        // Provide image and alt text for the image dialog
        if (meta.filetype == 'image') {
          callback('myimage.jpg', {
            alt: 'My alt text'
          });
        }

        // Provide alternative source and posted for the media dialog
        if (meta.filetype == 'media') {
          callback('movie.mp4', {
            source2: 'alt.ogg',
            poster: 'image.jpg'
          });
        }
      },
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
  </script>
  <!-- tinymce.init({
  selector: 'textarea',  // change this value according to your HTML
  plugins: 'image',
  menubar: 'insert',
  toolbar: 'image',
  image_list: [
    {title: 'My image 1', value: 'https://www.example.com/my1.gif'},
    {title: 'My image 2', value: 'http://www.moxiecode.com/my2.gif'}
  ]
}); -->


  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  <!-- Bootstrap JavaScript Libraries end -->

</body>

</html>