<?php
use Carbon\Carbon;
use App\Notification;
use App\Category;
use App\Bill;
use App\DetailsBill;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Pages;
// Mở composer.json
// Thêm vào trong "autoload" chuỗi sau
// "files": [
//         "app/function/function.php"
// ]

// Chạy cmd : composer  dumpautoload

function changeTitle($str, $strSymbol = '-', $case = MB_CASE_LOWER)
{ // MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
	$str = trim($str);
	if ($str == "") return "";
	$str = str_replace('"', '', $str);
	$str = str_replace("'", '', $str);
	$str = stripUnicode($str);
	$str = mb_convert_case($str, $case, 'utf-8');
	$str = preg_replace('/[\W|_]+/', $strSymbol, $str);
	return $str;
}

function formatDate($date){
	return date('d-m-Y', strtotime($date));
}

function stripUnicode($str)
{
	if (!$str) return '';
	//$str = str_replace($a, $b, $str);
	$unicode = array(
		'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|å|ä|æ|ā|ą|ǻ|ǎ',
		'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Å|Ä|Æ|Ā|Ą|Ǻ|Ǎ',
		'ae' => 'ǽ',
		'AE' => 'Ǽ',
		'c' => 'ć|ç|ĉ|ċ|č',
		'C' => 'Ć|Ĉ|Ĉ|Ċ|Č',
		'd' => 'đ|ď',
		'D' => 'Đ|Ď',
		'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ë|ē|ĕ|ę|ė',
		'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ë|Ē|Ĕ|Ę|Ė',
		'f' => 'ƒ',
		'F' => '',
		'g' => 'ĝ|ğ|ġ|ģ',
		'G' => 'Ĝ|Ğ|Ġ|Ģ',
		'h' => 'ĥ|ħ',
		'H' => 'Ĥ|Ħ',
		'i' => 'í|ì|ỉ|ĩ|ị|î|ï|ī|ĭ|ǐ|į|ı',
		'I' => 'Í|Ì|Ỉ|Ĩ|Ị|Î|Ï|Ī|Ĭ|Ǐ|Į|İ',
		'ij' => 'ĳ',
		'IJ' => 'Ĳ',
		'j' => 'ĵ',
		'J' => 'Ĵ',
		'k' => 'ķ',
		'K' => 'Ķ',
		'l' => 'ĺ|ļ|ľ|ŀ|ł',
		'L' => 'Ĺ|Ļ|Ľ|Ŀ|Ł',
		'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ö|ø|ǿ|ǒ|ō|ŏ|ő',
		'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ö|Ø|Ǿ|Ǒ|Ō|Ŏ|Ő',
		'Oe' => 'œ',
		'OE' => 'Œ',
		'n' => 'ñ|ń|ņ|ň|ŉ',
		'N' => 'Ñ|Ń|Ņ|Ň',
		'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|û|ū|ŭ|ü|ů|ű|ų|ǔ|ǖ|ǘ|ǚ|ǜ',
		'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Û|Ū|Ŭ|Ü|Ů|Ű|Ų|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ',
		's' => 'ŕ|ŗ|ř',
		'R' => 'Ŕ|Ŗ|Ř',
		's' => 'ß|ſ|ś|ŝ|ş|š',
		'S' => 'Ś|Ŝ|Ş|Š',
		't' => 'ţ|ť|ŧ',
		'T' => 'Ţ|Ť|Ŧ',
		'w' => 'ŵ',
		'W' => 'Ŵ',
		'y' => 'ý|ỳ|ỷ|ỹ|ỵ|ÿ|ŷ',
		'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ|Ÿ|Ŷ',
		'z' => 'ź|ż|ž',
		'Z' => 'Ź|Ż|Ž'
	);
	foreach ($unicode as $khongdau => $codau) {
		$arr = explode("|", $codau);
		$str = str_replace($arr, $khongdau, $str);
	}
	return $str;
}

function formatMoney($number, $flag = false, $fee = false,$discount = null)
{

	while (true) {
		$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
		if ($replaced != $number) {
			$number = $replaced;
		} else {
			break;
		}
	}
	if ($flag) {
		return $number;
	}

	if($discount != null){
		return "<font color='green'><b>" . $number . " ₫</b></font><font color='red'>(-".$discount."%)</font>";
	}

	if ($fee) {
		return "<font color='red'><b>" . $number . " ₫</b></font>";
	}
	return "<font color='green'><b>" . $number . " ₫</b></font>";
}

function formatDateTime($dateTime)
{
	Carbon::setLocale('vi');
	$dt = Carbon::parse($dateTime);
	$now = Carbon::now('Asia/Ho_Chi_Minh');

	$dt->diffInDays($now) == 0 ?
		$dt->diffInHours($now) == 0 ?
		$dt->diffInMinutes($now) == 0 ?
		$EndTime = "Hết hạn" : $EndTime = $dt->diffInMinutes($now) . " phút" : $EndTime = $dt->diffInHours($now) . " giờ"  : $EndTime = $dt->diffInDays($now) . " ngày";
	return $EndTime;
}



function priceDiscount($Money, $Discount)
{
	$Money = str_replace(',', '', $Money);
	return  $Money - ($Money / 100 * $Discount);
}

function deformatMoney($Money)
{
	$Money = str_replace(',', '', $Money);
	$Money = str_replace("<font color='green'><b>", '', $Money);
	$Money = str_replace(" ₫</b></font>", '', $Money);
	return $Money;
}


function AuthTotalMoney()
{
	if (Auth::check())
		return $Data = \App\Bill::where('id_user', Auth::user()->id)->where('statusPay', 1)->where('status', 2)->sum('TotalMoney');
}

function AuthTitle()
{
	if (Auth::check()) {
		if (Auth::user()->id == 1) {
			return 0;
		}
		if (AuthTotalMoney() > 1000000) {
			return 2; // Tiềm Năng
		} elseif (AuthTotalMoney() > 100000) {
			return 1; // Khách hàng
		} else {
			return 3; // Mới Đ Ký
		}
	}

	return 4; // Công khai

}

// Real TIme

function eventLoadBill()
{
	// Truyền message lên server Pusher
	$options = array(
		'cluster' => 'ap1',

	);

	$pusher = new Pusher(
		'fbefcc8bb38866195ed2',
		'ca8d13f7e7ec66461aed',
		'757854',
		$options
	);

	$pusher->trigger('Bill', 'loadBill', '');
}


function eventLoadNotification()
{
	// Truyền message lên server Pusher
	$options = array(
		'cluster' => 'ap1',

	);

	$pusher = new Pusher(
		'fbefcc8bb38866195ed2',
		'ca8d13f7e7ec66461aed',
		'757854',
		$options
	);

	$pusher->trigger('Notification', 'loadNotification', '');
}



// Admin Function
function seenAll()
{
	Notification::query()->update(['seen' => 1]);
}

function getCountNotifyByTask($task)
{
	if (session()->get('notify')) {
		$count = 0;
		foreach (session()->get('notify') as $key) {
			if ($key['task'] == $task) $count++;
		}
		return $count;
	}
	return 0;
}

function getAllCountNotify()
{
	$data = Notification::all();
	if (!empty($data)) {
		return count($data);
	} else return 0;
}

function changeStatusSeenNotify()
{
	if (session()->get('notify')) {
		$oldAr = session()->get('notify');
		foreach ($oldAr as $key) {
			if ($key['seen'] == 0) {
				$key['seen'] = 1;
			}
		}

		dd($oldAr);
	}
}

function GetTotal($Money)
{
	$rate = Swap::latest('USD/VND');
	return number_format($Money / $rate->getValue(), 1);
}

function RemoveSession()
{
	Cart::destroy();
	if (session()->get('coupon')) {
		session()->remove('coupon');
	}
	session()->remove('idShip');
}

function setEnv($name, $value)
{
	$path = base_path('.env');
	if (file_exists($path)) {
		file_put_contents($path, str_replace(
			$name . '=' . env($name),
			$name . '=' . $value,
			file_get_contents($path)
		));
	}
}

//Fix DB HEROKU
//		->select(DB::raw('categories.title,sum("DetailsBill"."Number") as SL,sum("DetailsBill"."price" * "DetailsBill"."Number" - (("DetailsBill"."price"*"DetailsBill"."Number") / 100 * "DetailsBill"."discount")) as "TongTien"'))
//FIX DB normal
// 		->select(DB::raw('categories.title,sum(DetailsBill.Number) as SL,sum(DetailsBill.price * DetailsBill.Number - ((DetailsBill.price*DetailsBill.Number) / 100 * DetailsBill.discount)) as TongTien'))

function getInfoByCategoryId($id, $day)
{
	$data = DB::table('categories')
		->join('SubCategory', 'categories.id', '=', 'SubCategory.id_category')
		->join('Product', 'SubCategory.id', '=', 'Product.id_sub')
		->join('product_details', 'Product.id', '=', 'product_details.id_product')
		->join('DetailsBill', 'product_details.id', '=', 'DetailsBill.id_products_details')
		->join('Bill', 'Bill.id', '=', 'DetailsBill.id_bill')
		->select(DB::raw('categories.title,sum("DetailsBill"."Number") as SL,sum("DetailsBill"."price" * "DetailsBill"."Number" - (("DetailsBill"."price"*"DetailsBill"."Number") / 100 * "DetailsBill"."discount")) as "TongTien"'))		->where('categories.id', $id)
		->where('Bill.statusPay', 1)
		->where('Bill.status', 2)
		->whereDate('Bill.created_at', $day)
		->groupBy('categories.title')
		->get();
	if (count($data) > 0)
		return (int)$data[0]->TongTien;
	else
		return 0;
}


// FIX DB HEROKU
//		->select(DB::raw('categories.id,categories.title,sum("DetailsBill"."Number") as SL,sum("DetailsBill"."price" * "DetailsBill"."Number" - (("DetailsBill"."price"*"DetailsBill"."Number") / 100 * "DetailsBill"."discount")) as "TongTien"'))
// FIX DB NORMAL
// 		->select(DB::raw('categories.id,categories.title,sum(DetailsBill.Number) as SL,sum(DetailsBill.price * DetailsBill.Number - ((DetailsBill.price*DetailsBill.Number) / 100 * DetailsBill.discount)) as TongTien'))

function getListCategoryTop($params = null)
{
	$data = DB::table('categories')
		->join('SubCategory', 'categories.id', '=', 'SubCategory.id_category')
		->join('Product', 'SubCategory.id', '=', 'Product.id_sub')
		->join('product_details', 'Product.id', '=', 'product_details.id_product')
		->join('DetailsBill', 'product_details.id', '=', 'DetailsBill.id_products_details')
		->join('Bill', 'Bill.id', '=', 'DetailsBill.id_bill')
		->select(DB::raw('categories.id,categories.title,sum("DetailsBill"."Number") as SL,sum("DetailsBill"."price" * "DetailsBill"."Number" - (("DetailsBill"."price"*"DetailsBill"."Number") / 100 * "DetailsBill"."discount")) as "TongTien"'))		->where('Bill.status', 2)
		->groupBy('categories.id')
		->groupBy('categories.title')
		->orderBy('TongTien', 'desc')->take(!empty($params) ? $params : 4)->get();

	return $data;
}



function ChartCategory()
{

	$output = array();
	$count = 0;
	$to = Carbon::now('Asia/Ho_Chi_Minh');
	$List = getListCategoryTop();
	if(empty($List)) {
		return "";
	}else {
		foreach ($List as $key) {
			$output[] = ['DanhMuc' => $key->title, 'id' => $key->id];
		}
		foreach ($output as $key) {
			$to = Carbon::now('Asia/Ho_Chi_Minh');
			$to->addDay(1);
			for ($i = 0; $i <= 6; $i++) {
				$ar = $to->subDay(1)->toDateString();
				$output[$count]['Ngay' . $ar] = getInfoByCategoryId($output[$count]['id'], $ar);
			}
			$count++;
		}
		return $output;
	}
	
}
// FIX Normal
//		->select(DB::raw( 'Product.title,Product.id, sum(DetailsBill.Number) as SL, sum(Product.cost * DetailsBill.Number - ((Product.cost * DetailsBill.Number) / 100 * Product.discount)) as TongTien'))
// FIX HEROKU
//		->select(DB::raw('Product.title,Product.id, sum("DetailsBill"."Number") as SL, sum("Product"."cost" * "DetailsBill"."Number" - (("Product"."cost" * "DetailsBill"."Number") / 100 * "Product"."discount")) as "TongTien"'))


function getProductTop()
{
	$data = DB::table('Product')
		->join('product_details', 'Product.id', '=', 'product_details.id_product')
		->join('DetailsBill', 'product_details.id', '=', 'DetailsBill.id_products_details')
		->join('Bill', 'DetailsBill.id_bill', '=', 'Bill.id')
		->select(DB::raw('Product.title,Product.id, sum("DetailsBill"."Number") as SL, sum("Product"."cost" * "DetailsBill"."Number" - (("Product"."cost" * "DetailsBill"."Number") / 100 * "Product"."discount")) as "TongTien"'))		->where('Bill.status', 2)
		->where('Bill.statusPay', 1)
		->groupBy('Product.title')
		->groupBy('Product.id')
		->orderBy('TongTien', 'desc')->get();
	return $data;
}

function enable($id,$state = null){
	// Sate : check menu, state null check footer
	if($state){
		return Pages::find($id)->enableMenu == 1 ? true : false;
	}else {
		return Pages::find($id)->enableFooter == 1 ? true : false;
	}
}


