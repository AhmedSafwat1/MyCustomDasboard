<?php

use Illuminate\Support\Facades\Route;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use App\User;
use App\Models\Role;
use App\Models\AppSetting;
use App\Models\Report;
use App\Models\Social;
use Carbon\Carbon;

#home
function Home()
{

    $colors = [
        '#8cc759', '#8c6daf', '#ef5d74', '#f9a74b', '#60beeb', '#fbef5a', '#FC600A', '#0247FE', '#FCCB1A',
        '#EA202C', '#448D76', '#AE0D7A', '#7FBD32', '#FD4D0C', '#66B032', '#091534', '#8601AF', '#C21460',
        '#FFA500', '#800080', '#008000', '#964B00', '#D2B48C', '#f5f5dc', '#4281A4', '#48A9A6',
    ];
    $home = [
        [
            'name' => 'الاعضاء',
            'count' => User::count() - 1,
            'icon' => '<i style="font-size: 90px;" class="fa fa-users"></i>',
            'color' => $colors[array_rand($colors)],
        ],
        [
            'name' => 'المشرفين',
            'count' => User::where('role', '>', 0)->count(),
            'icon' => '<i style="font-size: 90px;" class="fa fa-user-circle"></i>',
            'color' => $colors[array_rand($colors)],
        ],
        [
            'name' => 'التقارير',
            'count' => Report::count(),
            'icon' => '<i style="font-size: 90px" class="fa fa-flag-checkered"></i>',
            'color' => $colors[array_rand($colors)],
        ],
    ];

    return $blocks[] = $home;
}

#convert phone to soudi arabia format
function convert_phone_to_sa_format($phone)
{
    $withoutZero  = ltrim($phone, '0');
    $filter_zero  = ltrim($withoutZero, '9660');
    $filter_code  = ltrim($filter_zero, '966');
    $full_phone   = '966' . $filter_code;
    return $full_phone;
}

#convert arabic number to english format
function convert2english($string)
{
    $newNumbers = range(0, 9);
    $arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
    $string =  str_replace($arabic, $newNumbers, $string);
    return $string;
}

# set lang
function SetLang($lang)
{
    /** Set Lang **/
    $lang == 'en' ? App::setLocale('en') : App::setLocale('ar');
    /** Set Carbon Lang **/
    $lang == 'en' ? Carbon::setLocale('en') : Carbon::setLocale('ar');
}

#role name
function Role()
{
    $role = Role::findOrFail(Auth::user()->role);
    if (count($role) > 0) {
        return $role->role;
    } else {
        return 'عضو';
    }
}

#reports
function reports()
{
    $reports = Report::orderBy('id', 'desc')->take(8)->get();

    return $reports;
}

#report
function addReport($user_id, $event, $ip)
{
    if ($ip == "127.0.0.1") {
        $ip = "" . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255);
    }

    $location = \Location::get($ip);
    $report = new Report;
    $user = User::findOrFail($user_id);
    if ($user->role > 0) {
        $report->user_id = $user->id;
        $report->event   = 'قام ' . $user->name . ' ' . $event;
        $report->supervisor = 1;
        $report->ip = $ip;
        // $report->country = (isset($location) && $location->countryCode != null) ? $location->countryCode : '';
        // $report->area = (isset($location) && $location->regionName != null) ? $location->regionName : '';
        // $report->city = (isset($location) && $location->cityName != null) ? $location->cityName : '';
        $report->save();
    } else {
        $report->user_id = $user->id;
        $report->event   = 'قام ' . $user->name . ' ' . $event;
        $report->supervisor = 0;
        $report->ip = $ip;
        // $report->country = (isset($location) && $location->countryName != null) ? $location->countryName : 'localhost';
        // $report->area = (isset($location) && $location->regionName != null) ? $location->regionName : 'localhost';
        // $report->city = (isset($location) && $location->cityName != null) ? $location->cityName : 'localhost';
        $report->save();
    }
}

#current route
function currentRoute()
{
    $routes = Route::getRoutes();
    foreach ($routes as $value) {
        if ($value->getName() === Route::currentRouteName()) {
            echo $value->getAction()['title'];
        }
    }
}

#check if unique
function is_unique($key, $value)
{
    $user                = User::where($key, $value)->first();
    if ($user) {
        return 1;
    }
    return 0;
}

#genrate random code
function generate_code()
{
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $token = '';
    $length = 6;
    for ($i = 0; $i < $length; $i++) {
        $token .= $characters[rand(0, $charactersLength - 1)];
    }
    return $token;
}

#get basic path
function appPath()
{
    return url('/');
}

#get data from app_settings DB
function settings($key)
{
    $setting = AppSetting::where('key', $key)->first();
    $value   = isset($setting) ? $setting->value : '';
    return $value;
}

#upload multi-part image
function uploadImage($photo, $dir)
{
    #upload image
    if (!is_dir($dir))
        mkdir($dir, 0777);
    $name = date('d-m-y') . time() . rand() . '.' . $photo->getClientOriginalExtension();
    $photo->move($dir . '/', $name);
    return '/' . $dir . '/' . $name;
}

#upload image base64
function save_img($base64_img, $img_name, $path)
{
    $image = base64_decode($base64_img);
    $pathh = $_SERVER['DOCUMENT_ROOT'] . '/' . $path . '/' . $img_name . '.png';
    file_put_contents($pathh, $image);
}

// our sms package
function sendSms($mobileNumber, $messageContent)
{
    $user = '';
    $password = '';
    $sendername = '';
    $text = urlencode($messageContent);
    $to = '+' . $mobileNumber;
    // auth call
    //$url = "http://www.oursms.net/api/sendsms.php?username=$user&password=$password&numbers=$to&message=$text&sender=$sendername&unicode=E&return=full";

    //لارجاع القيمه json
    $url = "http://www.oursms.net/api/sendsms.php?username=$user&password=$password&numbers=$to&message=$text&sender=$sendername&unicode=E&return=json";
    // لارجاع القيمه xml
    //$url = "http://www.oursms.net/api/sendsms.php?username=$user&password=$password&numbers=$to&message=$text&sender=$sendername&unicode=E&return=xml";
    // لارجاع القيمه string
    //$url = "http://www.oursms.net/api/sendsms.php?username=$user&password=$password&numbers=$to&message=$text&sender=$sendername&unicode=E";

    // Call API and get return message
    //fopen($url,"r");
    //return $url;
    $ret = file_get_contents($url);
    //echo nl2br($ret);
}

//zain package
function send_sms_zain($myphone, $active)
{

    $phones = $myphone;      // Should be like 966530007039

    $msg = urlencode($active . '   ');


    $link = "https://www.zain.im/index.php/api/sendsms/?user=user&pass=123456&to=$phones&message=$msg&sender=sender";

    /*
     *  return  para      can be     [ json , xml , text ]
     *  username  :  your username on safa-sms
     *  passwpord :  your password on safa-sms
     *  sender    :  your sender name
     *  numbers   :  list numbers delimited by ,     like    966530007039,966530007039,966530007039
     *  message   :  your message text
     */

    /*
     * 100   Success Number
     */

    if (function_exists('curl_init')) {
        $curl = @curl_init($link);
        @curl_setopt($curl, CURLOPT_HEADER, FALSE);
        @curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        @curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
        @curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        $source = @curl_exec($curl);
        @curl_close($curl);
        if ($source) {
            return $source;
        } else {
            return @file_get_contents($link);
        }
    } else {
        return @file_get_contents($link);
    }
}

//mobily package
function send_mobile_sms_mobily($numbers, $msg)
{
    $url      = 'http://api.yamamah.com/SendSMS';
    $mobile   = '00966567477771';
    $password = '777711';
    $msg      = $msg;
    //$msg = urlencode($msg . '   ');
    $sender   = '0567477771';
    $sender   = urlencode($sender);
    $fields   = array(
        "Username"        => $mobile,
        "Password"        => $password,
        "Tagname"         => '0567477771',
        "Message"         => $msg,
        "RecepientNumber" => $numbers,
    );
    $fields_string = json_encode($fields);
    //open connection
    $ch = curl_init($url);
    curl_setopt_array($ch, array(
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        CURLOPT_POSTFIELDS => $fields_string
    ));

    $result = curl_exec($ch);
    curl_close($ch);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

#api response format
function apiResponse($key, $msg, $data = null, $anotherKey = [])
{
    $all_response['status'] = $key;
    $all_response['msg'] = $msg;
    if (!empty($anotherKey)) {
        foreach ($anotherKey as $key => $value) {
            $all_response[$key] = $value;
        }
    }
    if (!is_null($data)) $all_response['data'] = $data;
    return response()->json($all_response);
}

#convert from arabic day to english format
function convertDayFromEnglishToArabic($day)
{
    $dayArray = [
        'Saturday'  => 'السبت',
        'saturday'  => 'السبت',
        'Sunday'    => 'الاحد',
        'sunday'    => 'الاحد',
        'Monday'    => 'الاثنين',
        'monday'    => 'الاثنين',
        'Tuesday'   => 'الثلاثاء',
        'tuesday'   => 'الثلاثاء',
        'Wednesday' => 'الاربعاء',
        'wednesday' => 'الاربعاء',
        'Thursday'  => 'الخميس',
        'thursday'  => 'الخميس',
        'Friday'    => 'الجمعة',
        'friday'    => 'الجمعة',
    ];

    return isset($dayArray[$day]) ? $dayArray[$day] : '';
}

#show day by date
function showDay($start_date, $lang = 'ar')
{
    $englishDay = date('l', strtotime($start_date));
    $arabicDay  = convertDayFromEnglishToArabic($englishDay);
    return $lang == 'en' ? $englishDay : $arabicDay;
}

#send FCM
function Send_FCM_Badge($device_id, $all_data, $type, $setBadge = 0)
{
    $priority = 'high'; // or 'normal'

    $optionBuilder = new OptionsBuilder();
    $optionBuilder->setTimeToLive(60 * 20);
    $optionBuilder->setPriority($priority);
    $notificationBuilder = new PayloadNotificationBuilder($all_data['title']);
    $notificationBuilder->setBody($all_data['msg'])->setSound('default');
    //    $notificationBuilder->setBody($all_data['message'])->setSound('default')->setBadge($setBadge);

    $option = $optionBuilder->build();
    $notification = $notificationBuilder->build();
    $dataBuilder = new PayloadDataBuilder();
    $dataBuilder->addData($all_data);

    $data = $dataBuilder->build();
    $token = $device_id;
    if ($token) {

        if ($type == 'ios') {
            $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);
        } else {
            $downstreamResponse = FCM::sendTo($token, $option, null, $data);
        }

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();

        $downstreamResponse->numberModification();
    }
}

#remove html tags
function fixText($text)
{
    $text = str_ireplace(array("\r", "\n", "\t"), '', $text);
    $text = str_ireplace(array("&nbsp;", "&hellip;", "&ndash;"), '', $text);
    $text = strip_tags($text);
    $text = stripslashes($text);
    return $text;
}

#get social links
function social($key)
{
    $social   = Social::where('site_name', $key)->first();
    $value    = isset($social) ? $social->url : '';
    return $value;
}

#get date range from start_date to end_date
function createDateRangeArray($strDateFrom, $strDateTo)
{
    $aryRange = array();

    $iDateFrom = mktime(1, 0, 0, substr($strDateFrom, 5, 2),     substr($strDateFrom, 8, 2), substr($strDateFrom, 0, 4));
    $iDateTo = mktime(1, 0, 0, substr($strDateTo, 5, 2),     substr($strDateTo, 8, 2), substr($strDateTo, 0, 4));

    if ($iDateTo >= $iDateFrom) {
        array_push($aryRange, date('Y-m-d', $iDateFrom)); // first entry
        while ($iDateFrom < $iDateTo) {
            $iDateFrom += 86400; // add 24 hours
            array_push($aryRange, date('Y-m-d', $iDateFrom));
        }
    }
    return $aryRange;
}







