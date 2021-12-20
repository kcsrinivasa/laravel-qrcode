![Laravel](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)


# Laravel generate QR Code

Hi All!

Here is the example focused on laravel generate and scan qr code.

### Preview
![generate](https://github.com/kcsrinivasa/laravel-qrcode/blob/main/output/qrgenerate.jpg?raw=true)
![scan](https://github.com/kcsrinivasa/laravel-qrcode/blob/main/output/scan.jpg?raw=true)


we can generate QR code for location, mail, name, payment upi, url, or etc using simple-qrcode. and here view or download the generated qr code.

simple-qrcode is a composer package for generate qr code in your laravel application.

Instascan JS is a real-time webcam-driven HTML5 QR code scanner. Instascan JS wil help to find all camera attach with your system or mobile and you can read qrcode using anyone that you want. also can scan the qr code, here we scaning and showing in alert.
### Step 1: Install Laravel
```bash
composer create-project --prefer-dist laravel/laravel qrcode
```

### Step 2: Install simple-qrcode Package
```bash
composer require simplesoftwareio/simple-qrcode
```
After this command open "config/app.php" file and add service provider and aliase

```javascript
'providers' => [
    ....
    SimpleSoftwareIO\QrCode\QrCodeServiceProvider::class
],

'aliases' => [
    ....
    'QrCode' => SimpleSoftwareIO\QrCode\Facades\QrCode::class
],
```

Create controller
```bash
php artisan make:controller QRcodeController -r
```
### Step 3: Add Routes
```bash
Route::get('/', function () {  return redirect(route('qrcode.index')); });
Route::get('/generate','App\Http\Controllers\QRcodeController@index')->name('qrcode.index');
Route::get('/scan', 'App\Http\Controllers\QRcodeController@scan')->name('qrcode.scan');
Route::post('/generate', 'App\Http\Controllers\QRcodeController@generate')->name('qrcode.generate');
Route::get('/download/{type}', 'App\Http\Controllers\QRcodeController@download')->name('qrcode.download');
```
### Step 4: Add functions in Controller
Add below functions in app/Http/Controllers/QRcodeController.php
```bash
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('qrcode.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function scan()
    {
        return view('qrcode.scan');
    }


    /**
     * Display a qrcode of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate(Request $request)
    {
        $request->validate(['content'=>'required']);
        $content = $request->content;
        // xml image
         // $qrCode = \QrCode::size(300)->generate($content);
         \QrCode::size(300)->format('svg')->generate($content, public_path('images/qrcode.svg'));
        $qrCode = 'images/qrcode.svg';


        $data = [
                'content'=>$content,
                'qrCode'=>$qrCode,
            ];

        return view('qrcode.index')->with($data);
    }

    /**
     * Display a qrcode of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function download($type=null)
    {
        if($type=='simple'){
            return response()->download(public_path('images/qrcode.svg'));
        }
            return response()->download(public_path('images/qrcode.svg'));
    }
```

### Step 4: Create Blade file

Goto "resources/views/qrcode/index.blade.php" to grab the generate code

Goto "resources/views/qrcode/scan.blade.php" to grab the scan code

### Step 5: Final run and check in browser
```bash
mv server.php index.php
cp public/.htaccess .
```
open in browser
```bash
http://localhost/laravel/qrcode
```