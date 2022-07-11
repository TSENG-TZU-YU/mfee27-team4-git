<?php


if (!isset($_POST["id"])) {
  echo "<script>alert('沒有師資資料'); location.href = 'teachers.php'; </script>";
  exit;
}
