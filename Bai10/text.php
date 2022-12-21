<?php

$c = 'ngày 2022-01-29 mua hàng 100.000đ,ngày 2022-02-02 mua hàng 300.000đ,ngày 2022-02-07 thanh toán 200.000đ,ngày 2022-02-10 mua hàng 250.000đ,ngày 2022-02-15 thanh toán 400.000đ';

$arr = (explode(',', $c));
echo '<pre>';
print_r($arr);
echo '</pre>';

foreach ($arr as  $value) {
    $array = explode(' ', $value);
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
for ($i = 0; $i < count($arr); $i++) {
    if ($arr[$i] = $arr[1] && $arr[$i] <= $arr[4]) {
        
    };
}





?>
<!-- Cho một đoạn text như sau
    ngày 2022-01-29 mua hàng 100,000 đ,
    ngày 2022-02-02 mua hàng 300,000 đ,
    ngày 2022-02-07 thanh toán 200,000 đ,
    ngày 2022-02-10 mua hàng 250,000 đ,
    ngày 2022-02-15 thanh toán 400,000 đ,
    Hãy viết code PHP để biến đoạn text trên thành biến mảng và lọc ra các khoản giao dịch từ ngày 2022-02-01 
    đến ngày 2022-02-10, hiển thị trên màn hình 
    (lưu ý hiển thị ngày theo dạng dd/mm/YYYY và cho biết dư nợ tính đến ngày 20/02/2022 là bao nhiêu. -->