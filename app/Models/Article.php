<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden =['updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // sentence-capitalise 
     public function getTitleAttribute($desc)
     {
         return ucwords($desc);
     } 


    /**
     * Find the file extension
     */
    public function getFileTypeAttribute()
    {
             //mp4,mov,ogg
/*        $mime = mime_content_type($file);
if(strstr($mime, "video/")){
    // this code for video
}else if(strstr($mime, "image/")){
    // this code for image
}*/
        $ext  = pathinfo($this->filePath, PATHINFO_EXTENSION);

        switch($ext)
        {
            case 'mp4':
            $type='mp4 video';
            break;
            case 'mp3':
            $type='mp3 audio';
            break;   
            case 'm4a':
            $type='m4a audio';
            break;
            case 'amr':
            $type='amr audio';
            break;
            case 'aac':
            $type='aac audio';
            break;            
            case 'amr':
            $type='amr audio';
            break;                        
            case 'mov':
            $type='mov video';
            break;
            case 'ogg':
            $type='ogg video';
            break;                                    
            case 'pdf':
            $type='pdf';
            break;
            case 'doc':
            $type='doc word';
            break; 
            case 'docx':
            $type='docx word';
            break;   
            case 'xlsx':
            $type='xlsx excel';
            break; 
            case 'jpg':
            $type='jpg image';
            break; 
            case 'jpeg':
            $type='jpeg image';
            break;
            case 'gif image':
            $type='gif image';
            break; 
            case 'png':
            $type='png image';
            break;                                                                               
            default:
            $type='image';                                                                                                                                            
        } 

        return $type;       
    } 

    public function isImage()
    {
        //$ext  = pathinfo($this->url, PATHINFO_EXTENSION);
        if($this->checkExtension()=='png' || $this->checkExtension()=='bmp' ||$this->checkExtension()=='jpg' || $this->checkExtension()=='jpeg')
        {
            return true;
        }
    } 

    public function isVideo()
    {
        //$ext  = pathinfo($this->url, PATHINFO_EXTENSION);
        if($this->checkExtension()=='mp4' || $this->checkExtension()=='mov' ||$this->checkExtension()=='ogg')
        {
            return true;
        }
    } 

    public function isAudio()
    {
        //$ext  = pathinfo($this->url, PATHINFO_EXTENSION);
        if($this->checkExtension()=='mp3' || $this->checkExtension()=='m4a' || $this->checkExtension()=='opus' ||$this->checkExtension()=='amr' 
            || $this->checkExtension()=='aac')
        {
            return true;
        }        
    }

    protected function checkExtension()
    {
        $ext  = pathinfo($this->filePath, PATHINFO_EXTENSION);
        return $ext;
    } 

     public static function randomColor()
     {
        $colors = ['border-yellow-300','border-red-600', 'border-green-600',];
        $randomised = array_rand($colors);
        return $colors[$randomised];
     }              
}
