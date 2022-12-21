<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Mailer\Transport\RoundRobinTransport;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//2.1 
Route::get('/1', function () {
    $data = DB::table('nhacungcap')->get('TENCONGTY');
    dd($data);
});
//2.2 
Route::get('/2', function () {
    $data = DB::table('mathang')->select('MAHANG', 'TENHANG', 'SOLUONG')->get();
    dd($data);
});
//2.3
Route::get('/3', function () {
    $data = DB::table('nhanvien')->select('HO', 'TEN', 'NGAYLAMVIEC')->get();
    dd($data);
});
//2.4
Route::get('/4', function () {
    $data = DB::table('nhacungcap')->select('DIACHI', 'DIENTHOAI')
        ->where('TENCONGTY', '=', 'Việt Tiến')->get();
    dd($data);
});
//2.5 
Route::get('/5', function () {
    $data = DB::table('mathang')->select('MAHANG', 'TENHANG')
        ->where('GIAHANG', '>', '100000')
        ->where('SOLUONG', '<', '50')
        ->get();
    dd($data);
});
//2.6
Route::get('/6', function () {
    $data = DB::table('mathang')
        ->join('nhacungcap', 'mathang.MACONGTY', '=', 'nhacungcap.MACONGTY')
        ->select('TENHANG', 'TENCONGTY')
        ->get();
    dd($data);
});
//2.7
Route::get('/7', function () {
    $sql = DB::table('nhacungcap')
        ->join('mathang', 'nhacungcap.MACONGTY', '=', 'mathang.MACONGTY')
        ->select('TENHANG')
        ->where('TENCONGTY', '=', 'Việt Tiến')
        ->get();
    dd($sql);
});
//2.8
Route::get('/8', function () {
    $sql = DB::table('nhacungcap')
        ->join('mathang', 'nhacungcap.MACONGTY', '=', 'mathang.MACONGTY')
        ->join('loaihang', 'mathang.MALOAIHANG', '=', 'loaihang.MALOAIHANG')
        ->select('TENCONGTY', 'DIACHI', 'TENLOAIHANG')
        ->where('TENLOAIHANG', '=', 'thực phẩm')
        ->get();
    dd($sql);
});
//2.9
Route::get('/9', function () {
    $sql = DB::table('khachhang')
        ->join('dondathang', 'khachhang.MAKHACHHANG', '=', 'dondathang.MAKHACHHANG')
        ->join('chitietdathang', 'dondathang.SOHOADON', '=', 'chitietdathang.SOHOADON')
        ->join('mathang', 'chitietdathang.MAHANG', '=', 'mathang.MAHANG')
        ->select('khachhang.TENGIAODICH')
        ->where('mathang.TENHANG', '=', 'hải sản loại 9')
        ->get();
    dd($sql);
});
//2.10
Route::get('/10', function () {
    $sql = DB::table('dondathang')
        ->join('khachhang', 'dondathang.MAKHACHHANG', '=', 'khachhang.MAKHACHHANG')
        ->join('nhanvien', 'dondathang.MANHANVIEN', '=', 'nhanvien.MANHANVIEN')
        ->select('TENGIAODICH', 'NGAYGIAOHANG', 'NOIGIAOHANG', 'HO', 'TEN')
        ->where('SOHOADON','=','1')
        ->get();
    dd($sql);
});
//2.11
// Route::get('/11', function () { 
//     $sql = DB::table('nhanvien')->select('LUONGCOBAN ','+',' PHUCAP ')->count()
//     dd($sql);
// });
//2.12
Route::get('/12', function () {
    $sql = DB::table('dondathang')
        ->join('chitietdathang', 'dondathang.SOHOADON', '=', 'chitietdathang.SOHOADON')
        ->join('mathang', 'chitietdathang.MAHANG', '=', 'mathang.MAHANG')
        ->select('SOHOADON',DB::raw('sum(SOLUONG * GIAHANG - SOLUONG * GIAHANG * MUCGIAMGIA / 100)'))
        ->groupBy('SOHOADON')
        ->having('SOHOADON','=','3')
        ->get();
    dd($sql);
});

Route::get('cau2.14', function () {
    $items = DB::table('nhan_viens')
        ->select('HO', 'TEN', 'NGAYSINH',)
        ->groupBy('HO', 'TEN', 'NGAYSINH')
        ->havingRaw('COUNT(*) > 1')
        ->get();
    dd($items);
});
Route::get('cau2.16', function () {
    $items = DB::table('khach_hangs')
        ->select('khach_hangs.TENCONGTY', 'khach_hangs.TENGIAODICH', 'khach_hangs.DIACHI', 'khach_hangs.DIENTHOAI', 'nha_cung_caps.TENCONGTY', 'nha_cung_caps.TENGIAODICH', 'nha_cung_caps.DIACHI', 'nha_cung_caps.DIENTHOAI')
        ->join('nha_cung_caps', 'nha_cung_caps.DIACHI', '=', 'khach_hangs.DIACHI')
        ->get();
    dd($items);
});
Route::get('cau2.17', function () {
    $items = DB::table('mathang')
        ->select('mathang.*')
        ->leftJoin('chitietdathang', 'mathang.MAHANG', '=', 'chitietdathang.MAHANG')
        ->where('chitietdathang.MAHANG', '=', null)
        ->get();
    dd($items);
});
Route::get('cau2.18', function () {
    $items = DB::table('nhan_viens')
        ->select('nhan_viens.*')
        ->leftJoin('don_dat_hangs', 'nhan_viens.MANHANVIEN', '=', 'don_dat_hangs.MANHANVIEN')
        ->where('don_dat_hangs.SOHOADON', '=', null)
        ->get();
    dd($items);
});