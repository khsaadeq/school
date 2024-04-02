<?php
namespace App\Traits;
use Image;
use Storage;
use Illuminate\Suppor\Str;
trait ImageProcessing{
    public function get_mime($mime){
        if($mime =='image/jpeg')
        $extension ='.jpg';
        elseif($mime =='image/png')
        $extension ='.png';
        elseif($mime =='image/gif')
        $extension ='.gif';
        elseif($mime =='image/svg+xml')
        $extension ='.svg';
        elseif($mime =='image/tiff')
        $extension ='.tiff';
        elseif($mime =='image/webp')
        $extension ='.webp';
        return $extension;

    }
    /****8888888888888888888888 */
    public function saveImage($image){
        $img = Image::make($image);
        $extension = $this->git_mime($img->mime());
        $str_random =Str::random(8);
        $imgpath =$str_random.time().$extension;
        $img->save(storage_path('app/imagesfp').'/'.$imgpath);
        return $imgpath;
    }
      /****8888888888888888888888 */
    public function aspect4resize($image,$width,$height){
        $img = Image::make($image);
        $extension = $this->git_mime($img->mime());
        $str_random =Str::random(8);
        $img->resize($width,$height,function($constraint){
            $constraint->aspectRatio();
        });
        $imgpath =$str_random.time().$extension;
        $img->save(storage_path('app/imagesfp').'/'.$imgpath);
        return $imgpath; }
            /****8888888888888888888888 */
            public function aspect4height($image,$width,$height){
                $img = Image::make($image);
                $extension = $this->git_mime($img->mime());
                $str_random =Str::random(8);
                $img->resize(null,$height,function($constraint){
                    $constraint->aspectRatio();
                });
                if($img -> width() < $width){
                    $img->resize($width,null);
                }

                elseif($img -> width() > $width){
                    $img->crop($width,$height,0,0);
                }

                $imgpath = $str_random.time().$extension;
                $img->save(storage_path('app/imagesfp').'/'.$imgpath);
                return $imgpath;
            }
            /**8888888 */
            public function saveImageAndThumbnail($TheFile,$thumb =false){
                $datax=array();
                $datax['image'] = $this->saveImage($TheFile);
                if($thumb){
                    $datax['thumbnailsm'] = $this->aspect4resize($TheFile,256,144);
                    $datax['thumbnailmd'] = $this->aspect4resize($TheFile,426,240);
                    $datax['thumbnailxl'] = $this->aspect4resize($TheFile,640,360);
                }
                return $datax;
            }
            /***777777777777 */
            public function deleteimage($filePath){
                if(is_file(Storage::disk('imagesfp')->path($filePath))){
                    if(file_exists(Storage::disk('imagesfp')->path($filePath))){
                        unlink(Storage::disk('imagesfp')->path($filePath));
                    }

                }
            }

}
