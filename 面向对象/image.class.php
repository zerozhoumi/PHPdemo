<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/7/14
 * Time: 20:23
 */
class Image{
    /*
     * 内存中的图片
     */
    private $image;
    /*
     * 图片的基本信息
     */
    private $info;
    public function __construct($src)
    {
        $info = getimagesize($src);
        $this ->info=array(
            'width'=>$info[0],
            'height'=>$info[1],
            'type'=>image_type_to_extension($info[2],false),
            'mime'=>$info['mime']
        );
        $fun="imagecreatefrom".$this ->info['type'];
        $this->image=$fun($src);
    }
    /*
     * 压缩图片
     */
    public function thumb($width,$height){
        $image_thumb=imagecreatetruecolor($width,$height);
        imagecopyresampled($image_thumb,$this->image,0,0,0,0,$width,$height,$this->info['width'],$this->info['height']);
        imagedestroy($this->image);
        $this->image=$image_thumb;
    }

    /*
     * 添加文字水印
     */

    public function fontMark($content,$font_url,$size,$color,$local,$angle){
        $col = imagecolorallocatealpha($this->image,$color[0],$color[1],$color[2],$color[3]);
        imagettftext($this->image,$size,$angle,$local['x'],$local['y'],$col,$font_url,$content);
}
    /*
         * 添加图片水印
         */

    public function imageMark($source,$local,$alpha){
        $infoMark = getimagesize($source);
        $type2 = image_type_to_extension($infoMark[2],false);
        $fun2="imagecreatefrom".$type2;
        $image2=$fun2($source);
        imagecopymerge($this->image,$image2,$local['x'],$local['y'],0,0,$infoMark[0],$infoMark[1],$alpha);
        imagedestroy($image2);
    }


    public function show(){
        header("Content-type:".$this->info['mime']);
        $func= "image".$this->info['type'];
        $func($this->image);
    }

    public function save($newname){
        $func= "image".$this->info['type'];
        $func($this->image,$newname.'.'.$this->info['type']);
    }
    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        imagedestroy($this->image);
    }
}
?>