<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use Session;
use Mail;
use App\Model\Notification;

class Helper{
    public static function sendMailBySendgrid($template,$data,$subject, $to_email, $to_name=''){
        
        // dd($to_email);
        $html = view('emails.'.$template, compact('data'))->render();
        $email = new \SendGrid\Mail\Mail();
        
        $email->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        $email->setSubject($subject);
       
        if(is_array($to_email)){ // send email to multiple ids
            foreach($to_email as $to){
                $email->addTo($to);
            }
        } else { // send email to single ids
          $email->addTo($to_email, $to_name);
        }
        // dd($email); 
        $email->addContent(
            "text/html", $html
        );
        // dd(getenv('SENDGRID_API_KEY'));
        $sendgrid = new \SendGrid('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');
        
        
        try {
            $response = $sendgrid->send($email);
            // dd($response);
        } catch (Exception $e) {
            $fp = fopen(storage_path('logs/email.log'), 'a+');
            fwrite($fp, '\n\t Exception occured on dt:-' . date('m-d-Y H:i:s') . "\n\t " . $e->getMessage());
            fclose($fp);
            return false;
        }
    }

    public static function createNotification($title, $message, $send_to,$user_id ,$usertype){
        $notification = new Notification();
        $notification->title = $title;
        $notification->message = $message;
        $notification->send_to = $send_to;
        $notification->user_id = $user_id;
        $notification->usertype = $usertype;
        $notification->save();
    }

    public function uploadSimpleImage($file, $org_width, $org_height, $store_id, $object_type, $object_id)
    {
        // dd($store_id);
        try {

            $randomtime = rand().time();
            $fileName = $randomtime . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/'.$object_type.'/'.$object_id.'/', $fileName);
            // Create a new SimpleImage object
            $image = new SimpleImage();
            $image
              ->fromFile(url('uploads/'.$object_type.'/'.$object_id.'/'.$fileName))
              ->autoOrient()
              ->resize($org_width, $org_height)
              ->toFile('uploads/'.$object_type.'/'.$object_id.'/'.$fileName, 'image/png'); 
            $store = Store::find($store_id);
            // dd($store);
            $bucket = Helper::getBucketDetail($store->s3bucket_id);
            $client = new \Aws\S3\S3Client(array(
                'credentials' => [
                    'key'    => $bucket->access_key,
                    'secret' => $bucket->secret_key,
                ],
                'region'  => $bucket->region,
                'version' => '2006-03-01',
            ));
            if($object_type!=''){
                $object_type = $object_type.'/';
            }
            $path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/'.$object_type.$object_id; // change "upload_to_s3" to the directory you'd like to upload
            $dest = 's3://'. $bucket->name .'/'.$store_id.'/'.$object_type.$object_id; // change "uploads" to where ever you'd like your directory to be
            $manager = new \Aws\S3\Transfer($client, $path, $dest);
            $manager->transfer(); 
            $this->deleteDir('uploads/'.$object_type.'/'.$object_id);
            return $fileName;
          } catch(Exception $err) {
            // Handle errors
            echo $err->getMessage();
          }
    }

    public function deleteDir($dir)
    {
       if (substr($dir, strlen($dir)-1, 1) != '/')
           $dir .= '/';

       if ($handle = opendir($dir))
       {
           while ($obj = readdir($handle))
           {
               if ($obj != '.' && $obj != '..')
               {
                   if (is_dir($dir.$obj))
                   {
                       if (!$this->deleteDir($dir.$obj))
                           return false;
                   }
                   elseif (is_file($dir.$obj))
                   {
                       if (!unlink($dir.$obj))
                           return false;
                   }
               }
           }
           closedir($handle);
           if (!@rmdir($dir))
               return false;
           return true;
       }
       return false;
    }
}